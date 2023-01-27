<?php 
	require ("../db.php");
	require ("../functions.php");

	session_start();

	$currentPage='industries/military-industry.php';

	$locationBits = getLocationBits($currentPage);
	$href = $locationBits[0];
	$src = $locationBits[1];

	$navItems = getNavItems($currentPage);
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<title>Military Industry</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Custom CSS -->
		<?php echo'<link rel="stylesheet" '.$href.'assets/css/styles.css">'; ?>
	</head>

	<body>
		<div class="page">

			<header>
				<div class="pageTitle d-flex flex-row flex-lg-column">
					<?php 
						echo'
						<a class="navlogo mt-1 mx-auto ml-lg-2" '.$href.'index.php">
					  		<image '.$src.'assets/images/nationalfoodlogo.png" alt="National Food Logo" class="headerLogo"/>
					 	</a>
						';
					?>
				 	<div class="container d-none d-lg-block text-center">
				 		<h1 class="mt-2 mb-2">Military Industry</h1>
				 	</div>
				</div>
				<?php 
					displayNavBar($currentPage, $navItems);
				?>
				<div class="container d-lg-none text-center">
					<!-- page title (only H1 tag on page)-->
			 		<h1 class="mt-2 mb-2">Military Industry</h1>
			 	</div>
			</header>	

			<main class="scroll">
				<article class="py-2 scroll articleBG">
					<div class="contentBubble mx-auto p-3 mt-3 mt-md-3 mt-lg-5">
						<!-- Section Heading -->
						<h2>Military Industry</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacinia enim nec ligula laoreet commodo. Etiam a nibh vel arcu gravida aliquet. Aliquam eu pellentesque tortor. Proin nec gravida orci, pretium placerat ligula. Curabitur dui quam, aliquet vitae ornare et, iaculis a massa. </p>
						<!-- Sub Heading -->
						<h4>A Sweet Sub-Header</h4>
						<ul>
							<li>lorems</li>
							<li>ipsums</li>
							<li>imasteses</li>
							<li class="unique">and more!</li>
						</ul>
					</div>
					<div class="contentBubble mx-auto p-3 mt-3 mb-5">
						<!-- Section Heading -->
						<h2>Lorem ipsum dolor sit amet</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacinia enim nec ligula laoreet commodo. Etiam a nibh vel arcu gravida aliquet. Aliquam eu pellentesque tortor. Proin nec gravida orci, pretium placerat ligula. Curabitur dui quam, aliquet vitae ornare et, iaculis a massa. </p>
						<!-- Sub Heading -->
						<h4>A Sweet Sub-Header</h4>
						<p>Etiam a nibh vel arcu gravida aliquet. Aliquam eu pellentesque tortor. Proin nec gravida orci, pretium placerat ligula. Curabitur dui quam, aliquet vitae ornare et, iaculis a massa.Aliquam eu pellentesque tortor. Proin nec gravida orci, pretium placerat ligula. Curabitur dui quam, aliquet vitae ornare et, iaculis a massa.</p>
					</div>
				</article>
				<aside class="py-2">
					<div class="contentBubble mx-auto p-3 mt-3 mt-md-3 mt-lg-5 mb-5">
						<!-- Sub Heading -->
						<h4>Drop us a note</h4>
						<p>Leave your Lorem and dolormail Below and one of our Sales Representives will return your ipsum ASAP.</p>
						<?php 
							if (isset($_SESSION['questionMessage']) && $_SESSION['questionMessage'] != '') {
								$message = $_SESSION['questionMessage'];
								$_SESSION['questionMessage'] = '';
								echo "<h6>".$message."</h6>";
							}else{
								displayContactForm($currentPage);
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