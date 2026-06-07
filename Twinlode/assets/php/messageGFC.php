<?php

require('required.php');

//ESCAPE ALL INPUT VARIABLES (Mitigates injection attacts and brings variables to scope)
$name = $mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);
$company = $mysqli->escape_string($_POST['company']);
$title = $mysqli->escape_string($_POST['title']);
$message = $mysqli->escape_string($_POST['message']);
echo $message;
//Get Current Date and Time in EST
$date = new DateTime();
$date->setTimezone(new DateTimeZone('America/Detroit'));
$current_time = $date->format('Y-m-d H:i:s');

// echo $name;
// echo '\n'. $email;
// echo '\n'. $company;
// echo '\n'. $title;
// echo '\n'. $message;
// echo '\n'. $current_time;

//Insert gfcMessages Table 
$statement = $mysqli->prepare("INSERT INTO gfcMessages (name, email, company, title, message, messageDate) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($statement, "ssssss", $name, $email, $company, $title, $message, $current_time);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);


$headers = "From: ". $email ."\r\n";
$message_body = "Message from Contact page:\n\n".$name." ".$title." at ".$company."\n has sent a general message. \n\nMessage: \n" .$message;

        if (mail( "bennett@shieldio.com", "General Message from GFC.com contact page", $message_body, $headers )){
            echo "<script type='text/javascript'> document.location = '../../contact2.html'; </script>"; 
        }
        else{
            echo "<script type='text/javascript'> document.location = '../../contact.html'; </script>"; 
        }
?>