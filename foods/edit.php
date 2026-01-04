<?php
include "../config/db.php";
$id=$_GET['id'];
$f=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM foods WHERE Food_Id=$id"));

if(isset($_POST['update'])){
mysqli_query($conn,"UPDATE foods SET Food_Name='$_POST[food]',Food_OwnerName='$_POST[owner]' WHERE Food_Id=$id");
header("Location:view.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Food</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
<h2>Edit Food</h2>

<form method="POST">
<input name="food" value="<?= $f['Food_Name'] ?>" required>
<input name="owner" value="<?= $f['Food_OwnerName'] ?>" required>
<button name="update">Update Food</button>
</form>

<a class="back" href="view.php">⬅ Back</a>
</div>

</body>
</html>
