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

$message = $mysqli->escape_string($_SESSION["message"]);
$previousPage = "mainDashboard.php";
$_SESSION['previousPage']=$previousPage;
$itemHash = $mysqli->escape_string($_SESSION["itemHash"]);

$sql1 = "SELECT * FROM items WHERE itemHash='$itemHash'";
$result1 = $mysqli->query($sql1);
$numRows1 = $result1->num_rows;
if ($numRows1 > 0){
  while($row = $result1->fetch_assoc()){
  	$id = $row['id'];
  	$name = $row['name'];
  	$artistNames = $row['artistName'];
  	$category = $row['category'];
  	$subCategory = $row['subCategory'];
  	$nailSize = $row['nailSize'];
  	$quantity = $row['quantity'];
  	$relevance = $row['relevance'];
  	$includes = $row['includes'];
  	$description = $row['description'];
  	$sellPrice = $row['sellPrice'];
  	$salePrice = $row['salePrice'];
  }  
  $includedItems = explode(", ",$includes);
   $artists = explode(", ",$artistNames);
}

echo'

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Review New Item</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images/icons/muleIcon4.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">

			<div class="wrap_header muleGrey goldTops">
				<!-- Logo -->
				<a href="../index.html" class="logo">
					<img src="../images/GMRectLogo.jpg" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu stickyMenuItems">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="../index.html">Home</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="https://www.facebook.com/TheGlassMule/" class="fs-28   fa fa-facebook header-icon1"></a>
					<span class="linedivide1"></span>
					<a href="https://www.instagram.com/theglassmule/?hl=en" class="fs-29 color1 p-r-20 fa fa-instagram"></a>
				</div>
			</div>
			<div class="topbar">
				<div class="topbar-social">
				</div>

				<span class="topbar-child1 blue-text">
					<h4>Review New Item</h4>
				</span>

				<div class="topbar-child2">
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile goldOut">
			<!-- Logo moblie -->
			<a href="../index.html" class="logo-mobile">
				<img src="../images/GMRectLogo.jpg" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="https://www.facebook.com/TheGlassMule/" class="fs-24   fa fa-facebook"></a>
					<span class="linedivide1"></span>
					<a href="https://www.instagram.com/theglassmule/?hl=en" class="fs-25 color1 fa fa-instagram"></a>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-menu-mobile">
						<a href="../index.html">Home</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Title Page -->
<!-- 	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(../images/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section> -->

	<!-- content page -->
	<section class=" p-t-0 p-b-0" style="background-color: #bebebe">
		<div class="container" style="background-color: #F2f3f4;">
			<!-- Title Page -->
			<div class="row">
				<div class="col-12 col-md-11 col-lg-10 col-xl-9 mx-auto mt-3 mt-md-4 mt-lg-5">
					<div class="loginForm">
						<div class="row">
							<div class="col-12 mb-3">
								<div class="d-flex">
									<h4 class="pt-2">'.$name.' </h4><h1>&nbsp;|&nbsp;</h1>';
										foreach ($artists as $artist){
											$sql1 = "SELECT * FROM artists WHERE id='$artist'";
											$result1 = $mysqli->query($sql1);
											$numRows1 = $result1->num_rows;
											if ($numRows1 > 0){
												while($row = $result1->fetch_assoc()){
													echo '<a href="'.$row['mediaLink'].'" target="_blank"><h6 class="pt-4">'.$row['name'].' &nbsp;</h6></a>';
												}
											}
									        // echo '<li>'.$item.'</li>';
									    }
									// <h6 class="pt-4">'.$artistName.'</h6>
						echo'	</div>
								<hr>
								<div class="row">
									<div class="col-4">
								    	<p>Description:</p>
								    	<p>'.str_replace("\\r\\n", "<br>", $description).'</p>
									</div>
									<div class="col-3">
										<p>Included:</p>
										<ul>';
										foreach ($includedItems as $item){
											$sql1 = "SELECT * FROM includes WHERE id='$item'";
											$result1 = $mysqli->query($sql1);
											$numRows1 = $result1->num_rows;
											if ($numRows1 > 0){
												while($row = $result1->fetch_assoc()){
													echo '<li><p>'.$row['description'].'</p></li>';
												}
											}
									        // echo '<li>'.$item.'</li>';
									    }
								echo'	</ul>
									</div>
									<div class="col-3">
										<p>Quantity: '.$quantity.'</p>
										<p>Category: '.$category.'</p>
										<p>Sub-Category: '.$subCategory.'</p>
										<p>Nail Size: '.$nailSize.'</p>
									</div>
									<div class="col-2">
										<p>Relevance: '.$relevance.'</p>
										<p>Sell: $'.$sellPrice.'</p>
										<p>Sale: $'.$salePrice.'</p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-12">
										<h5 class="mb-1">Item Images</h5>
										<div class="row">';
										$count = 0;
										$directory = "../images/items/".$itemHash."/Photo";
										while(true){
											if(file_exists($directory.$count.".jpg")){
												echo '<div class="col-3">
														<div class="width: 200px;">
															<img src="'.$directory.$count.'.jpg" style="max-width:100%; max-height:100%;" />
														</div>
													  </div>';
												$count++;
											}else if(file_exists($directory.$count.".png")){
												echo '<div class="col-3">
														<div class="width: 200px;">
															<img src="'.$directory.$count.'.png" style="max-width:100%; max-height:100%;" />
														</div>
													  </div>';
												$count++;
											}else if(file_exists($directory.$count.".jpeg")){
												echo '<div class="col-3">
														<div class="width: 200px;">
															<img src="'.$directory.$count.'.jpeg" style="max-width:100%; max-height:100%;" />
														</div>
													  </div>';
												$count++;
											}else{
												break;
											}
										}
							echo'	    </div>
									</div>
								</div>
							</div>
							<div class="col-11 col-sm-10 col-md-8 col-lg-5 ml-auto">
								<form action="editItem.php" method="post">
                                  	<input type="hidden" name="itemId" value="'.$id.'">	
                                  	<button type="submit" class="btn btn-warning mb-3" style="width: 100%;">Edit Item</a>
                                </form>					
							</div>
							<div class="col-11 col-sm-10 col-md-8 col-lg-5 ml-auto">
								<a href="mainDashboard.php" class="btn btn-primary mb-3" style="width: 100%;">Go To Dashboard</a>							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6  goldTops">
		<div class="t-center p-l-15 p-r-15 p-t-15 p-b-15">
			<a href="#">
				<img class="h-size2" src="../images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="../images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="../images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="../images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="../images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20 p-b-55 copyright">
				Copyright © 2018 All rights reserved. |  <i  aria-hidden="true"></i> <a href="https://colorlib.com" >Colorlib</a> | <a href="http://mjyintl.com/BennettDierckman/" >Bennett Dierckman</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $(\'#dropDownSelect1\')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $(\'#dropDownSelect2\')
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="../js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
</body>
</html>


';
?>
