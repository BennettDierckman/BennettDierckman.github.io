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
 
echo "<br>Vanilla Ice is trying to uploading your Artwork.<br>";

$hash = $mysqli->escape_string($_SESSION['userRecoverHash']);
$position = $mysqli->escape_string($_POST['photoLocation']);
echo "<br>" . $hash;
echo "<br>" . $position;

$target_dir = "../images/".$hash."/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo $target_file;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo "<br>" . $fileType;

$uploadName = $target_dir . $position . "." . $fileType;
echo "<br>".$uploadName;

$uploadOk = 1;

// Check file size
if ($_FILES["fileToUpload"]["size"] > 15000000) {
    $_SESSION['message'] = "File too Large."; //set error message
    $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
    echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
    $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "png" && $fileType!="jpg" && $fileType!="jpeg") {
    $_SESSION['message'] = "Sorry, only png, jpg, and jpeg files are permitted."; //set error message
    $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
    echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $pngPath = $target_dir. $position.".png";
    $jpgPath = $target_dir . $position . ".jpg";
    $jpegPath = $target_dir . $position . ".jpeg";
    if (file_exists($pngPath)){
        unlink($pngPath);
    }
    if (file_exists($jpgPath)){
        unlink($jpgPath);
    }
    if (file_exists($jpegPath)){
        unlink($jpegPath);
    }
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $uploadName)) {
        echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $_SESSION["message"] = "Professional Photograph Uploaded";
        echo "<script type='text/javascript'> document.location = 'mainDashboard.php'; </script>";
    } else {
        $_SESSION['message'] = "Sorry, only png, jpg, and jpeg files are permitted."; //set error message
        $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
    }
}
?>