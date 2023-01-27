<?php
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $categoryName = $mysqli->escape_string($_POST["categoryName"]);

    $statement = $mysqli->prepare("SELECT * FROM categories WHERE category=?"); 
    mysqli_stmt_bind_param($statement, "s", $categoryName);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    $count = mysqli_stmt_num_rows($statement);
    mysqli_stmt_close($statement); 
    if ($count < 1){
        $statement = $mysqli->prepare("INSERT INTO categories (category) VALUES (?)");
        mysqli_stmt_bind_param($statement, "s", $categoryName);
        if(mysqli_stmt_execute($statement)){
            mysqli_stmt_close($statement);  
                $_SESSION['message'] = "Category Added to Database."; //set error message
                $_SESSION['directTo'] = "dashboard.php";  //set previous page
                echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error pag
        }else{
            $_SESSION['message'] = "Unable add Category."; //set error message
            $_SESSION['directTo'] = "manageCategories.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
        }
    }else{
        $_SESSION['message'] = "Category already in database."; //set error message
        $_SESSION['directTo'] = "manageCategories.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
    }
?>