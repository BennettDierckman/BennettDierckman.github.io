<?php 

function getNavItems($currentPage) {
	//Get Curent File name
	if (strpos($currentPage, '/')) {
	    $currentPageBits = explode("/", $currentPage);
	    if (sizeof($currentPageBits) == "2") {
	    	$currentFile = $currentPageBits[1];
	    }
	    else if (sizeof($currentPageBits) == "3") {
	    	$currentFile = $currentPageBits[2];
	    }
	}
	else{
	    $currentFile = $currentPage;
	}

	//create the nav items
	$productsDropdown = array(
		"products/index.php, Products",
		"products/stevia.php, Stevia", 
		"products/aspartame.php, Aspartame", 
		"products/erythritol.php, Erythritol"
	);
	$foodDropdown = array(
		"industries/food-industry/index.php, Food Industry", 
		"industries/food-industry/food-ingredients.php, Ingredients", 
		"industries/food-industry/food-service.php, Service", 
		"industries/food-industry/food-equipment-manufacturing.php, Equipment Manufacturing"
	);
	$industriesDropdown = array(
		"industries/index.php, Industries",
		"industries/military-industry.php, Military",
		"industries/industrial-industry.php, Industrial",
		$foodDropdown,
		"industries/education-industry.php, Education",
	);
	$navItems = array(
		"index.php, Home",
		$productsDropdown,
		$industriesDropdown,
		"about.php, About Us",
		"contact.php, Contact Us"
	); 

	if ($currentFile == "stevia.php" || $currentFile == "aspartame.php" || $currentFile == "erythritol.php") {
		$productsDropdown[0] = "Products";
		if ($currentFile == "stevia.php"){
			$productsDropdown[1] = "Stevia";
		}else if ($currentFile == "aspartame.php") {
			$productsDropdown[2] = "Aspartame";
		}elseif ($currentFile == "erythritol.php") {
			$productsDropdown[3] = "Erythritol";
		}
		$navItems[1] = $productsDropdown;
	}
	if ($currentFile == "military-industry.php" || $currentFile == "education-industry.php" || $currentFile == "industrial-industry.php" || $currentFile == "food-ingredients.php" || $currentFile == "food-service.php" || $currentFile == "food-equipment-manufacturing.php") {
		$industriesDropdown[0] = "Industries";
		if ($currentFile == "military-industry.php"){
			$industriesDropdown[1] = "Military";
			$navItems[2] = $industriesDropdown;
		}else if ($currentFile == "industrial-industry.php") {
			$industriesDropdown[2] = "Industrial";
			$navItems[2] = $industriesDropdown;
		}elseif ($currentFile == "education-industry.php") {
			$industriesDropdown[4] = "Education";
			$navItems[2] = $industriesDropdown;
		}else{
			$foodDropdown[0] = "Food Industry";
			if ($currentFile == 'food-ingredients.php') {
				$foodDropdown[1] = "Ingredients";
				$industriesDropdown[3] = $foodDropdown;
			}else if ($currentFile == 'food-service.php') {
				$foodDropdown[2] = "Service";
				$industriesDropdown[3] = $foodDropdown;
			}else if ($currentFile == 'food-equipment-manufacturing.php') {
				$foodDropdown[3] = "Equipment Manufacturing";
				$industriesDropdown[3] = $foodDropdown;
			}
			$navItems[2] = $industriesDropdown;
		}
	}

	//checks for active sub-nav item
    for ($i=0; $i < sizeof($productDropdown); $i++) { 
      $buttonBits = explode(', ', $productDropdown[$i]);
      if (strpos($buttonBits[1], $currentFile) !== false) {
        $productDropdown[$i] = $buttonBits[0];
        $navItems[1] = $productDropdown;
      }
    }
    //checks for active sub-nav item
    for ($i=0; $i < sizeof($industriesDropdown); $i++) { 
      $buttonBits = explode(', ', $industriesDropdown[$i]);
      if (strpos($buttonBits[1], $currentFile) !== false) {
        $industriesDropdown[$i] = $buttonBits[0];
        $navItems[2] = $industriesDropdown;
      }
    }
    //checks for active nav item
    for ($i=0; $i < sizeof($navItems); $i++) { 
      if (!is_array($navItems[$i])) {
        $buttonBits = explode(', ', $navItems[$i]);
        if (strpos($buttonBits[0], $currentFile) !== false) {
          $navItems[$i] = $buttonBits[1];
        }
      }
    }
  	// foreach ($navItems as $navItem ) {
  	// 	echo $navItem.'<br>';
  	// }
  	return $navItems;
}

