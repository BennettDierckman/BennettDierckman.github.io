<?php

require('required.php');


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
// $full_name = $mysqli->escape_string($_POST['full_name']);

// if (domain_exists($_POST['email'])){
//     $a = 1;
// }
// else {
//     die("You did not enter a valid email.");
// }
$email = $mysqli->escape_string($_POST['email']);


$subject = $mysqli->escape_string($_POST['subject']);


$comments = $mysqli->escape_string($_POST['comments']);
// $comments = str_replace('\r', '".\n."', $comments);


        $headers = "From: ". $email ."\r\n";
        $message_body = "Message from ShieldIO Contact page:\n\n Inquiry From: ".$full_name."\n\n". $comments;

        if (mail( "marina@shieldio.com", $subject, $message_body, $headers )){
                    echo "<script type='text/javascript'> document.location = 'contact2.html'; </script>"; 
        }
        else{
                    echo "<script type='text/javascript'> document.location = 'contact.html'; </script>"; 
        }
?>