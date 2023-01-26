<?php

require('required.php');

//ESCAPE ALL INPUT VARIABLES (Mitigates injection attacts and brings variables to scope)
$name = $mysqli->escape_string($_POST['name']);
$phone = $mysqli->escape_string($_POST['phone']);
$email = $mysqli->escape_string($_POST['email']);
$previousPage = $mysqli->escape_string($_POST['previousPage']); //hidden input field above button. allows us to send user back to same page

//Get Current Date and Time in EST
$date = new DateTime();
$date->setTimezone(new DateTimeZone('America/Detroit'));
$current_time = $date->format('Y-m-d H:i:s');

//Insert Into Call Requests Table
$statement = $mysqli->prepare("INSERT INTO callRequests (name, phone, email, requestDate) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($statement, "ssss", $name, $phone, $email, $current_time);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);

$headers = "From: ". $email ."\r\n";
$message_body = "Call Request:\n\n".$name." has requested a call. \nEmail: " .$email. " to schedule. \nPhone Number: ". $phone;

        if (mail( "bennett@shieldio.com", "Consultation Call Request from GFC.com", $message_body, $headers )){
            echo "<script type='text/javascript'> document.location = '" . $previousPage . "'; </script>"; 
        }
        else{
            echo "<script type='text/javascript'> document.location = '" . $previousPage . "'; </script>"; 
        }
?>