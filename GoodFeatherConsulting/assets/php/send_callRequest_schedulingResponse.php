<?php 
/* Reset your password form, sends reset.php password link */
    require("required.php");
    session_start();
    $previousPage = $_SESSION['previousPage'];

    //Get information about response, initial message's id, and recipient from mainDashboard
    $callRequest_id = $mysqli->escape_string($_POST['callRequest_id']);
    $callRequest_email = $mysqli->escape_string($_POST['callRequest_email']);
    $callRequest_scheduledDate = $mysqli->escape_string($_POST['callRequest_scheduledDate']);
    $responder = $_SESSION['userFullName'];

    //Update response date in gfcMessages table
    $statement = $mysqli->prepare("UPDATE callRequests SET callDate=? WHERE id=?"); 
    mysqli_stmt_bind_param($statement, "ss", $callRequest_scheduledDate, $callRequest_id);
    if (mysqli_stmt_execute($statement)){
        //create generate the email
        $to = $callRequest_email;
        $subject = 'Good Feather Consulting | Your call has been scheduled.';
        $headers = "From: ".$_SESSION['userEmail']."\r\n";

        $message_body = "A Call has been scheduled with " .$_SESSION['userFullName']. ". \nScheduled Date and Time:". $callRequest_scheduledDate . "\nThank you for selecting Good Feather Consulting.";

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
