<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="web icon" href="https://c8.alamy.com/comp/2H4K57N/account-login-line-icon-new-user-register-registration-concept-illustration-2H4K57N.jpg">
</head>
<body>
    <div class="container">
        <div>
            <img src="./Sign up.png" alt="">
        </div>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" name="firstName" id="" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" name="lastName" id="" placeholder="Last Name">
            </div>  

            <div class="form-group">
                <select name="gender">
                    <option value="other" selected>Other...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <input type="email" name="email" id="" placeholder="Email">
            </div>

            <div class="form-group">
                <input type="password" name="password" id="" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" id="" placeholder="Confirm Password">
            </div>
            
            <?php
                if(isset($_POST["submit"])){
                    $firstName = $_POST["firstName"];
                    $lastName = $_POST["lastName"];
                    $email = $_POST["email"];
                    $gender = $_POST["gender"];
                    $password = $_POST["password"];
                    $confirm_password = $_POST["confirm_password"];

                    $password_hash = password_hash($password, PASSWORD_DEFAULT);

                    $errors = array();

                    if(empty($firstName) || empty($lastName) || empty($email) || empty($gender) || empty($password) || empty($confirm_password)) {
                        array_push($errors, "All fields are required!");
                    }
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Email is not valid!");
                    }
                    if(strlen($password) < 8) {
                        array_push($errors, "Password must be at least 8 characters long!");
                    }
                    if($password !== $confirm_password) {
                        array_push($errors, "Password doesn't match!");
                    }

                    require_once "database.php";

                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        array_push($errors, "Email already exists!");
                    }

                    if(count($errors) > 0) {
                        foreach($errors as $error) {
                            echo "<div id='message'>$error</div>";
                        }
                    } else {
                        $sql = "INSERT INTO users(firstName, lastName, gender, email, password) VALUES ('$firstName', '$lastName', '$gender', '$email', '$password')";
                        if(mysqli_query($connect, $sql)) {
                            echo "<script>alert('Successfully Registered!')</script>";
                            // After successful registration
                                $_SESSION["user"] = array(
                                    "firstName" => $firstName,
                                    "lastName" => $lastName,
                                    "email" => $email,
                                    "gender" => $gender
                                );
                            header("Location: homepage.php");
                        } else {
                            die("Something went wrong!");
                        }
                    }
                }
            ?>
            <p>Already a user ? <a href="login.php">Log In</a></p>
            <div class="form-btn">
                <input type="submit" value="Sign Up" name="submit">
            </div>
        </form>
    </div>
</body>
</html>
