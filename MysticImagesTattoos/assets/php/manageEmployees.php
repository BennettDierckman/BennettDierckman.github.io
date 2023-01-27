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
                                $sql1 = "SELECT * FROM users ORDER BY store, position";
                                $result1 = $mysqli->query($sql1);
                                $numRows1 = $result1->num_rows;
                                //if there are employees in the users table 
                                if ($numRows1 > 0){
                                    $counter = 1;
                                    echo '<span style="margin-top: -50px; color:black; display: flex; justify-content: center;">
                                      <table border=1 color:blue style="background-color: white; text-align:center;">
                                        <tr>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Artist Type</th>
                                          <th>Location</th>
                                          <th>Position</th>
                                          <th>Adjust Button</th>
                                        </tr>';
                                    while($row = $result1->fetch_assoc()){
                                        echo "
                                            <tr>
                                                <td>
                                                    ". $row['firstName']."
                                                </td>
                                                <td>
                                                    ". $row['lastName']."
                                                </td>
                                                <td>
                                                    ". $row['userType']."
                                                </td>
                                                <td>
                                                    ". $row['store']."
                                                </td>
                                                <td>
                                                    ". $row['position']."
                                                </td>
                                                <td>
                                                    <form action='adjustEmployee.php' method='post'>
                                                        <input type='hidden' name='employeeEmail' value='".$row["email"]."'>
                                                        <button type='submit' class='btn btn-warning'>Adjust</button>
                                                    </form>
                                                </td>
                                            <tr>
                                        ";
                                    }
                                    echo "</table></span><br>";
                                }
                                else {
                                    echo "<p style='margin-bottom: 20px;'>No Registered Employees at this time.</p>";
                                }
                                echo
                                  '<form method="post" action="../../login.html" class="mainDashboardForm" enctype="multipart/form-data">
                                        <a href="mainDashboard.php" class="btn btn-warning ml-auto mr-auto" style="width: 45%">Go Back</a>
                                        <button type="submit" class="btn btn-danger ml-auto mr-auto" style="width: 45%">Logout</button>
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

