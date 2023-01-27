<?php
/* User login process, checks if user exists and password is correct */
require('db.php');
session_start();
// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM Users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn&rsquo;t exist!";
    $_SESSION['directTo'] = "../login.html";
    $_SESSION['messageButton'] = "Try Again";
    echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        //session_start();
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['last_acted_on'] = time();

        //check if user has activated account via email ink
        if($user['active'] == 1) {
            $_SESSION['logged_in'] = true;
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        }
        else{
            $_SESSION['message'] = "Please verify your email.";
            $_SESSION['directTo'] = "../login.html";
            $_SESSION['messageButton'] = "Try Again";
            //seccond message button
            $_SESSION['directTo2'] = "forgotPassword.php";
            $_SESSION['messageButton2'] = "Forgot Password?";
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
        }
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        $_SESSION['directTo'] = "../login.html";
        $_SESSION['messageButton'] = "Try Again";
        //seccond message button
        $_SESSION['directTo2'] = "forgotPassword.php";
        $_SESSION['messageButton2'] = "Forgot Password?";
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
    }
}