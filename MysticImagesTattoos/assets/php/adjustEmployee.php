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
    $previousPage = "mainDashboard.php";

    $employeeEmail = $mysqli->escape_string($_POST["employeeEmail"]);
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
                                $sql1="SELECT * FROM users WHERE email='".$employeeEmail."'";
                                $result1 = $mysqli->query($sql1);
                                $numRows1 = $result1->num_rows;
                                //if there are employees in the users table 
                                if ($numRows1 == 1){
                                    while($row = $result1->fetch_assoc()){
                                        //depending on the artist's type show a different  select
                                        if($row['userType']=='tattoo'){
                                            echo '
                                            <form method="post" action="adjustArtistLocation.php"
                                            <div style="display: flex; flex-direction:row; background-color: gray;>"
                                            <h3>Move '.$row['firstName'].' '.$row['lastName'].' to position:</h3>
                                             <select name="newPosition" style="background-color: tan; margin: 0 auto 10px auto;">
                                                <option value="same">Same Position</option>
                                                <option value="1">Position #1</option>
                                                <option value="2">Position #2</option>
                                                <option value="3">Position #3</option>
                                            </select>

                                            <h3>at</h3>
                                            <select name="newLocation" style="background-color: tan; margin: 0 auto 10px auto;">
                                                <option value="same">Same Location</option>
                                                <option value="noblesville">Noblesville</option>
                                                <option value="castleton">Castleton</option>
                                            </select>
                                            </div>
                                            <input type="hidden" name="employeeEmail" value="'.$employeeEmail.'">
                                            <button class="btn btn-primary" type=submit style="width:100%;margin-bottom: 10px">
                                                Save Changes
                                            </button>
                                            </form>';
                                        }
                                    }
                                }
                                echo
                                  '<form method="post" action="deleteUser.php" class="mainDashboardForm">
                                        <a href="manageEmployees.php" class="btn btn-warning ml-auto mr-auto" style="width: 45%">Go Back</a>
                                        <input type="hidden" name="employeeEmail" value="'.$employeeEmail.'">
                                        <button type="submit" class="btn btn-danger ml-auto mr-auto" style="width: 45%">Delete '.$employeeEmail.'</button>
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

