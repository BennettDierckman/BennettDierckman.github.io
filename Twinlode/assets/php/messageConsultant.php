<?php

require('required.php');

//ESCAPE ALL INPUT VARIABLES (Mitigates injection attacts and brings variables to scope)
$name = $mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);
$company = $mysqli->escape_string($_POST['company']);
$title = $mysqli->escape_string($_POST['title']);
$message = $mysqli->escape_string($_POST['message']);
$messageFor = $mysqli->escape_string($_POST['messageTo']); //--> hidden input field above submit button in code from contact.html

//Get Current Date and Time in EST
$date = new DateTime();
$date->setTimezone(new DateTimeZone('America/Detroit'));
$current_time = $date->format('Y-m-d H:i:s');

//Insert Messages Table 
$statement = $mysqli->prepare("INSERT INTO consultantMessages (name, email, company, title, message, messageFor, messageDate) VALUES (?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($statement, "sssssss", $name, $email, $company, $title, $message, $messageFor, $current_time);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);

//Additionally send email notification to the Consultant the message is for
$messageForEmail = 'exampleemail@gmail.com';
// if($messageFor == 'Mike Davis') {
// 	$messageForEmail == 'mike.davis@goodfeatherconsulting.com';
// }
// else if($messageFor == 'Charlie Hays'){
// 	$messageForEmail == 'charlie.hays@goodfeatherconsulting.com';
// }
// else if($messageFor == 'Dean Holland'){
// 	$messageForEmail == 'dean.holland@goodfeathersolutions';
// }
// else if($messageFor == 'Tony Valerio'){
// 	$messageForEmail == 'tony.valerio@goodfeatherconsulting.com';
// }
// else if($messageFor == 'Steve Bass'){
// 	$messageForEmail == 'steve.bass@goodfeatherconsulting.com';
// }
// else if($messageFor == 'Howard Tripp'){
// 	$messageForEmail == 'howard.tripp@goodfeatherconsulting.com';
// }
// else if($messageFor =='Dan Wright') {
// 	$messageForEmail == 'dan.wright@goodfeatherconsulting.com';
// }

$headers = "From: ". $email ."\r\n";
$message_body = "Message from Contact page:\n\n".$name.", ".$title." at ".$company."\n has sent a message to " .$messageFor. ". \n\nMessage: \n" .$message;

        if (mail( "bennett@shieldio.com, ". $messageForEmail, "Personal Message from GFC.com Contact Page", $message_body, $headers )){
            echo "<script type='text/javascript'> document.location = '../../contact2.html'; </script>"; 
        }
        else{
            echo "<script type='text/javascript'> document.location = '../../contact.html'; </script>"; 
        }
?>