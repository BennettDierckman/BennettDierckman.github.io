<?php
require ("php/db.php");
session_start();

$itemHash = $mysqli->escape_string($_GET["Item"]);
// echo $itemHash;
$itemBits = explode("_", $itemHash);
$sql= "SELECT * FROM items WHERE itemHash='".$itemBits[0]."' AND id='".$itemBits[1]."'";
$result = $mysqli->query($sql);
$numItems = $result->num_rows;
//if there are employees in the users table 
if ($numItems > 0){
  while($row = $result->fetch_assoc()){
    $id = $row['id'];
    $name  = $row['name'];
    $category  = $row['category'];
    $brand = $row['brand'];
    $inStock  = $row['inStock'];
    $description  = $row['description'];
    $sellPrice  = $row['sellPrice'];
    $salePrice  = $row['salePrice'];
    $itemHash = $row['itemHash'];
    $categories = explode("| ", $category);
    $actualCategories = array();
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

    $nameString = "";
    if (strpos($name, '|') !== false){ //it  has a |
      $names = explode("|", $name);
      if (sizeof($names) == 3) {
        $nameString = $names[0] . '<br>' . $names[1] . '<br>' . $names[2];
      }
      elseif (sizeof($names) == 2) {
        $nameString = $names[0] . '<br>' . $names[1];
      }
      else{
        $nameString = $names[0];
      }
    }
    else{
      $nameString = $name;
    }
  }
}

if ($brand != '') {
  $sql = "SELECT * FROM brands WHERE id='".$brand."'";
  $resultBrand = $mysqli->query($sql);
  $numBrands = $resultBrand->num_rows;
  if ($numBrands > 0){
    while($row = $resultBrand->fetch_assoc()){
      $brand=$row['brand'];
    }
  }
}

//OBTAINING THE ITEM IMAGES
$itemImages = array(); //initialize array
$dir = new DirectoryIterator('images/items/'.$itemHash.'_'.$id); //create directory iterator
foreach($dir as $file){ //loop through iterator
  $fileBits = explode(".",$file);
  if($fileBits[1]=="jpg" || $fileBits[1]=="jpeg" || $fileBits[1]=="png"){ //confirm that item is image
    array_push($itemImages, 'images/items/'.$itemHash.'_'.$id.'/'.$file);
  }
}

if (sizeof($itemImages) > 0) {
  $ogPath = $itemImages[0];
}


