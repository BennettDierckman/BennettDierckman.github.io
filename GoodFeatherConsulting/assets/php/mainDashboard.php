<?php
    require("required.php");
    session_start();
    $message = $_SESSION['message'];
    $previousPage = $_SESSION['previousPage'];

    //assign logged in user session variables to local variables
    $userID = $_SESSION['userId'];
    $userFirstName = $_SESSION['userFirstName'];
    $userLastName = $_SESSION['userLastName'];
    $userFullName = $_SESSION['userFullName'];
    $userEmail = $_SESSION['userEmail'];
    $userRecoveryEmail = $_SESSION['userRecoveryEmail'];
    $userTitle = $_SESSION['userTitle'];
    $userRecoverHash = $_SESSION['userRecoverHash'];
?>

<!-- Here we start the html page the user sees -->
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--  -->
        <!--    Document Title-->
        <!-- =============================================-->
        <title>Consultant Dashboard</title> <!-- Shows in browser tab -->
        <!--  -->
        <!--    Favicons-->
        <!--    =============================================-->
        <link rel="apple-touch-icon" sizes="180x180" href="../images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/favicons/favicon-16x16.png">
        <link rel="shortcut icon" type="image/x-icon" href="../images/favicons/favicon.ico">
        <link rel="manifest" href="../assets/images/favicons/manifest.json">
        <link rel="mask-icon" href="../assets/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileImage" content="../images/favicons/mstile-150x150.png">
        <meta name="theme-color" content="#ffffff">
        <!--  -->
        <!--    Stylesheets-->
        <!--    =============================================-->
        <!-- Default stylesheets-->
        <link href="../lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Template specific stylesheets-->
        <link href="../lib/loaders.css/loaders.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="../lib/iconsmind/iconsmind.css" rel="stylesheet">
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <link href="../lib/hamburgers/dist/hamburgers.min.css" rel="stylesheet">
        <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- Main stylesheet and color file-->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/custom.css" rel="stylesheet"> 
    </head>

    <body data-spy="scroll" data-target=".inner-link" data-offset="60">
        <main>
            <div class="loading" id="preloader">
                <div class="loader h-100 d-flex align-items-center justify-content-center">
                    <div class="line-scale">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
            <section class="text-center py-0">
                <div class="background-holder background-fixed overlay overlay-2" style="background-image:url(../images/blueBack.jpg);"> </div>
                <!--/.background-holder-->
                <div class="row h-full align-items-center">
                    <div class="col-12 mx-auto" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="background-white p-3 mt-0" data-zanim='{"delay":0.1}'>
                            <div data-zanim='{"delay":0}' class="mx-auto webAppLogo">
                                <img src="../images/GOOD_FEATHER_VERTICAL_COLOR_CONSULTING.png" style="max-width: 100%; max-height: 100%;" alt="" />
                            </div>
                            <div class="row align-items-center">
                                <!-- DISPLAY WELCOME MESSAGE -->
                                <div class="col-12">
                                    <h3 class="fs-2 fs-lg-3 mt-3">
                                      Welcome Back <?php echo $userFullName;?>
                                    </h3>
                                </div>
                                <!-- DISPLAY PERSONAL MESSAGES -->
                                <div class="col-11 mx-auto portalTable">
                                    <h3 class="fs-1 fs-lg-2 text-left mb-1 mt-3">Personal Messages</h3>
                                    <?php
                                        $sql1 = "SELECT * FROM consultantMessages WHERE messageFor='$userFullName'";
                                        $result1 = $mysqli->query($sql1);
                                        $numRows1 = $result1->num_rows;
                                        if ($numRows1 > 0){
                                          $counter = 1;
                                          echo '<table border=1 class="">
                                            <tr>
                                                <th class="px-lg-2">Name</th>
                                                <th class="px-lg-2">Company</th>
                                                <th class="px-lg-2">Title</th>
                                                <th class="px-lg-2">Message</th>
                                                <th class="px-lg-2">Message Date</th>
                                                <th class="px-lg-2">Response Date</th>
                                            </tr>';
                                          while($row = $result1->fetch_assoc()){
                                              echo "<tr>";
                                                  echo "<td class='px-lg-2'>" . $row["name"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["company"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["title"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["message"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["messageDate"] . "</td>";
                                                  echo "<td class='px-lg-1'>"; 
                                                  if($row['responseDate'] == 'TBD'){
                                                    echo '<form action="respondTo_consultantMessage.php" method="POST">
                                                            <input type="hidden" name="consultantMessage_id" value="'.$row['id'].'">
                                                            <button class="btn btn-success btn-block" type="submit">Respond</button>
                                                          </form>';
                                                  }else{
                                                    echo $row['responseDate'];
                                                  } 
                                                  echo "</td>";
                                              echo "</tr>";
                                            }
                                            echo "</table>";
                                          }
                                        else {
                                          echo "<p class='text-left'>None so far.</p>";
                                        }
                                    ?>
                                    <hr>
                                </div>
                                <div class="col-11 mx-auto portalTable">
                                    <h3 class="fs-1 fs-lg-2 text-left mb-1 mt-0">Service Requests</h3>
                                    <?php
                                        $sql1 = "SELECT * FROM serviceRequests";

                                        $result1 = $mysqli->query($sql1);

                                        $numRows1 = $result1->num_rows;
                                        
                                        if ($numRows1 > 0){
                                          $counter = 1;
                                          echo '<table border=1 class="">
                                            <tr>
                                                <th class="px-lg-0">Name</th>
                                                <th class="px-lg-0">Company</th>
                                                <th class="px-lg-0">Title</th>
                                                <th class="px-lg-0">Message</th>
                                                <th class="px-lg-0">Requested Category</th>
                                                <th class="px-lg-0">Requested Service</th>
                                                <th class="px-lg-0">Request Date</th>
                                                <th class="px-lg-0">Responder</th>
                                                <th class="px-lg-0">Response Date</th>
                                            </tr>';
                                          while($row = $result1->fetch_assoc()){
                                              echo "<tr>";
                                                  echo "<td class='px-lg-2'>" . $row["name"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["company"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["title"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["message"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["requestedServiceCategory"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["requestedService"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["requestDate"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["responder"] . "</td>";
                                                  echo "<td class='px-lg-2'>";
                                                  if($row['responseDate'] == 'TBD'){
                                                    echo '<form action="respondTo_serviceRequest.php" method="POST">
                                                            <input type="hidden" name="serviceRequest_id" value="'.$row['id'].'">
                                                            <button class="btn btn-success btn-block" type="submit">Respond</button>
                                                          </form>';
                                                  }else{
                                                    echo $row['responseDate'];
                                                  } 
                                                  echo "</td>";
                                              echo "</tr>";
                                            }
                                            echo "</table>";
                                          }
                                        else {
                                          echo "<p class='text-left'>None so far.</p>";
                                        }
                                    ?>
                                    <hr>
                                </div>
                                <div class="col-11 mx-auto portalTable">
                                    <h3 class="fs-1 fs-lg-2 text-left mb-1 mt-0">Call Requests</h3>
                                    <?php
                                        $sql1 = "SELECT * FROM callRequests";

                                        $result1 = $mysqli->query($sql1);

                                        $numRows1 = $result1->num_rows;
                                        
                                        if ($numRows1 > 0){
                                          $counter = 1;
                                          echo '<table border=1 class="">
                                            <tr>
                                                <th class="px-lg-0">Name</th>
                                                <th class="px-lg-0">Phone</th>
                                                <th class="px-lg-0">Request Date</th>
                                                <th class="px-lg-0">Responder</th>
                                                <th class="px-lg-0">Response Date</th>
                                                <th class="px-lg-0">Call Date</th>
                                                <th class="px-lg-0">Call Answered</th>                                                
                                            </tr>';
                                          while($row = $result1->fetch_assoc()){
                                              echo "<tr>";
                                                  echo "<td class='px-lg-2'>" . $row["name"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["phone"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["requestDate"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["responder"] . "</td>";
                                                  //INITIAL VISITOR OUTREACH
                                                  echo "<td class='px-lg-2'>";
                                                  if($row['responseDate'] == 'TBD'){
                                                    echo '<form action="respondTo_callRequest.php" method="POST">
                                                            <input type="hidden" name="callRequest_id" value="'.$row['id'].'">
                                                            <button class="btn btn-success btn-block" type="submit">Respond</button>
                                                          </form>';
                                                  }else{
                                                    echo $row['responseDate'];
                                                  } 
                                                  echo "</td>";
                                                  //CALL SCHEDULING
                                                  echo "<td class='px-lg-2'>";
                                                  if($row['callDate'] == 'TBD' && ($row['responder'] != 'TBD' && $row['responseDate'] !='TBD')){
                                                    echo '<form action="schedule_callRequest.php" method="POST">
                                                            <input type="hidden" name="callRequest_id" value="'.$row['id'].'">
                                                            <button class="btn btn-success btn-block" type="submit">Sechdule</button>
                                                          </form>';
                                                  }else{
                                                    echo $row['callDate'];
                                                  }
                                                  echo "</td>";
                                                  //WAS THE CALL ANSWERED
                                                  echo "<td class='px-lg-2'>";  
                                                  if( $row['callAnswered'] == 'TBD' && ($row['callDate'] != 'TBD' && $row['responder'] != 'TBD' && $row['responseDate'] !='TBD')){
                                                    echo '<form action="answer_callRequest.php" method="POST">
                                                            <input type="hidden" name="callRequest_id" value="'.$row['id'].'">
                                                            <button class="btn btn-success btn-block" type="submit">Respond</button>
                                                          </form>';
                                                  }else{
                                                    echo $row['callAnswered'];
                                                  }
                                                  echo "</td>";
                                              echo "</tr>";
                                            }
                                            echo "</table>";
                                          } 
                                        else {
                                          echo "<p class='text-left'>None so far.</p>";
                                        }
                                    ?>
                                    <hr>
                                </div>
                                <div class="col-11 mx-auto portalTable">
                                    <h3 class="fs-1 fs-lg-2 text-left mb-1 mt-0">General Messages/Comments</h3>
                                    <?php
                                        $sql1 = "SELECT * FROM gfcMessages";

                                        $result1 = $mysqli->query($sql1);

                                        $numRows1 = $result1->num_rows;
                                        
                                        if ($numRows1 > 0){
                                          $counter = 1;
                                          echo '<table border=1 class="">
                                            <tr>
                                                <th class="px-lg-0">Name</th>
                                                <th class="px-lg-0">Company</th>
                                                <th class="px-lg-0">Title</th>
                                                <th class="px-lg-0">Message</th>
                                                <th class="px-lg-0">Message Date</th>
                                                <th class="px-lg-0">Responder</th>
                                                <th class="px-lg-0">Response Date</th>                                                
                                            </tr>';
                                          while($row = $result1->fetch_assoc()){
                                              echo "<tr>";
                                                  echo "<td class='px-lg-2'>" . $row["name"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["company"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["title"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["message"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["messageDate"] . "</td>";
                                                  echo "<td class='px-lg-2'>" . $row["responder"] . "</td>";
                                                  echo "<td class='px-lg-2'>";
                                                  if($row['responseDate'] == 'TBD'){
                                                    echo '<form action="respondTo_gfcMessage.php" method="POST">
                                                            <input type="hidden" name="gfcMessage_id" value="'.$row['id'].'">
                                                            <button class="btn btn-success btn-block" type="submit">Respond</button>
                                                          </form>';
                                                  }else{
                                                    echo $row['responseDate'];
                                                  } 
                                                  echo "</td>";
                                              echo "</tr>";
                                            }
                                            echo "</table>";
                                          } 
                                        else {
                                          echo "<p class='text-left'>None so far.</p>";
                                        }
                                    ?>
                                    <hr>
                                </div>
                                <div class="col-11 mt-2 mt-sm-3 mx-auto ">
                                    <a href="../../login.html" class="btn btn-info btn-block w-100">Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.row-->
                <!--/.container-->
            </section>
        </main>
        <!--  -->
        <!--    JavaScripts-->
        <!--    =============================================-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script src="../lib/jquery/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="../lib/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../lib/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="../lib/gsap/src/minified/TweenMax.min.js"></script>
        <script src="../lib/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
        <script src="../lib/CustomEase.min.js"></script>
        <script src="../js/config.js"></script>
        <script src="../js/zanimation.js"></script>
        <script src="../js/core.js"></script>
        <script src="../js/main.js"></script> 
    </body>
</html>