<?php
require("assets/php/db.php");
session_start();
echo'
<!DOCTYPE html>
<html lang="en">
<!--
	Bennett Dierckman (DelGado)
	CopyRight Mardin J. Yadegar International 
	MysticImagesTattoo.com
	HOME PAGE
-->
	<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<title>Mystic Images</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font Awesome -->
	<script src="https://use.fontawesome.com/a686b3c76b.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/css/perfundo.css">
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div class="container-fluid"> <!-- PUT YER SHIT IN HERE BOYS -->
			<div id="fullWidthTopNav">
				<div id="TopImgDiv">
					<img id="topLogo"src="assets/images/MysticImagesTattooCo.png" alt="Mystic Images Logo">
				</div>
			</div>
			<nav class="container-fluid navbar fixed-top navbar-fixed-top navbar-toggleable-md navbar-inverse">
			  	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			  	</button>
			  	<a class="navbar-brand" href="index.html"><img id="navLogo"src="assets/images/MysticSkullCut.png" alt="Mystic Images Logo"></a>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
					    <li class="nav-item active">
							<a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a> <!-- Dont forget to do this shit for the blind people -->
						</li>
						 <li class="nav-item">  
							<a class="nav-link" href="#Locations">Locations</a>
						 </li>
						 <li class="nav-item">  <!--use \'active\' then its the page they be on-->
							<a class="nav-link" href="#Pricings">Pricing</a>
						 </li>	
						 <li class="nav-item">  <!--use \'active\' then its the page they be on-->
							<a class="nav-link" href="#Locations">Contact Us</a>
						 </li>
						  <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  Artists
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							  <a class="dropdown-item" href="#TattooArtists">Noblesville Tattoo Artists</a>
							  <a class="dropdown-item" href="#TattooArtists2">Castleton Tattoo Artists</a>
							  <a class="dropdown-item" href="#PiercingArtists">Piercing Artists</a>
							</div>
						 </li>			  
					</ul>
					<div class="row">
						<div class="column center2 col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 item">
							<div class="locationSnip">
							<p>Noblesville: <span id="serif">317-214-7166</span></p>
							<a href="https://www.facebook.com/mysticimagescastleton/"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
							<a href="https://www.instagram.com/mysticimagestattoo/?hl=en"><i class="fa fa-instagram fa-2x"></i></a>
							</div>
						</div>
						<div class="column center2 col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 item">
							<div class="locationSnip">
							<p>Castleton: <span id="serif">317-436-7220</span></p>
							<a href="https://www.facebook.com/MysticImagesTattoo/"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
							<a href="https://www.instagram.com/explore/locations/272060556555566/mystic-images-tattoo-castleton/?hl=en"><i class="fa fa-instagram fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>
			</nav>
			<div id="AjPicDiv">
				<img id="ajPic" src="assets/images/aj/MapBack.jpg" alt="Mystic Images Logo">
			</div>
			<header>
				<div id="topBuffer"></div>
				<img id="LocationSlapPic" src="assets/images/newMysticNoblesville.jpg" alt="Mystic Images phone and location picture">
			</header>
			<main>
				<div class="pageTitle" id="locationsH1">	
					<h1><span id="Locations"></span>Locations Near You</h1>
				</div>
				<div class="row locationRow">
					<div class="location noblesville col-12 col-sm-12 col-md-6 col-lg-6 col-x6 item">
						<figure>
							<h4>Noblesville</h4>
							<div class="row">
								<div class="storeInfoLeft col-6 col-sm-6 col-md-6 col-lg-6 col-x6">
									<h6>Phone:</h6>
									<p>(317) 214-7166</p>
								</div>
								<div class="storeInfoRight col-6 col-sm-6 col-md-6 col-lg-6 col-x6">
									<h6>Email:</h6>
									<p><email>mysticimagestattoo@gmail.com</email></p>
								</div>
								<div class="storeInfoLeft col-6 col-sm-6 col-md-6 col-lg-6 col-x6">
									<h6>Hours:</h6>
									<p>12:00 - 10:00pm<br>(7 Days a Week)</p>
								</div>
								<div class="storeInfoRight col-6 col-sm-6 col-md-6 col-lg-6 col-x6">
									<h6>Address:</h6>
									<p>164 N. 10th St,<br>Noblesville IN, 46060</p>
								</div>
							</div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1445.9575027036128!2d-86.01333566211328!3d40.04732651831303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8814b732cc259b81%3A0xe1ed25b918af2b43!2sMystic+Images+Tattoo+Co.!5e0!3m2!1sen!2sus!4v1528001512327" width="360" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
							<div  id="slides" class="carousel slide hidden-sm-down" data-ride="carousel">
							  <ol class="carousel-indicators">
								<li data-target="#slides" data-slide-to="s1" class="active"></li>
								<li data-target="#slides" data-slide-to="s2"></li>
								<li data-target="#slides" data-slide-to="s3"></li>
								<li data-target="#slides" data-slide-to="s4"></li>
							  </ol>
							  <div class="carousel-inner" role="listbox">
								<div class="carousel-item active" id="s1">
								  <img class="d-block img-fluid slideIMG" src="assets/images/noblesville1.jpeg" alt="First slide">
								</div>
								<div class="carousel-item" id="s2">
								  <img class="d-block img-fluid slideIMG" src="assets/images/noblesville2.jpeg" alt="Second slide">
								</div>
								<div class="carousel-item" id="s3">
								  <img class="d-block img-fluid slideIMG" src="assets/images/noblesville3.jpeg" alt="Third slide">
								</div>
								<div class="carousel-item" id="s4">
								  <img class="d-block img-fluid slideIMG" src="assets/images/noblesville4.jpeg" alt="Third slide">
								</div>
							  </div>
							  <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							  </a>
							</div>
						</figure>
					</div>
					<div class="location castleton col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 item">
						<figure>
							<h4>Castleton</h4>
							<div class="row">
								<div class="storeInfoLeft col-6 col-sm-6 col-md-6 col-lg-6 col-x6">
									<h6>Phone:</h6>
									<p>(317) 436-7220</p>
								</div>
								<div class="storeInfoRight col-6 col-sm-6 col-md-6 col-lg-6 col-x6">
									<h6>Email:</h6>
									<p><email>mysticimagestattoocastleton@gmail.com</email></p>
								</div>
								<div class="storeInfoLeft col-6 col-sm-6 col-md-6 col-lg-6 col-x6">
									<h6>Hours:</h6>
									<p>Noon - 10:00pm<br>(7 Days a Week)</p>
								</div>
								<div class="storeInfoRight col-6 col-sm-6 col-md-6 col-lg-6 col-x6">
									<h6>Address:</h6>
									<p>8240 Center Run Dr,<br>Indianapolis IN, 46250</p>
								</div>
							</div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57048.06070358657!2d-86.07018873337681!3d39.931276802882905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886b4d2ed8cdce2f%3A0x1c621c840710e8ae!2sMystic+Images+Tattoo+Castleton!5e0!3m2!1sen!2sus!4v1528006754959" width="360" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
							<div  id="slides2" class="carousel slide hidden-sm-down" data-ride="carousel">
							  <ol class="carousel-indicators">
								<li data-target="#slides2" data-slide-to="c1" class="active"></li>
								<li data-target="#slides2" data-slide-to="c2"></li>
								<li data-target="#slides2" data-slide-to="c3"></li>
								<li data-target="#slides2" data-slide-to="c4"></li>
							  </ol>
							  <div class="carousel-inner" role="listbox">
								<div class="carousel-item active" id="c1">
								  <img class="d-block img-fluid slideIMG" src="assets/images/castleton1.jpeg" alt="First slide">
								</div>
								<div class="carousel-item" id="c2">
								  <img class="d-block img-fluid slideIMG" src="assets/images/castleton2.jpeg" alt="Second slide">
								</div>
								<div class="carousel-item" id="c3">
								  <img class="d-block img-fluid slideIMG" src="assets/images/castleton3.jpeg" alt="Third slide">
								</div>
								<div class="carousel-item" id="c4">
								  <img class="d-block img-fluid slideIMG" src="assets/images/castleton4.jpeg" alt="Third slide">
								</div>
							  </div>
							  <a class="carousel-control-prev" href="#slides2" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#slides2" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							  </a>
							</div>
						</figure>
					</div>
				</div>
				<div class="pageTitle" id="pricingsH1">	
					<h1><span id="Pricings"></span>Pricing</h1>
				</div>
				<div class="row pricesRow">
					<div class="tattoos column col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 item">
						<h4 class="pricingTitles">Tattoos</h4>
						<div class= "row tatContent">
							<div class="column col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 item">
								<p id="ulIntro">The cost of a tattoo will vary depending on: </p>
								<ul>
									<li>Size &amp; Color</li>
									<li>Location on body</li>
									<li>Skill and Experience of Artist</li>
									<li>If the artist designs the tattoo</li>
								</ul>
								<p>All tattoos will have a $60 minimum. (example below)</p>
							</div>
							<div class="column col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 item">
								<div id="exampleTat">
									<img src="assets/images/sixtyDollaTat.png">
								</div>
							</div>
						</div>
					</div>
					<div class="piercings column col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 item">
						<h4 class="pricingTitles">Ear Piercings</h4>
						<div class= "row pierceCenter">
							<div class="column earPrices col-5 col-sm-4 col-md-4 col-lg-4 col-xl-4 item">
								<ul>
									<li>Rook - $50</li>
									<li>Forward Helix - $50</li>
									<li>Helix - $40</li>
									<li>Industrial - $60</li>
									<li>Daith - $50</li>
									<li>Sung - $50</li>
									<li>Tragus - $50</li>
									<li>Orbital - $50</li>
									<li>Inner Conch - $50</li>
									<li>Outer Conch - $50</li>
									<li>Anti-tragus - $50</li>
									<li>Upper Lobe - $50</li>
									<li>Transverse Lobe - $50</li>
									<li>Standard Lobe - $50</li>
								</ul>
							</div>
							<div class="column examplePiercingCol col-7 col-sm-8 col-md-8 col-lg-8 col-xl-8 item">
								<div id="examplePiercing">
									<img src="assets/images/piercingMenu.jpg">
								</div>
							</div>
						</div>
					</div>
					<div class="piercings2 column col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 item">
						<h4 class="pricingTitles">Other Piercings</h4>
						<div class= "row">
							<div class="column bodyPrices col-6 col-sm-6 col-md-12 col-lg-12 col-xl-12 item">
								<ul>
									<li>Bridge - $50</li>
									<li>Eyebrow - $50</li>
									<li>Nostril - $40</li>
									<li>Septum - $50</li>
									<li>Dermals - $60</li>
									<li>Medusa - $50</li>
									<li>Monroe - $50</li>
									<li>Labret - $50</li>
								</ul>
							</div>
							<div class="column bodyPrices col-6 col-sm-6 col-md-12 col-lg-12 col-xl-12 item">
								<ul>
									<li>Lip - $40</li>
									<li>Tongue - $50</li>
									<li>Snake Bites - $80</li>
									<li>Frog Eyes - $80</li>
									<li>Nipples - $80</li>
									<li>Genital - $60+</li>
									<li>Navel - $40</li>
									<li>Smiley - $50</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="pageTitle" id="pricingsH1">	
					<h1><span id="TattooArtists"></span>Noblesville Tattoo Artists</h1>
				</div>
				<div class="row ArtistsMenu">
					<div class="column artistThumbnail adam LEFT col-12 item">';
					    // $statement = "SELECT firstName, lastName, recoveryHash, phone, facebook, instagram FROM users WHERE store='noblesville' AND position='1'";
						$sql1 = "SELECT * FROM users WHERE store='noblesville' and position='1'";
                        $result1 = $mysqli->query($sql1);
                        $numRows1 = $result1->num_rows;
                        //if there are employees in the users table 
                        if ($numRows1 > 0){
                            while($row = $result1->fetch_assoc()){
                            	$hash = $row['recoveryHash']; 
                            	$fn = $row['firstName'];
                            	$ln = $row['lastName'];
                            	$phone = $row['phone'];
                            	$facebook = $row['facebook'];
                            	$instagram = $row['instagram'];
                            }
							echo'   
							<div class="row thumbnailContent">
									<div class="thumbnailPicutre column col-12 col-sm-5 col-md-5 col-lg-4 col-xl-3 item">
										<div class="center">';
											$jpgPath = 'assets/images/'.$hash.'/profilePhoto.jpg';
						                    $jpegPath = 'assets/images/'.$hash.'/profilePhoto.jpeg';
						                    $pngPath = 'assets/images/'.$hash.'/profilePhoto.png';
						                    if (file_exists($jpgPath)){
						                    	$path = $jpgPath;
						                    }
						                    if (file_exists($jpegPath)){
						                    	$path = $jpegPath;
						                    }
						                    if(file_exists($pngPath)){
						                    	$path = $pngPath;
						                    }
									echo'	<img src="'.$path.'" alt="Adam Harber profile picture">
											<div id="artistInfo" class="mb-3 mb-md-0">
												<h4 class="artistTitles">'.$fn.' '.$ln.'<br>"Mr. Kimage"</h4>';
												if($phone != ''){
													echo '<a href="'.$phone.'"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></a>';
												}
												if($facebook != ''){
													echo '<a href="'.$facebook.'"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>';
												}
												if($instagram != ''){
													echo '<a href="'.$instagram.'"><i class="fa fa-lg fa-instagram fa-2x" aria-hidden="true"></i></a>';
												}
									echo'	</div>
										</div>
									</div>
									<div class="thumbailInfo column col-12 col-sm-7 col-md-7 col-lg-8 col-xl-9 item">
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position1.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position1.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position1.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img1">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img1" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img2">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position2.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position2.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position2.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img2">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img2" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img3">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img1">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position3.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position3.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position3.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img3">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img3" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img4">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img2">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position4.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position4.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position4.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img4">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img4" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img5">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img3">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position5.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position5.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position5.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img5">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img5" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img6">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img4">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position6.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position6.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position6.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img6">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img6" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img7">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img5">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position7.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position7.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position7.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img7">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img7" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img6">Prev</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img8">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position8.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position8.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position8.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img8">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img8" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img9">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img7">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position9.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position9.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position9.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img9">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img9" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img10">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img8">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position10.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position10.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position10.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img10">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img10" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img11">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img9">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position11.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position11.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position11.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img11">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img11" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#adam-img12">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img10">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position12.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position12.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position12.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#adam-img12">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="adam-img12" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#adam-img11">Prev</a>
												  </div>
												</div>
											</div>
										</div>
									</div>
								</div>';
						}
			echo'	</div>
					<div class="column artistThumbnail RJ RIGHT col-12 item">';
					    // $statement = "SELECT firstName, lastName, recoveryHash, phone, facebook, instagram FROM users WHERE store='noblesville' AND position='1'";
						$sql1 = "SELECT * FROM users WHERE store='noblesville' and position='2'";
                        $result1 = $mysqli->query($sql1);
                        $numRows1 = $result1->num_rows;
                        //if there are employees in the users table 
                        if ($numRows1 > 0){
                            while($row = $result1->fetch_assoc()){
                            	$hash = $row['recoveryHash']; 
                            	$fn = $row['firstName'];
                            	$ln = $row['lastName'];
                            	$phone = $row['phone'];
                            	$facebook = $row['facebook'];
                            	$instagram = $row['instagram'];
                            }
							echo'   
							<div class="row thumbnailContent">
									<div class="thumbnailPicutre column col-12 col-sm-5 col-md-5 col-lg-4 col-xl-3 item">
										<div class="center">';
											$jpgPath = 'assets/images/'.$hash.'/profilePhoto.jpg';
						                    $jpegPath = 'assets/images/'.$hash.'/profilePhoto.jpeg';
						                    $pngPath = 'assets/images/'.$hash.'/profilePhoto.png';
						                    if (file_exists($jpgPath)){
						                    	$path = $jpgPath;
						                    }
						                    if (file_exists($jpegPath)){
						                    	$path = $jpegPath;
						                    }
						                    if(file_exists($pngPath)){
						                    	$path = $pngPath;
						                    }
									echo'	<img src="'.$path.'" alt="Adam Harber profile picture">
											<div id="artistInfo" class="mb-3 mb-md-0">
												<h4 class="artistTitles">'.$fn.' '.$ln.'<br></h4>';
												if($phone != ''){
													echo '<a href="'.$phone.'"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></a>';
												}
												if($facebook != ''){
													echo '<a href="'.$facebook.'"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>';
												}
												if($instagram != ''){
													echo '<a href="'.$instagram.'"><i class="fa fa-lg fa-instagram fa-2x" aria-hidden="true"></i></a>';
												}
									echo'	</div>
										</div>
									</div>
									<div class="thumbailInfo column col-12 col-sm-7 col-md-7 col-lg-8 col-xl-9 item">
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position1.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position1.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position1.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img1">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img1" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img2">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position2.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position2.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position2.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img2">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img2" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img3">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img1">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position3.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position3.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position3.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img3">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img3" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img4">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img2">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position4.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position4.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position4.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img4">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img4" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img5">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img3">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position5.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position5.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position5.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img5">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img5" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img6">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img4">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position6.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position6.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position6.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img6">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img6" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img7">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img5">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position7.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position7.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position7.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img7">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img7" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img6">Prev</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img8">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position8.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position8.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position8.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img8">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img8" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img9">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img7">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position9.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position9.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position9.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img9">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img9" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img10">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img8">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position10.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position10.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position10.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img10">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img10" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img11">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img9">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position11.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position11.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position11.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img11">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img11" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rj-img12">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img10">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position12.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position12.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position12.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rj-img12">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rj-img12" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#rj-img11">Prev</a>
												  </div>
												</div>
											</div>
										</div>
									</div>
								</div>';
						}
			echo'	</div>
					<div class="column artistThumbnail jimmy LEFT col-12 item">';
					    // $statement = "SELECT firstName, lastName, recoveryHash, phone, facebook, instagram FROM users WHERE store='noblesville' AND position='1'";
						$sql1 = "SELECT * FROM users WHERE store='noblesville' and position='3'";
                        $result1 = $mysqli->query($sql1);
                        $numRows1 = $result1->num_rows;
                        //if there are employees in the users table 
                        if ($numRows1 > 0){
                            while($row = $result1->fetch_assoc()){
                            	$hash = $row['recoveryHash']; 
                            	$fn = $row['firstName'];
                            	$ln = $row['lastName'];
                            	$phone = $row['phone'];
                            	$facebook = $row['facebook'];
                            	$instagram = $row['instagram'];
                            }
							echo'   
							<div class="row thumbnailContent">
									<div class="thumbnailPicutre column col-12 col-sm-5 col-md-5 col-lg-4 col-xl-3 item">
										<div class="center">';
											$jpgPath = 'assets/images/'.$hash.'/profilePhoto.jpg';
						                    $jpegPath = 'assets/images/'.$hash.'/profilePhoto.jpeg';
						                    $pngPath = 'assets/images/'.$hash.'/profilePhoto.png';
						                    if (file_exists($jpgPath)){
						                    	$path = $jpgPath;
						                    }
						                    if (file_exists($jpegPath)){
						                    	$path = $jpegPath;
						                    }
						                    if(file_exists($pngPath)){
						                    	$path = $pngPath;
						                    }
									echo'	<img src="'.$path.'" alt="Adam Harber profile picture">
											<div id="artistInfo" class="mb-3 mb-md-0">
												<h4 class="artistTitles">'.$fn.' '.$ln.'<br></h4>';
												if($phone != ''){
													echo '<a href="'.$phone.'"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></a>';
												}
												if($facebook != ''){
													echo '<a href="'.$facebook.'"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>';
												}
												if($instagram != ''){
													echo '<a href="'.$instagram.'"><i class="fa fa-lg fa-instagram fa-2x" aria-hidden="true"></i></a>';
												}
									echo'	</div>
										</div>
									</div>
									<div class="thumbailInfo column col-12 col-sm-7 col-md-7 col-lg-8 col-xl-9 item">
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position1.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position1.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position1.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img1">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img1" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img2">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position2.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position2.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position2.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img2">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img2" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img3">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img1">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position3.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position3.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position3.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img3">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img3" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img4">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img2">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position4.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position4.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position4.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img4">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img4" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img5">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img3">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position5.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position5.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position5.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img5">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img5" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img6">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img4">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position6.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position6.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position6.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img6">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img6" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img7">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img5">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position7.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position7.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position7.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img7">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img7" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img6">Prev</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img8">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position8.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position8.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position8.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img8">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img8" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img9">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img7">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position9.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position9.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position9.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img9">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img9" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img10">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img8">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position10.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position10.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position10.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img10">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img10" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img11">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img9">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position11.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position11.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position11.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img11">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img11" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#barry-img12">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img10">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position12.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position12.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position12.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#barry-img12">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="barry-img12" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#barry-img11">Prev</a>
												  </div>
												</div>
											</div>
										</div>
									</div>
								</div>';
						}
			echo'	</div>
				</div>
				<div class="pageTitle" id="pricingsH1">	
					<h1><span id="TattooArtists2"></span>Castleton Tattoo Artists</h1>
				</div>
				<div class="row ArtistsMenu">
					<!-- <h4 class="pricingTitles">Castleton Artists</h4> -->
					<div class="column artistThumbnail jimmy LEFT col-12 item">';
					    // $statement = "SELECT firstName, lastName, recoveryHash, phone, facebook, instagram FROM users WHERE store='noblesville' AND position='1'";
						$sql1 = "SELECT * FROM users WHERE store='castleton' and position='1'";
                        $result1 = $mysqli->query($sql1);
                        $numRows1 = $result1->num_rows;
                        //if there are employees in the users table 
                        if ($numRows1 > 0){
                            while($row = $result1->fetch_assoc()){
                            	$hash = $row['recoveryHash']; 
                            	$fn = $row['firstName'];
                            	$ln = $row['lastName'];
                            	$phone = $row['phone'];
                            	$facebook = $row['facebook'];
                            	$instagram = $row['instagram'];
                            }
							echo'   
							<div class="row thumbnailContent">
									<div class="thumbnailPicutre column col-12 col-sm-5 col-md-5 col-lg-4 col-xl-3 item">
										<div class="center">';
											$jpgPath = 'assets/images/'.$hash.'/profilePhoto.jpg';
						                    $jpegPath = 'assets/images/'.$hash.'/profilePhoto.jpeg';
						                    $pngPath = 'assets/images/'.$hash.'/profilePhoto.png';
						                    if (file_exists($jpgPath)){
						                    	$path = $jpgPath;
						                    }
						                    if (file_exists($jpegPath)){
						                    	$path = $jpegPath;
						                    }
						                    if(file_exists($pngPath)){
						                    	$path = $pngPath;
						                    }
									echo'	<img src="'.$path.'" alt="Adam Harber profile picture">
											<div id="artistInfo" class="mb-3 mb-md-0">
												<h4 class="artistTitles">'.$fn.' '.$ln.'<br></h4>';
												if($phone != ''){
													echo '<a href="'.$phone.'"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></a>';
												}
												if($facebook != ''){
													echo '<a href="'.$facebook.'"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>';
												}
												if($instagram != ''){
													echo '<a href="'.$instagram.'"><i class="fa fa-lg fa-instagram fa-2x" aria-hidden="true"></i></a>';
												}
									echo'	</div>
										</div>
									</div>
									<div class="thumbailInfo column col-12 col-sm-7 col-md-7 col-lg-8 col-xl-9 item">
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position1.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position1.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position1.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img1">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img1" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img2">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position2.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position2.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position2.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img2">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img2" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img3">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img1">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position3.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position3.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position3.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img3">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img3" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img4">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img2">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position4.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position4.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position4.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img4">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img4" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img5">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img3">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position5.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position5.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position5.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img5">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img5" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img6">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img4">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position6.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position6.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position6.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img6">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img6" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img7">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img5">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position7.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position7.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position7.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img7">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img7" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img6">Prev</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img8">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position8.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position8.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position8.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img8">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img8" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img9">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img7">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position9.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position9.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position9.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img9">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img9" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img10">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img8">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position10.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position10.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position10.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img10">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img10" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img11">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img9">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position11.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position11.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position11.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img11">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img11" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#aj-img12">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img10">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position12.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position12.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position12.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#aj-img12">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="aj-img12" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#aj-img11">Prev</a>
												  </div>
												</div>
											</div>
										</div>
									</div>
								</div>';
						}
			echo'	</div>	
					<div class="column artistThumbnail jimmy LEFT col-12 item">';
					    // $statement = "SELECT firstName, lastName, recoveryHash, phone, facebook, instagram FROM users WHERE store='noblesville' AND position='1'";
						$sql1 = "SELECT * FROM users WHERE store='castleton' and position='2'";
                        $result1 = $mysqli->query($sql1);
                        $numRows1 = $result1->num_rows;
                        //if there are employees in the users table 
                        if ($numRows1 > 0){
                            while($row = $result1->fetch_assoc()){
                            	$hash = $row['recoveryHash']; 
                            	$fn = $row['firstName'];
                            	$ln = $row['lastName'];
                            	$phone = $row['phone'];
                            	$facebook = $row['facebook'];
                            	$instagram = $row['instagram'];
                            }
							echo'   
							<div class="row thumbnailContent">
									<div class="thumbnailPicutre column col-12 col-sm-5 col-md-5 col-lg-4 col-xl-3 item">
										<div class="center">';
											$jpgPath = 'assets/images/'.$hash.'/profilePhoto.jpg';
						                    $jpegPath = 'assets/images/'.$hash.'/profilePhoto.jpeg';
						                    $pngPath = 'assets/images/'.$hash.'/profilePhoto.png';
						                    if (file_exists($jpgPath)){
						                    	$path = $jpgPath;
						                    }
						                    if (file_exists($jpegPath)){
						                    	$path = $jpegPath;
						                    }
						                    if(file_exists($pngPath)){
						                    	$path = $pngPath;
						                    }
									echo'	<img src="'.$path.'" alt="Adam Harber profile picture">
											<div id="artistInfo" class="mb-3 mb-md-0">
												<h4 class="artistTitles">'.$fn.' '.$ln.'<br></h4>';
												if($phone != ''){
													echo '<a href="'.$phone.'"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></a>';
												}
												if($facebook != ''){
													echo '<a href="'.$facebook.'"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>';
												}
												if($instagram != ''){
													echo '<a href="'.$instagram.'"><i class="fa fa-lg fa-instagram fa-2x" aria-hidden="true"></i></a>';
												}
									echo'	</div>
										</div>
									</div>
									<div class="thumbailInfo column col-12 col-sm-7 col-md-7 col-lg-8 col-xl-9 item">
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position1.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position1.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position1.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img1">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img1" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img2">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position2.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position2.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position2.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img2">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img2" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img3">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img1">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position3.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position3.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position3.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img3">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img3" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img4">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img2">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position4.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position4.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position4.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img4">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img4" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img5">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img3">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position5.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position5.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position5.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img5">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img5" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img6">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img4">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position6.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position6.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position6.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img6">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img6" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img7">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img5">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position7.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position7.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position7.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img7">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img7" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img6">Prev</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img8">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position8.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position8.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position8.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img8">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img8" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img9">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img7">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position9.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position9.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position9.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img9">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img9" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img10">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img8">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position10.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position10.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position10.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img10">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img10" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img11">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img9">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position11.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position11.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position11.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img11">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img11" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#rev-img12">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img10">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3">';
												$jpgPath = 'assets/images/'.$hash.'/position12.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position12.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position12.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#rev-img12">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="rev-img12" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#rev-img11">Prev</a>
												  </div>
												</div>
											</div>
										</div>
									</div>
								</div>';
						}
			echo'	</div>
				</div>
				<div class="pageTitle goldTop" id="pricingsH1">	
					<h1><span id="PiercingArtists"></span>Professional Piercers</h1>
				</div>
				<div class="row ArtistsMenu">
					<div class="NoblesvilleArtists column left col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 item">
						<h4 class="pricingTitles">Noblesville Piercers</h4>
						<div class="column artistThumbnail elaina LEFT col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 item">';
						// $statement = "SELECT firstName, lastName, recoveryHash, phone, facebook, instagram FROM users WHERE store='noblesville' AND position='1'";
						$sql1 = "SELECT * FROM users WHERE store='noblesville' and userType='pierce'";
                        $result1 = $mysqli->query($sql1);
                        $numRows1 = $result1->num_rows;
                        //if there are employees in the users table 
                        if ($numRows1 > 0){
                            while($row = $result1->fetch_assoc()){
                            	$hash = $row['recoveryHash']; 
                            	$fn = $row['firstName'];
                            	$ln = $row['lastName'];
                            	$phone = $row['phone'];
                            	$facebook = $row['facebook'];
                            	$instagram = $row['instagram'];
                            }
                        }
						echo'	<div class="row thumbnailContent">
									<div class="thumbnailPicutre column col-12 col-sm-5 col-md-5 col-lg-4 col-xl-3 item">
										<div class="center">';
											$jpgPath = 'assets/images/'.$hash.'/profilePhoto.jpg';
						                    $jpegPath = 'assets/images/'.$hash.'/profilePhoto.jpeg';
						                    $pngPath = 'assets/images/'.$hash.'/profilePhoto.png';
						                    if (file_exists($jpgPath)){
						                    	$path = $jpgPath;
						                    }
						                    if (file_exists($jpegPath)){
						                    	$path = $jpegPath;
						                    }
						                    if(file_exists($pngPath)){
						                    	$path = $pngPath;
						                    }
									echo'	<img src="'.$path.'" alt="Adam Harber profile picture">
											<div id="artistInfo" class="mb-3 mb-md-0">
												<h4 class="artistTitles">'.$fn.' '.$ln.'<br></h4>';
												if($phone != ''){
													echo '<a href="'.$phone.'"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></a>';
												}
												if($facebook != ''){
													echo '<a href="'.$facebook.'"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>';
												}
												if($instagram != ''){
													echo '<a href="'.$instagram.'"><i class="fa fa-lg fa-instagram fa-2x" aria-hidden="true"></i></a>';
												}
									echo'	</div>
										</div>
									</div>		
									<div class="thumbailInfo column col-12 col-sm-7 col-md-12 col-lg-7 col-xl-9 item">
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position1.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position1.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position1.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img1">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img1" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img2">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position2.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position2.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position2.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img2">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img2" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img3">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img1">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position3.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position3.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position3.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img3">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img3" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img4">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img2">Prev</a>
												  </div>
												</div>
											</div>
										</div>
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position4.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position4.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position4.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img4">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img4" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img5">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img3">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position5.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position5.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position5.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img5">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img5" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img6">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img4">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position6.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position6.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position6.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img6">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img6" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img7">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img5">Prev</a>
												  </div>
												</div>
											</div>
										</div>
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position7.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position7.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position7.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img7">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img7" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img6">Prev</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img8">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position8.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position8.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position8.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img8">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img8" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img9">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img7">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position9.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position9.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position9.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img9">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img9" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img10">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img8">Prev</a>
												  </div>
												</div>
											</div>
										</div>
										<div class="row picRow picRowBottom">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position10.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position10.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position10.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img10">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img10" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img11">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img9">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position11.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position11.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position11.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img11">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img11" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#elaina-img12">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img10">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position12.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position12.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position12.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#elaina-img12">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="elaina-img12" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#elaina-img11">Prev</a>
												  </div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
					<div class="CastletonArtists column right col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 item">
						<h4 class="pricingTitles">Castleton Piercers & Permanant Makeup</h4>
						<div class="column artistThumbnail elaina megan LEFT col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 item">';
						// $statement = "SELECT firstName, lastName, recoveryHash, phone, facebook, instagram FROM users WHERE store='noblesville' AND position='1'";
						$sql1 = "SELECT * FROM users WHERE store='castleton' and userType='pierce'";
                        $result1 = $mysqli->query($sql1);
                        $numRows1 = $result1->num_rows;
                        //if there are employees in the users table 
                        if ($numRows1 > 0){
                            while($row = $result1->fetch_assoc()){
                            	$hash = $row['recoveryHash']; 
                            	$fn = $row['firstName'];
                            	$ln = $row['lastName'];
                            	$phone = $row['phone'];
                            	$facebook = $row['facebook'];
                            	$instagram = $row['instagram'];
                            }
                        }
						echo'	<div class="row thumbnailContent">
									<div class="thumbnailPicutre column col-12 col-sm-5 col-md-5 col-lg-4 col-xl-3 item">
										<div class="center">';
											$jpgPath = 'assets/images/'.$hash.'/profilePhoto.jpg';
						                    $jpegPath = 'assets/images/'.$hash.'/profilePhoto.jpeg';
						                    $pngPath = 'assets/images/'.$hash.'/profilePhoto.png';
						                    if (file_exists($jpgPath)){
						                    	$path = $jpgPath;
						                    }
						                    if (file_exists($jpegPath)){
						                    	$path = $jpegPath;
						                    }
						                    if(file_exists($pngPath)){
						                    	$path = $pngPath;
						                    }
									echo'	<img src="'.$path.'" alt="Adam Harber profile picture">
											<div id="artistInfo" class="mb-3 mb-md-0">
												<h4 class="artistTitles">'.$fn.' '.$ln.'<br></h4>';
												if($phone != ''){
													echo '<a href="'.$phone.'"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></a>';
												}
												if($facebook != ''){
													echo '<a href="'.$facebook.'"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>';
												}
												if($instagram != ''){
													echo '<a href="'.$instagram.'"><i class="fa fa-lg fa-instagram fa-2x" aria-hidden="true"></i></a>';
												}
									echo'	</div>
										</div>
									</div>		
									<div class="thumbailInfo column col-12 col-sm-7 col-md-12 col-lg-7 col-xl-9 item">
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position1.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position1.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position1.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img1">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img1" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img2">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position2.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position2.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position2.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img2">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img2" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img3">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img1">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position3.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position3.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position3.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img3">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img3" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img4">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img2">Prev</a>
												  </div>
												</div>
											</div>
										</div>
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position4.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position4.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position4.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img4">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img4" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img5">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img3">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position5.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position5.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position5.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img5">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img5" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img6">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img4">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position6.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position6.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position6.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img6">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img6" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img7">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img5">Prev</a>
												  </div>
												</div>
											</div>
										</div>
										<div class="row picRow">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position7.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position7.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position7.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img7">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img7" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img6">Prev</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img8">Next</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position8.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position8.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position8.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img8">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img8" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img9">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img7">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position9.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position9.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position9.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img9">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img9" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img10">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img8">Prev</a>
												  </div>
												</div>
											</div>
										</div>
										<div class="row picRow picRowBottom">
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position10.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position10.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position10.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img10">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img10" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img11">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img9">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position11.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position11.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position11.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img11">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img11" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__next perfundo__control" href="#megan-img12">Next</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img10">Prev</a>
												  </div>
												</div>
											</div>
											<div class="column pic col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
												$jpgPath = 'assets/images/'.$hash.'/position12.jpg';
							                    $jpegPath = 'assets/images/'.$hash.'/position12.jpeg';
							                    $pngPath = 'assets/images/'.$hash.'/position12.png';
							                    if (file_exists($jpgPath)){
							                    	$path = $jpgPath;
							                    }
							                    if (file_exists($jpegPath)){
							                    	$path = $jpegPath;
							                    }
							                    if(file_exists($pngPath)){
							                    	$path = $pngPath;
							                    }
										echo'	<div class="perfundo">
												  <a class="perfundo__link" href="#megan-img12">
												    <img src="'.$path.'" alt="Demo image">
												  </a>
												  <div id="megan-img12" class="perfundo__overlay fadeIn">
												    <figure class="perfundo__content perfundo__figure">
												      <img src="'.$path.'" alt="Demo image">
												      <div class="perfundo__image" style="width: 420px; padding-top: 100%; background-image: url('.$path.');"></div>
												    </figure>
												    <a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
												    <a class="perfundo__prev perfundo__control" href="#megan-img11">Prev</a>
												  </div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
				<footer>
					<div class="row">
						<div class="foot1 col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 item">
							<div class="row">
								<div class="footleft noblefoot col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 item">
									<h1>Noblesville</h1>
									<p class="email">mysticimagestattoo@gmail.com</p>
									<p>317-214-7166</p>
									<div class="row">
										<div class="footleft col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 item">
											<a href="https://www.facebook.com/MysticImagesTattoo/"><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>
										</div>
										<div class="footright col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 item">
											<a href="https://www.instagram.com/mysticimagestattoo/?hl=en"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
								<div class="footright noblefoot col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 item">
									<h1>Castleton</h1>
									<p class="email">mysticimagestattoocastleton@gmail.com</p>
									<p>317-436-7220</p>
									<div class="row">
										<div class="footleft col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 item">
											<a href="https://www.facebook.com/mysticimagescastleton/"><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>
										</div>
										<div class="footright col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 item">
											<a href="https://www.instagram.com/explore/locations/272060556555566/mystic-images-tattoo-castleton/?hl=en"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="foot3 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 item">
							<div class="foot">
								<h1>We Accept</h1>
								<div class="row verticalCenter">
									<div class="col-6 right verticalCenter">
										<img src="assets/images/icon_cash.svg" width="75"  alt="Cash Logo">
									</div>
									<div class="col-6 left verticalCenter">
										<img src="assets/images/Paypal-icon.png" width="75" alt="Paypal Logo">
									</div>
								</div>
							</div>
						</div>
					</div>
				</footer>
			</main>
		</div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>$(\'.carousel\').carousel()</script>  
  </body>
</html>
';
?>