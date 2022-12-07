<?php
include('db.php');
$query = "SELECT * FROM `roles`";
$roles = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['user_role'];
        $query    = "INSERT into `users` (username, password, role_id)
                     VALUES ('$username', '$password', '$role')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
        echo "<div class='form'>
                <h3>You Successfully registered a new user!</h3><br/>
                <p class='link'>Go Back to <a href='admin.php'>ADMIN</a></p>
                </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Register new worker</h1>
        <input type="text" class="login-input" name="username" placeholder="Worker Username" required />
        <input type="password" class="login-input" name="password" placeholder="Worker Password">
        <label for="user_role">Worker role:</label><br>
        <select name="user_role" id="user_role">
            <?php foreach($roles as $role){?>
                <option value="<?= $role['id'] ?>"><?= $role['role_name'] ?></option>
           <?php }?>
        </select><br>
        <button type="submit" name="submit" value="Register" class="login-button">Register New Worker</button>
    </form>
<?php
    }
?>
</body>
</html>