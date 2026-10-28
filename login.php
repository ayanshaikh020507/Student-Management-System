<?php

session_start();

include 'config/database.php';

$message = "";

if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "select * from users where username = '$username' AND password = '$password' AND status = 1";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){
        $user = mysqli_fetch_assoc($res);

        $_SESSION['user'] = $user['username'];
        $_SESSION['Id'] = $user['id'];

        header("location: admin/dashboard.php");
        exit();
    }else{
        $message = "Invalid Username & Password.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Management System</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body class="login-body">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1>Student Management</h1>
                <p>Admin Login</p>
            </div>
            <?php if($message != "") { ?>
                <div class="error-message">
                    <?php echo $message; ?>
                </div>
            <?php 
            } 
            ?>
            <form method="POST" action="login.php">
                <div class="login-group">
                    <label>Username</label>
                    <input type="text" name="username" class="login-control" placeholder="Enter username" required>
                </div>
                <div class="login-group">
                    <label>Password</label>
                    <input type="password" name="password" class="login-control" placeholder="Enter password" required>
                </div>
                <button type="submit" name="login" class="login-btn">Login</button>
            </form>
            <div class="login-footer">
                <p>Student Management System</p>
            </div>
        </div>
    </div>
</body>
</html>