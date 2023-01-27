<?php
    //Establishes connection with database
    require("db.php");
    session_start();

    //Bring in the distributor's OLD info
    $distributorId = $mysqli->escape_string($_POST["distributorId"]);
    $distributorName = $mysqli->escape_string($_POST["distributorName"]);
    $distributorLocation = $mysqli->escape_string($_POST["distributorLocation"]);
    $distributorEmail = $mysqli->escape_string($_POST["distributorEmail"]);
    $distributorPhone = $mysqli->escape_string($_POST["distributorPhone"]);
    $distributorPrimaryContact = $mysqli->escape_string($_POST["distributorPrimaryContact"]);
    
    //Bring in the new distributors info
    $newDistributorName = $mysqli->escape_string($_POST["newDistributorName"]);
    $newDistributorLocation = $mysqli->escape_string($_POST["newDistributorLocation"]);
    $newDistributorEmail = $mysqli->escape_string($_POST["newDistributorEmail"]);
    $newDistributorPhone = $mysqli->escape_string($_POST["newDistributorPhone"]);
    $newDistributorPrimaryContact = $mysqli->escape_string($_POST["newDistributorPrimaryContact"]);

    if ($newDistributorName == "" ) {
        $newDistributorName = $distributorName;
    }
    if ($newDistributorLocation == "" ) {
        $newDistributorLocation = $distributorLocation;
    }
    if ($newDistributorEmail == "" ) {
        $newDistributorEmail = $distributorEmail;
    }
    if ($newDistributorPhone == "" ) {
        $newDistributorPhone = $distributorPhone;
    }
    if ($newDistributorPrimaryContact == "" ) {
        $newDistributorPrimaryContact = $distributorPrimaryContact;
    }


    $statement = $mysqli->prepare("UPDATE distributors SET name=?, location=?, email=?, phone=?, primaryContact=? WHERE id=?"); //create delete statement
    mysqli_stmt_bind_param($statement, "ssssss", $newDistributorName, $newDistributorLocation, $newDistributorEmail, $newDistributorPhone, $newDistributorPrimaryContact, $distributorId); //Bind variable
    if (mysqli_stmt_execute($statement)) { //If the statement is executed (and the distributor is deleted)
        $_SESSION['message'] = "Distributor updated."; //set error message
        $_SESSION['directTo'] = "dashboard.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to    
    }else{
        $_SESSION['message'] = "Unable to update Distributor."; //set error message
        $_SESSION['directTo'] = "manageDistributors.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to 
    }
?>