function displayNavBar($currentPage, $navItems){
	$locationBits = getLocationBits($currentPage);
	$href = $locationBits[0];
	$src = $locationBits[1];
	
	echo'
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">';
	    //Loop through nav items
	      foreach ($navItems as $navItem) {
	      	//check if navItem is array or not
	      	if (!is_array($navItem)) {
	      	  $morsils = explode(", ", $navItem);
	          if (sizeof($morsils) == 2) { //not active
	            echo'<li class="nav-item">
				       <a class="nav-link" '.$href.$morsils[0].'">'.$morsils[1].'</a>
				    </li>';
	          }else{ //active
	              echo'<li class="nav-item active">
			       <a class="nav-link" '.$href.'#">'.$morsils[0].'<span class="sr-only">(current)</span></a></li>';
	          }
	      	}else{ //nav item is an array
	      		$morsils = explode(", ", $navItem[0]);
	           	if (sizeof($morsils) == 2) {
	           		if ($morsils[1] == 'Products') {
	           			echo'
		                <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" '.$href.$morsils[0].'" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$morsils[1].'</a>
							<ul class="dropdown-menu" aria-labelledby="productsDropdown">';
							  for ($i=1; $i <sizeof($navItems[1]) ; $i++) { 
							  	$morsils = explode(", ", $navItem[$i]);
							  	if (sizeof($morsils) == 2) {
							  		echo '<li><a class="dropdown-item" '.$href.$morsils[0].'">'.$morsils[1].'</a></li>';
							  	}else{
							  		echo '<li><a class="dropdown-item" '.$href.'#">'.$morsils[1].'</a></li>';
							  	}
							  }
							  echo'
				        	</ul>
				      	</li>';  
	           		}else if ($morsils[1] == 'Industries') {
	           			echo'
		                <li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle" '.$href.'#"" id="industriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$morsils[1].'</a>
					        <ul class="dropdown-menu" aria-labelledby="industriesDropdown">';
					          for ($i=1; $i <sizeof($navItems[2]) ; $i++) { 
					          	if (!is_array($navItem[$i])) {
					          		$morsils = explode(", ", $navItem[$i]);
								  	if (sizeof($morsils) == 2) {
								  		echo '<li><a class="dropdown-item" '.$href.$morsils[0].'">'.$morsils[1].'</a></li>';
								  	}else{
								  		echo '<li><a class="dropdown-item" '.$href.'#">'.$morsils[0].'</a></li>';
								  	}
					          	}else{
					          		$morsils = explode(", ", $navItem[$i][0]);
					          		echo '
					          		<li class="dropdown-submenu">
					          			<a class="dropdown-item dropdown-toggle" '.$href.'#">'.$morsils[1].'</a>
					          		<ul class="dropdown-menu">';
					          		for ($x=1; $x <sizeof($navItem[$i]); $x++) { 
					          			$morsils = explode(", ", $navItem[$i][$x]);
					          			if (sizeof($morsils) == 2) {
					          				echo '<li><a class="dropdown-item" '.$href.$morsils[0].'">'.$morsils[1].'</a></li>';
					          			}
					          			else{
					          				echo'<li><a class="dropdown-item" '.$href.'#">'.$morsils[0].'</a></li>';
					          			}
					          		}
					          		echo'
					          		</ul>
					          		</li>';

					          	}
					          }
					          echo'
					        </ul>
					    </li>';  
	           		}
	            }else{
	            	if ($morsils[0] == 'Products') {
	           			echo'
		                <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle active" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$morsils[0].'</a>
							<ul class="dropdown-menu" aria-labelledby="productsDropdown">';
							for ($i=1; $i <sizeof($navItems[1]) ; $i++) { 
							  	$morsils = explode(", ", $navItem[$i]);
							  	if (sizeof($morsils) == 2) {
							  		echo '<li><a class="dropdown-item" '.$href.$morsils[0].'">'.$morsils[1].'</a></li>';
							  	}else{
							  		echo '<li><a class="dropdown-item active" href="#">'.$morsils[0].'</a></li>';
							  	}
							}
							echo'
				        	</ul>
				      	</li>';  
				    }
				    else if ($morsils[0] == 'Industries') {
	           			echo'
		                <li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle active" href="#" id="industriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$morsils[0].'</a>
					        <ul class="dropdown-menu" aria-labelledby="industriesDropdown">';
					        for ($i=1; $i <sizeof($navItems[2]) ; $i++) { 
					          	if (!is_array($navItem[$i])) {
					          		$morsils = explode(", ", $navItem[$i]);
								  	if (sizeof($morsils) == 2) {
								  		echo '<li><a class="dropdown-item" '.$href.$morsils[0].'">'.$morsils[1].'</a></li>';
								  	}else{
								  		echo '<li><a class="dropdown-item active" href="#">'.$morsils[0].'</a></li>';
								  	}
					          	}else{
					          		$morsils = explode(", ", $navItem[$i][0]);
					          		if (sizeof($morsils) == 2) {
					          			echo '
						          		<li class="dropdown-submenu">
						          			<a class="dropdown-item dropdown-toggle" '.$href.'#">'.$morsils[1].'</a>
							          		<ul class="dropdown-menu">';
							          		for ($x=1; $x <sizeof($navItem[$i]); $x++) { 
							          			$morsils = explode(", ", $navItem[$i][$x]);
							          			if (sizeof($morsils) == 2) {
							          				echo '<li><a class="dropdown-item" '.$href.$morsils[0].'">'.$morsils[1].'</a></li>';
							          			}
							          			else{
							          				echo'<li><a class="dropdown-item" href="#">'.$morsils[0].'</a></li>';
							          			}
							          		}
							          		echo'
							          		</ul>
						          		</li>';
					          		}else{
					          			echo '
						          		<li class="dropdown-submenu">
						          			<a class="dropdown-item dropdown-toggle active" href="#">'.$morsils[0].'</a>
							          		<ul class="dropdown-menu">';
							          		for ($x=1; $x <sizeof($navItem[$i]); $x++) { 
							          			$morsils = explode(", ", $navItem[$i][$x]);
							          			if (sizeof($morsils) == 2) {
							          				echo '<li><a class="dropdown-item" '.$href.$morsils[0].'">'.$morsils[1].'</a></li>';
							          			}
							          			else{
							          				echo'<li><a class="dropdown-item active" href="#">'.$morsils[0].'</a></li>';
							          			}
							          		}
							          		echo'
							          		</ul>
						          		</li>';
					          		}
					          	}
					          }
					          echo'
					        </ul>
					    </li>'; 
					}   
	            }
	      	}
	      }
	    echo'
	    </ul>
	  </div>
	</nav>
	';
}

