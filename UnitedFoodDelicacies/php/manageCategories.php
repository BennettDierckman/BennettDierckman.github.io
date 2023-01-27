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

 //Helps determine if user came from the Main Dashboard or From AlterItemInfo.php
$itemId='';
$itemHash='';
if (isset($_SESSION['itemId']) && isset($_SESSION['itemHash'])) {
 $itemId=$_SESSION['itemId'];
 $itemHash=$_SESSION['itemHash'];
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="background-color:#bebebe;">

<head>
    <title>Dashboard | Categories</title>
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
      <div class="row">
        <div class="col-12 mx-auto" style="background-color: #F2f3f4;">
          <h3 class="text-center mt-4 mb-2">Existing Categories</h3>
          <?php
            $sql = "SELECT * FROM categories ORDER BY category";
            $result = $mysqli->query($sql);
            $numRows = $result->num_rows;
            if ($numRows > 0){ //They have pending attendance
              $counter = 1;
              echo '<span style="display: flex; justify-content: center;"><table class="table-custom mx-auto" style="max-width:1000px;" border=1 color:white><tr><th>ID #</th><th>Name</th><th>Edit Button</th></tr>';
              while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>#" . $row['id']. "</td>";
                echo "<td>" . $row["category"] . "</td>";                 
                echo "<td>
                        <div class='edit-delete-btns'>
                          <form action='alterCategoryInfo.php' method='POST'>
                            <input type='hidden' name='categoryId' value='".$row['id']."'>
                            <button type='submit'  style='font-size: 20px;'>Edit</button>
                          </form>
                          <form action='deleteCategory.php' method='POST' onsubmit=\"return confirm('Are you sure you want to delete the category ".$row["category"]."?');\">
                            <input type='hidden' name='categoryId' value='".$row['id']."'>
                            <button type='submit' class='mt-2' style='font-size: 20px;'>Delete</button>
                          </form>
                        </div>
                      </td>";                
                echo "</tr>";
                $counter += 1;
              }
              echo "</table></span>";
              echo "Total Number of Categories: ".($counter-1).'<br>';
            }
            else { //no pending attendance
              echo "<p style='margin-bottom: 20px;'>No existing categories.</p>";
            }
          ?>
          <h3 class="text-center mt-4 mb-2">Register a new Category.</h3>
          <form method="post" enctype="multipart/form-data" action="registerCategory.php">
            <div class="form-group mb-4 mx-auto" style="max-width:1000px;">
              <input type="text" class="form-control" placeholder="Category Name" style="max-width: 350px; margin-left:auto; margin-right:auto;" id="distributorName" name="categoryName" required>
            </div>
            <div class="row mt-2 mb-4">
              <div class="col-12 px-auto d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Continue</button>
              </div>
            </div>
          </form>
          <?php
            if ($itemHash != '' && $itemId != '') {
              echo '
              <form method="POST" action="alterItemInfo.php">
                <input type="hidden" name="itemId" value="'.$itemId.'">
                <input type="hidden" name="itemHash" value="'.$itemHash.'">
                <button type="submit" class="mb-3 btn btn-secondary">Go Back</button>
              </form>
              ';
            }else{
              echo '<a href="dashboard.php" class="mb-3 btn btn-secondary">Go Back</a>';
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