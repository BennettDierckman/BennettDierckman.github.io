<?php 
/* Reset your password form, sends reset.php password link */
    require("required.php");
    session_start();
    $previousPage = $_SESSION['previousPage'];

    //Get information about response, initial message's id, and recipient from mainDashboard
    $callRequest_id = $mysqli->escape_string($_POST['callRequest_id']);
    $callRequest_email = $mysqli->escape_string($_POST['callRequest_email']);
    $callRequest_answer = $mysqli->escape_string($_POST['callRequest_answer']);
    $responder = $_SESSION['userFullName'];

    //Update response date in gfcMessages table
    $statement = $mysqli->prepare("UPDATE callRequests SET callAnswered=? WHERE id=?"); 
    mysqli_stmt_bind_param($statement, "ss", $callRequest_answer, $callRequest_id);
    if (mysqli_stmt_execute($statement)){
        $_SESSION['previousPage'] = 'mainDashboard.php';
        echo "<script type='text/javascript'> document.location = 'mainDashboard.php'; </script>";
    }else{
        $_SESSION['message'] = "Unable to update response date in database.";
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
    }
?>
