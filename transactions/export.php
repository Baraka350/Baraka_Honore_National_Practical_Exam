<?php
session_start();
include "../config/db.php";

if (isset($_POST['export'])) {
    $food = $_POST['food'] ?? '';
    $date = $_POST['date'] ?? '';
    $qty  = $_POST['qty'] ?? '';

    if ($food && $date && $qty) {
        mysqli_query(
            $conn,
            "INSERT INTO export (Food_Id, ExportDate, Quantity)
             VALUES ('$food', '$date', '$qty')"
        );
        $msg = "Food exported successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Export Food</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="nav">
    <a href="../dashboard/index.php">Dashboard</a>
    <a href="../foods/add.php">Foods</a>
    <a href="import.php">Import</a>
    <a href="export.php">Export</a>
    <a href="../auth/logout.php">Logout</a>
</div>

<div class="container">
    <h2>Export Food</h2>

    <?php if (isset($msg)) echo "<div class='success'>$msg</div>"; ?>

    <!-- EXPORT FORM -->
    <form method="POST">
        <select name="food" required>
            <option value="">-- Select Food --</option>
            <?php
            $foods = mysqli_query($conn, "SELECT * FROM foods");
            while ($f = mysqli_fetch_assoc($foods)) {
                echo "<option value='{$f['Food_Id']}'>{$f['Food_Name']}</option>";
            }
            ?>
        </select>

        <input type="date" name="date" required>
        <input type="number" name="qty" min="1" placeholder="Quantity" required>

        <button name="export">Export</button>
    </form>

    <hr style="margin:20px 0;">

    <!-- READ-ONLY TABLE -->
    <h3 style="text-align:center;">Export History</h3>

    <table>
        <tr>
            <th>#</th>
            <th>Food</th>
            <th>Date</th>
            <th>Quantity</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query(
            $conn,
            "SELECT f.Food_Name, e.ExportDate, e.Quantity
             FROM export e
             JOIN foods f ON e.Food_Id = f.Food_Id
             ORDER BY e.ExportDate DESC"
        );

        while ($row = mysqli_fetch_assoc($data)) {
            echo "
            <tr>
                <td>{$no}</td>
                <td>{$row['Food_Name']}</td>
                <td>{$row['ExportDate']}</td>
                <td>{$row['Quantity']}</td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</div>

</body>
</html>
