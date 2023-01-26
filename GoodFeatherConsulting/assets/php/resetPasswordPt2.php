<?php 
/* Reset your password form, sends reset.php password link */
  require("required.php");
  require("password.php");
  session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {   
    $newPassword = $mysqli->escape_string($_POST['password']);
    $email = $mysqli->escape_string($_POST['email']);
    $recoverHash = $mysqli->escape_string($_POST['hash']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    if ( $result->num_rows == 0 ) { 
        // User doesn't exist
        $_SESSION['message'] = "User with that email doesn't exist!";
        $_SESSION['previousPage'] = "../../login.html";
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
    }
    else { 
        // User exists (num_rows != 0)
        $user = $result->fetch_assoc(); // $user becomes array with user data

        $new_password_hash = password_hash($newPassword, PASSWORD_BCRYPT);
                
        $sql = "UPDATE users SET hash='$new_password_hash' WHERE email='$email' AND recoverHash='$recoverHash'";

        if ( $mysqli->query($sql) ) {
            $_SESSION['message'] = "Your password has been reset successfully!";
            $_SESSION['previousPage'] = "../../login.html";
            echo "<script type='text/javascript'> document.location = 'success.php'; </script>";
        }
        else{
            // User doesn't exist
            $_SESSION['message'] = "Unable to reset password";
            $_SESSION['previousPage'] = "../../login.html";
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
        }

            
  }
}