function getLocationBits($currentPage){
	$locationBits = explode('/', $currentPage);
	if (sizeof($locationBits) == 1) {
	    $href = 'href="';
	    $src = 'src="';
	}else if (sizeof($locationBits) == 2){
	    $href = 'href="../';
	    $src = 'src="../';
	}
	else { // if (sizeof($locationBits) == 3)
	    $href = 'href="../../';
	    $src = 'src="../../';
	}
	$locationBits = array($href, $src);
	return $locationBits;
}

function displayContactForm($currentPage){
	global $mysqli;  
	//Get Curent File name
	if (strpos($currentPage, '/')) {
	    $currentPageBits = explode("/", $currentPage);
	    if (sizeof($currentPageBits) == "2") {
	    	$action = 'action="../';
	    }
	    else if (sizeof($currentPageBits) == "3") {
	    	$action = 'action="../../';
	    }
	}
	else{
		$action = 'action="';
	}
	echo '
	<form '.$action.'askQuestion.php" method="POST">
		<input type="hidden" name="currentPage" value="'.$currentPage.'">
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

function getProductInfo($name){
	global $mysqli;
	$sql = "SELECT * FROM products WHERE name='$name'";
	$result = $mysqli->query($sql);
	$numRows = $result->num_rows;
	if ($numRows > 0){
		while($row = $result->fetch_assoc()){
			$description=$row['description'];
			$hex=$row['hex'];
			$img=$row['img'];
			$name=$row['name'];
			$productInfo = array($description, $hex, $img, $name);
		}		
	}else{ //product not found
		$productInfo = array('TBD', '#949947', "assets/images/nationalfoodlogo.png", "TBD");
	}
	return $productInfo;
}

?>