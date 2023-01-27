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

$a = 1;
$full_name = $mysqli->escape_string($_POST['full_name']);

// if (domain_exists($_POST['email'])){
//     $a = 1;
// }
// else {
//     die("You did not enter a valid email.");
// }
$email = $mysqli->escape_string($_POST['email']);


$selectedPaper = $mysqli->escape_string($_POST['selectedPaper']);

if ($selectedPaper == "sdaas"){
    $subject = "White Paper Request: SDaaS(TM) Platform";   
    $whitePaper = "SDaaS White Paper";
}
else if($selectedPaper == "developer"){
    $subject = "White Paper Request: Developer Shield&trade;";
    $whitePaper = "Developer Shield&trade; White Paper";
}
else if($selectedPaper == "document"){
    $subject =  "White Paper Request: Document Shield&trade; ";
    $whitePaper = "Document Shield&trade;  White Paper";
}
else{
    $subject = "no white paper selected";
    $whitePaper = "something went wrong";
}

$company = $mysqli->escape_string($_POST['company']);
$title = $mysqli->escape_string($_POST['title']);



$headers = "From: ". $email ."\r\n";
$message_body = "Message from ShieldIO Contact page:\n\n".$full_name.", ".$title." at ".$company." \n has requested a White Paper";

        if (mail( "marina@shieldio.com", $subject, $message_body, $headers )){
                    $sql = "INSERT INTO WhitePaperRequests (name, email, company, title, whitePaper, dateRequested) " . "VALUES ('$full_name', '$email', '$company', '$title', '$whitePaper', '" .date("Y-m-d H:i:s"). "' )";
                    if ( $mysqli->query($sql) ){
                        echo "<script type='text/javascript'> document.location = 'contact2.html'; </script>"; 
                    }
        }
        else{
                    echo "<script type='text/javascript'> document.location = 'contact.html'; </script>"; 
        }
?>