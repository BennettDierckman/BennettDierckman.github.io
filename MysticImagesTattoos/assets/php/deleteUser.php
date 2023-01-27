<?php
    require ("db.php");
    session_start();

      if( isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > 5*60) ){
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    header('Location: ../../login.html');
  }
 else{
 session_regenerate_id(true);
 $_SESSION['last_acted_on'] = time();
 }

    $message = $mysqli->escape_string($_SESSION["message"]);
    $previousPage = "manageEmployees.php";

    $employeeEmail = $mysqli->escape_string($_POST["employeeEmail"]);
    $newPosition = $mysqli->escape_string($_POST["newPosition"]);
    $newLocation = $mysqli->escape_string($_POST["newLocation"]);
    $employeeHash = '';

    $sql1="SELECT recoveryHash FROM users WHERE email='".$employeeEmail."'";
    $result1 = $mysqli->query($sql1);
    $numRows1 = $result1->num_rows;
    //if there are employees in the users table 
    if ($numRows1 > 0){
        while($row = $result1->fetch_assoc()){
            $employeeHash = $row['recoveryHash'];
        }
    }


    $sql="DELETE FROM users WHERE email='".$employeeEmail."'";
    if($mysqli->query($sql)){
        if(rmdir("../images/".$employeeHash."/")){
            $_SESSION['message'] = "Artist Deleted.";
            echo "<script type='text/javascript'> document.location = '".$previousPage."'; </script>"; 
        }else{
            $_SESSION['message'] = "Unable to Delete Directory";
            $_SESSION['previousPage'] = 'manageEmployees.php';
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>";   
        }
    }
    else{
        $_SESSION['message'] = "Unable to Delete";
        $_SESSION['previousPage'] = 'manageEmployees.php';
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; 
    }
?>

