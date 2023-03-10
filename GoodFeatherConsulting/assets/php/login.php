<?php
    //Require password.php enables the function password_verify() to be called
    require("password.php");

    require("required.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();
  
    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $email = $mysqli->escape_string($_POST["email"]);
    $password = $mysqli->escape_string($_POST["password"]);
    //Prepare the query
    $statement = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);

    //Counting number of rows (checks if email is in the db)
    $count = mysqli_stmt_num_rows($statement);
    if ($count == 1){
        //user found, proceede with rest of code
        mysqli_stmt_bind_result($statement, $userID, $userFirstName, $userLastName, $userEmail, $userRecoveryEmail, $userTitle, $userHash, $userRecoverHash, $userActive);
        while(mysqli_stmt_fetch($statement)){
            if (password_verify($password, $userHash)) {
                if($userActive=='1'){
                    //User Active, Send them on into the application
                    //Set User related session variables
                    $_SESSION['userId'] = $userID;
                    $_SESSION['userFirstName'] = $userFirstName;
                    $_SESSION['userLastName'] = $userLastName;
                    $_SESSION['userFullName'] = $userFirstName .' '. $userLastName;
                    $_SESSION['userEmail'] = $userEmail;
                    $_SESSION['userRecoveryEmail'] = $userRecoveryEmail;
                    $_SESSION['userTitle'] = $userTitle;
                    $_SESSION['userRecoverHash'] = $userRecoverHash;
                    $_SESSION['message'] = "Welcome Back ".$userFirstName;
                    $_SESSION['previousPage'] = "../../login.html";  //set previous page
                    echo "<script type='text/javascript'> document.location = 'mainDashboard.php'; </script>"; //Send them to the dashboard
                }
                else{
                    //User inactive 
                    $_SESSION['message'] = "Please contact system's Admin for Account activation."; //set error message
                    $_SESSION['previousPage'] = "../../login.html";  //set previous page
                    echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
                }
            }
            else{
                //passwords do not match
                $_SESSION['message'] = "Password Incorrect."; //set error message
                $_SESSION['previousPage'] = "../../login.html";  //set previous page
                echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
            } 
        }   
    }
    else{ //user not found, send to error
        $_SESSION['message'] = "Email not found in the database, please register or try another email."; //set error message
        $_SESSION['previousPage'] = "../../login.html";  //set previous page
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
    }
?>