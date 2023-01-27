<?php
require ("db.php");
session_start();

$baseURL = "manageItems.php?";


if( isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > 9*60) ){
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    header('Location: ../login.html');
  }
 else{
   session_regenerate_id(true);
   $_SESSION['last_acted_on'] = time();
   $type = $_SESSION['type'];
 }

if (isset($_GET['category'])) {
  $getCategory = $mysqli->escape_string($_GET['category']);
  $sql = "SELECT * FROM categories WHERE id='".$getCategory."'";
  $result = $mysqli->query($sql);
  $numRows = $result->num_rows;
  if ($numRows > 0){ //They have pending attendance
    while($row = $result->fetch_assoc()){
      $getCategoryName = $row['category'];
    }
    $categoryURL='&category='.$getCategory;
  }else{$categoryURL='';}
}else{
  $getCategory = '';
  $categoryURL = '';
}

if(isset($_GET['brand'])){
  $getBrand = $mysqli->escape_string($_GET['brand']);
  $sql = "SELECT * FROM brands WHERE id='".$getBrand."'";
  $result = $mysqli->query($sql);
  $numRows = $result->num_rows;
  if ($numRows > 0){ //They have pending attendance
    while($row = $result->fetch_assoc()){
      $getBrandName = $row['brand'];
    }
    $brandURL='&brand='.$getBrand;
  }else{$brandURL='';}
}else{
  $getBrand ='';
  $brandURL='';
}

if(isset($_GET['search'])){
  $search = $_GET['search'];
  $searchURL = "&search=".$search;
}
else{
  $search="";
}

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="background-color:#bebebe;">

<head>
    <title>Dashboard | Manage Items</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css" id="main-styles-link">
    <link rel="stylesheet" href="../css/custom.css" id="main-styles-link">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>

