<?php
session_start();
require('db.php');  //Require the connection to databse

date_default_timezone_set('America/Indiana/Indianapolis'); //sets time to the 317 timezone

$email = $mysqli->escape_string($_POST['email']);  //Gets the email the visitor entered
$question = $mysqli->escape_string($_POST['question']);  //Gets the question the visitor has
//Get hidden input that declares whether the question is comming from the install or community site
$callingPage = $mysqli->escape_string($_POST['callingPage']);

$date = date("Y-m-d"); //Gets the current date and formats as year-month-day

    //Insert the email address and date into the mailingList Table 
    $sql = "INSERT INTO questions (email, question, dateAsked) " 
            . "VALUES ('$email', '$question', '$date')";

    //if they have entered a question and email address
    if ($email!='' && $question!='') {
        //if the data gets entered
        if ($mysqli->query($sql)){ 
            //Set Message to display on website page
            $_SESSION['faqMessage'] = "We have recieved your question and will get back with you soon!";
            //Construct email to notify safekeeping team that they have recieved a question
            $to = 'bennettdierckman@gmail.com'; //who email is sent to
            $subject = 'SafeKeeping Question from Website'; //email's subject
            $headers = "From: ".$email; //Who sends the email
            //Email's Message
            $message_body = "
            Hello,

            ".$email." has asked a question on the ".$callingPage.", 

            ". $question;  
            //Send the email
            mail( $to, $subject, $message_body, $headers );
            //Echo location back to website
            if ($callingPage == "installPage") {
                echo "<script type='text/javascript'> document.location = '../index.php#faqs'; </script>"; 
            }
            else if ($callingPage == "communityPage") {
                echo "<script type='text/javascript'> document.location = '../community.php#faqs'; </script>"; 
            }
        }
        else{
            //Set Message to display on website
            $_SESSION['faqMessage'] = 
                     "Your message was not recieved, please try again.";
            //Echo location back to website
            if ($callingPage == "installPage") {
                echo "<script type='text/javascript'> document.location = '../index.php#faqs'; </script>"; 
            }
            else if ($callingPage == "communityPage") {
                echo "<script type='text/javascript'> document.location = '../community.php#faqs'; </script>"; 
            }
        }
    }
    else{
        //Set Message to display on website
        $_SESSION['faqMessage'] = "Please enter an email and question";
        //Echo location back to website
        if ($callingPage == "installPage") {
            echo "<script type='text/javascript'> document.location = '../index.php#faqs'; </script>"; 
        }
        else if ($callingPage == "communityPage") {
            echo "<script type='text/javascript'> document.location = '../community.php#faqs'; </script>"; 
        }
    }
?>