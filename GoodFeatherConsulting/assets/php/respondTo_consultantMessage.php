<?php
    require("required.php");
    session_start();
    $message = $_SESSION['message'];
    $previousPage = 'mainDashboard.php';
    $_SESSION['previousPage'] = $previousPage;

    //Get General Message id from hidden input field
    $consultantMessage_id = $mysqli->escape_string($_POST["consultantMessage_id"]);

    //get the selected general message's information and bring it into scope
    $statement = $mysqli->prepare("SELECT * FROM consultantMessages WHERE id=?"); 
    mysqli_stmt_bind_param($statement, "s", $consultantMessage_id);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    //Counting number of rows (checks if email is in the db)
    $count = mysqli_stmt_num_rows($statement);
    if ($count == 1){
        //user found, proceede with rest of code
        mysqli_stmt_bind_result($statement, $result_id, $result_name, $result_email, $result_company, $result_title, $result_message, $result_messageFor, $result_messageDate, $result_responder, $result_responseDate);
        while(mysqli_stmt_fetch($statement)){
          //Set messagd variables
          $id = $result_id;
          $name = $result_name;
          $email = $result_email;
          $company = $result_company;
          $title = $result_title;
          $message = $result_message;
          $messageFor = $result_messageFor;
          $messageDate = $result_messageDate;
          $responder = $result_responder;
          $responseDate = $result_responseDate;
        }
    }else{
      //Message does not exist in gfcMessages table (something went wrong)
      $_SESSION['message'] = "Unable to locate message in database."; //set error message
      $_SESSION['previousPage'] = "../../mainDashboard.php";  //set previous page
      echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
    }
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
        <title>GFC | Consultant Message</title> <!-- Shows in browser tab -->
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
                <div class="background-holder overlay overlay-2" style="background-image:url(../images/blueBack.jpg);"> </div>
                <!--/.background-holder-->
                <div class="container">
                    <div class="row h-full align-items-center">
                        <div class="col-lg-10 mx-auto" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="background-white radius-secondary p-4 p-md-5 mt-0" data-zanim='{"delay":0.1}'>
                                <div data-zanim='{"delay":0}' class="mx-auto webAppLogo">
                                    <img src="../images/GOOD_FEATHER_VERTICAL_COLOR_CONSULTING.png" style="max-width: 100%; max-height: 100%;" alt="" />
                                </div>
                                <hr>
                                <h3 class="fs-2 mb-3">Responding to Personal Message</h3> 
                                <div class="row text-left">
                                  <div class="col-4">
                                    <h5 class="mb-0">From:</h5>
                                    <p><?php echo $name; ?></p>
                                    <h5 class="mb-0">Date Recieved:</h5>
                                    <p><?php echo $messageDate; ?></p>
                                  </div>
                                  <div class="col-3">
                                    <h5 class="mb-0">Company:</h5>
                                    <p><?php echo $company; ?></p>
                                    <h5 class="mb-0">Title:</h5>
                                    <p><?php echo $title; ?></p>
                                  </div>
                                  <div class="col-4">
                                    <h5 class="mb-0">Message:</h5>
                                    <p><?php echo $message; ?></p>
                                  </div>
                                  <div class="col-10 mx-auto">
                                    <h5>Response:</h5>
                                    <form method="POST" action="send_consultantMessage_response.php">
                                      <textarea class="form-control background-white mb-3" rows="7" name="consultantMessage_response" id="consultantMessage_response" placeholder="Your Message" required></textarea>
                                      <div class="row">
                                        <div class="col-6">
                                          <a href="mainDashboard.php" class="btn btn-danger btn-block w-100">Cancel</a>
                                        </div>
                                        <div class="col-6">
                                          <?php echo '<input type="hidden" name="consultantMessage_id" value="'.$id.'">' ?>
                                          <?php echo '<input type="hidden" name="consultantMessage_email" value="'.$email.'">' ?>
                                          <button class="btn btn-success btn-block" type="submit">Send Response</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
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