<?php
session_start();
require('db.php');  //Require the connection to databse

date_default_timezone_set('America/Indiana/Indianapolis'); //sets time to the 317 timezone

$email = $mysqli->escape_string($_POST['email']);  //Gets the email the visitor entered
$testimonial = $mysqli->escape_string($_POST['testimonial']);  //Gets the testimonial the visitor entered
$permission = $mysqli->escape_string($_POST['marketingPurposes']);  //Gets the value of the permission check box
$date = date("Y-m-d"); //Gets the current date and formats as year-month-day

//Depending on permission construct the mysql querry accordingly
if ($permission=='on') {
    $sql = "INSERT INTO testimonials (email, testimonial, dateRecieved, gavePermission) " 
           . "VALUES ('$email', '$testimonial', '$date', 'True')";
}
else{
    $sql = "INSERT INTO testimonials (email, testimonial, dateRecieved, gavePermission) " 
           . "VALUES ('$email', '$testimonial', '$date', 'False')";
}

//Execute the statement
if ( $mysqli->query($sql) ){ 
    //Set Message to display on website
    $_SESSION['testimonialMessage'] = 
             "Thank you for sharing your SafeKeeping Experience!";
    //Construct email to notify safekeeping team that they have recieved a question
    $to = 'bennettdierckman@gmail.com'; //who email is sent to
    $subject = 'SafeKeeping Testimonial from Website'; //email's subject
    $headers = "From: ".$email; //Who sends the email
    //Email's Message
    $message_body = "
    Hello,

    ".$email." has asked provided a testimonial, 

    ". $testimonial;  
    //Send the email
    mail( $to, $subject, $message_body, $headers );
    echo "<script type='text/javascript'> document.location = '../community.php#testimonials'; </script>"; 
}
else { 
    //Set Message to display on website
    $_SESSION['message'] = 
             "Something went wrong, please try again!";
    echo "<script type='text/javascript'> document.location = '../community.php#testimonials'; </script>"; 
}

// Checks if user with that email already in mailingList table
// $result = $mysqli->query("SELECT * FROM mailingList WHERE email='$email'") or die($mysqli->error());

// If that email already exists in mailingList table
// if ( $result->num_rows > 0 ) {
//     $_SESSION['message'] = 'Email already subscribed, thank you for double checking!';
//     echo "<script type='text/javascript'> document.location = '../community.php#facilities'; </script>";
// }
// If that email has not been entered into the mailingList Table
// else {
//     //Insert the email address and date into the mailingList Table 
//     $sql = "INSERT INTO mailingList (email, dateSubscribed) " 
//             . "VALUES ('$email','$date')";

//     //if the data gets entered
//     if ( $mysqli->query($sql) ){ 
//         //Set Message to display on website
//         $_SESSION['message'] = 
//                  "Thank you for subscibing!";
//         echo "<script type='text/javascript'> document.location = '../community.php#facilities'; </script>"; 
//     }
// }
?>