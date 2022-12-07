<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = $_POST['username'];    // removes backslashes
        $password = $_POST['password'];
        $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
        foreach($result as $row){
            $role_id = $row['role_id'];
        }
        if($role_id == 1){
            header("Location: admin.php");
        }elseif($role_id == 2){
            header("Location: dashboard.php");
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>
<?php
    }
?>
</body>
</html>