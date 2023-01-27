<?php
require 'db.php';
session_start();
 //  if( isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > 7*60) ){
 //    session_unset(); // unset $_SESSION variable for the run-time
 //    session_destroy(); // destroy session data in storage
 //    header('Location: index2.php');
 //  }
 // else{
 //    session_regenerate_id(true);
 //    $_SESSION['last_acted_on'] = time();

  //already checked for active in login php
  $service = $mysqli->escape_string($_POST['service']);
  if ($service == "") {
    $_SESSION['message'] = "Your session has expired please login again.";
    $_SESSION['directTo'] = '../login.html';
    echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
  }else{
    $directTo = 'dashboard.php';
    $_SESSION['directTo'] = 'dashboard.php';
  }


    $target_dir = "../assets/uploads/".$service."/";

    
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $uploadName = $target_dir . $service.  " Portfolio." . $imageFileType;

        $uploadOk = 1;

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000000) {
            $_SESSION['message'] = "Sorry, your file is too large.";
            $_SESSION['directTo'] = "dashboard.php";
            $_SESSION['messageButton'] = "Try Again";
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
        }
        else if($imageFileType != "zip") {
            $_SESSION['message'] = "Sorry, only Compressed/Zipped (.zip) files permited.";
            $_SESSION['directTo'] = "dashboard.php";
            $_SESSION['messageButton'] = "Try Again";
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
        }else{
            if (file_exists($uploadName)){
                unlink($uploadName);
            }

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $uploadName)) {
                $_SESSION['message'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $_SESSION['directTo'] = "dashboard.php";
                $_SESSION['messageButton'] = "Upload More";
                $_SESSION['directTo2'] = "../services.php";
                $_SESSION['messageButton2'] = "View Services Page";
                echo "<script type='text/javascript'> document.location = 'message.php'; </script>";

                $_SESSION["portfolioMessage"] = "Resume Uploaded";
                echo "<script type='text/javascript'> document.location = 'portfolioDashboard.php'; </script>";
            } else {
                $_SESSION['message'] = "Sorry, there was an error uploading your file.";
                $_SESSION['directTo'] = "dashboard.php";
                $_SESSION['messageButton'] = "Try Again";
                echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
            }
        }
?>