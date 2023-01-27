<?php
require 'php/db.php';
session_start();
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
	<title>Alexander &amp; Sons | Services</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font Awesome -->
	<script src="https://use.fontawesome.com/a686b3c76b.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/perfundo.css">
	</head>
	<body data-spy="scroll" data-target="#serviceMenu" data-offset="50" class="body2">
		<div class="container"> <!-- PUT YER SHIT IN HERE BOYS -->
			<nav class="container navbar fixed-top navbar-toggleable-md navbar-inverse">
			  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
	 			 <a class="navbar-brand" href="index.html"><img src="assets/images/alexanderSonsLogo.png" alt="Alexander &amp; Sons Logo"></a>			  
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
					    <li class="nav-item">
							<a class="nav-link" href="index.html">Home</a> <!-- Dont forget to do this shit for the blind people -->
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.html">The Showroom</a>
						 </li>
						 <li class="nav-item active">  
							<a class="nav-link" href="services.php">Services<span class="sr-only">(current)</span></a>
						 </li>
						 <li class="nav-item">  
							<a class="nav-link" href="colors.html">Colors</a>
						 </li>
						 <li class="nav-item">  
							<a class="nav-link" href="testimonials.html">Testimonials</a>
						 </li>
						 <li class="nav-item">  <!--use 'active' then its the page they be on-->
							<a class="nav-link" href="contact.html">Contact</a>
						 </li>				  
					</ul>
					<p id="phone">(408)-515-2525</p>
