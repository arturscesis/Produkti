<?php
include('auth_session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Dashboard - Admin</title>
</head>
<body>
<form class="form" method="post" name="admin-buttons">
        <h3 class="login-title">Hello, <?= $_SESSION['username']?> !</h3>
        <h1 class="login-title">Admin Panel</h1>
        <button type="submit" name="register_newuser" class="login-button">REGISTER NEW WORKER <a href="register.php">HERE</a></button><br>
        <button type="submit" name="register_newuser" class="login-button">ADD NEW PRODUCT <a href="product.php">HERE</a></button>
        <button type="submit" name="register_newuser" class="login-button">SEE PRODUCT LIST <a href="products.php">HERE</a></button>
  </form>
</body>
</html>