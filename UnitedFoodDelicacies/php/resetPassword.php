<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'db.php';
session_start();
// Make sure email and hash variables aren't empty
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( $_POST['newPassword'] == $_POST['confirmNewPassword'] ) { 
        $new_password = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE Users SET password='$new_password', hash='$hash', active='1' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {
          $_SESSION['message'] = "Your password has been reset successfully!";
          $_SESSION['directTo'] = "../login.html";
          $_SESSION['messageButton'] = "Go to Login";
          echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
        }
    }
}else{
  if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) ){
      $email = $mysqli->escape_string($_GET['email']); 
      $hash = $mysqli->escape_string($_GET['hash']); 
      // Make sure user email with matching hash exist
      $result = $mysqli->query("SELECT * FROM Users WHERE email='$email' AND hash='$hash'");
      if ( $result->num_rows == 0 ){ 
          $_SESSION['message'] = "You have entered invalid URL for password reset!";
          $_SESSION['directTo'] = "../login.html";
          echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
      }
  }else {
      $_SESSION['message'] = "Sorry, verification failed missing email or hash, try again!";
      $_SESSION['directTo'] = "../login.html";
      echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
  }
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="background-color:#bebebe;">

<head>
    <title>Dashboard | Set New Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css" id="main-styles-link">
    <link rel="stylesheet" href="../css/custom.css" id="main-styles-link">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>

<body style=" height: 100vh; background-color:#bebebe; display:flex; flex-direction:column; justify-content: space-between;">
  <!-- Header Start -->
  <header class="navigation ">
    <div class="rd-navbar-wrap">
      <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="100px" data-xxl-stick-up-offset="100px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-main-outer">
          <div class="rd-navbar-main d-flex justify-content-center">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel d-flex justify-content-center">
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand ml-0"><a class="brand" href="../index.html"><img class="brand-logo-dark" src="../images/logo-default-249x52.png" alt="" width="249" height="52"/><img class="brand-logo-light" src="../images/logo-inverse-249x52.png" alt="" width="249" height="52"/></a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- Header Close -->
  <section class="section-header fullHeight">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-center loginBubble mt-auto">
          <div class="bubbleContent">
            <h2 class="font-md-lg mt-3 mb-2"> <span class="text-primary">Password Reset</span></h2>
            <p class="mb-2">Please type your new password below.</p>
            <form class="form-top" action="resetPassword.php" method="post">
              <div class="form-group row">
                <div class="col-11 ml-auto mr-auto">
                  <input type="password" class="form-control" id="password" name="newPassword" placeholder="New Password" required>
                </div>
              </div>
              <div class="form-group row mt-0">
                <div class="col-11 ml-auto mr-auto">
                  <input type="password" class="form-control" id="confirm_password" name="confirmNewPassword" placeholder="Confirm New Password" required>
                </div>
              </div>
              <div class="mt-1 mb-3">
                <?php
                  echo "
                  <input type='hidden' name='hash' value='".$hash."'>
                  <input type='hidden' name='email' value='".$email."'>";
                ?>
                <button type="submit" class="button button-sm button-secondary button-zakaria">Reset Password</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>

  <section class="footer-btm py-3 bg-white">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="d-md-flex justify-content-center align-items-center py-3 text-center">
                  <p class="mb-0 ">Designed by <a href="https://mjyintl.com/BennettDierckman">MY BD Designs LLC</a></p>
                </div>
            </div>
          </div>
      </div>
  </section>


    <div class="snackbars" id="form-output-global"></div>
    <script type="text/javascript">
      var password = document.getElementById("password")
          , confirm_password = document.getElementById("confirm_password");

      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } 
        else{
          confirm_password.setCustomValidity('');
        }
      }
      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
    </script>
    <script src="../js/core.min.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>