<body style=" height: 100vh; background-color:#bebebe; display:flex; flex-direction:column; justify-content: space-between;">
  <!-- Header Start -->
  <header class="navigation ">
    <div class="rd-navbar-wrap">
      <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="100px" data-xxl-stick-up-offset="100px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-main-outer">
          <div class="rd-navbar-main d-flex justify-content-center">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel d-flex justify-content-center">
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand ml-0"><a class="brand" href="../index.html"><img class="brand-logo-dark" src="../images/logo-default-249x52.png" alt="" width="249" height="52"/><img class="brand-logo-light" src="../images/logo-inverse-249x52.png" alt="" width="249" height="52"/></a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- content page -->
  <section class=" p-t-0 p-b-0" style="background-color: #bebebe">
    <div class="crat">
      <!-- Title Page -->
      <div class="row pt-5 mt-4" style="background-color: #F2f3f4;">
        <div class="col-11 col-sm-10 col-md-8 col-lg-5 mx-auto">
          <a href="../login.html" class="button button-sm button-shadow button-secondary-outline button-zakaria mb-3" style="width: 100%;">Logout</a>
        </div>
        <div class="col-11 col-sm-10 col-md-8 col-lg-5 mx-auto">
          <a href="dashboard.php" class="manageItemsButton button button-sm button-shadow button-default-outline button-zakaria mb-3 mt-0" style="width: 100%;">Go Back</a>
        </div>
        <div class="col-12 mx-auto" style="background-color: #F2f3f4;">
          <h3 class="text-center mt-4 mb-2">Manage Items</h3>
              <form class="rd-search form-search mx-auto mb-3 mt-2" action="manageItems.php" method="GET" style="max-width:250px;">
                <div class="form-wrap">
                  <label class="form-label" for="search-form">Search ...</label>
                  <input class="form-input" id="search-form" type="text" name="search" autocomplete="off">
                  <button class="button-search fl-bigmug-line-search74" type="submit"></button>
                </div>
              </form>
              <div class="mb-4">
                <select  onChange="window.location.href=this.value" class="mr-2">
                  <?php
                    if ($getCategory=='') {
                      echo '<option>Select Category</option>';
                      $sql = "SELECT DISTINCT * FROM categories";
                    }else{
                      echo '<option>'.$getCategoryName.'</option>';  
                      $sql = "SELECT DISTINCT * FROM categories WHERE id !='".$getCategory."'";
                    }
                    $result = $mysqli->query($sql);
                    $numRows = $result->num_rows;
                    if ($numRows > 0){ 
                      while($row = $result->fetch_assoc()){
                        echo '<option value="'.$baseURL.$brandURL.'&category='.$row['id'].'">'.$row['category'].'</option>';
                      }
                      if($getCategory!=''){
                        echo '<option value="'.$baseURL.$brandURL.'">No Filter</option>';
                      }
                    }
                  ?>
                </select>
                <select  onChange="window.location.href=this.value" class="ml-2">
                  <?php
                    if ($getBrand=='') {
                      echo '<option>Select Brand</option>';
                      $sql = "SELECT DISTINCT * FROM brands";
                    }else{
                      echo '<option>'.$getBrandName.'</option>';  
                      $sql = "SELECT DISTINCT * FROM brands WHERE id !='".$getBrand."'";
                    }
                    $result = $mysqli->query($sql);
                    $numRows = $result->num_rows;
                    if ($numRows > 0){ 
                      while($row = $result->fetch_assoc()){
                        echo '<option value="'.$baseURL.$categoryURL.'&brand='.$row['id'].'">'.$row['brand'].'</option>';
                      }
                      if($getBrand!=''){
                        echo '<option value="'.$baseURL.$categoryURL.'">No Filter</option>';
                      }
                    }
                  ?>
                </select>
              </div>
          <?php
            if ($search == '' && $getBrand == '' && $getCategory == '') {
              $sql = "SELECT * FROM items ORDER BY name";  
            }
            elseif($search == '' && $getBrand != '' && $getCategory == ''){
              $sql = "SELECT * FROM items WHERE brand ='".$getBrand."' ORDER BY name";
            }
            elseif($search == '' && $getBrand == '' && $getCategory != ''){
              $sql = "SELECT * FROM items WHERE category LIKE '%".$getCategory."| %' ORDER BY name";
            }
            elseif($search == '' && $getBrand != '' && $getCategory != ''){
             $sql = "SELECT * FROM items WHERE category LIKE '%".$getCategory."| %' AND brand='".$getBrand."' ORDER BY name"; 
            }elseif($search != ''){
              $sql = "SELECT * FROM items WHERE name LIKE '%".$search."%' OR description LIKE '%".$search."%'";  
              $categorySearch = "SELECT * FROM categories WHERE category LIKE '%".$search."%'";
              $result = $mysqli->query($categorySearch);
              $numRows = $result->num_rows;
              if ($numRows > 0){ 
                while($row = $result->fetch_assoc()){
                  $sql = $sql . " UNION SELECT * FROM items WHERE category LIKE '".$row['id']."| '";
                }
              }
              $brandSearch = "SELECT * FROM brands WHERE brand LIKE '%".$search."%'";
              $result = $mysqli->query($brandSearch);
              $numRows = $result->num_rows;
              if ($numRows > 0){ 
                while($row = $result->fetch_assoc()){
                  $sql = $sql . " UNION SELECT * FROM items WHERE brand LIKE '".$row['id']."'";
                }
              }
            }
            $result = $mysqli->query($sql);
            $numRows = $result->num_rows;
            if ($numRows > 0){ //They have pending attendance
              $counter = 1;
              echo '<span class="d-none d-lg-block" style="display: flex; justify-content: center;">
              <table class="table-custom mx-auto" style="max-width:90%" border=1 color:white>
              <tr>
                <th>ID #</th><th>Name</th><th>Category</th><th>Brand</th><th>Per Pack</th><th>Weight (Lbs.)</th><th>In Stock</th><th>Best Seller</th><th>Description</th>';
                if ($type=="") {
                   $_SESSION['message'] = "Your session has been lost. Please login again."; //set error message
                   $_SESSION['directTo'] = "../login.html";  //set previous page
                   echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; 
                }else{
                  if ($type=="admin") {
                    echo '<th>Buy Price</th>';
                  }
                }; 
                echo'
                <th>Sell Price</th><th>Sale Price</th><th>Photo</th><th>Edit Button</th>
              </tr>';
              while($row = $result->fetch_assoc()){
                $itemImages = array(); //initialize array
                $dir = new DirectoryIterator('../images/items/'.$row['itemHash'].'_'.$row['id']); //create directory iterator
                foreach($dir as $file){ //loop through iterator
                  $fileBits = explode(".",$file);
                  if($fileBits[1]=="jpg" || $fileBits[1]=="jpeg" || $fileBits[1]=="png"){ //confirm that item is image
                    array_push($itemImages, '../images/items/'.$row['itemHash'].'_'.$row['id'].'/'.$file);
                  }
                }
                if (sizeof($itemImages) > 0) {
                  $ogPath = $itemImages[0];
                }

                $nameString = "";
                $engName = "";
                if (strpos($row['name'], '|') !== false){
                  $names = explode("|", $row["name"]);
                  $engName = $names[0];
                  for ($i=0; $i<sizeof($names)-1; $i++) {
                    $nameString = $nameString . $names[$i] . '<br>';
                  }
                  $nameString = $nameString . $names[sizeof($names)-1];
                }
                else{
                  $nameString = $row['name'];
                  $engName = $row['name'];
                }

                echo "<tr>";
                echo "<td>#" . $row["id"] . "</td>";
                echo "<td>" . $nameString . "</td>";
                // echo "<td>" . obtainDistributors($row["id"]) . "</td>";
                echo "<td>" . obtainCategories($row["id"]) . "</td>";
                echo "<td>" . obtainBrands($row["id"]) . "</td>";
                echo "<td>" . $row['perPack'] . "</td>";
                echo "<td>" . $row['weight'] . "</td>";
                echo "<td>";
                  if ($row['inStock'] == '1') {
                    echo "In Stock";
                  }else{
                    echo "Out of Stock";
                  }
                echo "</td>";
                echo "<td>";
                  if ($row['bestSeller'] == '1') {
                    echo "Yes";
                  }else if ($row['bestSeller'] == "0") {
                    echo "No";
                  }
                echo "</td>";   
                echo "<td>" . $row["description"] . "</td>";
                if ($type=="admin") {
                  if ($row['buyPrice'] != 0.00) {
                    echo "<td>$" . $row["buyPrice"] . "</td>";    
                  }else{
                    echo "<td>Not Set</td>";
                  }
                }
                echo "<td>$" . $row["sellPrice"] . "</td>";
                if ($row['salePrice'] != 0.00) {
                  echo "<td>$" . $row["salePrice"] . "</td>";
                }else{
                  echo "<td>Not Set</td>"; 
                }
                echo '<td><img src="'.$ogPath.'" style="max-height: 100px;" alt="'.$row["name"].'"></td>';
                echo "<td>
                        <div class='edit-delete-btns'>
                          <form action='alterItemInfo.php' method='POST'>
                            <input type='hidden' name='itemId' value='".$row['id']."'>
                            <input type='hidden' name='itemHash' value='".$row['itemHash']."'>
                            <button type='submit' class='mr-2' style='font-size: 20px;'>Edit</button>
                          </form>
                          <form action='deleteItem.php' method='POST' onsubmit=\"return confirm('Are you sure you want to delete ".$engName."?');\">
                            <input type='hidden' name='itemId' value='".$row['id']."'>
                            <input type='hidden' name='itemHash' value='".$row['itemHash']."'>
                            <button type='submit' class='mt-3' style='font-size: 20px;'>Delete</button>
                          </form>
                        </div>
                      </td>";                
                echo "</tr>";
                $counter += 1;
              }
              echo "</table><br></span>";
            }
            else { //no pending attendance
              echo "<p class='d-none d-lg-block' style='margin-bottom: 20px;'>No items match this query.</p>";
            }
          ?>
          <?php
            $sql = "SELECT * FROM items ORDER BY name";
            $result = $mysqli->query($sql);
            $numRows = $result->num_rows;
            if ($numRows > 0){ //They have pending attendance
              $counter = 1;
              echo '<span class="d-lg-none" style="display: flex; justify-content: center;">
              <table class="table-custom mx-auto" style="max-width:90%" border=1 color:white>
              <tr>
                <th>ID #</th><th>Name</th><th>Photo</th><th>Edit Button</th>
              </tr>';
              while($row = $result->fetch_assoc()){
                $itemImages = array(); //initialize array
                $dir = new DirectoryIterator('../images/items/'.$row['itemHash'].'_'.$row['id']); //create directory iterator
                foreach($dir as $file){ //loop through iterator
                  $fileBits = explode(".",$file);
                  if($fileBits[1]=="jpg" || $fileBits[1]=="jpeg" || $fileBits[1]=="png"){ //confirm that item is image
                    array_push($itemImages, '../images/items/'.$row['itemHash'].'_'.$row['id'].'/'.$file);
                  }
                }
                if (sizeof($itemImages) > 0) {
                  $ogPath = $itemImages[0];
                }

                $nameString = "";
                $engName = "";
                if (strpos($row['name'], '|') !== false){
                  $names = explode("|", $row["name"]);
                  $engName = $names[0];
                  for ($i=0; $i<sizeof($names)-1; $i++) {
                    $nameString = $nameString . $names[$i] . '<br>';
                  }
                  $nameString = $nameString . $names[sizeof($names)-1];
                }
                else{
                  $nameString = $row['name'];
                  $engName = $row['name'];
                }

                echo "<tr>";
                echo "<td>#" . $row["id"] . "</td>";
                echo "<td>" . $nameString . "</td>";
                echo '<td><img src="'.$ogPath.'" style="max-height: 100px;" alt="'.$row["name"].'"></td>';
                echo "<td>
                        <div class='edit-delete-btns'>
                          <form action='alterItemInfo.php' method='POST'>
                            <input type='hidden' name='itemId' value='".$row['id']."'>
                            <input type='hidden' name='itemHash' value='".$row['itemHash']."'>
                            <button type='submit' class='mr-0' style='font-size: 20px;'>Edit</button>
                          </form>
                          <form action='deleteItem.php' method='POST' onsubmit=\"return confirm('Are you sure you want to delete ".$engName."?');\">
                            <input type='hidden' name='itemId' value='".$row['id']."'>
                            <input type='hidden' name='itemHash' value='".$row['itemHash']."'>
                            <button type='submit' class='mt-2' style='font-size: 20px;'>Delete</button>
                          </form>
                        </div>
                      </td>";                
                echo "</tr>";
                $counter += 1;
              }
              echo "</table></span><br>";
            }
            else { //no pending attendance
              echo "<p class='d-lg-none' style='margin-bottom: 20px;'>No items match this query.</p>";
            }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="footer-btm py-3 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-md-flex justify-content-center align-items-center py-3 text-center">
            <p class="mb-0 ">Designed by <a href="https://mjyintl.com/BennettDierckman">MY BD Designs LLC</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="snackbars" id="form-output-global"></div>
  <script src="../js/core.min.js"></script>
  <script src="../js/script.js"></script>

