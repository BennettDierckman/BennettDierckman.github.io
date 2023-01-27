<?php
require ("db.php");
session_start();

if( isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > 9*60) ){
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    header('Location: ../login.html');
  }
 else{
   session_regenerate_id(true);
   $_SESSION['last_acted_on'] = time();
 }
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="background-color:#bebebe;">

<head>
    <title>Dashboard | Forgot Password</title>
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

<section class="section-header fullHeight">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-center loginBubble mt-auto">
      <div class="bubbleContent">
        <h3 class="font-md-lg mt-3 mb-2"> <span class="text-primary">Recover Password</span></h3>
        <ol class="mb-2">
          <li>
            <p>Type Email Below, and select &ldquo;Recover&nbsp;Account&rdquo;</p>
          </li>
          <li>
            <p>Check email for password reset link</p>
          </li>
          <li>
            <p>Click secure link to reset password</p>
          </li>
        </ol>
        <form class="form-top" action="sendRecoveryLink.php" method="post">
          <div class="form-group row">
            <div class="col-11 col-lg-9 col-xl-9 ml-auto mr-auto">
              <input type="text" class="form-control" name="email" placeholder="Email" required>
              <small id="passwordHelpInline" class="text-muted">
                <a href="../login.html"><p class="underlined mt-2 mb-0">Return to Login</p></a>
              </small>
            </div>
          </div>
          <div class="mt-1 mb-3">
            <button type="submit" class="button button-sm button-secondary button-zakaria">Recover Account</button>
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
    <script src="../js/core.min.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>