<?php

require('db.php');
session_start();
function domain_exists($email){
    if (strpos($email,"@") && strpos($email,".")){
        $email1 = htmlentities(trim($email,ENT_NOQUOTES));
        $email2 = explode("@", $email1);
        // echo "this is email " . $email2[1];
        return checkdnsrr($email2[1], 'MX');
    }
    else{
        return false;
    }
}
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Escape all $_POST variables to protect against SQL injections
//if (isset($firstname)){
$a = 1;
$first_name = $mysqli->escape_string($_POST['first_name']);
$_SESSION['first_name'] = $firstname;
//}

//if (isset($lastname)){
$last_name = $mysqli->escape_string($_POST['last_name']);
$_SESSION['last_name'] = $last_name;
//}

//$login_email = $mysqli->escape_string($_POST['login_email']);'
if (domain_exists($_POST['email'])){
    $a = 1;
}
else {
    die("You did not enter a valid email.");
}
$email = $mysqli->escape_string($_POST['email']);
$_SESSION['email'] = $email;


//if (isset($sch)){
$school = $mysqli->escape_string($_POST['school']);
$region = $mysqli->escape_string($_POST['region']);
$_SESSION['region'] = $region;
//}

//if (isset($pass)){
if (strlen($_POST['password']) < 6) {
    $_SESSION['message'] = "Please select a longer password";
    $_SESSION['directTo'] = "../register.html";
    echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
}
else{
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    //}

    $hash = $mysqli->escape_string( md5( rand(0,1000) ) );
          
    // Check if user with that email already exists
    $result = $mysqli->query("SELECT * FROM Users WHERE email='$email'") or die($mysqli->error());

    // We know user email exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {
        $_SESSION['message'] = 'User with this email already exists!';
        $_SESSION['directTo'] = "../register.html";
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
    }
    else { // Email doesn't already exist in a database, proceed...
        $sql = "INSERT INTO Users (first_name, last_name, email, password, hash)" 
                . "VALUES ('$first_name','$last_name','$email', '$password', '$hash')";
        
        // Add user to the database
        if ( $mysqli->query($sql) ){
            $_SESSION['active'] = 0; //0 until user activates their account with verify.php
            $_SESSION['logged_in'] = true; // So we know the user has logged in
            $_SESSION['message'] = "Success, Please wait for authorization from system admin.";
            $_SESSION['directTo'] = "../login.html";
            $_SESSION['messageButton'] = "Go to Login";
            // Send registration confirmation link (verify.php)
            // $to = $email;
            // $subject = 'Bennett Website: Account Verification';
            // $headers = "From: bennettdierckman@gmail.com\r\n";
            // $message_body = "
            // Hey ".$first_name.",

            // Thank you for signing up!

            // Please click this link to activate your account:

            // https://mjyintl.com/AlexanderAndSons_InfoSys/php/verify.php?email=".$email."&hash=".$hash;  

            // mail( $to, $subject, $message_body, $headers );
            // mail( $professional_email, $subject, $message_body, $headers );

            echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; 
        }
    }
}
?>