<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();

	//already checked for active in login php
	$message = $mysqli->escape_string($_SESSION['message']);
	$_SESSION['message'] = '';
	$directTo = $mysqli->escape_string($_SESSION['directTo']);
	$_SESSION['directTo'] = '';
    
    if (isset($_SESSION['messageButton'])) {
    	$messageButton = $_SESSION['messageButton'];
    	$_SESSION['messageButton'] = "";
    }else{$messageButton = "";}

    if (isset($_SESSION['messageButton2']) && isset($_SESSION['directTo2'])) {
    	$directTo2 = $_SESSION['directTo2'];
    	$_SESSION['directTo2'] = '';
    	$messageButton2 = $_SESSION['messageButton2'];
    	$_SESSION['messageButton2'] = '';
    }else{$messageButton2 = ""; $directTo2 = "";}
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
	<title>Alexander &amp; Sons | Message</title>
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
							            <h3 class="font-md-lg mt-3 mb-2"> <span class="text-primary">Message:</span></h3>
							            <p style="font-size: 1.2rem; font-family: 'Montserrat', sans-serif;" class="mb-4"> 
							            	<?php 
							            		if ($message == "") {
							            			echo "<script type='text/javascript'> document.location = '../login.html'; </script>";
							            		}else{
							            			echo $message;
							            		} ?>
							            </p>
							            <div class="d-flex justify-content-center">
							            	<!-- Page will have atleast one button -->
							            	<form class="form-top" action="<?php if($directTo==''){echo '../login.html';}else{echo $directTo;}?>" method="post">
									          	<div class="mt-1 mb-3">
									              <button type="submit" class="btn btn-warning">
									              	<?php
									              		if ($messageButton =='') {
									              			echo "Go Back";
									              		}else{
									              			echo $messageButton;
									              		}
									              	?>
									              </button>
									            </div>
									        </form>
									        <?php
									        	if ($directTo2 != '' && $messageButton2 != '') {
									        		echo '
									        		<form class="form-top" action="'.$directTo2.'" method="post">
											          	<div class="mt-1 mb-3">
											              <button type="submit" class="btn btn-outline-danger">
											              	'.$messageButton2.'
											              </button>
											            </div>
											        </form>';
									        	}
									        ?>
							            </div>
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