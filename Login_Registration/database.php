<?php
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "login_registration";
    $connect = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