</body>
</html>

<?php
function obtainDistributors($id){
  global $mysqli;
  $sql= "SELECT * FROM items WHERE id='".$id."'";
  $result = $mysqli->query($sql);
  $numItems = $result->num_rows;
  //if there are employees in the users table 
  if ($numItems > 0){
    while($row = $result->fetch_assoc()){
      $distributorRow  = $row['distributor'];
      $distributors = explode(", ", $distributorRow);
      $actualDistributors = array();
      $stringOfDistributors = "";
      foreach ($distributors as $distributor){
        $sql = "SELECT * FROM distributors WHERE id='".$distributor."'";
        $resultDistributor = $mysqli->query($sql);
        $numDistributors = $resultDistributor->num_rows;
        if ($numDistributors> 0){
          while($row = $resultDistributor->fetch_assoc()){
            array_push($actualDistributors, $row['name']);
          }
        }
      }
      if (sizeof($actualDistributors) > 1) {
        for($i=0; $i<sizeof($actualDistributors)-1; $i++){
          $stringOfDistributors = $stringOfDistributors . $actualDistributors[$i] . "<br>";
        }
        $stringOfDistributors = $stringOfDistributors . $actualDistributors[sizeof($actualDistributors)-1];
      }
      else if (sizeof($actualDistributors) == 1) {
        foreach ($actualDistributors as $distributor) {
          $stringOfDistributors = $distributor;
        }
      }
      else{
        $stringOfDistributors = "Not Set";
      }
      return $stringOfDistributors;
    }
  }
}
function obtainCategories($id){
  global $mysqli;
  $sql= "SELECT * FROM items WHERE id='".$id."'";
  $result = $mysqli->query($sql);
  $numItems = $result->num_rows;
  //if there are employees in the users table 
  if ($numItems > 0){
    while($row = $result->fetch_assoc()){
      $categoryRow  = $row['category'];
      $categories = explode("| ", $categoryRow);
      $actualCategories = array();
      $stringOfCategories = "";
      foreach ($categories as $category){
        $sql = "SELECT * FROM categories WHERE id='".$category."'";
        $resultCategory = $mysqli->query($sql);
        $numCategories = $resultCategory->num_rows;
        if ($numCategories > 0){
          while($row = $resultCategory->fetch_assoc()){
            array_push($actualCategories, $row['category']);
          }
        }
      }
      if (sizeof($actualCategories) > 1) {
        for($i=0; $i<sizeof($actualCategories)-1; $i++){
          $stringOfCategories = $stringOfCategories . $actualCategories[$i] . "<br>";
        }
        $stringOfCategories = $stringOfCategories . $actualCategories[sizeof($actualCategories)-1];
      }
      else{
        foreach ($actualCategories as $category) {
          $stringOfCategories = $category;
        }
      }
      return $stringOfCategories;
    }
  }
}
function obtainBrands($id){
  global $mysqli;
  $sql= "SELECT * FROM items WHERE id='".$id."'";
  $result = $mysqli->query($sql);
  $numItems = $result->num_rows;
  //if there are employees in the users table 
  if ($numItems > 0){
    while($row = $result->fetch_assoc()){
      $brandRow  = $row['brand'];
      $brands = explode("| ", $brandRow);
      $actualBrands = array();
      $stringOfBrands = "";
      foreach ($brands as $brand){
        $sql = "SELECT * FROM brands WHERE id='".$brand."'";
        $resultBrand = $mysqli->query($sql);
        $numBrands = $resultBrand->num_rows;
        if ($numBrands > 0){
          while($row = $resultBrand->fetch_assoc()){
            array_push($actualBrands, $row['brand']);
          }
        }
        else{
          return "None";
        }
      }
      if (sizeof($actualBrands) > 1) {
        for($i=0; $i<sizeof($actualBrands)-1; $i++){
          $stringOfBrands = $stringOfBrands . $actualBrands[$i] . "<br>";
        }
        $stringOfBrands = $stringOfBrands . $actualBrands[sizeof($actualBrands)-1];
      }
      else{
        foreach ($actualBrands as $brand) {
          $stringOfBrands = $brand;
        }
      }
      return $stringOfBrands;
    }
  }
}
?>