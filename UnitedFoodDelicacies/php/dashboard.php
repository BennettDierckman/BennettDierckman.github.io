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
$_SESSION['previousPage'] = 'dashboard.php';
$_SESSION['itemId'] = '';
$_SESSION['itemHash'] = '';
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="background-color:#bebebe;">

<head>
    <title>Dashboard | Home</title>
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

<section class="p-t-0 p-b-0" style="background-color: #F2f3f4;">
  <div class="container" style="background-color: #F2f3f4;">
    <!-- Title Page -->
    <div class="row">
      <div class="col-12 col-md-11 col-lg-10 col-xl-9 mx-auto mt-5 mt-md-4 mt-lg-5">
        <div class="loginForm">
          <div class="row mt-5 mt-lg-0">
            <div class="col-11 col-sm-10 col-md-8 col-lg-5 mx-auto">
                <a href="../login.html" class="button button-sm button-shadow button-secondary-outline button-zakaria mb-0" style="width: 100%;">Logout</a>
            </div>
            <div class="col-11 col-sm-10 col-md-8 col-lg-5 mx-auto">
                <a href="manageItems.php" class="manageItemsButton button button-sm button-shadow button-default-outline button-zakaria mt-3 mt-lg-0 mb-3" style="width: 100%;">Edit/Manage Items</a>
            </div>
            <div class=" col-lg-11 mx-auto">
              <h3 class="text-center mt-2 mt-lg-4 mb-2">Register a new item</h3>
              <form method="post" enctype="multipart/form-data" action="registerItem.php">
                <div class="form-group">
                  <div class="row">
                    <div class="col-12 col-md-8 col-lg-4 mx-auto mb-1">
                      <input type="text" class="form-control" id="englishName" name="englishName" placeholder="English Name *" required>
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
                          <input type="number" min="1" class="form-control mb-0" id="perPack" name="perPack" value="1" step="1" style="background-color:#ffffff;" required>
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <h5 class="mb-0">Weight:</h5>
                        <div class="form-group d-flex justify-content-center">
                          <div class="d-flex">
                            <input type="number" class="form-control mb-0 mr-1" id="wieght" name="weight" placeholder="0.00" step=".1" style="background-color:#ffffff; max-width: 125px;">
                            <h5 class="mt-2 mr-2">Lbs.</h5>
                          </div>
                        </div>
                      </div>
                    </div>  
                  </div>
                  <div class="col-12 col-md-10 col-lg-5 mx-auto">
                    <!-- <h5 class="mb-0 mt-2 mt-lg-0">Select Distributor(s)</h5>
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
                    <!--</select>-->                    
                    <!--<a href="manageDistributors.php" style="height:37px;"class=" ml-2 mb-1">Manage Distributors</a>-->
                    <h5 class="mb-2 mt-2">Best Seller?</h5>
                    <select id="bestSeller" name="bestSeller" style=" border: 2px solid #bebebe; width: 95%; margin-left: auto; margin-right:auto;">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                    <h5 class="mb-0 mt-2 mt-lg-2">Select Brand</h5>
                    <select name="brand" style=" border: 2px solid #bebebe; width: 95%; margin-left: auto; margin-right:auto;">
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
                    <a href="manageBrands.php" style="height:37px;"class=" ml-2 mb-4">Manage Brands</a>
                    <h5 class="mb-0 mt-2 mt-lg-2">Select Category(s) *</h5>
                    <select id="s1" name="categories[]" multiple style="border: 2px solid #bebebe;" required>
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
                    <h5 class="mb-1 mt-2">Item Description *</h5>
                    <div class="form-group">
                      <textarea rows="6" class="form-control" id="description" name="description" placeholder="Type item description here" required></textarea>
                    </div>
                    <h5 class="mb-1">Item Images:</h5>
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
                <button  type="submit" style="float:right;" class="mb-5 mt-4 btn btn-primary">Continue</button>
              </form>
            </div>
          </div>
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