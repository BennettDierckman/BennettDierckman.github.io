<?php
    //Require password.php enables the function password_hash() to be called
    require("password.php");
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $firstName = $mysqli->escape_string($_POST["fn"]);
    $lastName = $mysqli->escape_string($_POST["ln"]);
    $email = $mysqli->escape_string($_POST["email"]);
    $facebook = $mysqli->escape_string($_POST["facebook"]);
    $instagram = $mysqli->escape_string($_POST["instagram"]);
    $phone = $mysqli->escape_string($_POST["phone"]);
    $password1 = $mysqli->escape_string($_POST["password"]);
    $userType = $mysqli->escape_string($_POST["userType"]);
    $userLocation = $mysqli->escape_string($_POST["userLocation"]);

    $hash = $mysqli->escape_string(md5( rand(0,1000)));

    // //Check Passwords Function
    // function checkPasswords(){
    //     global $password1, $password2;
    //     if($password1 == $password2){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }

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
            return true; 
        }else {
            return false; 
        }
    }  
    
    //Registers User in the Users table, called if email and username both available
    function registerUser() {
        global $mysqli, $firstName, $lastName, $email, $hash, $password1, $phone, $facebook, $instagram, $userType, $userLocation;
        $passwordHash = password_hash($password1, PASSWORD_DEFAULT);
        $statement = $mysqli->prepare("INSERT INTO users ( firstName, lastname, email, hash, recoveryHash, store, phone, facebook, instagram, userType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($statement, "ssssssssss", $firstName, $lastName, $email, $passwordHash, $hash, $userLocation, $phone, $facebook, $instagram, $userType);
        if(mysqli_stmt_execute($statement)){
            mysqli_stmt_close($statement);  
            if(mkdir("../images/". $hash)){
                return true;
            }
            else{
                return false;
            }
        }
        mysqli_stmt_close($statement); 
        return false; 
    }
  
    //This is where we call le functions  
    if (emailAvailable()) {
        if(registerUser()){    //register the user
            echo "<script type='text/javascript'> document.location = '../../login.html'; </script>"; //send them to next login page
        }
        else{
            $_SESSION['message'] = "Unable to Register User<br>Please Try Again.";
            $_SESSION['previousPage'] = "../../register.html";
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //send them to next login page
        }
    }
    else{
        $_SESSION['message'] = "Email already registered in database<br>Kindly, select another email and try again.";
        $_SESSION['previousPage'] = "../../register.html";
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //send them to next login page
    }
?>