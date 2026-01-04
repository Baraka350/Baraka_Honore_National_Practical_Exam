<?php
session_start();
if(!isset($_SESSION['user'])) header("Location: ../auth/login.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="nav">
<a href="../foods/add.php">Add Food</a>
<a href="../foods/view.php">View Foods</a>
<a href="../transactions/import.php">Import</a>
<a href="../transactions/export.php">Export</a>
<a href="../reports/report.php">Reports</a>
<a href="../auth/logout.php">Logout</a>
</div>

<div class="container">
<h2>Welcome, <?php echo $_SESSION['user']; ?></h2>
<p style="text-align:center;color:#555">
Dukundumurimo Smart Warehouse Management System
</p>
</div>

</body>
</html>
