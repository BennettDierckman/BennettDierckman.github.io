<?php 
/* Reset your password form, sends reset.php password link */
    require("required.php");
    session_start();
    $previousPage = $_SESSION['previousPage'];

    //Get Current Date and Time in EST
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('America/Detroit'));
    $current_time = $date->format('Y-m-d H:i:s');

    //Get information about response, initial message's id, and recipient from mainDashboard
    $callRequest_id = $mysqli->escape_string($_POST['callRequest_id']);
    $callRequest_email = $mysqli->escape_string($_POST['callRequest_email']);
    $callRequest_response = $mysqli->escape_string($_POST['callRequest_response']);
    $responder = $_SESSION['userFullName'];

    //Update response date in gfcMessages table
    $statement = $mysqli->prepare("UPDATE callRequests SET responder=?, responseDate=? WHERE id=?"); 
    mysqli_stmt_bind_param($statement, "sss", $responder, $current_time, $callRequest_id);
    if (mysqli_stmt_execute($statement)){
        //create generate the email
        $to = $callRequest_email;
        $subject = 'Good Feather Consulting | Call Request Response';
        $headers = "From: ".$_SESSION['userEmail']."\r\n";
        $message_body = $callRequest_response;

        if(mail($to, $subject, $message_body, $headers)){
            $_SESSION['message'] = "Response Delivered, email thread created between ". $callRequest_email ." and " . $_SESSION['userEmail'];
            $_SESSION['previousPage'] = 'mainDashboard.php';
            echo "<script type='text/javascript'> document.location = 'success.php'; </script>";
        }else{
            $_SESSION['message'] = "Response unsuccesssful.";
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
        }
    }else{
        $_SESSION['message'] = "Unable to update response date in database.";
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
    }
?>
