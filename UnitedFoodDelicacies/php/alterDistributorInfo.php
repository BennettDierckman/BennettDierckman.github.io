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

$id = $mysqli->escape_string($_POST["distributorId"]);//bring in the distributorID from the calling page

$sql = "SELECT * FROM distributors WHERE id='".$id."'";
$result = $mysqli->query($sql);
$numRows = $result->num_rows;
if ($numRows > 0){ 
  while($row = $result->fetch_assoc()){
    $name = $row['name'];
    $location = $row['location'];
    $email = $row['email'];
    $phone = $row['phone'];
    $primaryContact = $row['primaryContact'];
  }
}

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="background-color:#bebebe;">

<head>
    <title>Dashboard | Edit Distributor</title>
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
      <div class="row mt-5 mb-5 mb-lg-0 mt-lg-0">
        <div class="col-12 mt-5 mt-lg-0 mx-auto" style="background-color: #F2f3f4;">
          <h3 class="text-center mt-4 mb-2">Distributor's Current Info</h3>
          <div class="d-lg-none text-left">
            <div class="row">
              <div class="col-8 col-md-5 mx-auto">
                <p>Distributor ID#: <?php echo $id; ?></p>
                <p>Distributor Name: <?php echo $name; ?></p>
                <p>Distributor Location: <?php echo $location; ?></p>
                <p>Distributor Email: <?php echo $email; ?></p>
                <p>Distributor Phone: <?php echo $phone; ?></p>
                <p>Distributor Contact: <?php echo $primaryContact; ?></p>
              </div>
            </div>
          </div>
          <span style="display: flex; justify-content: center;" class="d-none d-lg-block">
            <table class="table-custom mx-auto" style="max-width:90%" border=1 color:white>
              <tr><th>ID</th><th>Name</th><th>Location</th><th>Email</th><th>Phone</th><th>Primary Contact</th></tr>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $location; ?></td>
                <td><?php echo $email; ?></td>                              
                <td><?php echo $phone; ?></td>
                <td><?php echo $primaryContact; ?></td>
              </tr>
            </table>
          </span>
          <br>
          <h3 class="text-center mt-4 mb-0">Distributor's New Info.</h3>
          <p class="mt-0 mb-3">(Empty/Blank Fields will remain the same as above.)</p>
          <form method="post" enctype="multipart/form-data" action="enterNewDistributorInfo.php">
            <div class="form-group mb-2">
              <p style="text-align:left; width:75%; margin: 0 auto;">Distributor's New Name *</p>
              <input type="text" class="form-control" style="width:75%; margin-left:auto; margin-right:auto;" id="distributorName" name="newDistributorName">
            </div>
            <div class="form-group mb-2">
              <p style="text-align:left; width:75%; margin: 0 auto;">Distributor's New Location</p>
              <input type="text" class="form-control" style="width:75%; margin-left:auto; margin-right:auto;" id="distributorLocation" name="newDistributorLocation" >
            </div>
            <div class="form-group mb-2">
              <p style="text-align:left; width:75%; margin: 0 auto;">Distributor's New Email</p>
              <input type="text" class="form-control" style="width:75%; margin-left:auto; margin-right:auto;" id="distributorEmail" name="newDistributorEmail" >
            </div>
            <div class="form-group mb-2">
              <p style="text-align:left; width:75%; margin: 0 auto;">Distributor's New Phone Number</p>
              <input type="text" class="form-control" style="width:75%; margin-left:auto; margin-right:auto;" id="distributorPhone" name="newDistributorPhone">
            </div>
            <div class="form-group">
              <p style="text-align:left; width:75%; margin: 0 auto;">Distributor's New Primary Contact</p>
              <input type="text" class="form-control" style="width:75%; margin-left:auto; margin-right:auto;" id="distributorPrimaryContact" name="newDistributorPrimaryContact">
            </div>
            <div class="row mt-2 mb-4">
              <div class="col-6 px-auto d-flex justify-content-end">
                <?php
                  echo '<a href="manageDistributors.php" class="btn btn-secondary">Go Back</a>';
                ?>
              </div>
              <div class="col-6 px-auto d-flex justify-content-start">
                <?php
                  echo"
                    <input type='hidden' name='distributorName' value='".$name."'>
                    <input type='hidden' name='distributorLocation' value='".$location."'>
                    <input type='hidden' name='distributorEmail' value='".$email."'>
                    <input type='hidden' name='distributorPhone' value='".$phone."'>
                    <input type='hidden' name='distributorPrimaryContact' value='".$primaryContact."'>
                    <input type='hidden' name='distributorId' value='".$id."'>
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