?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Item #<?php echo $id;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css" id="main-styles-link">
    <link rel="stylesheet" href="css/custom.css" id="main-styles-link">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <?php
      echo'
        <meta property="og:type" content="website" /> 
        <meta property="og:url" content="http://www.mjyintl.com/Good_Grocery_Template/viewItem.php?Item='.$itemHash.'_'.$id.'"> 
        <meta property="og:title" content="'.$name.'" /> 
        <meta property="og:image" content="'.$ogPath.'" /> 
        <meta property="og:description" content="'.$description.'" />
      ';
    ?>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-bell">
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="100px" data-xxl-stick-up-offset="100px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="index.html"><img class="brand-logo-dark" src="images/logo-default-249x52.png" alt="" width="249" height="52"/><img class="brand-logo-light" src="images/logo-inverse-249x52.png" alt="" width="249" height="52"/></a>
                  </div>
                </div>
                <div class="rd-navbar-nav-wrap">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Home</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="#">Pages</a>
                      <!-- RD Navbar Dropdown-->
                      <ul class="rd-menu rd-navbar-dropdown">
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="about-us.html">About Us</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="what-we-offer.html">What We Offer</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="our-team.html">Our Team</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="testimonials.html">Testimonials</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="pricing-list.html">Pricing List</a></li>
                      </ul>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="grid-blog.html">Blog</a>
                      <!-- RD Navbar Dropdown-->
                      <ul class="rd-menu rd-navbar-dropdown">
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="grid-blog.html">Grid Blog</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="blog-list.html">Blog List</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="blog-post.html">Blog Post</a></li>
                      </ul>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="grid-gallery.html">Gallery</a>
                      <!-- RD Navbar Dropdown-->
                      <ul class="rd-menu rd-navbar-dropdown">
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="grid-gallery.html">Grid Gallery</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="grid-fullwidth-gallery.html">Grid Fullwidth Gallery</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="masonry-gallery.html">Masonry Gallery</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="masonry-fullwidth-gallery.html">Masonry Fullwidth Gallery</a></li>
                      </ul>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="#">Elements</a>
                      <!-- RD Navbar Megamenu-->
                      <ul class="rd-menu rd-navbar-megamenu">
                        <li class="rd-megamenu-item">
                          <div class="rd-megamenu-title"><span class="rd-megamenu-icon mdi mdi-apps"></span><span class="rd-megamenu-text">Elements</span></div>
                          <ul class="rd-megamenu-list rd-megamenu-list-2">
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="typography.html">Typography</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="icon-lists.html">Icon lists</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="progress-bars.html">Progress bars</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="calls-to-action.html">Calls to action</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="tabs-and-accordions.html">Tabs &amp; accordions</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="buttons.html">Buttons</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="tables.html">Tables</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="forms.html">Forms</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="counters.html">Counters</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="grid-system.html">Grid system</a></li>
                          </ul>
                        </li>
                        <li class="rd-megamenu-item flex-grow-1 flex-shrink-0">
                          <div class="rd-megamenu-title"><span class="rd-megamenu-icon mdi mdi-layers"></span><span class="rd-megamenu-text">Additional pages</span></div>
                          <ul class="rd-megamenu-list">
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="404-page.html">404 Page</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="coming-soon.html">Coming Soon</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="contact-us.html">Contact Us</a></li>
                            <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="privacy-policy.html">Privacy Policy</a></li>
                          </ul>
                        </li>
                        <li class="rd-megamenu-item rd-megamenu-banner">
                          <div class="rd-megamenu-title"><span class="rd-megamenu-icon mdi mdi-carrot"></span><span class="rd-megamenu-text">Welcome to Our Store</span></div><a class="banner-classic" href="grid-shop.html"><img src="images/banner-1-300x202.jpg" alt="" width="300" height="202"/></a>
                        </li>
                      </ul>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="grid_shop.php">Shop</a>
                    </li>
                  </ul>
                </div>
                <div class="rd-navbar-main-element">
                  <!-- RD Navbar Search-->
                  <div class="rd-navbar-search rd-navbar-search-2">
                    <button class="rd-navbar-search-toggle rd-navbar-fixed-element-3" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                    <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                      <div class="form-wrap">
                        <label class="form-label" for="rd-navbar-search-form-input">Search...</label>
                        <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                        <div class="rd-search-results-live" id="rd-search-results-live"></div>
                        <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                      </div>
                    </form>
                  </div>
                  <!-- RD Navbar Basket-->
                  <div class="rd-navbar-basket-wrap">
                    <button class="rd-navbar-basket fl-bigmug-line-shopping202" data-rd-navbar-toggle=".cart-inline"><span>2</span></button>
                    <div class="cart-inline">
                      <div class="cart-inline-header">
                        <h5 class="cart-inline-title">In cart:<span> 2</span> Products</h5>
                        <h6 class="cart-inline-title">Total price:<span> $43</span></h6>
                      </div>
                      <div class="cart-inline-body">
                        <div class="cart-inline-item">
                          <div class="unit unit-spacing-sm align-items-center">
                            <div class="unit-left"><a class="cart-inline-figure" href="single-product.html"><img src="images/product-mini-6-100x90.png" alt="" width="100" height="90"/></a></div>
                            <div class="unit-body">
                              <h6 class="cart-inline-name"><a href="single-product.html">Oranges</a></h6>
                              <div>
                                <div class="group-xs group-middle">
                                  <div class="table-cart-stepper">
                                    <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>
                                  </div>
                                  <h6 class="cart-inline-title">$20.00</h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="cart-inline-item">
                          <div class="unit unit-spacing-sm align-items-center">
                            <div class="unit-left"><a class="cart-inline-figure" href="single-product.html"><img src="images/product-mini-7-100x90.png" alt="" width="100" height="90"/></a></div>
                            <div class="unit-body">
                              <h6 class="cart-inline-name"><a href="single-product.html">Bananas</a></h6>
                              <div>
                                <div class="group-xs group-middle">
                                  <div class="table-cart-stepper">
                                    <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>
                                  </div>
                                  <h6 class="cart-inline-title">$23.00</h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="cart-inline-footer">
                        <div class="group-sm"><a class="button button-default-outline-2 button-zakaria" href="cart-page.html">Go to cart</a><a class="button button-primary button-zakaria" href="checkout.html">Checkout</a></div>
                      </div>
                    </div>
                  </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping202 rd-navbar-fixed-element-2" href="cart-page.html"><span>2</span></a>
                  <button class="rd-navbar-project-hamburger rd-navbar-project-hamburger-open rd-navbar-fixed-element-1" type="button" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate"><span class="project-hamburger"><span class="project-hamburger-line"></span><span class="project-hamburger-line"></span><span class="project-hamburger-line"></span><span class="project-hamburger-line"></span></span></button>
                </div>
                <div class="rd-navbar-project">
                  <div class="rd-navbar-project-header">
                    <button class="rd-navbar-project-hamburger rd-navbar-project-hamburger-close" type="button" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate><span class="project-close"><span></span><span></span></span></button>
                    <h5 class="rd-navbar-project-title">Our Contacts</h5>
                  </div>
                  <div class="rd-navbar-project-content">
                    <div>
                      <div>
                        <!-- Owl Carousel-->
                        <div class="owl-carousel" data-items="1" data-dots="true" data-autoplay="true"><img src="images/about-5-350x269.jpg" alt="" width="350" height="269"/><img src="images/about-6-350x269.jpg" alt="" width="350" height="269"/><img src="images/about-7-350x269.jpg" alt="" width="350" height="269"/>
                        </div>
                        <ul class="contacts-modern">
                          <li><a href="#">523 Sylvan Ave, 5th Floor<br>Mountain View, CA 94041 USA</a></li>
                          <li><a href="tel:#">+1 (844) 123 456 78</a></li>
                        </ul>
                      </div>
                      <div>
                        <ul class="list-inline list-social list-inline-xl">
                          <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                          <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                          <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                          <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class="breadcrumbs-custom">
        <div class="parallax-container" data-parallax-img="images/breadcrumbs-bg.jpg">
          <div class="breadcrumbs-custom-body parallax-content context-dark darken-overlay">
            <div class="container">
              <h2 class="breadcrumbs-custom-title"><?php echo $names[0];?></h2>
            </div>
          </div>
        </div>
        <div class="breadcrumbs-custom-footer">
          <div class="container">
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Home</a></li>
              <li><a href="grid_shop.php">Shop</a></li>
              <li class="active">Single Product</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Single Product-->
      <section class="section section-sm section-first bg-default viewItemSection ">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-6 col-lg-5 ml-lg-auto">
              <div class="d-md-none">
                <h3 class="text-transform-none font-weight-medium mb-3">
                  <?php 
                    echo $nameString;
                    // $names = explode("&nbsp;&nbsp;|&nbsp;&nbsp;", $nameString);
                    // echo $names[0].'<br>'.$names[1];
                  ?>  
                </h3>
                <?php
                  if ($salePrice != 0.00 && $salePrice != NULL) {
                    echo  '<div class="product-price product-price-old">$'.$sellPrice.' &nbsp;</div>';
                  }
                ?>
                <?php
                  if ($salePrice != 0.00 && $salePrice != NULL) {
                    echo '<div class="single-product-price">$'.$salePrice.'</div>';
                  }else{
                    echo '<div class="single-product-price">$'.$sellPrice.'</div>';
                  }
                ?>
                <p class="mt-3"><?php echo $description ?></p>
                <ul class="list list-description text-center mt-3">
                  <?php
                    if (sizeof($actualCategories) > 0) {
                      echo '
                        <li><span>Category:</span>
                        <span>
                      ';
                      if (sizeof($actualCategories) > 1) {
                        for($i=0; $i<sizeof($actualCategories)-1; $i++){
                          echo $actualCategories[$i]. ", ";
                        }
                        echo $actualCategories[sizeof($actualCategories)-1];
                      }
                      else{
                        foreach ($actualCategories as $category) {
                          echo $category;
                        }
                      }
                    }
                    echo'
                      </span>
                      </li>
                    ';
                  ?>   
                  <?php
                  if ($brand != "" && $brand != "None") {
                    echo '
                      <li><span>Brand:</span>
                        <span>'
                        .$brand.
                        '</span>
                      </li>
                    ';
                  }
                  ?>
                </ul>
                <hr class="hr-gray-100 mt-3 mb-3">
              </div>
              <div class="slick-vertical slick-product">
                <!-- Slick Carousel-->
                <div class="slick-slider carousel-parent" id="carousel-parent" data-items="1" data-swipe="true" data-child="#child-carousel" data-for="#child-carousel">
                  <?php 
                    foreach ($itemImages as $image) {
                      echo '
                      <div class="item">
                        <div class="slick-product-figure"><img src="'.$image.'" alt="'.$name.'" width="530" height="480"/>
                        </div>
                      </div>
                      ';
                    }
                  ?>
                </div>
                <div class="slick-slider child-carousel slick-nav-1" id="child-carousel" data-arrows="true" data-items="3" data-sm-items="3" data-md-items="3" data-lg-items="3" data-xl-items="3" data-xxl-items="3" data-md-vertical="true" data-for="#carousel-parent">
                  <?php
                    foreach ($itemImages as $image) {
                      echo'
                      <div class="item">
                        <div class="slick-product-figure"><img src="'.$image.'" alt="'.$name.'" width="530" height="480"/>
                        </div>
                      </div>
                      ';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 mr-lg-auto">
              <div class="single-product">
                <div class="d-none d-md-block">
                  <h3 class="text-transform-none font-weight-medium">
                    <?php 
                      echo $nameString;
                    ?>  
                  </h3>
                  <?php
                    if ($salePrice != 0.00 && $salePrice != NULL) {
                      echo  '<div class="product-price product-price-old">$'.$sellPrice.' &nbsp;</div>';
                    }
                  ?>
                  <div class="group-md group-middle">
                    <?php
                      if ($salePrice != 0.00 && $salePrice != NULL) {
                        echo '<div class="single-product-price">$'.$salePrice.'</div>';
                      }else{
                        echo '<div class="single-product-price">$'.$sellPrice.'</div>';
                      }
                    ?>
                  </div>
                  <p class="mt-2"><?php echo $description ?></p>
                  <ul class="list list-description mt-2 mb-2">
                    <?php
                      if (sizeof($actualCategories) > 0) {
                        echo '
                          <li><span>Category:</span>
                          <span>
                        ';
                        if (sizeof($actualCategories) > 1) {
                          for($i=0; $i<sizeof($actualCategories)-1; $i++){
                            echo $actualCategories[$i]. ", ";
                          }
                          echo $actualCategories[sizeof($actualCategories)-1];
                        }
                        else{
                          foreach ($actualCategories as $category) {
                            echo $category;
                          }
                        }
                      }
                      echo'
                        </span>
                        </li>
                      ';
                    ?>     
                    <?php
                    if ($brand != "" && $brand != "None") {
                      echo '
                        <li><span>Brand:</span>
                          <span>'
                          .$brand.
                          '</span>
                        </li>
                      ';
                    }
                    ?>
                  </ul>
                  <hr class="hr-gray-100">
                </div>
                <div class="group-xs group-middle mt-4">
                  <div class="product-stepper">
                    <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">
                  </div>
                  <div><a class="button button-lg button-primary button-zakaria" href="cart-page.html">Add to cart</a></div>
                </div>
                <hr class="hr-gray-100 mt-4">
                <div class="group-xs group-middle"><span class="list-social-title">Share</span>
                  <div>
                    <ul class="list-inline list-social list-inline-sm">
                      <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                      <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                      <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                      <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 mt-4">
              <h4 class="font-weight-sbold">Related Products</h4>
              <div class="row row-lg row-30 row-lg-50 justify-content-center">
                <?php
                  getRelatedProducts($id);
                ?>
              </div>
            </div>
            <div class="col-11 col-md-9 mx-auto">
              <h4 class="text-transform-none font-weight-medium mt-5 d-none d-md-block">Have a question about this product?</h4>
              <h4 class="text-transform-none font-weight-medium mt-5 d-md-none">Have a question?</h4>
              <form class="rd-form rd-mailform" method="post" action="questionAboutProduct.php">
                <div class="row row-20 row-md-30">
                  <div class="col-lg-8">
                    <div class="row row-20 row-md-30">
                      <div class="col-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="contact-first-name-2" type="text" name="name" required>
                          <label class="form-label" for="contact-first-name-2">First Name</label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="contact-last-name-2" type="text" name="name" required>
                          <label class="form-label" for="contact-last-name-2">Last Name</label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="contact-email-2" type="email" name="email" required>
                          <label class="form-label" for="contact-email-2">E-mail</label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="contact-phone-2" type="text" name="phone" required>
                          <label class="form-label" for="contact-phone-2">Phone</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-message-2">Question</label>
                      <textarea class="form-input textarea-lg" id="contact-message-2" name="message"></textarea>
                    </div>
                  </div>
                </div>
                <button class="button button-lg button-secondary button-zakaria" type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!-- Page Footer-->
      <footer class="section footer-classic">
        <div class="footer-classic-body section-lg">
          <div class="container">
            <div class="row row-40 row-md-50 justify-content-xl-between">
              <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInRight">
                <div class="footer-classic-brand"><a class="brand" href="index.html"><img class="brand-logo-dark" src="images/logo-default-249x52.png" alt="" width="249" height="52"/><img class="brand-logo-light" src="images/logo-inverse-249x52.png" alt="" width="249" height="52"/></a>
                </div>
                <ul class="list-schedule">
                  <li><span>Weekdays:</span><span>08:00am - 08:00pm</span></li>
                  <li><span>Weekends:</span><span>10:00am - 06:00pm</span></li>
                </ul>
                <div class="footer-classic-social">
                  <div class="group-lg group-middle">
                    <p>Get Social</p>
                    <div>
                      <ul class="list-inline list-social list-inline-sm">
                        <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                        <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                        <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                        <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".1s">
                <h4 class="footer-classic-title">Contacts</h4>
                <ul class="contacts-creative">
                  <li>
                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                      <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                      <div class="unit-body"><a href="#">523 Sylvan Ave, 5th Floor<br/>Mountain View, CA 94041 USA</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                      <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                      <div class="unit-body"><a href="tel:#">+1 (844) 123 456 78</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                      <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                      <div class="unit-body"><a href="mailto:#">info@demolink.org</a></div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-lg-4 wow fadeInRight" data-wow-delay=".2s">
                <h4 class="footer-classic-title">Newsletter</h4>
                <p>Subscribe to our newsletter to receive weekly news, updates, special offers, and exclusive discounts.</p>
                <!-- RD Mailform-->
                <form class="rd-form rd-mailform rd-form-inline rd-form-inline-2" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                  <div class="form-wrap">
                    <input class="form-input" id="subscribe-form-2-email" type="email" name="email" data-constraints="@Email @Required"/>
                    <label class="form-label" for="subscribe-form-2-email">Enter your e-mail</label>
                  </div>
                  <div class="form-button">
                    <button class="button button-icon-2 button-zakaria button-primary" type="submit"><span class="fl-bigmug-line-paper122"></span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-classic-panel">
          <div class="container">
            <div class="row row-10 align-items-center justify-content-sm-between">
              <div class="col-md-auto">
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>Grocmart</span><span>.&nbsp;</span><span>All rights reserved</span>. Design&nbsp;by&nbsp;<a href="https://zemez.io/">Zemez</a></p>
              </div>
              <div class="col-md-auto order-md-1"><a href="privacy-policy.html">Privacy Policy</a></div>
              <div class="col-md-auto">
                <div class="group-sm group-middle"><img src="images/payment-1-45x15.png" alt="" width="45" height="15"/><img src="images/payment-2-46x28.png" alt="" width="46" height="28"/><img src="images/payment-3-62x17.png" alt="" width="62" height="17"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <!-- coded by Drel-->
  </body>
</html>

<?php
//Function that gets 4 related products
function getRelatedProducts($itemId){
  global $mysqli;
  $relatedProductArray = array();
  $sql = 'SELECT * FROM items WHERE id='.$itemId;
  $result = $mysqli->query($sql);
  $numItems = $result->num_rows;
  if ($numItems == 1){
    $item = $result->fetch_assoc();
    $categories = explode("| ", $item['category']);
    for($i=0; $i<sizeof($categories); $i++){
      //CHECK FOR ITEMS IN SIMILAR CATEGORIES FIRST
      $sql="SELECT * FROM items WHERE category LIKE '" .$categories[$i]. "| ' AND id !='".$itemId."'";
      $result = $mysqli->query($sql);
      $numItems = $result->num_rows;
      if ($numItems > 0){
        if ( $result->num_rows > 0 ) {
          while($row = $result->fetch_assoc()){
            if (!in_array($row, $relatedProductArray)) {
              array_push($relatedProductArray, $row);              
            }
            if (sizeof($relatedProductArray) == 4) {
              displayRelatedProducts($relatedProductArray);
            }
          }
        }
      }
    }
    //CHECK FOR ITEMS IN SIMILAR BRANDS NEXT
    if ($item['brand']!='None' && $item['brand']!='') {
      $sql="SELECT * FROM items WHERE brand='" .$item['brand']."' AND id !='".$itemId."'";
      $result = $mysqli->query($sql);
      $numItems = $result->num_rows;
      if ($numItems > 0){
        if ( $result->num_rows > 0 ) {
          while($row = $result->fetch_assoc()){
            if (!in_array($row, $relatedProductArray)) {
              array_push($relatedProductArray, $row);              
            }
            if (sizeof($relatedProductArray) == 4) {
              displayRelatedProducts($relatedProductArray);
            }
          }
        }
      }
    }
    $sql="SELECT * FROM items WHERE bestSeller='1' AND id !='".$itemId."' ORDER BY name DESC";
    $result = $mysqli->query($sql);
    $numItems = $result->num_rows;
    if ($numItems > 0){
      if ( $result->num_rows > 0 ) {
        while($row = $result->fetch_assoc()){
          if (!in_array($row, $relatedProductArray)) {
            array_push($relatedProductArray, $row);              
          }
          if (sizeof($relatedProductArray) == 4) {
            displayRelatedProducts($relatedProductArray);
          }
        }
      }
    }
    $sql="SELECT * FROM items WHERE salePrice!='0.00' AND id !='".$itemId."' ORDER BY name DESC";
    $result = $mysqli->query($sql);
    $numItems = $result->num_rows;
    if ($numItems > 0){
      if ( $result->num_rows > 0 ) {
        while($row = $result->fetch_assoc()){
          if (!in_array($row, $relatedProductArray)) {
            array_push($relatedProductArray, $row);              
          }
          if (sizeof($relatedProductArray) == 4) {
            displayRelatedProducts($relatedProductArray);
          }
        }
      }
    }
  }
}

//function that displays 4 related products
function displayRelatedProducts($relatedProductArray){
  for($i=0; $i<=3; $i++){
    $itemImages = array(); //initialize array
    $dir = new DirectoryIterator('images/items/'.$relatedProductArray[$i]['itemHash'].'_'.$relatedProductArray[$i]['id']); //create directory iterator
    foreach($dir as $file){ //loop through iterator
      $fileBits = explode(".",$file);
      if($fileBits[1]=="jpg" || $fileBits[1]=="jpeg" || $fileBits[1]=="png"){ //confirm that item is image
        array_push($itemImages, 'images/items/'.$relatedProductArray[$i]['itemHash'].'_'.$relatedProductArray[$i]['id'].'/'.$file);
      }
    }
    if (sizeof($itemImages) > 0) {
      $ogPath = $itemImages[0];
    }
    if (sizeof($itemImages)>1) {
      $path2=$itemImages[1];
    }else{$path2=$ogPath;}
    echo '
    <div class="col-6 col-md-5 col-lg-3 col-xl-2">
      <!-- Product-->
      <article class="product pb-3">
        <div class="product-body">
        <a href="viewItem.php?Item='.$relatedProductArray[$i]['itemHash'].'_'.$relatedProductArray[$i]['id'].'">
          <div class="product-figure"><img src="'.$ogPath.'" alt="" onmouseover="this.src=\''.$path2.'\';" onmouseout="this.src=\''.$ogPath.'\';" />
          </div>';
          $nameString = "";
          if (strpos($relatedProductArray[$i]['name'], '|') !== false){ //it  has a |
            $names = explode("|", $relatedProductArray[$i]['name']);
            if (sizeof($names) == 3) {
              $nameString = $names[0] . '<br>' . $names[1] . '<br>' . $names[2];
            }
            elseif (sizeof($names) == 2) {
              $nameString = $names[0] . '<br>' . $names[1];
            }
            else{
              $nameString = $names[0];
            }
          }
          else{
            $nameString = $relatedProductArray[$i]['name'];
          }
          echo'<h5 class="product-title">'.$nameString.'</h5>
          <div class="product-price-wrap">';
              if ($relatedProductArray[$i]['salePrice'] != 0.00 && $relatedProductArray[$i]['salePrice'] != NULL) {
                echo  '<div class="product-price product-price-old">$'.$relatedProductArray[$i]['sellPrice'].' &nbsp;</div>';
              }
              if ($relatedProductArray[$i]['salePrice'] != 0.00 && $relatedProductArray[$i]['salePrice'] != NULL) {
                echo '<div class="product-price">$'.$relatedProductArray[$i]['salePrice'].'</div>';
              }else{
                echo '<div class="product-price">$'.$relatedProductArray[$i]['sellPrice'].'</div>';
              }
    echo' </div>
        </a>
        </div>';
        if ($relatedProductArray[$i]['salePrice'] != '0.00' && $relatedProductArray[$i]['bestSeller'] == '0') {
          echo'<span class="product-badge product-badge-sale">Sale</span>';
        }
        elseif ($relatedProductArray[$i]['salePrice'] == '0.00' && $relatedProductArray[$i]['bestSeller'] == '1') {
          echo'<span class="product-badge product-badge-new">Best Seller</span>';
        }
        elseif ($relatedProductArray[$i]['bestSeller'] == '1' && $relatedProductArray[$i]['salePrice'] != '0.00') {
          echo'<span class="product-badge product-badge-sale" style="margin-top:30px;">Sale</span>';
          echo'<span class="product-badge product-badge-new">Best Seller</span>';
        }
    echo' <div class="product-button-wrap">
            <div class="product-button"><a class="button button-secondary button-zakaria fl-bigmug-line-search74" href="viewItem.php?Item='.$relatedProductArray[$i]['itemHash'].'_'.$relatedProductArray[$i]['id'].'"></a></div>
            <div class="product-button"><a class="button button-primary button-zakaria fl-bigmug-line-shopping202" href="cart-page.html"></a></div>
          </div>
      </article>
    </div>
    ';   
  }
}

?>