<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit();
}
include "../config/db.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM foods WHERE Food_Id=$id");

header("Location: view.php");
exit();
