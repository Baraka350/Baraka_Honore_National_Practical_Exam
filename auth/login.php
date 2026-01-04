<?php
session_start();
include "../config/db.php";

if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $q = mysqli_query($conn,"SELECT * FROM manager WHERE UserName='$u' AND Password='$p'");
    if (mysqli_num_rows($q) == 1) {
        $_SESSION['user'] = $u;
        header("Location: ../dashboard/index.php");
        exit();
    } else {
        $error = "❌ Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
<h2>Manager Login</h2>

<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>
</div>

</body>
</html>
