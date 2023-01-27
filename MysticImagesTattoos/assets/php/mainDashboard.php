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
    $previousPage = "../../login.html";

    echo '

<!DOCTYPE html>
<html lang="en">
<!--
    Bennett Dierckman (DelGado)
    CopyRight Mardin J. Yadegar International 
    MysticImagesTattoo.com
    HOME PAGE
-->
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Artist Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/a686b3c76b.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/perfundo.css">
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="container-fluid"> <!-- PUT YER SHIT IN HERE BOYS -->
            <div id="fullWidthTopNav">
                <div id="TopImgDiv">
                    <img id="topLogo"src="../images/MysticImagesTattooCo.png" alt="Mystic Images Logo">
                </div>
            </div>
            <nav class="container-fluid navbar fixed-top navbar-fixed-top navbar-toggleable-md navbar-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../../index.php"><img id="navLogo"src="../images/MysticSkullCut.png" alt="Mystic Images Logo"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../../index.php">Go to Site</a>
                        </li>             
                    </ul>
                </div>
            </nav>
            <main>
                <div class="loginBackground">
                    <div class="row">
                        <div class="col-12 col-md-8 col-xl-7 mx-auto">
                            <div class="mainDashboard">';
                              if($_SESSION['userEmail'] == 'mysticimagestattoo@gmail.com'){
                                echo '
                                    <form method="post" action="manageEmployees.php" class="mainDashboardForm" enctype="multipart/form-data">
                                       <input type="hidden" name="isAdam" value="true">
                                       <button type="submit" class="btn btn-primary ml-auto mr-auto mb-2" style="width:95%;">Manage Employees</button>
                                    </form>
                                ';
                              }
                                  echo
                                  '<form method="post" action="uploadPhoto.php" class="mainDashboardForm" enctype="multipart/form-data">
                                  <h3 class="text-center">'.$message.'</h3>
                                  <div class="mt-3 mt-md-4" style="display:flex; justify-content: center; flex-direction:column;">
                                    <input style=" height: 35px; width: auto; margin: 5px auto 10px auto; font-size: 16px; color: black; padding-left: auto !important; padding-right: auto !important;" class="btn btn-info" type="file" name="fileToUpload" id="fileToUpload">
                                    <select name="photoLocation" style="background-color: tan; margin: 0 auto 10px auto;">
                                        <option value="profilePhoto">Profile Photo</option>
                                        <option value="position1">Position #1</option>
                                        <option value="position2">Position #2</option>
                                        <option value="position3">Position #3</option>
                                        <option value="position4">Position #4</option>
                                        <option value="position5">Position #5</option>
                                        <option value="position6">Position #6</option>
                                        <option value="position7">Position #7</option>
                                        <option value="position8">Position #8</option>
                                        <option value="position9">Position #9</option>
                                        <option value="position10">Position #10</option>
                                        <option value="position11">Position #11</option>
                                        <option value="position12">Position #12</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary ml-auto mr-auto mb-2" style="width:95%;">Upload Artwork</button>
                                    <div style="display:flex; margin-top: 10px; justify-content:center">
                                        <a href="'.$previousPage.'" class="btn btn-danger ml-auto mr-auto" style="width: 100%">Logout</a>
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
<!-- -->
        </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>$(\'.carousel\').carousel()</script>  
  </body>
</html>

    ';
?>

