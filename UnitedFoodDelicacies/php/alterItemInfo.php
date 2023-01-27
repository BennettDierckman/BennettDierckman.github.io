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
   $type = $_SESSION['type'];
 }

 $id = $mysqli->escape_string($_POST["itemId"]);
 $itemHash = $mysqli->escape_string($_POST["itemHash"]);

//OBTAINING THE ITEM IMAGES
$itemImages = array(); //initialize array
$dir = new DirectoryIterator('../images/items/'.$itemHash.'_'.$id."/"); //create directory iterator
foreach($dir as $file){ //loop through iterator
  $fileBits = explode(".",$file);
  if($fileBits[1]=="jpg" || $fileBits[1]=="jpeg" || $fileBits[1]=="png"){ //confirm that item is image
    array_push($itemImages, '../images/items/'.$itemHash.'_'.$id.'/'.$file);
  }
}
if (sizeof($itemImages) > 0) {
  $ogPath = $itemImages[0];
}
$_SESSION['previousPage'] = 'alterItemInfo.php';
$_SESSION['itemId'] = $id;
$_SESSION['itemHash'] = $itemHash;

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="background-color:#bebebe;">

<head>
    <title>Dashboard | Edit Item</title>
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
      <div class="row pt-5 mt-5" style="background-color: #F2f3f4;">
        <div class="col-11 col-sm-10 col-md-8 col-lg-5 mx-auto">
          <a href="../login.html" class="button button-sm button-shadow button-secondary-outline button-zakaria mb-3" style="width: 100%;">Logout</a>
        </div>
        <div class="col-11 col-sm-10 col-md-8 col-lg-5 mx-auto">
          <a href="manageItems.php" class="manageItemsButton button button-sm button-shadow button-default-outline button-zakaria mt-0 mb-3" style="width: 100%;">Go Back</a>
        </div>
        <div class="col-12 mx-auto" style="background-color: #F2f3f4;">
          <h3 class="text-center mt-4 mb-2">Current Item Information</h3>
          <?php
            $sql = "SELECT * FROM items WHERE id='".$id."'";
            $result = $mysqli->query($sql);
            $numRows = $result->num_rows;
            if ($numRows > 0){ //They have pending attendance
              $counter = 1;
              echo '<span class="d-none d-lg-block" style="display: flex; justify-content: center;">
              <table class="table-custom mx-auto" style="max-width:90%" border=1 color:white>
              <tr>
                <th>ID #</th><th>Name</th><th>Categoy</th><th>Brand</th><th>Per Pack</th><th>Weight (Lbs)</th><th>In Stock</th><th>Best Seller</th><th>Description</th>';
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
                <th>Sell Price</th><th>Sale Price</th>
              </tr>';
              while($row = $result->fetch_assoc()){
                $oldName = $row['name'];
                $oldDistributor = $row['distributor'];
                $oldCategory = $row['category'];
                $oldBrand = $row['brand'];
                $oldBestSeller = $row['bestSeller'];
                $oldInStock = $row['inStock'];
                $oldDescription = $row['description'];
                $oldBuyPrice = $row['buyPrice'];
                $oldSellPrice = $row['sellPrice'];
                $oldSalePrice = $row['salePrice'];
                $oldHash = $row['hash'];
                $oldPerPack = $row['perPack'];
                $oldWeight = $row['weight'];
                echo "<tr>";
                echo "<td>#" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                // echo "<td>" . obtainDistributors($row["id"]) . "</td>";
                echo "<td>" . obtainCategories($row["id"]) . "</td>";
                echo "<td>" . obtainBrands($row["id"]) . "</td>";
                echo "<td>" . $oldPerPack . "</td>";
                echo "<td>" . $oldWeight . "</td>";
                echo "<td>";
                  if ($row['inStock'] == '1') {
                    echo "In Stock";
                  }else if ($row['inStock'] == "0") {
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

                echo "</tr>";
                $counter += 1;
              }
              echo "</table></span>";
            }
            else { //no pending attendance
              echo "<p class='d-none d-lg-block' style='margin-bottom: 20px;'>No items match this query.</p>";
            }
          ?>
          <?php
            $sql = "SELECT * FROM items WHERE id='".$id."'";
            $result = $mysqli->query($sql);
            $numRows = $result->num_rows;
            if ($numRows > 0){ //They have pending attendance
              while($row = $result->fetch_assoc()){
                echo'
                <div class="row mt-0 d-lg-none">
                  <div class="col-8 col-md-5 mx-auto">
                    <p>Item ID #'.$row['id'].'</p>
                    <p>Item Name: '.$row['name'].'</p>
                    <!-- <p>Item Distributor: '.obtainDistributors($row['id']).'</p> -->
                    <p>Item Category: '.obtainCategories($row['id']).'</p>
                    <p>Item Brand: '.obtainBrands($row['id']).'</p>
                    <p>Per Pack: '.$row['perPack'].'</p>
                    <p>Item Weight: '.$row['weight'].' Lbs.</p>
                    <p>Item In Stock? '.obtainInStock($row['id']).'</p>
                    <p>Item Item Description: '.$row['description'].'</p>';
                    if ($type == 'admin') {
                      echo '<p>Item Buy Price: ';
                      if ($row['buyPrice']=="0.00") {
                        echo "Not Set";
                      }else{
                        '<p>Item Buy Price: '.$row['buyPrice'].'</p>';
                      }
                    }
                    echo '<p>Item Sell Price: '.$row['sellPrice'].'</p>';
                    echo '<p>Item Sale Price: ';
                    if ($row['salePrice']=="0.00") {
                      echo "Not On Sale";
                    }else{
                      echo $row['salePrice'];
                    }echo'</p>
                  </div>
                </div>';

                $oldName = $row['name'];
                $oldDistributor = $row['distributor'];
                $oldCategory = $row['category'];
                $oldBrand = $row['brand'];
                $oldInStock = $row['inStock'];
                $oldDescription = $row['description'];
                $oldBuyPrice = $row['buyPrice'];
                $oldSellPrice = $row['sellPrice'];
                $oldSalePrice = $row['salePrice'];
                $oldHash = $row['oldHash'];
                $oldPerPack = $row['perPack'];
                $oldWeight = $row['weight'];
              }
            }
            else { //no pending attendance
              echo "<p  class='d-lg-none' style='margin-bottom: 20px;'>No items match this query.</p>";
            }
          ?>
          <div class="row mt-0">
            <div class="col-lg-6 d-flex justify-content-center mb-0 mx-auto">
              <div>
                <h5 class="text-center mt-4 mb-2 mx-auto">Current Item Photos</h5>
                <div class="d-flex">
                  <?php
                    foreach ($itemImages as $image) {
                      echo'
                        <div class="mr-1">
                          <img style="max-height:200px; max-height: 200px;" src="'.$image.'" alt="'.$name.'" />
                        </div>
                      ';
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="container mb-4 pt-3">
            <h3 class="text-center mt-4 mb-2">New Item Information</h3>
            <form method="post" enctype="multipart/form-data" action="enterNewItemInfo.php">
              <div class="form-group">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-4 mx-auto mb-1">
                    <input type="text" class="form-control" id="englishName" name="englishName" placeholder="English Name">
                  </div>
                  <div class="col-12 col-md-8 col-lg-4 mx-auto mt-1 mb-2">
                    <input type="text" class="form-control" id="farsiName" name="farsiName" placeholder="Farsi Name">
                  </div>
                  <div class="col-12 col-md-8 col-lg-4 mx-auto mb-1">
                    <input type="text" class="form-control" id="arabicName" name="arabicName" placeholder="Arabic Name">
                  </div>
              </div>
              <div class="row mt-3 mt-lg-4">
                <div class="col-12">
                  <div class="row d-flex justify-content-center mb-1 mb-lg-4">
                    <?php
                    if ($_SESSION['type']=='admin') {
                      echo'
                        <div class="col-12 col-md-4">
                          <h5 class="mb-0">Buy Price:</h5>
                          <div class="form-group d-flex justify-content-center">
                            <div class="d-flex">
                              <h5 class="mt-2 mr-2">$</h5>
                              <input type="number" class="form-control mb-0" id="buyPrice" name="buyPrice" placeholder="Buy Price" step=".01"  style="background-color:#ffffff;">
                            </div>
                          </div>
                        </div>';
                    }
                    ?>
                    <div class="col-12 col-md-4">
                      <h5 class="mb-0">Sell Price:</h5>
                      <div class="form-group d-flex justify-content-center">
                        <div class="d-flex">
                          <h5 class="mt-2 mr-2">$</h5>
                          <input type="number" class="form-control mb-0" id="sellPrice" name="sellPrice" placeholder="Sell Price" step=".01" style="background-color:#ffffff;">
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <h5 class="mb-0">Sale Price:</h5>
                      <div class="form-group d-flex justify-content-center">
                        <div class="d-flex">
                          <h5 class="mt-2 mr-2">$</h5>
                          <input type="number" class="form-control mb-0" id="salePrice" name="salePrice" placeholder="Sale Price" step=".01" style="background-color:#ffffff;">
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="col-12">
                    <div class="row d-flex justify-content-center mb-1 mb-lg-4">
                      <div class="col-12 col-md-4">
                        <h5 class="mb-0"># Per Pack</h5>
                        <div class="form-group d-flex justify-content-center">
                          <input type="number" class="form-control mb-0" id="perPack" name="perPack" value="" step="1" style="background-color:#ffffff;">
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <h5 class="mb-0">Weight:</h5>
                        <div class="form-group d-flex justify-content-center">
                          <div class="d-flex">
                            <input type="number" class="form-control mb-0 mr-1" id="wieght" name="weight" step=".1" style="background-color:#ffffff; max-width: 125px;">
                            <h5 class="mt-2 mr-2">Lbs.</h5>
                          </div>
                        </div>
                      </div>
                    </div>  
                  </div>
                <div class="col-12 col-md-10 col-lg-5 mx-auto">
                  <!-- <h5 class="mb-0 mt-2 mt-lg-0">Select Distributor(s):</h5>
                  <select id="artists" name="distributors[]" multiple style=" border: 2px solid #bebebe; width: 95%; margin-left: auto; margin-right:auto;">'; -->
                  <?php
                    // $sql1="SELECT * FROM distributors ORDER BY name";
                    // $result1 = $mysqli->query($sql1);
                    // $numRows1 = $result1->num_rows;
                    // //if there are employees in the users table 
                    // if ($numRows1 > 0){
                    //   while($row = $result1->fetch_assoc()){
                    //     echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    //   }
                    // }
                  ?>
                  <!-- </select> -->
                  <!-- <a href="manageDistributors.php" style="height:37px;"class=" ml-2 mb-1">Manage Distributors</a> -->
                  <h5 class="mb-0 mt-2">In Stock?</h5>
                  <select id="inStock" name="inStock" style=" border: 2px solid #bebebe; width: 95%; margin-left: auto; margin-right:auto;">
                    <option value="3">Same</option>
                    <option value="1">In Stock</option>
                    <option value="0">Out of Stock</option>
                  </select>
                  <h5 class="mb-0 mt-2">Best Seller?</h5>
                  <select id="bestSeller" name="bestSeller" style=" border: 2px solid #bebebe; width: 95%; margin-left: auto; margin-right:auto;">
                    <option value="3">Same</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                  <h5 class="mb-0 mt-2 mt-lg-2">Select Brand:</h5>
                  <select name="brand" style=" border: 2px solid #bebebe; width: 95%; margin-left: auto; margin-right:auto;">
                    <option value="same">Same</option>
                    <option value="None">None</option>
                    <?php
                      $sql1="SELECT * FROM brands ORDER BY brand";
                      $result1 = $mysqli->query($sql1);
                      $numRows1 = $result1->num_rows;
                      //if there are employees in the users table 
                      if ($numRows1 > 0){
                        while($row = $result1->fetch_assoc()){
                          echo '<option value="'.$row['id'].'">'.$row['brand'].'</option>';
                        }
                      }
                    ?>
                  </select>
                  <a href="manageBrands.php" style="height:37px;"class=" ml-2 mb-1">Manage Brands</a>
                  <h5 class="mb-0 mt-2 mt-lg-2">Category(s)</h5>
                  <select id="s1" name="categories[]" multiple style="border: 2px solid #bebebe;">
                    <?php
                      $sql1="SELECT * FROM categories ORDER BY category";
                      $result1 = $mysqli->query($sql1);
                      $numRows1 = $result1->num_rows;
                      //if there are employees in the users table 
                      if ($numRows1 > 0){
                        while($row = $result1->fetch_assoc()){
                          echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                        }
                      }
                    ?>
                  </select>
                  <a href="manageCategories.php" style="height:37px;"class=" ml-2 mb-1">Manage Categories</a>
                </div>
                <div class="col-11 col-md-9 col-lg-7 mt-4 mt-lg-0 mx-auto">
                  <h5 class="mb-0 mt-2">Item Description:</h5>
                  <div class="form-group">
                    <textarea rows="6" class="form-control" id="description" name="description" placeholder="Type item description here"></textarea>
                  </div>
                  <h5 class="mb-0 mt-2">Item Images:</h5>
                  <div class="input_fields_wrap">
                    <div class="row">
                      <div class="col-10">
                        <input style="width: 97%; height: 39px; font-size: 16px; color: white; margin-bottom:5px; background-color: white; padding-bottom: 35px; color:#495057;" class="btn btn-info" type="file" name="itemPics[]">
                      </div>
                      <div class="col-2">
                        <input style="float:right;" type="button" value=" + " class="btn btn-info add_field_button"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                echo"
                  <input type='hidden' name='oldName' value='".$oldName."'>
                  <input type='hidden' name='oldDistributor' value='".$oldDistributor."'>
                  <input type='hidden' name='oldCategory' value='".$oldCategory."'>
                  <input type='hidden' name='oldBrand' value='".$oldBrand."'>
                  <input type='hidden' name='oldInStock' value='".$oldInStock."'>
                  <input type='hidden' name='oldBestSeller' value='".$oldBestSeller."'>
                  <input type='hidden' name='oldDescription' value='".$oldDescription."'>
                  <input type='hidden' name='oldBuyPrice' value='".$oldBuyPrice."'>
                  <input type='hidden' name='oldSellPrice' value='".$oldSellPrice."'>
                  <input type='hidden' name='oldSalePrice' value='".$oldSalePrice."'>
                  <input type='hidden' name='itemHash' value='".$itemHash."'>
                  <input type='hidden' name='oldPerPack' value='".$oldPerPack."'>
                  <input type='hidden' name='oldWeight' value='".$oldWeight."'>
                  <input type='hidden' name='id' value='".$id."'>
                ";
              ?>
              <button type="submit" style="float:right;" class="mb-5 mt-4 btn btn-primary">Save New Info</button>
            </form>
          </div>
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

  <script type="text/javascript">
      $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper       = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input style="width: 80%; height: 39px; font-size: 16px; color: white; margin-bottom:5px; background-color: white; padding-bottom: 35px;color:#495057;" class="btn btn-info" type="file" name="itemPics[]"><a href="#" class="remove_field pl-3">Remove</a></div>'); //add input box
          }
        });
        
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
        })
      });
    </script>

</body>
</html>

<?php
function obtainInStock($id){
  global $mysqli;
  $sql= "SELECT * FROM items WHERE id='".$id."'";
  $result = $mysqli->query($sql);
  $numItems = $result->num_rows;
  //if there are employees in the users table 
  if ($numItems > 0){
    while($row = $result->fetch_assoc()){
      $inStock = $row['inStock'];
      if ($inStock == '1') {
        return "Yes";
      }else{return "No";}
    }
  }
}
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