<?php
require ("php/db.php");
session_start();

$itemHash = $mysqli->escape_string($_GET["Item"]);
$sql= "SELECT * FROM items WHERE itemHash='$itemHash'";
$result = $mysqli->query($sql);
$numItems = $result->num_rows;
//if there are employees in the users table 
if ($numItems > 0){
  while($row = $result->fetch_assoc()){
  	$name  = $row['name'];
  	$artists  = $row['artistName'];
  	$category  = $row['category'];
  	$subCategory  = $row['subCategory'];
  	$nailSize  = $row['nailSize'];
  	$quantity  = $row['quantity'];
  	$relevance  = $row['relevance'];
  	$includes  = $row['includes'];
  	$description  = $row['description'];
  	$buyPrice  = $row['buyPrice'];
  	$sellPrice  = $row['sellPrice'];
  	$salePrice  = $row['salePrice'];
  	$itemHash = $row['itemHash'];
  }
}

$pngPath = "images/items/".$itemHash."/Photo0.png";
$jpgPath = "images/items/".$itemHash."/Photo0.jpg";
$jpegPath = "images/items/".$itemHash."/Photo0.jpeg";
$ogPath = "";
if (file_exists($pngPath)){
    $ogPath =$pngPath; 
}
if (file_exists($jpgPath)){
 	$ogPath =$jpgPath;
}
if (file_exists($jpegPath)){
    $ogPath =$jpegPath;
}

