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

$id = $mysqli->escape_string($_POST["categoryId"]);//bring in the distributorID from the calling page

$sql = "SELECT * FROM categories WHERE id='".$id."'";
$result = $mysqli->query($sql);
$numRows = $result->num_rows;
if ($numRows > 0){ 
  while($row = $result->fetch_assoc()){
    $category = $row['category'];
  }
}

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="background-color:#bebebe;">

<head>
    <title>Dashboard | Edit Category</title>
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
          <h3 class="text-center mt-4 mb-2">Current Category Name</h3>
          <span style="display: flex; justify-content: center;">
            <table class="table-custom mx-auto" style="max-width:800px;" border=1 color:white>
              <tr><th>ID #</th><th>Category Name</th></tr>
              <tr>
                <td>#<?php echo $id; ?></td>
                <td><?php echo $category; ?></td>
              </tr>
            </table>
          </span>
          <br>
          <h3 class="text-center mt-4 mb-2">New Category Name</h3>
          <p class="mb-3 mx-auto mt-0" style="max-width:550px;"><span style="text-decoration:underline;">IMPORTANT:</span> Changing the name of this category will also change the category of existing products that already have this category assigned to them.</p>
          <form method="post" enctype="multipart/form-data" action="enterNewCategoryInfo.php">
            <div class="form-group mb-2">
              <input type="text" class="form-control" placeholder="Category&rsquo;s New Name" style="max-width: 350px; margin-left:auto; margin-right:auto;" id="distributorName" name="newCategoryName" required>
            </div>
            <div class="row mt-2 mb-4">
              <div class="col-6 px-auto d-flex justify-content-end">
                <?php
                  echo '<a href="manageCategories.php" class="btn btn-secondary">Go Back</a>';
                ?>
              </div>
              <div class="col-6 px-auto d-flex justify-content-start">
                <?php
                  echo"
                    <input type='hidden' name='categoryId' value='".$id."'>
                  ";
                ?>
                <button type="submit" class="btn btn-primary">Continue</button>
              </div>
            </div>
          </form>
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