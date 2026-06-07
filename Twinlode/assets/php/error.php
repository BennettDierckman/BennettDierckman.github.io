<?php
  require("required.php");
  session_start();
  $message = $_SESSION['message'];
  $previousPage = $_SESSION['previousPage'];
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
        <title>GFC | Error</title> <!-- Shows in browser tab -->
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
                        <div class="col-md-8 col-lg-6 mx-auto" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="background-white radius-secondary p-4 p-md-5 mt-0" data-zanim='{"delay":0.1}'>
                                <div data-zanim='{"delay":0}' style="width: 75%;" class="mx-auto">
                                    <a href="index.html">
                                        <img src="../images/GOOD_FEATHER_VERTICAL_COLOR_CONSULTING.png" alt="" />
                                    </a>
                                </div>
                                <hr>
                                <h3 class="fs-2">Error</h3>
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <p class="mt-2">
                                          <?php echo $message;?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-12 mt-2 mt-sm-3">
                                        <a href="<?php echo $previousPage; ?>" class="btn btn-danger btn-block w-100">Go Back
                                        </a>
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