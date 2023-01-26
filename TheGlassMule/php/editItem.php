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
$itemId = $mysqli->escape_string($_POST["itemId"]);

$sql1 = "SELECT * FROM items WHERE id='$itemId'";
$result1 = $mysqli->query($sql1);
$numRows1 = $result1->num_rows;
if ($numRows1 > 0){
  while($row = $result1->fetch_assoc()){
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
  	$itemHash = $row['itemHash'];
  }  
  $includedItems = explode(", ",$includes);
   $artists = explode(", ",$artistNames);
}

echo'

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Existing Item</title>
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
					<h4>Edit Existing Item</h4>
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
								<form method="post" enctype="multipart/form-data" action="updateItemInfo.php">
								  <div class="form-group mt-3">
								    <input type="text" class="form-control" id="name" name="name" placeholder="Item Name">
								  </div>
								  <div class="row">
								  	<div class="col-5">
								  		<div class="d-flex">
									  		<h5 class="mb-1">Select Artist(s):</h5>
									  	</div>
									  	<select id="artists" name="artists[]" multiple style=" border: 2px solid #bebebe; width: 95%; margin-left: auto; margin-right:auto; height: 123px;">';

									  	$sql1="SELECT * FROM artists ORDER BY name";
									  	$result1 = $mysqli->query($sql1);
	                                    $numRows1 = $result1->num_rows;
	                                    //if there are employees in the users table 
	                                    if ($numRows1 > 0){
	                                      while($row = $result1->fetch_assoc()){
	                                      	echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	                                      }
	                                    }
									    // <input type="text" class="form-control" style="width:75%" id="artist" name="artist" placeholder="Artist Name" required>
								echo'	</select>
									</div>
									<div class="col-7">
										<h5 class="mb-1">Item Description:</h5>
										  <div class="form-group">
										    <textarea rows="6" class="form-control" id="description" name="description" placeholder="Color, Height, UV, CFL..."></textarea>
										  </div>
									</div>
								  </div>
								  <div class="form-group">
								  	<div class="row mb-3 mt-2">
								  		<div class="col-lg-2">
									  		<h6>Category</h6>
											<select id="s1" name="category" style="border: 2px solid #bebebe;">
							                    <option value="Same">Same</option>
							                    <option value="Dry Pipes">Dry Pipes</option>
							                    <option value="Water Pipes">Water Pipes</option>
							                    <option value="Rigs">Rigs</option>
							                    <option value="Pendants">Pendants</option>
							                    <option value="Marbles">Marbles</option>
							                    <option value="Glassware">Glassware</option>
							                    <option value="Accessories">Accessories</option>
							                </select>
								  		</div>

								  		<div class="col-lg-3">
									  		<h6>Sub-Cat</h6>
											<select id="s2" name="subCategory" style="border: 2px solid #bebebe;" required ><option value="Same">Same</option></select>
								  		</div>
								  		<div class="col-lg-3">
									  		<h6>Nail Size</h6>
											<select id="s3" name="nailSize" style="border: 2px solid #bebebe;" required >
												<option value="Same">Same</option>
											</select>
								  		</div>
								  		<div class="col-lg-2">
									  		<h6>Quantity</h6>
											<input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
								  		</div>
								  		<div class="col-lg-2">
									  		<h6>Relevance</h6>
											<select name="relevance" style="border: 2px solid #bebebe;">
							                    <option value="Same" selected>Same</option>
							                    <option value="1">1</option>
							                    <option value="2">2</option>
							                    <option value="3">3</option>
							                    <option value="4">4</option>
							                    <option value="5">5</option>
							                    <option value="6">6</option>
							                    <option value="7">7</option>
							                    <option value="8">8</option>
							                    <option value="9">9</option>
							                    <option value="10">10</option>
							                    <option value="11">11</option>
							                </select>
								  		</div>
								  </div>
								  <div class="row mt-1">
								  	  <div class="col-5">
										  <div class="form-group">';
										  	  $sql1 = "SELECT * FROM includes";
										  	  $result1 = $mysqli->query($sql1);
			                                  $numRows1 = $result1->num_rows;
			                                  //if there are employees in the users table 
			                                  if ($numRows1 > 0){
			                                  	echo'<fieldset>
			                                  			<legend><h5 class="mb-1">Includes:</h5></legend>';
			                                    $counter = 1;
			                                    while($row = $result1->fetch_assoc()){
			                                    	if($row['description'] != 'Glass Mule Slap Pack'){
			                                    		echo '<input type="checkbox" name="includes[]" id="'.$row['description'].'" value="'.$row['id'].'"> &nbsp;'.$row['description'].'<br>';
			                                    	}else{
														 echo '<input type="checkbox" name="includes[]" id="'.$row['description'].'" value="'.$row['id'].'"> &nbsp;'.$row['description'].'<br>';
			                                    	}
			                                    }
			                                    echo'</fieldset>';
			                                  }
									echo'</div>
									  </div>
								  	<div class="col-7">
									  <div class="row">
									  	<div class="col-12">
											<h5 class="mb-1">Item Pricing:</h5>
									  	</div>
										<div class="col-12">
										  <div class="form-group d-flex">
										  	<h5 class="mt-2 mr-2">$</h5>
										    <input type="number" class="form-control mb-0" id="sellPrice" name="sellPrice" placeholder="Sell Price" step=".01">
										  </div>
										</div>
										<div class="col-12">
										  <div class="form-group d-flex">
										  	<h5 class="mt-2 mr-2">$</h5>
										    <input type="number" class="form-control mb-0" id="salePrice" name="salePrice" placeholder="Sale Price (Optional)" step=".01" >
										  </div>
										</div>
									  </div>  
									</div>
								  </div>
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

								echo'	    <div class="col-7">
										  		<h5 class="mb-1 mt-3">New Images:</h5>
										  		<div  class="input_fields_wrap">
										  			<div class="row">
										  				<div class="col-10">
										  		  			<input style="width: 97%; height: 39px; font-size: 16px; color: white; margin-bottom:5px;" class="btn btn-info" type="file" name="itemPics[]">
										  		  		</div>
												  		<div class="col-2">
												  			<input style="float:right;" type="button" value=" + " class="btn btn-info add_field_button"/>
												  		</div>
												  	</div>
												</div>
										  	</div>
										  	<div class="col-12">
										  		<input type="hidden" name="itemHash" value="'.$itemHash.'">
											  	<button type="submit" style="float:right;" class="mb-5 btn btn-primary">Update Item\'s Info</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="row">
								<div class="col-11 col-sm-10 col-md-8 col-lg-5 mr-auto">
									<form action="deleteItem.php" method="post">
										<input type="hidden" name="itemHash" value="'.$itemHash.'">
								    	<button type="submit" class="btn btn-danger mb-3" style="width: 100%;">Delete Item</a>
								    </form>
								</div>
								<div class="col-11 col-sm-10 col-md-8 col-lg-5 ml-auto">
									<a href="manageItems.php" class="btn btn-warning mb-3" style="width: 100%;">Back To Items</a>
								</div>
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
<script type="text/javascript">
		$(document).ready(function() {
			var max_fields      = 10; //maximum input boxes allowed
			var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
			var add_button      = $(".add_field_button"); //Add button ID
			
			var x = 1; //initlal text box count
			$(add_button).click(function(e){ //on add input button click
				e.preventDefault();
				if(x < max_fields){ //max input box allowed
					x++; //text box increment
					$(wrapper).append(\'<div><input style=" width: 80%; height: 39px; font-size: 16px; color: white; margin-bottom:5px; margin-right: 5px;" class="btn btn-info" type="file" name="itemPics[]"><a href="#" class="remove_field">Remove</a></div>\'); //add input box
				}
			});
			
			$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
				e.preventDefault(); $(this).parent(\'div\').remove(); x--;
			})
		});
    </script>
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
		 <script>
      document.getElementById("s1").onchange = function() {
          document.getElementById(\'s2\').disabled = false; //enabling s2 select
          document.getElementById(\'s2\').innerHTML = ""; //clear s2 to avoid conflicts between options values
          var opt0 = document.createElement(\'option\');
          var opt1 = document.createElement(\'option\');
          var opt2 = document.createElement(\'option\');
          var opt3 = document.createElement(\'option\');
          var opt4 = document.createElement(\'option\');
          var opt5 = document.createElement(\'option\');
          document.getElementById(\'s3\').disabled = false; //enabling s3 select
          document.getElementById(\'s3\').innerHTML = ""; //clear s3 to avoid conflicts between options values
          var s3opt0 = document.createElement(\'option\');
          var s3opt1 = document.createElement(\'option\');
          var s3opt2 = document.createElement(\'option\');
          var s3opt3 = document.createElement(\'option\');
          var s3opt4 = document.createElement(\'option\');
          var s3opt5 = document.createElement(\'option\');

          if (this.value != \'Accessories\' && this.value != \'Rigs\') {
            opt0.textContent = "None";
            opt0.value = "None";
            s3opt0.textContent = "None";
            s3opt0.value = "None";
            document.getElementById(\'s2\').appendChild(opt0);
            document.getElementById(\'s3\').appendChild(s3opt0);
          }
          if (this.value == \'Water Pipes\'){
            document.getElementById("Glass Mule Slap Pack").checked = true;
            document.getElementById("Glass Mule Dab Matz").checked = true;
            document.getElementById("Boulder Case Company Case").checked = false;
            document.getElementById("Pendant Chain").checked = false;
            document.getElementById("Str8 Brand Case").checked = false;
            document.getElementById("Quartz Banger").checked = false;
          }
          else if (this.value == \'Dry Pipes\'){
          	document.getElementById("Glass Mule Slap Pack").checked = true;
            document.getElementById("Glass Mule Dab Matz").checked = false;
            document.getElementById("Boulder Case Company Case").checked = false;
            document.getElementById("Pendant Chain").checked = false;
            document.getElementById("Str8 Brand Case").checked = false;
            document.getElementById("Quartz Banger").checked = false;
          }
          else if (this.value == \'Rigs\'){
          	  opt0.textContent = "None";
              opt0.value = "None";
			  s3opt0.textContent = "10mm Male";
	          s3opt0.value = "10mm Male";
	          s3opt1.textContent = "10mm Female";
	          s3opt1.value = "10mm Female";
	          s3opt2.textContent = "14mm Male";
	          s3opt2.value = "14mm Male";
	          s3opt3.textContent = "14mm Female";
	          s3opt3.value = "14mm Female";
	          s3opt4.textContent = "18mm Male";
	          s3opt4.value = "18mm Male";
	          s3opt5.textContent = "18mm Female";
	          s3opt5.value = "18mm Female";
	          document.getElementById("Glass Mule Slap Pack").checked = true;
	          document.getElementById("Quartz Banger").checked = true;
              document.getElementById("Str8 Brand Case").checked = true;
              document.getElementById("Glass Mule Dab Matz").checked = true;
              document.getElementById("Boulder Case Company Case").checked = false;
              document.getElementById("Pendant Chain").checked = false;
              document.getElementById(\'s2\').appendChild(opt0);
              document.getElementById(\'s3\').appendChild(s3opt0);
              document.getElementById(\'s3\').appendChild(s3opt1);
              document.getElementById(\'s3\').appendChild(s3opt2);
              document.getElementById(\'s3\').appendChild(s3opt3);
              document.getElementById(\'s3\').appendChild(s3opt4);
              document.getElementById(\'s3\').appendChild(s3opt5);
          }
          else if (this.value == \'Pendants\'){
          	document.getElementById("Glass Mule Slap Pack").checked = true;
            document.getElementById("Glass Mule Dab Matz").checked = false;
            document.getElementById("Boulder Case Company Case").checked = true;
            document.getElementById("Pendant Chain").checked = true;
            document.getElementById("Str8 Brand Case").checked = false;
            document.getElementById("Quartz Banger").checked = false;
          }
          else if (this.value == \'Marbles\'){
          	document.getElementById("Glass Mule Slap Pack").checked = true;
            document.getElementById("Glass Mule Dab Matz").checked = false;
            document.getElementById("Boulder Case Company Case").checked = false;
            document.getElementById("Pendant Chain").checked = false;
            document.getElementById("Str8 Brand Case").checked = false;
            document.getElementById("Quartz Banger").checked = false;
          }
          else if (this.value == \'Glassware\'){
          	document.getElementById("Glass Mule Slap Pack").checked = true;
            document.getElementById("Glass Mule Dab Matz").checked = false;
            document.getElementById("Boulder Case Company Case").checked = false;
            document.getElementById("Pendant Chain").checked = false;
            document.getElementById("Str8 Brand Case").checked = false;
            document.getElementById("Quartz Banger").checked = false;
          }
          else {
          	  s3opt0.textContent = "None";
              s3opt0.value = "None";
              opt0.textContent = "Dabbers";
              opt0.value = "Dabbers";
              opt1.textContent = "Carb Caps";
              opt1.value = "Carb Caps";
              opt2.textContent = "Dab Mats";
              opt2.value = "Dab Mats";
              opt5.textContent = "Glass Protection";
              opt5.value = "Glass Protection";
          	  document.getElementById("Glass Mule Slap Pack").checked = true;
              document.getElementById("Glass Mule Dab Matz").checked = false;
              document.getElementById("Boulder Case Company Case").checked = false;
              document.getElementById("Pendant Chain").checked = false;
              document.getElementById("Str8 Brand Case").checked = false;
              document.getElementById("Quartz Banger").checked = false;
              document.getElementById(\'s3\').appendChild(s3opt0);
              document.getElementById(\'s2\').appendChild(opt0);
              document.getElementById(\'s2\').appendChild(opt1);
              document.getElementById(\'s2\').appendChild(opt2);
              document.getElementById(\'s2\').appendChild(opt5);
          }

      };

      let element = document.getElementById("s1");
      let selOption = element.options[element.selectedIndex].value;
    </script>
	<script>
      document.getElementById("s1").onchange = function() {
          document.getElementById(\'s3\').disabled = false; //enabling s3 select
          document.getElementById(\'s3\').innerHTML = ""; //clear s3 to avoid conflicts between options values
          var s3opt0 = document.createElement(\'option\');
          var s3opt1 = document.createElement(\'option\');
          var s3opt2 = document.createElement(\'option\');
          var s3opt3 = document.createElement(\'option\');
          var s3opt4 = document.createElement(\'option\');
          var s3opt5 = document.createElement(\'option\');
          if (this.value != \'Rigs\') {
            s3opt0.textContent = "None";
            s3opt0.value = "None";
            document.getElementById(\'s3\').appendChild(s3opt0);
          }
          else {
              s3opt0.textContent = "10mm Male";
	          s3opt0.value = "10mm Male";
	          s3opt1.textContent = "10mm Female";
	          s3opt1.value = "10mm Female";
	          s3opt2.textContent = "14mm Male";
	          s3opt2.value = "14mm Male";
	          s3opt3.textContent = "14mm Female";
	          s3opt3.value = "14mm Female";
	          s3opt4.textContent = "18mm Male";
	          s3opt4.value = "18mm Male";
	          s3opt5.textContent = "18mm Female";
	          s3opt5.value = "18mm Female";
              document.getElementById(\'s3\').appendChild(s3opt0);
              document.getElementById(\'s3\').appendChild(s3opt1);
              document.getElementById(\'s3\').appendChild(s3opt2);
              document.getElementById(\'s3\').appendChild(s3opt3);
              document.getElementById(\'s3\').appendChild(s3opt4);
              document.getElementById(\'s3\').appendChild(s3opt5);
          }

      };

      let element = document.getElementById("s1");
      let selOption = element.options[element.selectedIndex].value;


    </script>
</body>
</html>


';
?>
