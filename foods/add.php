<?php
session_start();
include "../config/db.php";

if (isset($_POST['save'])) {
    $food  = $_POST['food'] ?? '';
    $owner = $_POST['owner'] ?? '';

    if ($food && $owner) {
        mysqli_query(
            $conn,
            "INSERT INTO foods (Food_Name, Food_OwnerName)
             VALUES ('$food', '$owner')"
        );
        $msg = "Food added successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Food</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="nav">
    <a href="../dashboard/index.php">Dashboard</a>
    <a href="add.php">Add Food</a>
    <a href="view.php">View Foods</a>
    <a href="../auth/logout.php">Logout</a>
</div>

<div class="container">
    <h2>Add Food</h2>

    <?php if (isset($msg)) echo "<div class='success'>$msg</div>"; ?>

    <!-- ADD FORM -->
    <form method="POST">
        <input type="text" name="food" placeholder="Food Name" required>
        <input type="text" name="owner" placeholder="Owner Name" required>
        <button name="save">Add Food</button>
    </form>

    <hr style="margin:20px 0;">

    <!-- READ-ONLY TABLE -->
    <h3 style="text-align:center;margin-bottom:10px;">Added Foods</h3>

    <table>
        <tr>
            <th>#</th>
            <th>Food Name</th>
            <th>Owner</th>
        </tr>

        <?php
        $no = 1;
        $foods = mysqli_query($conn, "SELECT * FROM foods ORDER BY Food_Id DESC");
        while ($row = mysqli_fetch_assoc($foods)) {
            echo "
            <tr>
                <td>{$no}</td>
                <td>{$row['Food_Name']}</td>
                <td>{$row['Food_OwnerName']}</td>
            </tr>";
            $no++;
        }
        ?>
        <a href="../dashboard/index.php" class="back">⬅ Back to Dashboard</a>

    </table>

</div>

</body>
</html>
