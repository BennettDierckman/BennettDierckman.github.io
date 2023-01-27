<?php 
	require ("db.php");
	require ("functions.php");

	session_start();

	$navItems = getNavItems("index.php");
?>
<!DOCTYPE html>
<html lang="en">

<!--
	National Food
	Home
-->

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<title>National Food Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Font Awesome -->
		<script src="https://use.fontawesome.com/a686b3c76b.js"></script>
		<!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="assets/css/styles.css">
	</head>

	<body>
		<div class="page">

			<header>
				<div class="pageTitle d-flex flex-row flex-lg-column">
					<a class="navlogo mt-1 mx-auto ml-lg-2" href="#">
				  		<image src="assets/images/nationalfoodlogo.png" alt="National Food Logo" class="headerLogo"/>
				 	</a>
				 	<div class="container d-none d-lg-block text-center">
				 		<h1 class="mt-2 mb-2">Welcome to National Food!</h1>
				 	</div>
				</div>
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
				        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Products
				        </a>
				        <ul class="dropdown-menu" aria-labelledby="productsDropdown">
				          <li><a class="dropdown-item" href="#">Stevia</a></li>
				          <li><a class="dropdown-item" href="#">Aspartame</a></li>
				          <li><a class="dropdown-item" href="#">Erythritol</a></li>
				        </ul>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="industriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Industries
				        </a>
				        <ul class="dropdown-menu" aria-labelledby="industriesDropdown">
				          <li><a class="dropdown-item" href="#">Military</a></li>
				          <li><a class="dropdown-item" href="#">Industrial</a></li>
				          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Food</a>
				          	<ul class="dropdown-menu">
					          <li><a class="dropdown-item" href="#">Ingredients</a></li>
					          <li><a class="dropdown-item" href="#">Service</a></li>
					          <li><a class="dropdown-item" href="#">Equipment Manufacturing</a></li>
					        </ul>
				          </li>
				          <li><a class="dropdown-item" href="#">Education</a></li>
				        </ul>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="#">About Us</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="#">Contact Us</a>
				      </li>
				    </ul>
				  </div>
				</nav>
				<div class="container d-lg-none text-center">
			 		<h1 class="mt-2 mb-2">Welcome to National Food!</h1>
			 	</div>
			</header>	

			<main class="scroll">
				<article class="py-2">
					<div class="contentBubble mx-auto p-3 mt-1 mt-md-3 mt-lg-5">
						<h2>An All You Can Sweet Buffet and More!</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacinia enim nec ligula laoreet commodo. Etiam a nibh vel arcu gravida aliquet. Aliquam eu pellentesque tortor. Proin nec gravida orci, pretium placerat ligula. Curabitur dui quam, aliquet vitae ornare et, iaculis a massa. </p>
						<h4>A Sweet Sub-Header</h4>
						<ul>
							<li>lorems</li>
							<li>ipsums</li>
							<li>imasteses</li>
							<li class="unique">and more!</li>
						</ul>
					</div>
					<div class="contentBubble mx-auto mt-1 mt-md-2 mt-lg-3 text-center pt-md-2 pb-md-2">
						<h2 class="d-none d-md-block">Our Products!</h2>
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block" src="assets/images/products/erythritol.png" alt="Erythritol slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block" src="assets/images/products/stevia.jpg" alt="Stevia slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block" src="assets/images/products/aspartame.jpg" alt="Aspartame slide">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
				</article>
				<aside class="py-2">
					<div class="contentBubble mx-auto p-3 mt-1 mt-md-3 mt-lg-5">
						<h4>Drop us a note</h4>
						<p>Leave your Lorem and dolormail Below and one of our Sales Representives will return your ipsum ASAP.</p>
						<?php 
							if (isset($_SESSION['questionMessage']) && $_SESSION['questionMessage'] != '') {
								$message = $_SESSION['questionMessage'];
								$_SESSION['questionMessage'] = '';
								echo "<h6>".$message."</h6>";
							}else{
								echo'
								<form action="askQuestion.php" method="POST">
									<input type="hidden" name="currentPage" value="index.php">
									<div class="formGroup">
										<label for="fn">First Name *</label>
										<input id="fn" type="text" name="fn" placeholder="Jimmy" maxlength="50" required>
									</div>
									<div class="formGroup">
										<label for="ln">Last Name *</label>
										<input id="ln" type="text" name="ln" placeholder="Stang" maxlength="150" required>
									</div>
									<div class="formGroup">
										<label for="email">Email *</label>
										<input id="email" type="email" name="email" placeholder="JamesStang93@gmail.com" maxlength="150" required>
									</div>
									<div class="formGroup">
										<label for="company">Company *</label>
										<input id="company" type="text" name="company" placeholder="Company XYZ" maxlength="150" required>
									</div>
									<div class="formGroup">
										<label for="title">Title</label>
										<input id="title" type="text" name="title" placeholder="Sous Chef"  maxlength="50">
									</div>
									<div class="formGroup">
										<label for="question">Question</label>
										<textarea id="question" type="text" rows="5" name="question" placeholder="Type your question here"></textarea>
									</div>
									<button class="contactButton" type="submit">Submit</button>
								</form>';
							}
						?>
					</div>
				</aside>
			</main>


			<footer class="p-3 text-center">
				<h6 class="m-0">Pour some &ldquo;Sugar&rdquo; on it!</h6>
			</footer>
		</div>
	    <!-- jQuery first, then Tether, then Bootstrap JS. -->
	     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	  	<script type="text/javascript">
	      $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	          if (!$(this).next().hasClass('show')) {
	            console.log("first if statement");
	            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	          }
	          var $subMenu = $(this).next(".dropdown-menu");
	          $subMenu.toggleClass('show');


	          $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
	            $('.dropdown-submenu .show').removeClass("show");
	          });


	          return false;
	        });
	  	</script>

  	</body>
</html>