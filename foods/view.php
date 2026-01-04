<?php
session_start();
include "../config/db.php";
$r=mysqli_query($conn,"SELECT * FROM foods");
?>
<!DOCTYPE html>
<html>
<head>
<title>Foods</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="nav">
<a href="../dashboard/index.php">Dashboard</a>
<a href="add.php">Add Food</a>
<a href="../auth/logout.php">Logout</a>
</div>

<h2 style="text-align:center;margin-top:30px;">Food List</h2>

<table>
<tr>
<th>#</th>
<th>Food Name</th>
<th>Owner</th>
<th>Actions</th>
</tr>

<?php $i=1; while($f=mysqli_fetch_assoc($r)){ ?>
<tr>
<td><?= $i++ ?></td>
<td><?= $f['Food_Name'] ?></td>
<td><?= $f['Food_OwnerName'] ?></td>
<td>
<a href="edit.php?id=<?= $f['Food_Id'] ?>">Edit</a> |
<a href="delete.php?id=<?= $f['Food_Id'] ?>" onclick="return confirm('Delete food?')">Delete</a>
</td>
</tr>
<?php } ?>
</table>

</body>
</html>
