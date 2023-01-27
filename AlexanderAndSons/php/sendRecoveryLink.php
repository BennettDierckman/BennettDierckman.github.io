<?php 
/* Reset your password form, sends reset.php password link */
require 'db.php';
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM Users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "User with that email doesn&rsquo;t exist!";
        $_SESSION['directTo'] = "forgotPassword.php";
        $_SESSION['messageButton'] = "Try Again";
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message to display on success.php
        $_SESSION['message'] = "Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!";
        $_SESSION['directTo'] = "../login.html";
        $_SESSION['messageButton'] = "Return to Login";
        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Bennett Website: Password Reset Link';
            $headers = "From: bennettdierckman@gmail.com\r\n";
        $message_body = '
        Hello '.$first_name.',

        You have requested password reset!

        Please click this link to reset your password:

        https://mjyintl.com/AlexanderAndSons_InfoSys/php/resetPassword.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body, $headers);

        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
  }
}
?>