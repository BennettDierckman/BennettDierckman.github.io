<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
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
  <title>Alexander &amp; Sons | Dashboard</title>
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
                          <p style="font-size: 1.2rem; font-family: 'Montserrat', sans-serif;" class="mb-3 mt-2"> 
                            Please select the service that you would like to modify.
                          </p>
                          <form action="modifyService.php" method="POST">
                            <div class="row mb-4">
                              <div class="form-group col-12 mb-4 mb-lg-0">
                                <div class="form-field-icon-wrap">
                                  <select name="service" id="service" class="form-control">
                                    <option value="Stamped Concrete">Stamped Concrete</option>
                                    <option value="Siera Stone Overlay">Siera Stone Overlay</option>
                                    <option value="Driveways">Driveways</option>
                                    <option value="Patios">Patios</option>
                                    <option value="Sidewalks & Walkways">Sidewalks &amp; Walkways</option>
                                    <option value="Retaining Walls">Retaining Walls</option>
                                    <option value="Arbor & Pergolas">Arbor &amp; Pergolas</option>
                                    <option value="Stone Veneers">Stone Veneers</option>
                                    <option value="Slate & Flagstone">Slate &amp; Flagstone</option>
                                    <option value="Bricks">Bricks</option>
                                    <option value="Paver Stone">Paver Stone</option>
                                    <option value="Outdoor Barbecues">Outdoor Barbecues</option>
                                    <option value="Lighting">Lighting</option>
                                    <option value="Landscape Planning">Landscape Planning</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12 mt-3 d-flex justify-content-center">
                                <div style="width: 75%; display:flex; justify-content: space-between;">
                                  <a class="mr-2" href="../login.html" class="btn btn-danger">Logout</a>
                                  <button type="submit" class="btn btn-main">Next</button>
                                </div>
                              </div>
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
  </body>
</html>




