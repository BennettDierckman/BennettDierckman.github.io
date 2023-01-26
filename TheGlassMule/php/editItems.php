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
$previousPage = $mysqli->escape_string($_SESSION["previousPage"]);

echo'

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Main Dashboard</title>
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
					<h4>Welcome back '.$_SESSION['userFullName'].'</h4>
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
							<div class="col-12 text-center mb-2">
								<h2 class="">Manage Inventory</h2>
							</div>
							<div class="col-11 col-sm-10 col-md-8 col-lg-5 mx-auto mb-3">
							    <a href="mainDashboard.php" class="btn btn-danger" style="width: 100%;">Go Back</a>
							</div>
							<div class="d-none d-lg-block col-lg-11 mx-auto">';
							  	$sql1="SELECT * FROM items ORDER BY id";
							  	$result1 = $mysqli->query($sql1);
                                $numRows1 = $result1->num_rows;
                                //if there are employees in the users table 
                                if ($numRows1 > 0){
                                	echo '<span style="display: flex; justify-content: center;"><table border=1>
                                			<tr>
                                				<th class="px-1 text-center">ID</th>
                                				<th class="px-1 text-center">Name</th>
                                				<th class="px-1 text-center">Artist</th>
                                				<th class="px-1 text-center">Relevance</th>
                                				<th class="px-1 text-center">Sell Price</th>
                                				<th class="px-1 text-center">Sale Price</th>
                                				<th class="px-1 text-center">Edit Button</th>
                                			<tr>';
                                  while($row = $result1->fetch_assoc()){
                                  	  echo '<tr><form action="editItem.php" method="post">
                                  	  			<input type="hidden" name="itemId" value="'.$row['id'].'"/>
                                  	  			<td class="px-1">'.$row['id'].'</td>
                                  	  			<td class="px-1 text-center">'.$row['name'].'</td>';
												$artists = explode(", ",$row['artistName']);
												if (sizeof($artists) > 1){
													$artistString='';
													foreach($artists as $artist){
												 	 	$sql="SELECT * FROM artists WHERE id='$artist'";
													 	$result = $mysqli->query($sql);
								                        $numArtists = $result->num_rows;
								                        //if there are employees in the users table 
								                        if ($numArtists > 0){
								                          while($rowArtist = $result->fetch_assoc()){
								                          	$artistString = $artistString .
								                          	'<p style="font-size:10px!important; color: black;">'.$rowArtist['name'].' X </p>';
								                          }
								                        }
													}
													$artistString = substr($artistString, 0, -7).'</p>';
												}
                                  	  	echo'	<td class="px-1 text-center">'.$artistString.'</td>
												<td class="px-1 ">'.$row['relevance'].'</td>
                                  	  			<td class="px-1 ">'.$row['sellPrice'].'</td>
                                  	  			<td class="px-1 ">'.$row['salePrice'].'</td>
                                  	  			<td><button type="submit" class="btn btn-info" style="width:100%; border-radius:0;">Edit</button></td>
                                  	  		</form></tr>';
                                  }
                                  echo "</table></span>";
                                }
							    // <input type="text" class="form-control" style="width:75%" id="artist" name="artist" placeholder="Artist Name" required>
							echo'
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
              opt2.textContent = "Mood Mats";
              opt2.value = "Mood Mats";
              opt3.textContent = "Errly Bird";
              opt3.value = "Errly Bird";
              opt4.textContent = "Koko Nuggz";
              opt4.value = "Koko Nuggz";
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
              document.getElementById(\'s2\').appendChild(opt3);
              document.getElementById(\'s2\').appendChild(opt4);
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
