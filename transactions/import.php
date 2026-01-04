<?php
session_start();
include "../config/db.php";

if (isset($_POST['import'])) {
    $food = $_POST['food'] ?? '';
    $date = $_POST['date'] ?? '';
    $qty  = $_POST['qty'] ?? '';

    if ($food && $date && $qty) {
        mysqli_query(
            $conn,
            "INSERT INTO import (Food_Id, ImportDate, Quantity)
             VALUES ('$food', '$date', '$qty')"
        );
        $msg = "Food imported successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Import Food</title>
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
    <h2>Import Food</h2>

    <?php if (isset($msg)) echo "<div class='success'>$msg</div>"; ?>

    <!-- IMPORT FORM -->
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

        <button name="import">Import</button>
    </form>

    <hr style="margin:20px 0;">

    <!-- READ-ONLY TABLE -->
    <h3 style="text-align:center;">Import History</h3>

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
            "SELECT f.Food_Name, i.ImportDate, i.Quantity
             FROM import i
             JOIN foods f ON i.Food_Id = f.Food_Id
             ORDER BY i.ImportDate DESC"
        );

        while ($row = mysqli_fetch_assoc($data)) {
            echo "
            <tr>
                <td>{$no}</td>
                <td>{$row['Food_Name']}</td>
                <td>{$row['ImportDate']}</td>
                <td>{$row['Quantity']}</td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</div>

</body>
</html>