<!-- 					<a href="#"><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>
 -->			</div>
			</nav>
			<header>
				<div class="jumbotron">
					<div id="jumbopacity">
						<h1 class="display-1">Alexander & Sons<br>Services</h1>
						<div id="serviceMenu">
								<div class="row">
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#stamped">Stamped Concrete</a>
									</div><div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#sierra">Sierra Stone Overlay</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#driveway">Driveways</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#patio">Patios</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#sidewalk">Sidewalks &amp; Walkways</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#wall">Retaining Walls</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#arbor">Arbor &amp; Pergolas</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#stone">Stone Veneers</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#flagStone">Slate &amp; Flagstone</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#bricks">Bricks</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#pavers">Paver Stone</a>
									</div>
									<div class="col-6 col-md-4 col-lg-3">
										<a class="ghost-button" href="#bbq">Outdoor Barbecues</a>
									</div>
									<div class="col-6">
										<a class="ghost-button" href="#lighting">Lighting</a>
									</div>
									<div class="col-6">
										<a class="ghost-button" href="#landscape">Landscape Planning</a>
									</div>
								</div>
							</div>
					</div>
					<a href="about.html"><button class="visitShopButton">Visit the Showroom</button></a>
				</div>
			</header>
			<main class="portfolio"> 
			<button onclick="topFunction()" id="myBtn" title="Go to top" style="font-size: 28px;">&uarr;</button>
				<div class="portfolioDark topPortfolio white">
					<div class="row">
						<div class="colorLeftwhite d-flex align-items-center col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="stamped"></span>Creative &amp; Decorative Stamped Concrete</h5> 
								<p>Stamped concrete is concrete that is patterned and/or textured or embossed to resemble brick, slate, flagstone, stone, tile, wood, and various other patterns and textures. Stamped concrete is commonly used for patios, sidewalks, driveways, pool decks, and interior flooring. <br><a href="https://en.wikipedia.org/wiki/Stamped_concrete">-Wikipedia</a></P>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vS9i7ur4rspO-5uYneyKjDe2yHMtz9jpbHk5nr8JUSV_KaHw0d8GGNEXc1-Ey6ep5lQcmkIZ_c6ziM1/embed?start=false&loop=false&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vS9i7ur4rspO-5uYneyKjDe2yHMtz9jpbHk5nr8JUSV_KaHw0d8GGNEXc1-Ey6ep5lQcmkIZ_c6ziM1/embed?start=false&loop=false&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Stamped Concrete/Stamped Concrete Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vS9i7ur4rspO-5uYneyKjDe2yHMtz9jpbHk5nr8JUSV_KaHw0d8GGNEXc1-Ey6ep5lQcmkIZ_c6ziM1/embed?start=false&loop=false&delayms=3000" frameborder="0" width="100%" height="335"allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioLight white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="sierra"></span>Sierra Stone Overlay</h5> 
								<p>Sierra Stone Overlay is the leader in the field of stone and epoxy. It is a unique decorative stone and epoxy overlay. No matter what your specifications, Sierra Stone exceeds traditional flooring.</P>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vT4RokGeWAqBr27PmJg05Gppytg4l7LaUd-CTUQYR1A9M-WXH8f-ybviPMdkHHQE1H4NjiktbfSyC9y/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vT4RokGeWAqBr27PmJg05Gppytg4l7LaUd-CTUQYR1A9M-WXH8f-ybviPMdkHHQE1H4NjiktbfSyC9y/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Siera Stone Overlay/Siera Stone Overlay Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vT4RokGeWAqBr27PmJg05Gppytg4l7LaUd-CTUQYR1A9M-WXH8f-ybviPMdkHHQE1H4NjiktbfSyC9y/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioDark white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="driveway"></span>Professional Driveway Design</h5>
								<p>We perform driveway services of all kinds. Not level? Starting to crack? Give us a call we'll help with it all. Stop by our show room to see all the various materials we can incorperate in your new driveway.</p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSKAnXY0KUsgkOlGqedlxcDmljfquo1f-YeMK2EFKedEldFlBvkAnZPui_dEloswQt5rWsd74HqI92C/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSKAnXY0KUsgkOlGqedlxcDmljfquo1f-YeMK2EFKedEldFlBvkAnZPui_dEloswQt5rWsd74HqI92C/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Driveways/Driveways Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSKAnXY0KUsgkOlGqedlxcDmljfquo1f-YeMK2EFKedEldFlBvkAnZPui_dEloswQt5rWsd74HqI92C/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioLight white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="patio"></span>Custom Patios</h5> 
								<p>Patios are one of Alexander &amp; Sons specialties. We install patios and decks with the material of your choice. Alexander &amp; Sons prides itself on its versatility in design, call us and tell us about your unique dream patio and we'll help bring it to life.</p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQwQnYVmvxc4m-WPQ_sxr2zWpCZZAKUKTx1NlpouLL6zPOJmlr4lYrD8NiZ5JEtihjUhBsoFFqMqqXY/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQwQnYVmvxc4m-WPQ_sxr2zWpCZZAKUKTx1NlpouLL6zPOJmlr4lYrD8NiZ5JEtihjUhBsoFFqMqqXY/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Patios/Patios Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQwQnYVmvxc4m-WPQ_sxr2zWpCZZAKUKTx1NlpouLL6zPOJmlr4lYrD8NiZ5JEtihjUhBsoFFqMqqXY/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioDark white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="sidewalk"></span>Sidewalk - Walkway Design</h5> 
								<p>Alexander &amp; Sons delivers quality built to last sidewalks &amp; walkways that are guarenteed to leave a lasting impression on your landscape. We install walkways with the material of your choice, not sure what your looking for? Come check out the show room in Campbell, we&rsquo;ve been told our displays are incredibally usefull in helping homeowners solidify their design desicisions.</p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSWqD_rcTwBYgMBGXpSmYCOmkBBQxrIvwZto4b28xj-STRDKAbLpgXZ2fTAfCUc0j1W5kAp_jtuPB1b/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSWqD_rcTwBYgMBGXpSmYCOmkBBQxrIvwZto4b28xj-STRDKAbLpgXZ2fTAfCUc0j1W5kAp_jtuPB1b/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Sidewalks & Walkways/Sidewalks & Walkways Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSWqD_rcTwBYgMBGXpSmYCOmkBBQxrIvwZto4b28xj-STRDKAbLpgXZ2fTAfCUc0j1W5kAp_jtuPB1b/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioLight white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="wall"></span>Retaining Walls</h5> 
								<p>Retaining wall design is a form of functional as well as decorative exterior landscape design. Add a flare to your patio supports or driveway by adding a new retaining wall. Retaining walls serve not only to retain land, but additionally as a cup holders, flowerbeds, basketball stops and more.</p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQUmybnDakDN_ZlJ4i5vtKitCGYEeIa1SWHybT1-2nbcewgVcipCzwgeodqNWexGPb_7EJfZLPfvAyp/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQUmybnDakDN_ZlJ4i5vtKitCGYEeIa1SWHybT1-2nbcewgVcipCzwgeodqNWexGPb_7EJfZLPfvAyp/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Retaining Walls/Retaining Walls Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQUmybnDakDN_ZlJ4i5vtKitCGYEeIa1SWHybT1-2nbcewgVcipCzwgeodqNWexGPb_7EJfZLPfvAyp/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioDark white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="arbor"></span>Arbors &amp; Pergolas</h5> 
								<p>	Alexander &amp; Sons specialize in arbors and pergolas. We have installed countless for families and friends. Enhance the mood of your patio by calling us or stoping by our showroom to see for yourself our demo's and various arbor materials. </p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTwTtTKPKsP6u3OIS4I1I_we-J_pNhBLimnXKuGmgXw5hxCZEPRaA-LkzDNLDz8HCAcUd0uvII28V1f/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTwTtTKPKsP6u3OIS4I1I_we-J_pNhBLimnXKuGmgXw5hxCZEPRaA-LkzDNLDz8HCAcUd0uvII28V1f/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Arbor & Pergolas/Arbor & Pergolas Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTwTtTKPKsP6u3OIS4I1I_we-J_pNhBLimnXKuGmgXw5hxCZEPRaA-LkzDNLDz8HCAcUd0uvII28V1f/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioLight white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="stone"></span>Stone Veneers</h5> 
								<p>Veneer stone is concrete poured into a mold then colored to look like real stone. It was introduced decades ago as an alternative to the heavier natural four-inch thick building stone (prior to the introduction of the natural sawn thin stone veneer).<br><a href="https://www.thequarrymill.com/2014/06/cultured-stone-vs-natural-stone-veneer/">-The Quarry Mill</a></p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vT_wK84SyCaBpzylWEPS8wicqqjB0OUyurU1o4vt05rIvz5rMutOWxCrHj5SYQfyLPlPjP_79WY8iEK/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vT_wK84SyCaBpzylWEPS8wicqqjB0OUyurU1o4vt05rIvz5rMutOWxCrHj5SYQfyLPlPjP_79WY8iEK/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Stone Veneers/Stone Veneers Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vT_wK84SyCaBpzylWEPS8wicqqjB0OUyurU1o4vt05rIvz5rMutOWxCrHj5SYQfyLPlPjP_79WY8iEK/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioDark white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="flagStone"></span>Slate &amp; Flagstone</h5> 
								<p>	Flagstone is one of the best materials for patios primarily due to its narrow packed joints that allow water to permeate instead of running off. Flagstone patios also have a very natural, organic look due to their shape and earthy shades of browns, reds, grays and blues... Flagstone provides a durable and naturally slip-resistant patio surface that will last for years. <br><a href="https://www.landscapingnetwork.com/patios/flagstone.html">-The Landscaping Network</a></p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vR6V4e_77Cs7LwSDBD5OeIB8f96T0jx0Sv6LIfu8731LfaiWEQZ9YegfHyRnAILls-34ggtZeRA7qbA/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vR6V4e_77Cs7LwSDBD5OeIB8f96T0jx0Sv6LIfu8731LfaiWEQZ9YegfHyRnAILls-34ggtZeRA7qbA/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Slate & Flagstone/Slate & Flagstone Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vR6V4e_77Cs7LwSDBD5OeIB8f96T0jx0Sv6LIfu8731LfaiWEQZ9YegfHyRnAILls-34ggtZeRA7qbA/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioLight white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="bricks"></span>Brick Landscaping</h5> 
								<p>	The Alexander family lays bricks right. We offer a variaty of colors shown in the enlargable pallattes below. Not sure what would look best? Give us a call or stop by the showroom and let the our family help yours find the best bricks for your driveway, walkways, patios, or pool area.</p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSXse47aBy2fWEE8CMtAiVpsNgs9bPdkzwjVTielyMLypwIxsARZ7NCw04AveXx_P_z-CfhUKT2LpG5/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSXse47aBy2fWEE8CMtAiVpsNgs9bPdkzwjVTielyMLypwIxsARZ7NCw04AveXx_P_z-CfhUKT2LpG5/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Bricks/Bricks Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSXse47aBy2fWEE8CMtAiVpsNgs9bPdkzwjVTielyMLypwIxsARZ7NCw04AveXx_P_z-CfhUKT2LpG5/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioDark white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="pavers"></span>Pavers Landscaping</h5> 
								<p>	The beauty of precast paving stones is that they can stand alone on a sand or gravel base without mortar. They are small enough to be moved and hand set without special equipment. Some designs are ideal for permeable paving that complies with the zero runoff building codes.<br><a href="https://www.landscapingnetwork.com/pavers/">-The Landscaping Network</a></p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vScF3POHzxZ34ptb_P3eYqvxYxaBnlXeym916fxTcgUErpCVT6GCU0rxMEf5TP4nP4CF2P9e6raSU4S/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vScF3POHzxZ34ptb_P3eYqvxYxaBnlXeym916fxTcgUErpCVT6GCU0rxMEf5TP4nP4CF2P9e6raSU4S/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Paver Stone/Paver Stone Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vScF3POHzxZ34ptb_P3eYqvxYxaBnlXeym916fxTcgUErpCVT6GCU0rxMEf5TP4nP4CF2P9e6raSU4S/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioLight white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="bbq"></span>Outdoor Barbecues</h5> 
								<p>Like to cook out? So does the Alexander family... We install barbecues outdoor bars and wood grills and we make them look great. We handle appliances with the greatest of care and wont settle for imperfection. Call us today to talk about your dream barbecue.</p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQ3YvE4zvJtIQN22Zc1Oc0IwOAw46N6VjwEcZ6hYKzSw6f8jInGNjX5IBcgvRqxp6Jmr2VIO1TaUVgl/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQ3YvE4zvJtIQN22Zc1Oc0IwOAw46N6VjwEcZ6hYKzSw6f8jInGNjX5IBcgvRqxp6Jmr2VIO1TaUVgl/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Outdoor Barbecues/Outdoor Barbecues Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQ3YvE4zvJtIQN22Zc1Oc0IwOAw46N6VjwEcZ6hYKzSw6f8jInGNjX5IBcgvRqxp6Jmr2VIO1TaUVgl/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioDark white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="lighting"></span>Landscape Lighting</h5> 
								<p>Landscape Lighting is perfect for creating a decorative and elegant presentation of your exterior residential landscaping. Enhance the aesthetic of your landscape design by adding light installments. We specialize in total yard lighting ranging from patio steps and in wall lights to garden fixtures and floodlights.</p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTb2gAkM51gla9lM0zlni6f6XFMANyLboln5f6wsPGYGynBQU51Y4TDkr_LCIdafQ9-9Gybo7JdHIuQ/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTb2gAkM51gla9lM0zlni6f6XFMANyLboln5f6wsPGYGynBQU51Y4TDkr_LCIdafQ9-9Gybo7JdHIuQ/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Lighting/Lighting Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTb2gAkM51gla9lM0zlni6f6XFMANyLboln5f6wsPGYGynBQU51Y4TDkr_LCIdafQ9-9Gybo7JdHIuQ/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
				<div class="portfolioLight portfolioBottom white">
					<div class="row">
						<div class="colorCol colorCol2 colorLeftwhite col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<div>
								<h5 class="portfolioTitle"><span id="landscape"></span>Landscape Planning</h5> 
								<p>Taking care of your lawn and garden landscape is essential to any good looking front yard. A well maintained lawn and garden landscape is an excellent way to adorn a yard. Get in touch with us or come visit the showroom to talk with us about your future designs</p>
								<div class="googleSlider d-md-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTQXFbQuJeQ2sOrOFq9geaiZC0nIc2gxToZJHRMlQwgrcQBj_0cLGAyDnVUmuFaZWmdLVZzKUAVY-op/embed?start=true&loop=true&delayms=3000" frameborder="0" width="355" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<div class="googleSlider d-none d-md-block d-lg-none">
									<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTQXFbQuJeQ2sOrOFq9geaiZC0nIc2gxToZJHRMlQwgrcQBj_0cLGAyDnVUmuFaZWmdLVZzKUAVY-op/embed?start=true&loop=true&delayms=3000" frameborder="0" width="655" height="499" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
								</div>
								<a href="assets/uploads/Landscape Planning/Landscape Planning Portfolio.zip"><button class="viewMoreButton">Download Portfolio</button></a>
							</div>
						</div>
						<div class="colorRightwhite hidden-md-down col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 item">
							<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTQXFbQuJeQ2sOrOFq9geaiZC0nIc2gxToZJHRMlQwgrcQBj_0cLGAyDnVUmuFaZWmdLVZzKUAVY-op/embed?start=true&loop=true&delayms=3000" frameborder="0" width="100%" height="335" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
						</div>
					</div>
				</div>
			</main>
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
