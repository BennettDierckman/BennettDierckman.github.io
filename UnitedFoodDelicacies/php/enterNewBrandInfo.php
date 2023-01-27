<?php
    //Establishes connection with database
    require("db.php");
    session_start();

    //Bring in the distributor's OLD info
    $brandId = $mysqli->escape_string($_POST["brandId"]);
    $newBrandName = $mysqli->escape_string($_POST["newBrandName"]);

    $statement = $mysqli->prepare("UPDATE brands SET brand=? WHERE id=?"); //create delete statement
    mysqli_stmt_bind_param($statement, "ss", $newBrandName, $brandId); //Bind variable
    if (mysqli_stmt_execute($statement)) { //If the statement is executed (and the distributor is deleted)
        $_SESSION['message'] = "Brand Name updated."; //set error message
        $_SESSION['directTo'] = "manageBrands.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to    
    }else{
        $_SESSION['message'] = "Unable to update Brand Name."; //set error message
        $_SESSION['directTo'] = "manageBrands.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to 
    }
?>