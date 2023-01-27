<?php
require ("php/db.php");
require("php/functions.php");

session_start();

if (isset($_GET['cart'])) {
  $cart = $_GET['cart'];
  $cartCount=sizeof(explode(',', $cart));
  $cartURL = '&cart='.$cart;
}else{
  $cart='';
  $cartCount=0;
  $cartURL = '&cart=';
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>About Us</title>
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
                  <div class="rd-navbar-brand">
                    <?php
                      echo'
                        <a class="brand" href="index.php?'.$cartURL.'"><img class="brand-logo-dark" src="images/Logo1.png" alt="" height="52"/><img class="brand-logo-light" src="images/Logo1.png" alt="" width="249" height="52"/>
                        </a>
                      ';
                    ?>
                  </div>
                </div>
                <div class="rd-navbar-nav-wrap">
                  <!-- RD Navbar Nav-->
                  <?php
                    echo'
                      <ul class="rd-navbar-nav">
                        <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?'.$cartURL.'">Home</a>
                        </li>
                        <li class="rd-nav-item active"><a class="rd-nav-link" href="#">About</a>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="grid_shop.php?'.$cartURL.'">Shop</a>
                          <ul class="rd-menu rd-navbar-megamenu px-1">
                            <li class="rd-megamenu-item">
                              <div class="rd-megamenu-title"><span class="rd-megamenu-text">Categories</span></div>
                              <ul class="rd-megamenu-list rd-megamenu-list-2">';
                                  $sql = "SELECT DISTINCT * FROM categories ORDER BY category";
                                  $result = $mysqli->query($sql);
                                  $numRows = $result->num_rows;
                                  if ($numRows > 0){ //They have pending attendance
                                    while($row = $result->fetch_assoc()){
                                      echo '
                                        <li class="rd-megamenu-list-item mt-1"><a class="rd-megamenu-list-link" href="grid_shop.php?category='.$row['id'].$cartURL.'">'.$row['category'].'</a></li>
                                      ';
                                    }
                                  }
                         echo'</ul>
                            </li>
                            <li class="rd-megamenu-item pl-0">
                              <div class="rd-megamenu-title"><span class="rd-megamenu-text">Brand Names</span></div>
                              <ul class="rd-megamenu-list rd-megamenu-list-3">';
                                  $sql = "SELECT DISTINCT * FROM brands ORDER BY brand";
                                  $result = $mysqli->query($sql);
                                  $numRows = $result->num_rows;
                                  if ($numRows > 0){ //They have pending attendance
                                    while($row = $result->fetch_assoc()){
                                      echo '
                                        <li class="rd-megamenu-list-item mt-1"><a class="rd-megamenu-list-link" href="grid_shop.php?brandName='.$row['id'].$cartURL.'">'.$row['brand'].'</a></li>
                                      ';
                                    }
                                  }
                         echo'</ul>
                            </li>
                          </ul>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.php?'.$cartURL.'">Contact</a></li>
                      </ul>
                    ';
                  ?>
                </div>
                <div class="rd-navbar-main-element">
                  <!-- RD Navbar Search-->
                  <div class="rd-navbar-search rd-navbar-search-2">
                    <button class="rd-navbar-search-toggle rd-navbar-fixed-element-3" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                    <form class="rd-search form-search mb-3" action="grid_shop.php" method="GET">
                      <div class="form-wrap">
                        <label class="form-label" for="rd-navbar-search-form-input">Search...</label>
                        <?php
                          echo '<input type="hidden" name="cart" value="'.$cart.'">';
                        ?>
                        <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="search" autocomplete="off"/>
                        <div class="rd-search-results-live" id="rd-search-results-live"></div>
                        <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                      </div>
                    </form>
                  </div>
                  <!-- RD Navbar Basket-->
                  <?php echo displayCart($cart) ?>
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
              <h2 class="breadcrumbs-custom-title">United Food Delicacies LLC</h2>
              <h4 style=" letter-spacing: .05em;font-family: 'Kalam', cursive; text-transform: none;">Serving the International Grocery Store Community since 1986.</h4>
            </div>
          </div>
        </div>
        <div class="breadcrumbs-custom-footer">
          <div class="container">
            <ul class="breadcrumbs-custom-path">
              <?php
              echo'
                <li><a href="index.php?'.$cartURL.'">Home</a></li>
                <li class="active">About Us</li>
              ';
              ?>
            </ul>
          </div>
        </div>
      </section>
      <!-- Section About-->
      <section class="section section-xl bg-default text-md-left">
        <div class="container">
          <div class="row row-40 row-md-60 justify-content-center align-items-xl-center">
            <div class="col-md-11 col-lg-6 col-xl-5">
              <!-- Quote Classic Big-->
              <article class="quote-classic-big inset-xl-right-30">
                <div class="heading-3 quote-classic-big-text">
                  <div class="q">A Few words About Us</div>
                </div>
              </article>
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">
                <!-- Nav tabs-->
                <div class="nav-tabs-wrap">
                  <ul class="nav nav-tabs">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">About</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Our mission</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">Our goals</a></li>
                  </ul>
                </div>
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-1-1">
                    <p>Cum nomen prarere, omnes peses amor pius, rusticus racanaes. Ubi est mirabilis gemna? Cum gabalium velum, omnes fugaes</p>
                    <p>Ubi est peritus devatio? A falsis, adelphis peritus apolloniates. Est raptus clabulare, cesaris. Cum pulchritudine manducare, omnes genetrixes captis bassus</p>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-2">
                    <p>Vae. Dexter fiscina aliquando vitares animalis est. Nunquam convertam bulla. Cum pars prarere, omnes seculaes</p>
                    <p>Navis dexter historia est. Luba, homo, et indictio. Emeritis eposs ducunt ad animalis. Cum solem assimilant, omnes byssuses vitare clemens, secundus nixuses.</p>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-3">
                    <p>A falsis, historia primus gallus. Est bassus tabes, cesaris. Gallus de mirabilis agripeta, locus mens! Primus ratione</p>
                    <p>Cur eleates accelerare? Heu. Ecce, superbus onus! Demolitione secundus homo est. Cum cacula congregabo, omnes coordinataees acquirere dexter, flavum galataees.</p>
                  </div>
                </div>
              </div><a class="button button-lg button-shadow-2 button-secondary button-zakaria" href="#">Read more</a>
            </div>
            <div class="col-md-11 col-lg-6 col-xl-7">
              <div class="slick-slider-1 inset-xl-left-35">
                <!-- Slick Carousel-->
                <div class="slick-slider carousel-parent" id="carousel-parent" data-items="1" data-autoplay="true" data-slide-effect="true" data-child="#child-carousel" data-for="#child-carousel">
                  <div class="item"><img src="images/about-1-634x373.jpg" alt="" width="634" height="373"/>
                  </div>
                  <div class="item"><img src="images/about-2-634x373.jpg" alt="" width="634" height="373"/>
                  </div>
                  <div class="item"><img src="images/about-3-634x373.jpg" alt="" width="634" height="373"/>
                  </div>
                  <div class="item"><img src="images/about-4-634x373.jpg" alt="" width="634" height="373"/>
                  </div>
                </div>
                <div class="slick-slider child-carousel slick-nav-1" id="child-carousel" data-items="3" data-sm-items="4" data-md-items="4" data-lg-items="4" data-xl-items="4" data-xxl-items="4" data-arrows="true" data-for="#carousel-parent">
                  <div class="item"><img src="images/about-1-143x114.jpg" alt="" width="143" height="114"/>
                  </div>
                  <div class="item"><img src="images/about-2-143x114.jpg" alt="" width="143" height="114"/>
                  </div>
                  <div class="item"><img src="images/about-3-143x114.jpg" alt="" width="143" height="114"/>
                  </div>
                  <div class="item"><img src="images/about-4-143x114.jpg" alt="" width="143" height="114"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section History-->
      <section class="section section-fluid section-xl section-bottom-0 bg-image-2 section-relative">
        <div class="container-fluid">
          <h2 class="text-white">Our History</h2>
          <div class="slick-history">
            <!-- Slick Carousel-->
            <div class="slick-slider carousel-parent" id="carousel-parent-2" data-items="1" data-sm-items="2" data-md-items="2" data-lg-items="3" data-xl-items="3" data-xxl-items="4" data-autoplay="false" data-loop="false">
              <div class="item">
                <div class="box-info-classic">
                  <h4 class="box-info-classic-title">Establishment</h4>
                  <p class="box-info-classic-text">Enim neque volutpat ac tincidunt vitae semper quis lectus nulla. Augue ut lectus arcu bibendum at varius vel pharetra vel.</p>
                </div>
              </div>
              <div class="item">
                <div class="box-info-classic">
                  <h4 class="box-info-classic-title">First Partnership</h4>
                  <p class="box-info-classic-text">Nec sagittis aliquam malesuada bibendum arcu vitae elementum. Ut morbi tincidunt augue interdum. Id ornare arcu odio ut.</p>
                </div>
              </div>
              <div class="item">
                <div class="box-info-classic">
                  <h4 class="box-info-classic-title">Launching the Website</h4>
                  <p class="box-info-classic-text">Amet purus gravida quis blandit turpis. Sed euismod nisi porta lorem mollis aliquam ut aliquam malesuada mauris turpis.</p>
                </div>
              </div>
              <div class="item">
                <div class="box-info-classic">
                  <h4 class="box-info-classic-title">Opening New Stores</h4>
                  <p class="box-info-classic-text">Egestas purus viverra accumsan in nisl nisi scelerisque. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper.</p>
                </div>
              </div>
              <div class="item">
                <div class="box-info-classic">
                  <h4 class="box-info-classic-title">Celebrating 20 Years</h4>
                  <p class="box-info-classic-text">Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Risus feugiat in ante metus dictum at nisi lacus sed.</p>
                </div>
              </div>
            </div>
            <div class="slick-slider child-carousel" data-items="1" data-sm-items="2" data-md-items="2" data-lg-items="3" data-xl-items="3" data-xxl-items="4" data-arrows="true" data-for="#carousel-parent-2" data-loop="false" data-focus-select="false">
              <div class="item">
                <div class="heading-5 box-info-classic-year">1999</div>
              </div>
              <div class="item">
                <div class="heading-5 box-info-classic-year">2003</div>
              </div>
              <div class="item">
                <div class="heading-5 box-info-classic-year">2007</div>
              </div>
              <div class="item">
                <div class="heading-5 box-info-classic-year">2015</div>
              </div>
              <div class="item">
                <div class="heading-5 box-info-classic-year">2019</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Our team-->
      <section class="section section-xl bg-default">
        <div class="container">
          <h2>Our team</h2>
          <!-- Owl Carousel-->
          <div class="owl-carousel" data-items="1" data-sm-items="2" data-md-items="3" data-margin="30" data-dots="true" data-autoplay="true">
            <article class="team-classic"><a class="team-classic-figure" href="#"><img src="images/team-1-367x334.jpg" alt="" width="367" height="334"/></a>
              <h4 class="team-classic-name"><a href="#">Richard Ferrand</a></h4>
              <p class="team-classic-text">Posuere morbi leo urna molestie at elementum. Nibh sed pulvinar.</p>
              <ul class="list-inline team-classic-list-social list-social-2 list-inline-sm">
                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
              </ul>
            </article>
            <article class="team-classic"><a class="team-classic-figure" href="#"><img src="images/team-2-367x334.jpg" alt="" width="367" height="334"/></a>
              <h4 class="team-classic-name"><a href="#">Rebecca Martinez</a></h4>
              <p class="team-classic-text">Massa massa ultricies mi quis. Cras semper auctor neque vitae.</p>
              <ul class="list-inline team-classic-list-social list-social-2 list-inline-sm">
                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
              </ul>
            </article>
            <article class="team-classic"><a class="team-classic-figure" href="#"><img src="images/team-3-370x334.jpg" alt="" width="370" height="334"/></a>
              <h4 class="team-classic-name"><a href="#">Peter Johnson</a></h4>
              <p class="team-classic-text">Sed viverra ipsum nunc aliquet bibendum enim vestibulum sed.</p>
              <ul class="list-inline team-classic-list-social list-social-2 list-inline-sm">
                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
              </ul>
            </article>
            <article class="team-classic"><a class="team-classic-figure" href="#"><img src="images/team-15-370x334.jpg" alt="" width="370" height="334"/></a>
              <h4 class="team-classic-name"><a href="#">Martin Wilson</a></h4>
              <p class="team-classic-text">Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit.</p>
              <ul class="list-inline team-classic-list-social list-social-2 list-inline-sm">
                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
              </ul>
            </article>
            <article class="team-classic"><a class="team-classic-figure" href="#"><img src="images/team-20-370x334.jpg" alt="" width="370" height="334"/></a>
              <h4 class="team-classic-name"><a href="#">Caroline Lopez</a></h4>
              <p class="team-classic-text">Posuere morbi leo urna molestie at elementum sed gravida hendrerit.</p>
              <ul class="list-inline team-classic-list-social list-social-2 list-inline-sm">
                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
              </ul>
            </article>
            <article class="team-classic"><a class="team-classic-figure" href="#"><img src="images/team-17-370x334.jpg" alt="" width="370" height="334"/></a>
              <h4 class="team-classic-name"><a href="#">Will Mcmillan</a></h4>
              <p class="team-classic-text">Cras semper auctor neque vitae. Donec adipiscing tristique risus nec.</p>
              <ul class="list-inline team-classic-list-social list-social-2 list-inline-sm">
                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
              </ul>
            </article>
          </div>
        </div>
      </section>
      <!-- Counter Modern-->
      <section class="section parallax-container" data-parallax-img="images/parallax-2.jpg">
        <div class="parallax-content section-xxl context-dark darken-overlay">
          <div class="container">
            <div class="row row-30 justify-content-center">
              <div class="col-6 col-sm-3">
                <div class="counter-modern">
                  <h2 class="counter-modern-number"><span class="counter">2</span><span class="symbol">k</span>
                  </h2>
                  <div class="counter-modern-decor"></div>
                  <h5 class="counter-modern-title">Types of foods <br class="d-none d-sm-block"> and drinks</h5>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="counter-modern">
                  <h2 class="counter-modern-number"><span class="counter">382</span>
                  </h2>
                  <div class="counter-modern-decor"></div>
                  <h5 class="counter-modern-title">Special<br class="d-none d-sm-block"> offers</h5>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="counter-modern">
                  <h2 class="counter-modern-number"><span class="counter">1267</span>
                  </h2>
                  <div class="counter-modern-decor"></div>
                  <h5 class="counter-modern-title">Satisfied<br class="d-none d-sm-block"> clients</h5>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="counter-modern">
                  <h2 class="counter-modern-number"><span class="counter">474</span>
                  </h2>
                  <div class="counter-modern-decor"></div>
                  <h5 class="counter-modern-title">Partners in<br class="d-none d-sm-block"> the USA</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials-->
      <section class="section section-xl bg-image-1">
        <div class="container">
          <h2>Testimonials</h2>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-style-1" data-items="1" data-sm-items="2" data-margin="30" data-dots="true" data-autoplay="false">
            <!-- Quote Modern-->
            <article class="quote-modern">
              <div class="quote-modern-text">
                <div class="q">Classis de salvus cursus, convertam galatae! Terror peregrinationes, tanquam audax cedrium. Cum luna prarere, omnes cannabises resuscitabo</div>
              </div>
              <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                <div class="unit-left">
                  <div class="quote-modern-figure"><img src="images/user-10-62x62.jpg" alt="" width="62" height="62"/>
                  </div>
                </div>
                <div class="unit-body">
                  <div class="quote-modern-author">Patrick Goodman</div>
                  <div class="quote-modern-status">Client</div>
                </div>
              </div>
            </article>
            <!-- Quote Modern-->
            <article class="quote-modern">
              <div class="quote-modern-text">
                <div class="q">Genetrixs sunt urbss de flavum navis. Magnum paluss ducunt ad urbs. Cum secula favere, omnes assimilatioes tractare regius, emeritis caculaes.</div>
              </div>
              <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                <div class="unit-left">
                  <div class="quote-modern-figure"><img src="images/user-11-62x62.jpg" alt="" width="62" height="62"/>
                  </div>
                </div>
                <div class="unit-body">
                  <div class="quote-modern-author">Jane Lee</div>
                  <div class="quote-modern-status">Client</div>
                </div>
              </div>
            </article>
            <!-- Quote Modern-->
            <article class="quote-modern">
              <div class="quote-modern-text">
                <div class="q">Zirbus velums, tanquam camerarius byssus. Pol, extum! Abactus varius ausus est. Cum elogium ortum, omnes ignigenaes acquirere altus, pius.</div>
              </div>
              <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                <div class="unit-left">
                  <div class="quote-modern-figure"><img src="images/user-5-62x62.jpg" alt="" width="62" height="62"/>
                  </div>
                </div>
                <div class="unit-body">
                  <div class="quote-modern-author">James Peterson</div>
                  <div class="quote-modern-status">Client</div>
                </div>
              </div>
            </article>
            <!-- Quote Modern-->
            <article class="quote-modern">
              <div class="quote-modern-text">
                <div class="q">Caculas ortum in peritus virundum! Congregabo callide ducunt ad flavum glos. Cum pes mori, omnes caculaes attrahendam rusticus, bi-color. </div>
              </div>
              <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                <div class="unit-left">
                  <div class="quote-modern-figure"><img src="images/user-6-62x62.jpg" alt="" width="62" height="62"/>
                  </div>
                </div>
                <div class="unit-body">
                  <div class="quote-modern-author">Ann McMillan</div>
                  <div class="quote-modern-status">Client</div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>

      <!-- Section Clients-->
      <section class="section section-xl bg-default">
        <div class="container">
          <div class="owl-carousel owl-style-2" data-items="2" data-sm-items="3" data-md-items="4" data-lg-items="5" data-margin="30" data-dots="true"><a class="clients-classic" href="#"><img src="images/clients-6-120x114.png" alt="" width="120" height="114"/></a><a class="clients-classic" href="#"><img src="images/clients-7-105x118.png" alt="" width="105" height="118"/></a><a class="clients-classic" href="#"><img src="images/clients-8-111x98.png" alt="" width="111" height="98"/></a><a class="clients-classic" href="#"><img src="images/clients-9-122x92.png" alt="" width="122" height="92"/></a><a class="clients-classic" href="#"><img src="images/clients-10-112x112.png" alt="" width="112" height="112"/></a></div>
        </div>
      </section>

      <section class="section">
        <!-- RD Google Map-->
        <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-styles="[{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#e9e9e9&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#848944&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#848944&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#dedede&quot;},{&quot;lightness&quot;:21}]},{&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#333333&quot;},{&quot;lightness&quot;:40}]},{&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]}]">
          <div class="google-map"></div>
          <ul class="google-map-markers">
            <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png"></li>
          </ul>
        </div>
      </section>

      <!-- Page Footer-->
      <footer class="section footer-classic">
        <div class="footer-classic-body section-lg">
          <div class="container">
            <div class="row row-40 row-md-50 justify-content-xl-between">
              <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInRight">
                <div class="footer-classic-brand"><a class="brand" href="index.php"><img class="brand-logo-dark footerLogo" src="images/Logo1.png" alt="" height="52"/><img class="brand-logo-light footerLogo" src="images/Logo1.png" alt="" width="249" height="52"/></a>
                </div>
                <ul class="list-schedule mt-2">
                  <li><span>Monday:</span><span>9:30am - 5:30pm</span></li>
                  <li><span>Tuesday:</span><span>9:30am - 5:30pm</span></li>
                  <li><span>Wednesday:</span><span>9:30am - 5:30pm</span></li>
                  <li><span>Thursday:</span><span>9:30am - 5:30pm</span></li>
                  <li><span>Friday:</span><span>9:30am - 5:30pm</span></li>
                </ul>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".1s">
                <h4 class="footer-classic-title">Contact</h4>
                <ul class="contacts-creative">
                  <li>
                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                      <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                      <div class="unit-body"><a href="https://goo.gl/maps/2oiuvLapDMWiomYHA" target="_blank">33457 Western Ave,<br/>Union City, CA 94578 USA</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                      <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                      <div class="unit-body"><a href="tel:+1 (408) 821-1136">+1 (408) 821-1136</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                      <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                      <div class="unit-body"><a href="mailto:admin@ufdelicacies.com" target="_blank">admin@ufdelicacies.com</a></div>
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
              <div class="col-md-auto mx-auto">
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>United Food Delicacies LLC</span><span>.&nbsp;</span><span>All rights reserved</span>.</p>
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