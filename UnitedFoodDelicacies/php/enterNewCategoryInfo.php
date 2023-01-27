<?php
    //Establishes connection with database
    require("db.php");
    session_start();

    //Bring in the distributor's OLD info
    $categoryId = $mysqli->escape_string($_POST["categoryId"]);
    $newCategoryName = $mysqli->escape_string($_POST["newCategoryName"]);

    $statement = $mysqli->prepare("UPDATE categories SET category=? WHERE id=?"); //create delete statement
    mysqli_stmt_bind_param($statement, "ss", $newCategoryName, $categoryId); //Bind variable
    if (mysqli_stmt_execute($statement)) { //If the statement is executed (and the distributor is deleted)
        $_SESSION['message'] = "Category updated."; //set error message
        $_SESSION['directTo'] = "manageCategories.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to    
    }else{
        $_SESSION['message'] = "Unable to update Category."; //set error message
        $_SESSION['directTo'] = "manageCategories.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to 
    }
?>