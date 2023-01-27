<?php
    require ("db.php");
    session_start();
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

    if($newPosition == 'same' && $newLocation=='same'){
        $_SESSION['message'] = "Artist's position and location updated.";
        echo "<script type='text/javascript'> document.location = '".$previousPage."'; </script>";
    }
    else{
        if($newPosition == 'same'){
            $sql="UPDATE users SET store='".$newLocation."' WHERE email='".$employeeEmail."'";
        }
        else if($newLocation=='same'){
            $sql="UPDATE users SET position='".$newPosition."' WHERE email='".$employeeEmail."'";
        }
        else{
            $sql="UPDATE users SET store='".$newLocation."', position='".$newPosition."' WHERE email='".$employeeEmail."'";
        }
        if($mysqli->query($sql)){
            $_SESSION['message'] = "Artist's position and location updated.";
            echo "<script type='text/javascript'> document.location = '".$previousPage."'; </script>"; 
        }
        else{
            $_SESSION['message'] = "Unable to Update";
            $_SESSION['previousPage'] = 'manageEmployees.php';
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; 
        }
    }
?>

