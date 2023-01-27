<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
require 'db.php';
session_start();

// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $result = $mysqli->query("SELECT * FROM Users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";
        $_SESSION['directTo'] = "../login.html";

        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
    }
    else {
        $_SESSION['message'] = "Your account has been activated!";
        $_SESSION['directTo'] = "../login.html";
        $_SESSION['messageButton'] = "Go to Login";
        // Set the user status to active (active = 1)
        $mysqli->query("UPDATE Users SET active='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;
                
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
    }
}
else {
    $_SESSION['message'] = "Invalid parameters provided for account verification!";
    $_SESSION['directTo'] = "../login.html";
    $_SESSION['messageButton'] = "Go to Login";
    echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
} //had an ending tag