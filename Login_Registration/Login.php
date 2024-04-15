<?php
session_start();

require_once "database.php"; // Assuming your database connection is in database.php

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Basic input validation
    if (empty($email) || empty($password)) {
        echo "<div class='alert alert-danger'>Email and password are required</div>";
        exit();
    }

    // Query without prepared statement (vulnerable to SQL injection)
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Verify password (assuming passwords are stored in plain text)
        if ($password === $user["password"]) {
            $_SESSION["user"] = $user; // Store user data in session
            header("Location: homepage.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Incorrect password</div>";
        }
    } else {
        // Do not reveal whether email is registered or not
        echo "<div class='alert alert-danger'>Invalid email or password</div>";
    }
}

if (isset($_GET["logout"])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div>
            <img src="./Login.png" alt="">
        </div>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div> 
            <div>
                <input type="submit" value="Log In" name="login">
            </div>
            <p>Not yet Registered ? <a href="registration.php">Register here</a></p>
        </form>
    </div>
</body>
</html>