<?php
session_start();
require('db.php');  //Require the connection to databse

date_default_timezone_set('America/Indiana/Indianapolis'); //sets time to the 317 timezone

$email = $mysqli->escape_string($_POST['email']);  //Gets the email the visitor entered
$date = date("Y-m-d"); //Gets the current date and formats as year-month-day


// Checks if user with that email already in mailingList table
$result = $mysqli->query("SELECT * FROM mailingList WHERE email='$email'") or die($mysqli->error());

// If that email already exists in mailingList table
if ( $result->num_rows > 0 ) {
    $_SESSION['message'] = 'Email already subscribed, thank you for double checking!';
    echo "<script type='text/javascript'> document.location = '../community.php#facilities'; </script>";
}
// If that email has not been entered into the mailingList Table
else {
    //Insert the email address and date into the mailingList Table 
    $sql = "INSERT INTO mailingList (email, dateSubscribed) " 
            . "VALUES ('$email','$date')";

    //if the data gets entered
    if ( $mysqli->query($sql) ){ 
        //Set Message to display on website
        $_SESSION['message'] = 
                 "Thank you for subscibing!";
        echo "<script type='text/javascript'> document.location = '../community.php#facilities'; </script>"; 
    }
}
?>