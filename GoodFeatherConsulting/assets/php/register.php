<?php
    //Require password.php enables the function password_hash() to be called
    require("password.php");
    //Establishes connection with database
    require("required.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $firstName = $mysqli->escape_string($_POST["firstName"]);
    $lastName = $mysqli->escape_string($_POST["lastName"]);
    $title = $mysqli->escape_string($_POST["title"]);

    $email = $mysqli->escape_string($_POST["email"]);
    $recoveryEmail = $mysqli->escape_string($_POST["recoveryEmail"]);
        
    $password1 = $mysqli->escape_string($_POST["password"]);
    $password2 = $mysqli->escape_string($_POST["confirmPassword"]);

    $hash = $mysqli->escape_string(md5( rand(0,1000)));

    //Check Passwords Function
    function checkPasswords(){
        global $password1, $password2;
        if($password1 == $password2){
            return true;
        }
        else{
            return false;
        }
    }

    //Checks Users table for existing email, if available returns true
    function emailAvailable() {
        global $mysqli, $email, $recoveryEmail;
        $statement = $mysqli->prepare("SELECT * FROM users WHERE email = ?"); 
        mysqli_stmt_bind_param($statement, "s", $email);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count < 1){
            $statement2 = $mysqli->prepare("SELECT * FROM users WHERE recoveryEmail = ?"); 
            mysqli_stmt_bind_param($statement2, "s", $recoverymail);
            mysqli_stmt_execute($statement2);
            mysqli_stmt_store_result($statement2);
            $count2 = mysqli_stmt_num_rows($statement2);
            mysqli_stmt_close($statement2); 
            if ($count2 < 1){
                return true; 
            }else {
                return false; 
            }
        }else {
            return false; 
        }
    }  
    
    //Registers User in the Users table, called if email and username both available
    function registerUser() {
        global $mysqli, $firstName, $lastName, $email, $recoveryEmail, $title, $hash, $password1;
        $passwordHash = password_hash($password1, PASSWORD_DEFAULT);
        $statement = $mysqli->prepare("INSERT INTO users ( firstName, lastname, email, recoveryEmail, title, hash, recoverHash) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($statement, "sssssss", $firstName, $lastName, $email, $recoveryEmail, $title, $passwordHash, $hash);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);  
    }
  
    //This is where we call le functions  
    if (emailAvailable()) {
        registerUser();    //register the user
        echo "<script type='text/javascript'> document.location = '../../login2.html'; </script>"; //send them to next login page
    }
    else{
        $_SESSION['message'] = "Email already registered in database.";
        $_SESSION['previousPage'] = "../../register.html";
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //send them to next login page
    }
?>