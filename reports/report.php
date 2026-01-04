<?php
include "../config/db.php";
$q=mysqli_query($conn,"
SELECT f.Food_Name,
IFNULL(SUM(i.Quantity),0) imported,
IFNULL(SUM(e.Quantity),0) exported,
IFNULL(SUM(i.Quantity),0)-IFNULL(SUM(e.Quantity),0) stock
FROM foods f
LEFT JOIN import i ON f.Food_Id=i.Food_Id
LEFT JOIN export e ON f.Food_Id=e.Food_Id
GROUP BY f.Food_Id
");
?>
<!DOCTYPE html>
<html>
<head>
<title>Reports</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="nav">
<a href="../dashboard/index.php">Dashboard</a>
<a href="../auth/logout.php">Logout</a>
</div>

<h2 style="text-align:center;margin-top:30px;">Stock Report</h2>

<table>
<tr>
<th>Food</th>
<th>Imported</th>
<th>Exported</th>
<th>Stock</th>
</tr>

<?php while($r=mysqli_fetch_assoc($q)){ ?>
<tr>
<td><?= $r['Food_Name'] ?></td>
<td><?= $r['imported'] ?></td>
<td><?= $r['exported'] ?></td>
<td><?= $r['stock'] ?></td>
</tr>
<?php } ?>
</table>

</body>
</html>
