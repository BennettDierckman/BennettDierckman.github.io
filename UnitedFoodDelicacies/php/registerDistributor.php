<?php
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $distributorName = $mysqli->escape_string($_POST["distributorName"]);
    $distributorLocation = $mysqli->escape_string($_POST["distributorLocation"]);
    $distributorEmail = $mysqli->escape_string($_POST["distributorEmail"]);
    $distributorPhone = $mysqli->escape_string($_POST["distributorPhone"]);
    $distributorPrimaryContact = $mysqli->escape_string($_POST["distributorPrimaryContact"]);

    $statement = $mysqli->prepare("SELECT * FROM distributors WHERE name=?"); 
    mysqli_stmt_bind_param($statement, "s", $distributorName);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    $count = mysqli_stmt_num_rows($statement);
    mysqli_stmt_close($statement); 
    if ($count < 1){
        $statement = $mysqli->prepare("INSERT INTO distributors (name, location, email, phone, primaryContact) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($statement, "sssss", $distributorName, $distributorLocation, $distributorEmail, $distributorPhone, $distributorPrimaryContact);
        if(mysqli_stmt_execute($statement)){
            mysqli_stmt_close($statement);  
                $_SESSION['message'] = "Distributor Added to Database."; //set error message
                $_SESSION['directTo'] = "dashboard.php";  //set previous page
                echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error pag
        }else{
            $_SESSION['message'] = "Unable add Distributor."; //set error message
            $_SESSION['directTo'] = "manageDistributors.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
        }
    }else{
        $_SESSION['message'] = "Distributor already in database."; //set error message
        $_SESSION['directTo'] = "manageDistributors.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
    }
?>