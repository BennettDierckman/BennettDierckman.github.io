<?php
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $artistName = $mysqli->escape_string($_POST["artistName"]);
    $artistMedia = $mysqli->escape_string($_POST["artistMedia"]);

    $statement = $mysqli->prepare("SELECT * FROM artists WHERE name=?"); 
    mysqli_stmt_bind_param($statement, "s", $artistName);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    $count = mysqli_stmt_num_rows($statement);
    mysqli_stmt_close($statement); 
    if ($count < 1){
        $statement = $mysqli->prepare("SELECT * FROM artists WHERE mediaLink=?"); 
        mysqli_stmt_bind_param($statement, "s", $artistMedia);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count < 1){
            $statement = $mysqli->prepare("INSERT INTO artists (name, mediaLink) VALUES (?, ?)");
            mysqli_stmt_bind_param($statement, "ss", $artistName, $artistMedia);
            if(mysqli_stmt_execute($statement)){
                mysqli_stmt_close($statement);  
                    $_SESSION['message'] = "Artist Added to Database."; //set error message
                    $_SESSION['previousPage'] = "/mainDashboard.php";  //set previous page
                    echo "<script type='text/javascript'> document.location = 'mainDashboard.php'; </script>"; //Send them to error pag
            }else{
                $_SESSION['message'] = "Unable add artist."; //set error message
                $_SESSION['previousPage'] = "/mainDashboard.php";  //set previous page
                echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
            }
        }
        else{
            $_SESSION['message'] = "Artist Media Link already in database."; //set error message
            $_SESSION['previousPage'] = "/mainDashboard.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
        }
    }else{
        $_SESSION['message'] = "Artist name already in database."; //set error message
        $_SESSION['previousPage'] = "/mainDashboard.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
    }
?>