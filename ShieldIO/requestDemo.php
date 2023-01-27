<?php

require('required.php');
date_default_timezone_set('PST');


// function domain_exists($email){
// if (strpos($email,"@") && strpos($email,".")){
//     $email1 = htmlentities(trim($email,ENT_NOQUOTES));
//     $email2 = explode("@", $email1);
//     // echo "this is email " . $email2[1];
//     return checkdnsrr($email2[1], 'MX');
// }
// else{
//     return false;
// }
// }

// $a = 1;
$full_name = $mysqli->escape_string($_POST['full_name']);

// if (domain_exists($_POST['email'])){
//     $a = 1;
// }
// else {
//     die("You did not enter a valid email.");
// }
$email = $mysqli->escape_string($_POST['email']);


$selectedDemo = $mysqli->escape_string($_POST['selectedDemo']);

if ($selectedDemo == 'sdaas'){
    $subject = "Demo Request: SDaaS(TM) Platform";   
    $demo = "SDaaS Demo";
}
else if($selectedDemo == 'developer'){
    $subject = "Demo Request: Developer Shield&trade;";
    $demo = "Developer Shield&trade; Demo";
}
else if($selectedDemo == 'document'){
    $subject =  "Demo Request: Document Shield&trade; ";
    $demo = "Document Shield&trade; Demo";
}
else{
    $subject = "no demo selected";
    $demo = "something went wrong";
}

$company = $mysqli->escape_string($_POST['company']);
$title = $mysqli->escape_string($_POST['title']);


$headers = "From: ". $email ."\r\n";
$message_body = "Message from ShieldIO Contact page:\n\n".$full_name.", ".$title." at ".$company."\n has requested a Demo";

        if (mail( "marina@shieldio.com", $subject, $message_body, $headers )){
                    $sql = "INSERT INTO DemoRequests (name, email, company, title, demo, dateRequested) " . "VALUES ('$full_name', '$email', '$company', '$title', '$selectedDemo', '" .date("Y-m-d H:i:s"). "' )";
                    if ( $mysqli->query($sql) ){
                        echo "<script type='text/javascript'> document.location = 'contact2.html'; </script>"; 
                    }
        }
        else{
                    echo "<script type='text/javascript'> document.location = 'contact.html'; </script>"; 
        }
?>