echo'
<!DOCTYPE html>
<html lang="en">
<head>
	<title>'.$name.'</title>
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
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/prefundo.css">
<!--===============================================================================================-->
<meta property="og:type"            content="website" /> 
<meta property="og:url"             content="http://www.theglassmule.com/GlassLogin/viewItem.php?Item='.$itemHash.'"> 
<meta property="og:title"           content="'.$name.'" /> 
<meta property="og:image"           content="'.$ogPath.'" /> 
<meta property="og:description"    content="'.$description.'" />
</head>
<body class="animsition">
	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
				</div>

				<span class="topbar-child1 blue-text">
					Free shipping for standard order over $420!
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
	
	<!-- Product Detail -->
	<div class="container bgwhite p-t-0 p-b-10">
				<div class="col-sm-4 col-md-4 col-lg-3 p-b-10 p-t-10">
					<div class="leftbar p-r-20 p-r-0-sm">
						<ul class="leftMuleMenu p-l-10">
							<li>
								<nav class="side-menu">
								<a href="#" class="fs-20 active1 bold coolHover arrow-main-menu">Categories</a>
								&nbsp;
								<i class="arrow-main-menu fa fa-lg fa-angle-right aria-hidden="false"></i>


								<ul class="p-b-0 sub-menu shopMenu">
									<li class="p-t-4">
		                          		<form action="viewCategory.php" method="get">
		                          			<input type="hidden"  name="category" value="Rigs">
											<button type="submit" class="s-text13 active1"><a>Rigs</a></button>
										</form>
									</li>
									<li class="p-t-4">
		                          		<form action="viewCategory.php" method="get">
		                          			<input type="hidden"  name="category" value="Dry Pipes">
											<button type="submit" class="s-text13 active1"><a>Dry Pipes</a></button>
										</form>
									</li>
									<li class="p-t-4">
		                          		<form action="viewCategory.php" method="get">
		                          			<input type="hidden"  name="category" value="Water Pipes">
											<button type="submit" class="s-text13 active1"><a>Water Pipes</a></button>
										</form>
									</li>
									<li class="p-t-4">
		                          		<form action="viewCategory.php" method="get">
		                          			<input type="hidden"  name="category" value="Pendants">
											<button type="submit" class="s-text13 active1"><a>Pendants</a></button>
										</form>
									</li>
									<li class="p-t-4">
		                          		<form action="viewCategory.php" method="get">
		                          			<input type="hidden"  name="category" value="Marbles">
											<button type="submit" class="s-text13 active1"><a>Marbles</a></button>
										</form>
									</li>
									<li class="p-t-4">
		                          		<form action="viewCategory.php" method="get">
		                          			<input type="hidden"  name="category" value="Glassware">
											<button type="submit" class="s-text13 active1"><a>Glassware</a></button>
										</form>
									</li>
									
									<li>
										<form action="viewCategory.php" method="get">
											<input type="hidden"  name="category" value="Accessories">
											<button type="submit" class="s-text13 active1"><a>Accessories</a></button>
										</form>
										<ul class="sub-menu">
											<li class="p-l-10">
												<form action="viewSubCategory.php" method="get">
													<input type="hidden"  name="subCategory" value="Dabbers">
													<button type="submit" class="s-text13 active1"><a>Dabbers</a></button>
												</form>
											</li>
											<li class="p-l-10">
												<form action="viewSubCategory.php" method="get">
													<input type="hidden"  name="subCategory" value="Carb Caps">
													<button type="submit" class="s-text13 active1"><a>Carb Caps</a></button>
												</form>
											</li>
											<li class="p-l-10">
												<form action="viewSubCategory.php" method="get">
													<input type="hidden"  name="subCategory" value="Dab Mats">
													<button type="submit" class="s-text13 active1"><a>Dab Mats</a></button>
												</form>
											</li>
											<li class="p-l-10">
												<form action="viewSubCategory.php" method="get">
													<input type="hidden"  name="subCategory" value="Glass Protection">
													<button type="submit" class="s-text13 active1"><a>Glass Protection</a></button>
												</form>
											</li>
										</ul>
									</li>
								</ul>
								</nav>
							</li>
							<li>
								<!-- Artists -->
								<nav class="side-menu p-l-5">
								<a href="#" class="fs-20 active1 bold coolHover arrow-main-menu">Artists</a>
								&nbsp;
								<i class="arrow-main-menu fa fa-lg fa-angle-right aria-hidden="false"></i>
								<ul class="p-b-0 sub-menu">';
									$sql = "SELECT * FROM artists ORDER BY name";
									$resultItems = $mysqli->query($sql);
			                        $numItems = $resultItems->num_rows;
			                        //if there are employees in the users table 
			                        if ($numItems > 0){
			                          while($row = $resultItems->fetch_assoc()){
			                          	echo'
			                          	<li class="p-t-4">
			                          		<form action="viewArtistItems.php" method="get">
			                          			<input type="hidden"  name="artistId" value="'.$row['id'].'">
												<button type="submit" class="s-text13 active1"><a>'.$row['name'].'</a></button>
											</form>
										</li>	
										';
			                          }
			                        }
						echo'	</ul>
								</nav>
							</li>
						</ul>
					</div>
				</div>
		<div class="flex-w flex-sb">
			<div class="w-size20 p-t-10 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
					<div class="slick3">';
					$dir = new DirectoryIterator('images/items/'.$itemHash);
					foreach($dir as $file ){
						$fileBits = explode(".",$file);
						if($fileBits[1]=="jpg" || $fileBits[1]=="jpeg" || $fileBits[1]=="png"){
							echo'  	
							<div class="item-slick3" data-thumb="images/items/'.$itemHash.'/'.$file.'">
								<div class="wrap-pic-w muleProduct">
									<img src="images/items/'.$itemHash.'/'.$file.'" alt="IMG-PRODUCT">
								</div>
							</div>';
						}
    				}
			echo' 	</div>
				</div>
			</div>

			<div class="customWidth p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">'.$name.'
				</h4>
				<h6 class="product-detail-name p-b-13">';
				$artistsArray = explode(", ",$artists);
				if (sizeof($artistsArray) > 1){
					$artistString='';
					foreach($artistsArray as $artist){
				 	 	$sql="SELECT * FROM artists WHERE id='$artist'";
					 	$result = $mysqli->query($sql);
                        $numArtists = $result->num_rows;
                        //if there are employees in the users table 
                        if ($numArtists > 0){
                          while($rowArtist = $result->fetch_assoc()){
                          	$artistString = $artistString .
                          	'<p style="font-size:12px!important;"><a style="font-size:12px!important;" href="'.$rowArtist['mediaLink'].'" target="_blank">'.$rowArtist['name'].' X </a></p>';
                          }
                        }
					}
					echo substr($artistString, 0, -10).'</a></p>';
				}
		echo'	</h6>

				<span class="m-text19">';
					if($salePrice == 0 || $salePrice == ''){
						echo'<span class="block2-price s-text2 p-r-5">$'.number_format($sellPrice, 2, '.', ',').'</span>';
					}else{
						echo'<span class="block2-oldprice s-text2 p-r-5">$'.number_format($sellPrice, 2, '.', ',').'</span>
						<span class="block2-newprice m-text8 p-r-5">$'.number_format($salePrice, 2, '.', ',').'</span>';
					}
		echo'   </span>


				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8 p-b-4">'.str_replace("\\r\\n", "<br>", $description).'</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Includes
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<ul>';
						$includedItems = explode(", ",$includes);
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
				</div>
				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Contact Seller
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-10 p-b-10 p-l-50">
						<a href="https://m.me/TheGlassMule"><img class="DescriptionButton" src="images/FBMSG.png"></a>
					</div>
				</div>
			</div>
		</div>
	</div>

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
				Copyright © 2018 All rights reserved. |  <i  aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank">Colorlib</a> | <a href="http://mjyintl.com/BennettDierckman/" target="_blank">Bennett Dierckman</a>
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
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(\'.block2-btn-addcart\').each(function(){
			var nameProduct = $(this).parent().parent().parent().find(\'.block2-name\').html();
			$(this).on(\'click\', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$(\'.block2-btn-addwishlist\').each(function(){
			var nameProduct = $(this).parent().parent().parent().find(\'.block2-name\').html();
			$(this).on(\'click\', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$(\'.btn-addcart-product-detail\').each(function(){
			var nameProduct = $(\'.product-detail-name\').html();
			$(this).on(\'click\', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->

<!--===============================================================================================-->

	<script src="js/main.js"></script>

</body>
</html>
';
?>
