<?php
require ("php/db.php");
session_start();
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Contact Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css" id="main-styles-link">
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
                  <div class="rd-navbar-brand"><a class="brand" href="index.php"><img class="brand-logo-dark" src="images/logo-default-249x52.png" alt="" width="249" height="52"/><img class="brand-logo-light" src="images/logo-inverse-249x52.png" alt="" width="249" height="52"/></a>
                  </div>
                </div>
                <div class="rd-navbar-nav-wrap">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Home</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="about-us.php">About</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="grid_shop.php">Shop</a>
                      <ul class="rd-menu rd-navbar-megamenu">
                        <li class="rd-megamenu-item">
                          <div class="rd-megamenu-title"><span class="rd-megamenu-text">Categories</span></div>
                          <ul class="rd-megamenu-list rd-megamenu-list-2">
                            <?php
                              $sql = "SELECT DISTINCT * FROM categories";
                              $result = $mysqli->query($sql);
                              $numRows = $result->num_rows;
                              if ($numRows > 0){ //They have pending attendance
                                while($row = $result->fetch_assoc()){
                                  echo '
                                    <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="'.$baseURL.'category='.$row['id'].'">'.$row['category'].'</a></li>
                                  ';
                                }
                              }
                            ?>
                          </ul>
                        </li>
                        <li class="rd-megamenu-item pl-0">
                          <div class="rd-megamenu-title"><span class="rd-megamenu-text">Brand Names</span></div>
                          <ul class="rd-megamenu-list rd-megamenu-list-2">
                            <?php
                              $sql = "SELECT DISTINCT * FROM brands";
                              $result = $mysqli->query($sql);
                              $numRows = $result->num_rows;
                              if ($numRows > 0){ //They have pending attendance
                                while($row = $result->fetch_assoc()){
                                  echo '
                                    <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="'.$baseURL.'brandName='.$row['id'].'">'.$row['brand'].'</a></li>
                                  ';
                                }
                              }
                            ?>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="#">Contact</a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="covid-policy.php">Covid-19 Awareness</a></li>
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
              <h2 class="breadcrumbs-custom-title">Contact Us</h2>
            </div>
          </div>
        </div>
        <div class="breadcrumbs-custom-footer">
          <div class="container">
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Home</a></li>
              <li><a href="#">Elements</a></li>
              <li class="active">Contact Us</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Get in touch-->
      <section class="section section-xl bg-default text-md-left">
        <div class="container">
          <div class="title-classic">
            <h3 class="title-classic-title">Get in touch</h3>
            <p class="title-classic-subtitle">We are available 24/7 by fax, e-mail or by phone. You can also use our <br class="d-none d-lg-block">quick contact form to ask a question about our products.</p>
          </div>
          <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
            <div class="row row-20 row-md-30">
              <div class="col-lg-8">
                <div class="row row-20 row-md-30">
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-first-name-2" type="text" name="name" data-constraints="@Required"/>
                      <label class="form-label" for="contact-first-name-2">First Name</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-last-name-2" type="text" name="name" data-constraints="@Required"/>
                      <label class="form-label" for="contact-last-name-2">Last Name</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email-2" type="email" name="email" data-constraints="@Email @Required"/>
                      <label class="form-label" for="contact-email-2">E-mail</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-phone-2" type="text" name="phone" data-constraints="@Numeric"/>
                      <label class="form-label" for="contact-phone-2">Phone</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-wrap">
                  <label class="form-label" for="contact-message-2">Message</label>
                  <textarea class="form-input textarea-lg" id="contact-message-2" name="phone" data-constraints="@Required"></textarea>
                </div>
              </div>
            </div>
            <button class="button button-lg button-secondary button-zakaria" type="submit">Send Message</button>
          </form>
        </div>
      </section>

      <!-- Get in touch-->
      <section class="section section-xl bg-gray-4">
        <div class="container">
          <div class="row row-30 justify-content-center">
            <div class="col-sm-6 col-md-4">
              <h4>Phones</h4>
              <ul class="contacts-classic">
                <li>Office <a href="tel:#">+1 (409) 987–5874</a>
                </li>
                <li>Fax <a href="tel:#">+1 (409) 987–5874</a>
                </li>
              </ul>
            </div>
            <div class="col-sm-6 col-md-4">
              <h4>Address</h4>
              <div class="contacts-classic"><a href="#">523 Sylvan Ave, 5th Floor <br>Mountain View, CA 94041 USA</a></div>
            </div>
            <div class="col-sm-6 col-md-4">
              <h4>E-mails</h4>
              <ul class="contacts-classic">
                <li><a href="mailTo:#">info@demolink.org</a></li>
                <li><a href="mailTo:#">mail@demolink.org</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <!-- RD Google Map-->
        <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-styles="[{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#e9e9e9&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#dedede&quot;},{&quot;lightness&quot;:21}]},{&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#333333&quot;},{&quot;lightness&quot;:40}]},{&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]}]">
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