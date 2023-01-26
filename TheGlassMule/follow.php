<?php
require ("php/db.php");
session_start();
echo'
<!DOCTYPE html>
<html lang="en">
<head>
	<title>The Glass Mule | The Shop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/muleIcon4.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	<a href="https://m.me/TheGlassMule"><img class="facebookButton" src="images/FBMSG.png"></a>
	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
				</div>

				<span class="topbar-child1 blue-text">
					Open Every Day, 12:00 - 9:00pm
				</span>

				<div class="topbar-child2">
				</div>
			</div>

			<div class="wrap_header muleGrey goldTops">
				<!-- Logo -->
				<a href="index.html" class="logo">
					<img src="images/GMRectLogo.jpg" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu stickyMenuItems">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.html">Home</a>
							</li>
							<li>
								<a href="product.php">The Glass</a>
		 					</li>
							<li>
								<a href="follow.php">The Shop</a>
							</li>
							<li>
								<a href="archives.html">The Gallery</a>
							</li>
							<li>
								<a href="contact.html">Contact</a>
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
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile goldOut">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="images/GMRectLogo.jpg" alt="IMG-LOGO">
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
					<li class="item-topbar-mobile p-l-0 p-t-8 p-b-8">
						<span class="topbar-child1">
							<center>Call or DM us your order on Facebook or Instagram!</center>
						</span>
					</li>

					<li class="item-menu-mobile">
						<a href="index.html">Home</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">The Glass</a>
					</li>

					<li class="item-menu-mobile">
						<a href="follow.php">The Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="archives.html">The Gallery</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>

					<li class="item-topbar-mobile goldBottoms p-l-0 p-t-8 p-b-8">
						<span class="topbar-child1">
							<center>Free Shipping on Orders over $420!</center>
						</span>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- content page -->
	<section class="bgwhite p-t-0">
		<div class="container p-l-0 p-r-0">
			<!-- Title Page -->
					<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/logos/LemonBack9.jpg);">
						<h2 class="p-t-30 l-text2 t-center">At the Shop</h2>
					</section>
			<div class="row p-l-10 p-r-10">
			<article class="col-12 col-md-7 m-l-r-auto">';
			$sql1="SELECT * FROM shopDeals WHERE name='DOD'";
			$result1 = $mysqli->query($sql1);
            $numRows1 = $result1->num_rows;
            //if there are employees in the users table 
            if ($numRows1 > 0){
              while($row = $result1->fetch_assoc()){
              	$retailValue = $row['retailValue'];
              	$price = $row['price'];
              	$contents = $row['contents'];
              }
            }
			echo'	<div class="dealOfTheDay">
						<h3 class="m-text5 t-center">
							Deal of the Day: $'.$price.'
						</h3>
						<div class="row">';
							if(file_exists("images/DOT/DOD/DOD.jpg")){
								echo '<div class="DOTDimg col-sm-5 col-md-12 col-lg-5">
										<img src="images/DOT/DOD/DOD.jpg" alt="Deal of the Day">
									</div>';
							}else if(file_exists("images/DOT/DOD/DOD.png")){
								echo '<div class="DOTDimg col-sm-5 col-md-12 col-lg-5">
										<img src="images/DOT/DOD/DOD.png" alt="Deal of the Day">
									</div>';
							}else if(file_exists("images/DOT/DOD/DOD.jpeg")){
								echo '<div class="DOTDimg col-sm-5 col-md-12 col-lg-5">
										<img src="images/DOT/DOD/DOD.jpeg" alt="Deal of the Day">
									</div>';
							}
					echo'	<div class="DOTDdescription col-sm-7 col-md-12 col-lg-7">
								<table>
									<tr>
										<th>Item</th>
										<th>Retail Value</th>
									</tr>';
									 $contents = explode(", ",$contents);
									 foreach($contents as $content){
									 	echo '<tr>';
									 	$parts = explode(" - ",$content);
									 	foreach($parts as $part){
									 		echo '<td>'.$part.'</td>';
									 	}
									 	echo '</tr>';
									 }
					echo'		</table>
								<p class="t-center" style="text-decoration: underline; font-weight: bold;"> Total Retail Value: $'.$retailValue.'</p>
							</div>
						</div>
				</div>';
					$sql1="SELECT * FROM shopDeals WHERE name='DOW'";
					$result1 = $mysqli->query($sql1);
		            $numRows1 = $result1->num_rows;
		            //if there are employees in the users table 
		            if ($numRows1 > 0){
		              while($row = $result1->fetch_assoc()){
		              	$retailValue = $row['retailValue'];
		              	$price = $row['price'];
		              	$contents = $row['contents'];
		              }
		            }
		echo'		<div class="dealOfTheDay">
						<h3 class="m-text5 t-center">
							Deal of the Week: $'.$price.'
						</h3>
						<div class="row">';
							if(file_exists("images/DOT/DOW/DOW.jpg")){
								echo '<div class="DOTDimg col-sm-5 col-md-12 col-lg-5">
										<img src="images/DOT/DOW/DOW.jpg" alt="Deal of the Day">
									</div>';
							}else if(file_exists("images/DOT/DOW/DOW.png")){
								echo '<div class="DOTDimg col-sm-5 col-md-12 col-lg-5">
										<img src="images/DOT/DOW/DOW.png" alt="Deal of the Day">
									</div>';
							}else if(file_exists("images/DOT/DOW/DOW.jpeg")){
								echo '<div class="DOTDimg col-sm-5 col-md-12 col-lg-5">
										<img src="images/DOT/DOW/DOW.jpeg" alt="Deal of the Day">
									</div>';
							}
					echo'	<div class="DOTDdescription col-sm-7 col-md-12 col-lg-7">
								<table>
									<tr>
										<th>Item</th>
										<th>Retail Value</th>
									</tr>';
									 $contents = explode(", ",$contents);
									 foreach($contents as $content){
									 	echo '<tr>';
									 	$parts = explode(" - ",$content);
									 	foreach($parts as $part){
									 		echo '<td>'.$part.'</td>';
									 	}
									 	echo '</tr>';
									 }
					echo'		</table>
								<p class="t-center" style="text-decoration: underline; font-weight: bold;"> Total Retail Value: $'.$retailValue.'</p>
							</div>
						</div>
				</div>
				<div id="instafeed" class="row"></div>
			</article>
			<aside class="col-12 col-md-5">
				<div class="m-l-r-auto">
   					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTheGlassMule%2F&tabs=timeline&width=0&height=0&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="1400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
			</aside>

		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6  ">
		<div class="flex-w p-b-9 blueFoot t-center">
			<!-- <div class=" contact col-12 col-md-12 col-xl-3 p-t-15 p-l-15 p-r-15 goldTops respon3">
				<h2 class="p-b-5">
					Get In Touch
				</h2>
				<div class="theBoys">
					<h4 class="p-t-5">Chris Childers<br>Owner<br><phone>317-999-5325</phone></h4>

					<h4 class="p-t-5">Vince Chen <br>Co-Owner<br><phone>317-999-5325</phone></h4>

					<h4 class="p-t-5">Mama Chello <br>Shop Manager<br><phone>317-999-5325</phone></h4>
				</div>

			</div> -->

			<div class="col-12 p-t-15 p-l-30 p-r-30 goldTops m-l-r-auto respon3">
				<div class="row">
					<div class="col-sm-6 col-md-4 col-lg-6 m-l-r-auto">
						<h2 class="p-b-15">
							Visit the Shop
						</h2>
						<ul>
							<li class="t-center ">Sunday: 12:00PM - 9:00PM </li>
							<li class="t-center ">Monday: 12:00PM - 9:00PM </li>
							<li class="t-center ">Tuesday: 12:00PM - 9:00PM </li>
							<li class="t-center ">Wednesday: 12:00PM - 9:00PM </li>
							<li class="t-center ">Thursday: 12:00PM - 9:00PM </li>
							<li class="t-center ">Friday: 12:00PM - 9:00PM </li>
							<li class="t-center ">Saturday: 12:00PM - 9:00PM </li>
							<li class="t-center ">Sunday: 12:00PM - 9:00PM </li>
						</ul>
					</div>
					<div class="col-sm-6 col-md-7 col-lg-6 m-l-r-auto">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1445.9575027036128!2d-86.01333566211328!3d40.04732651831303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8814b732cc259b81%3A0xe1ed25b918af2b43!2sMystic+Images+Tattoo+Co.!5e0!3m2!1sen!2sus!4v1528001512327" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15 p-t-15 p-b-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
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
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
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
	<script type="text/javascript" src="js/instafeed.min.js"></script>
	<script type="text/javascript" src="js/InstaMule.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
';
?>
