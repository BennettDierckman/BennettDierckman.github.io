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
<html lang="en">
<!--
  Bennett Dierckman (DelGado)
  CopyRight Mardin J. Yadegar International 
  ALEXANDER & SONS
  services.php
-->
  <head>
<script src="direction.js"></script>
<!-- Required meta tags -->
  <meta charset="utf-8">
  <title>Alexander &amp; Sons | Reset Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Font Awesome -->
  <script src="https://use.fontawesome.com/a686b3c76b.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/perfundo.css">
  </head>
  <body data-spy="scroll" data-target="#serviceMenu" data-offset="50" class="body2">
    <div class="container"> <!-- PUT YER SHIT IN HERE BOYS -->
      <nav class="container navbar fixed-top navbar-toggleable-md navbar-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
         <a class="navbar-brand" href="../index.html"><img src="../assets/images/alexanderSonsLogo.png" alt="Alexander &amp; Sons Logo"></a>        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
      </nav>
      <header>
        <div class="jumbotron d-flex justify-content-center">
          <div id="jumbopacity">
            <h1 class="display-1">Alexander & Sons</h1>
            <div id="serviceMenu">
              <div class="row">
                  <div class="col-12 col-lg-9 mx-auto text-center loginBubble mt-auto">
                    <div class="bubbleContent">
                        <h2 class="font-md-lg mt-3 mb-2"> <span class="text-primary">Password Reset</span></h2>
                        <p>Please type your new password below.</p>
                        <form class="form-top" action="resetPassword.php" method="post">
                          <div class="form-group row">
                            <div class="col-11 ml-auto mr-auto">
                              <input type="password" class="form-control" id="password" name="newPassword" placeholder="New Password" required>
                            </div>
                          </div>
                          <div class="form-group row">
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
                              <button type="submit" class="btn btn-warning">Reset Password</button>
                            </div>
                        </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <footer>
        <div class="contactUs">
          <div class="row p-b-10 m-l-r-auto">
            <div class="foot1 col-12 col-sm-12 col-md-6 col-lg-5 item m-l-r-auto">
              <div class="row">
                <div class="col-6 p-r-0">
                  <h6 class="p-t-10">Phone:</h6>
                  <h6>(408) 515-2525</h6>
                </div>
                <div class="col-6 p-l-0">
                  <h6 class="p-t-10">Fax: </h6>
                  <h6>(408)-351-4901</h6>
                </div>
              </div>
            </div>
            <div class="foot1 col-12 col-md-4 col-lg-2 m-l-r-auto hidden-md-down p-l-0">
              <h6 id="addy" class="p-t-10">Address:</h6>
              <h6>1554&nbsp;La&nbsp;Pradrea&nbsp;Drive,<br>Campbell CA, 95008</h6>
            </div>
            <div class="foot1 col-12 col-sm-12 col-md-6 col-lg-5 m-l-r-auto">
              <div class="row">
                <div class="col-6 p-r-0">
                  <h6 class="p-t-10">Email:</h6>
                  <h6 class="emailP"><a class="white" href="mailto:sales@alexandersons.com">sales@alexandersons.com</a></h6>
                </div>
                <div class="col-6 p-l-0">
                  <h6 class="p-t-10">License Number:</h6>
                  <h6 class="emailP">838949</h6>
                </div>
              </div>
            </div>
            <div class="foot1 col-12 col-md-12 col-lg-4 col-xl-4 m-l-r-auto hidden-lg-up">
              <h6 id="addy" class="p-t-10">Address:</h6>
              <h6>1554 La Pradrea Drive,<br>Campbell CA, 95008</h6>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>$('.carousel').carousel()</script>  
    <script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
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
  </body>
</html>