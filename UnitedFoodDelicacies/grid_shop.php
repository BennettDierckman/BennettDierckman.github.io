<?php
require ("php/db.php");
session_start();

$itemsPerPage = "2";
$today = date("Y/m/d");

$page = 1; $brandName = ''; $category = '';

$baseURL = "grid_shop.php?";
$baseSQL = "SELECT * FROM items WHERE inStock='1'";


$pageURL = '';
$sortByURL='';
$brandURL = '';
$categoryURL = '';
$viewURL='';
$searchURL='';

if (isset($_GET['view'])) {
  $view=$mysqli->escape_string($_GET['view']);
  $viewURL="&view=".$view;
}

if(isset($_GET['search'])){
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page != 1) {
      $limitSQL = "LIMIT ".($page-1)*$itemsPerPage .', '. $itemsPerPage;  
    }else{
      $limitSQL= "LIMIT ". $itemsPerPage;  
    }
    $pageURL = "&page=".$page;
  }else{
    $limitSQL = " LIMIT ". $itemsPerPage;
  }

  $search = $_GET['search'];
  $searchURL = "&search=".$search;
  $itemSQL = "SELECT * FROM items WHERE name LIKE '%".$search."%' OR description LIKE '%".$search."%'";
  $countItemsSql = "SELECT * FROM items WHERE name LIKE '%".$search."%' OR description LIKE '%".$search."%'";
  
  $categorySearch = "SELECT * FROM categories WHERE category LIKE '%".$search."%'";
  $result = $mysqli->query($categorySearch);
  $numRows = $result->num_rows;
  if ($numRows > 0){ //They have pending attendance
    while($row = $result->fetch_assoc()){
      $itemSQL = $itemSQL . " UNION SELECT * FROM items WHERE category LIKE '".$row['id']."| '";
      $countItemsSql = $countItemsSql . " UNION SELECT * FROM items WHERE category LIKE '".$row['id']."| '";
    }
  }

  $brandSearch = "SELECT * FROM brands WHERE brand LIKE '%".$search."%'";
  $result = $mysqli->query($brandSearch);
  $numRows = $result->num_rows;
  if ($numRows > 0){ //They have pending attendance
    while($row = $result->fetch_assoc()){
      $itemSQL = $itemSQL . " UNION SELECT * FROM items WHERE brand LIKE '".$row['id']."'";
      $countItemsSql = $countItemsSql . " UNION SELECT * FROM items WHERE brand LIKE '".$row['id']."'";
    }
  }

  if (isset($_GET['sortBy'])){
    $sortBy = $_GET['sortBy'];
    if ($sortBy=="A-Z") {
      $sortBySQL = " ORDER BY name ";
      $selectByOptions = '
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=A-Z">Sort by Name A-Z</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=Z-A">Sort by Name Z-A</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=H-L">Sort by Price High-Low</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=L-H">Sort by Price Low-High</a></option>
      ';
    }else if($sortBy=="Z-A"){
      $sortBySQL = " ORDER BY name DESC ";
      $selectByOptions = '
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=Z-A">Sort by Name Z-A</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=H-L">Sort by Price High-Low</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=L-H">Sort by Price Low-High</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=A-Z">Sort by Name A-Z</a></option>
      ';
    }else if($sortBy=="H-L"){
      $sortBySQL = " ORDER BY sellPrice DESC ";
      $selectByOptions = '
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=H-L">Sort by Price High-Low</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=L-H">Sort by Price Low-High</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=A-Z">Sort by Name A-Z</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=Z-A">Sort by Name Z-A</a></option>
      ';
    }else if($sortBy=="L-H"){
      $sortBySQL = " ORDER BY sellPrice ";
      $selectByOptions = '
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=L-H">Sort by Price Low-High</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=A-Z">Sort by Name A-Z</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=Z-A">Sort by Name Z-A</a></option>
        <option value="'.$baseURL.$viewURL.$searchURL.'&sortBy=H-L">Sort by Price High-Low</a></option>
      ';
    }
    $sortByURL = "&sortBy=".$sortBy;
    $itemSQL = $itemSQL.$sortBySQL;
    $countItemsSql = $countItemsSql.$sortBySQL;
  }

  $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' LIMIT 3";
}

//NO GET VARIABLES SET
if (!isset($_GET['search']) && !isset($_GET['category']) && !isset($_GET['brandName']) && !isset($_GET['sortBy']) && !isset($_GET['page'])) {
  $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' LIMIT 3";
  $countItemsSql = $baseSQL; //First Items the visitor will see on main shop page
  $limitSQL = "LIMIT ". $itemsPerPage;
  $sortBySQL = " ORDER BY name "; //SortBY is not set
  $categorySQL= ""; //NO CATEGORY SET
  $brandSQL="";//NO BRAND SET
}

//ONLY SORT-BY SET
if (!isset($_GET['search']) && !isset($_GET['category']) && !isset($_GET['brandName']) && isset($_GET['sortBy']) && !isset($_GET['page'])) {
  $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' LIMIT 3";
  $countItemsSql = $baseSQL;
  $sortBy = $_GET['sortBy'];
  $limitSQL = "LIMIT ". $itemsPerPage; //PAGE is not set
  $categorySQL= ""; //NO CATEGORY SET
  $brandSQL="";//NO BRAND SET
  if ($sortBy=="A-Z") {
    $sortBySQL = " ORDER BY name ";
    $selectByOptions = '
      <option value="'.$baseURL.$viewURL.'sortBy=A-Z">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=Z-A">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=H-L">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=L-H">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=best">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=new">Sort by New Items</a></option>
    ';
  }else if($sortBy=="Z-A"){
    $sortBySQL = " ORDER BY name DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.$viewURL.'sortBy=Z-A">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=H-L">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=L-H">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=best">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=new">Sort by New Items</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=A-Z">Sort by Name A-Z</a></option>
    ';
  }else if($sortBy=="H-L"){
    $sortBySQL = " ORDER BY sellPrice DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.$viewURL.'sortBy=H-L">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=L-H">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=best">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=new">Sort by New Items</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=A-Z">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=Z-A">Sort by Name Z-A</a></option>
    ';
  }else if($sortBy=="L-H"){
    $sortBySQL = " ORDER BY sellPrice ";
    $selectByOptions = '
      <option value="'.$baseURL.$viewURL.'sortBy=L-H">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=best">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=new">Sort by New Items</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=A-Z">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=Z-A">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=H-L">Sort by Price High-Low</a></option>
    ';
  }else if($sortBy=="best"){
    $sortBySQL = " AND bestSeller ='1' ";
    $countItemsSql = $baseSQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.$viewURL.'sortBy=best">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=new">Sort by New Items</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=A-Z">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=Z-A">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=H-L">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=L-H">Sort by Price Low-High</a></option>
    ';
  }else if($sortBy=="new"){
    $sortBySQL = " AND dateAdded  > '".date("Y/m/d", strtotime('today - 30 days'))."' ";
    $countItemsSql = $baseSQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.$viewURL.'sortBy=new">Sort by New Items</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=A-Z">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=Z-A">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=H-L">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=L-H">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.$viewURL.'sortBy=best">Sort by Best Sellers</a></option>
    ';
  }
  $sortByURL = "&sortBy=".$sortBy;
}
//ONLY CATEGORY SET
if (!isset($_GET['search']) && isset($_GET['category']) && !isset($_GET['brandName']) && !isset($_GET['sortBy']) && !isset($_GET['page'])) {
  $category = $_GET['category'];
  $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND category like '%".$category."| %' UNION SELECT * FROM items WHERE bestSeller='1' AND category NOT LIKE '%".$category."| %'  LIMIT 3" ;
  $categorySQL= " AND category like '%".$category."| %'"; //NO CATEGORY SET
  $limitSQL = "LIMIT ". $itemsPerPage; // NO PAGE SET
  $sortBySQL = " ORDER BY name ";  //NO SORT BY SET
  $brandSQL="";//NO BRAND SET
  $countItemsSql = $baseSQL.$categorySQL; //First Items the visitor will see on main shop page
  $categoryURL = "&category=".$category;
}
//ONLY PAGE VARIABLE SET
if (!isset($_GET['search']) && !isset($_GET['category']) && !isset($_GET['brandName']) && !isset($_GET['sortBy']) && isset($_GET['page'])) {
  $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' LIMIT 3";
  $countItemsSql = $baseSQL; //First Items the visitor will see on main shop page
  $page = $_GET['page'];
  $sortBySQL = " ORDER BY name "; //SortBY is not set
  $categorySQL= ""; //NO CATEGORY SET
  $brandSQL="";//NO BRAND SET
  if ($page != 1) {
    $limitSQL = "LIMIT ".($page-1)*$itemsPerPage .', '. $itemsPerPage;  
  }else{
    $limitSQL= "LIMIT ". $itemsPerPage;  
  }
  $pageURL = "&page=".$page;
}
//ONLY BRAND SET
if (!isset($_GET['search']) && !isset($_GET['category']) && isset($_GET['brandName']) && !isset($_GET['sortBy']) && !isset($_GET['page'])) {
  $brand = $_GET['brandName'];
  $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND brand='".$brand."' UNION SELECT * FROM items WHERE bestSeller='1' AND brand !='".$brand."' LIMIT 3";
  $brandSQL= " AND brand='".$brand."' "; 
  $limitSQL = "LIMIT ". $itemsPerPage; // NO PAGE SET
  $sortBySQL = " ORDER BY name ";  //NO SORT BY SET
  $countItemsSql = $baseSQL.$brandSQL; //First Items the visitor will see on main shop page
  $brandURL = "&brandName=".$brand;
}

//PAGE AND SORT-BY SET 
if (!isset($_GET['search']) && !isset($_GET['category']) && !isset($_GET['brandName']) && isset($_GET['sortBy']) && isset($_GET['page'])) {
  $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' LIMIT 3";
  $countItemsSql = $baseSQL; //First Items the visitor will see on main shop page
  $page = $_GET['page'];
  $sortBy = $_GET['sortBy'];
  $categorySQL= ""; //NO CATEGORY SET
  $brandSQL="";//NO BRAND SET
  if ($sortBy=="A-Z") {
    $sortBySQL = " ORDER BY name ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=A-Z&page='.$page.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A&page='.$page.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L&page='.$page.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H&page='.$page.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$viewURL.'">Sort by New Items</a></option>
    ';
  }else if($sortBy=="Z-A"){
    $sortBySQL = " ORDER BY name DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=Z-A&page='.$page.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L&page='.$page.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H&page='.$page.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z&page='.$page.$viewURL.'">Sort by Name A-Z</a></option>
    ';
  }else if($sortBy=="H-L"){
    $sortBySQL = " ORDER BY sellPrice DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=H-L&page='.$page.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H&page='.$page.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z&page='.$page.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A&page='.$page.$viewURL.'">Sort by Name Z-A</a></option>
    ';
  }else if($sortBy=="L-H"){
    $sortBySQL = " ORDER BY sellPrice ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=L-H&page='.$page.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z&page='.$page.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A&page='.$page.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L&page='.$page.$viewURL.'">Sort by Price High-Low</a></option>
    ';
  }else if($sortBy=="best"){
    $sortBySQL = " AND bestSeller='1' ";
    $countItemsSql = $baseSQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=best'.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z&page='.$page.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A&page='.$page.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L&page='.$page.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H&page='.$page.$viewURL.'">Sort by Price Low-High</a></option>
    ';
  }else if($sortBy=="new"){
    $sortBySQL = " AND dateAdded  > '".date("Y/m/d", strtotime('today - 30 days'))."' ";
    $countItemsSql = $baseSQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=new'.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z&page='.$page.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A&page='.$page.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L&page='.$page.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H&page='.$page.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$viewURL.'">Sort by Best Sellers</a></option>
    ';
  }
  if ($page != 1) {
    $limitSQL= "LIMIT ".($page-1)*$itemsPerPage .', '. $itemsPerPage;  
  }else{
    $limitSQL= "LIMIT ". $itemsPerPage;  
  }
  $pageURL = "&page=".$page;
  $sortByURL = "&sortBy=".$sortBy;
}
//CATEGORY AND PAGE SET
if (!isset($_GET['search']) && isset($_GET['category']) && !isset($_GET['brandName']) && !isset($_GET['sortBy']) && isset($_GET['page'])) {
  $page = $_GET['page'];
  $category = $_GET['category'];
  if ($page== 1 || $page%2==1) { 
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND category NOT LIKE '%".$category."| %' UNION SELECT * FROM items WHERE bestSeller='1' AND category like '%".$category."| %' LIMIT 3";
  }else{
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND category like '%".$category."| %' UNION SELECT * FROM items WHERE bestSeller='1' AND category NOT LIKE '%".$category."| %' LIMIT 3" ;
  }
  $categorySQL= " AND category like '%".$category."| %'"; 
  $brandSQL="";//NO BRAND SET
  $sortBySQL = " ORDER BY name "; //NO SORT BY SET
  if ($page != 1) {
    $limitSQL = "LIMIT ".($page-1)*$itemsPerPage .', '. $itemsPerPage;  
  }else{
    $limitSQL= "LIMIT ". $itemsPerPage;  
  }
  $countItemsSql = $baseSQL.$categorySQL; //First Items the visitor will see on main shop page
  $categoryURL = "&category=".$category;
  $pageURL = "&page=".$page;
}
//CATEGORY AND SORT-BY SET
if (!isset($_GET['search']) && isset($_GET['category']) && !isset($_GET['brandName']) && isset($_GET['sortBy']) && !isset($_GET['page'])) {
  $category = $_GET['category'];
  $sortBy=$_GET['sortBy'];
  $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND category like '%".$category."| %' UNION SELECT * FROM items WHERE bestSeller='1' AND category NOT LIKE '%".$category."| %' LIMIT 3" ;
  $categorySQL= " AND category like '%".$category."| %'"; 
  $limitSQL = "LIMIT ". $itemsPerPage; //PAGE is not set
  $brandSQL="";//NO BRAND SET
  $countItemsSql = $baseSQL.$categorySQL; //First Items the visitor will see on main shop page
  $sortByURL = "&sortBy=".$sortBy;
  $categoryURL = "&category=".$category;
  if ($sortBy=="A-Z") {
    $sortBySQL = " ORDER BY name ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
    ';
  }else if($sortBy=="Z-A"){
    $sortBySQL = " ORDER BY name DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
    ';
  }else if($sortBy=="H-L"){
    $sortBySQL = " ORDER BY sellPrice DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
    ';
  }else if($sortBy=="L-H"){
    $sortBySQL = " ORDER BY sellPrice ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
    ';
  }else if($sortBy=="best"){
    $sortBySQL = " AND bestSeller='1' ";
    $countItemsSql = $baseSQL . $categorySQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
    ';
  }else if($sortBy=="new"){
    $sortBySQL = " AND dateAdded  > '".date("Y/m/d", strtotime('today - 30 days'))."' ";
    $countItemsSql = $baseSQL . $categorySQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
    ';
  }
}
//BRAND AND CATEGORY SET 
if (!isset($_GET['search']) && isset($_GET['category']) && isset($_GET['brandName']) && !isset($_GET['sortBy']) && !isset($_GET['page'])) {
  $category = $_GET['category'];
  $brand=$_GET['brandName'];
  $popularItemsSQL = "SELECT * FROM items WHERE (bestSeller='1' AND brand='".$brand."') || (bestSeller='1' AND category like '%".$category."| %') UNION SELECT * FROM items WHERE (bestSeller='1' AND brand !='".$brand."') || (bestSeller='1' AND category NOT LIKE '%".$category."| %')  LIMIT 3";
  $categorySQL= " AND category like '%".$category."| %'"; 
  $limitSQL = "LIMIT ". $itemsPerPage; //PAGE is not set
  $sortBySQL = " ORDER BY name "; //NO SORT BY SET
  $brandSQL= " AND brand='".$brand."' "; 
  $countItemsSql = $baseSQL.$categorySQL.$brandSQL; 
  $categoryURL = "&category=".$category;
  $brandURL = "&brandName=".$brand;
}
//BRAND AND PAGE
if (!isset($_GET['search']) && !isset($_GET['category']) && isset($_GET['brandName']) && !isset($_GET['sortBy']) && isset($_GET['page'])) {
  $page = $_GET['page'];
  $brand = $_GET['brandName'];
  if ($page== 1 || $page%2==1) { 
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND brand!='".$brand."' UNION SELECT * FROM items WHERE bestSeller='1' AND brand='".$brand."' ORDER BY name DESC LIMIT 3";
  }else{
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND brand='".$brand."' UNION SELECT * FROM items WHERE bestSeller='1' AND brand!='".$brand."' LIMIT 3" ;
  }
  $brandSQL= " AND brand='".$brand."' ";  
  $categorySQL="";//NO CATEGORY SET
  $sortBySQL = " ORDER BY name "; //NO SORT BY SET
  if ($page != 1) {
    $limitSQL = "LIMIT ".($page-1)*$itemsPerPage .', '. $itemsPerPage;  
  }else{
    $limitSQL= "LIMIT ". $itemsPerPage;  
  }
  $countItemsSql = $baseSQL.$brandSQL; //First Items the visitor will see on main shop page
  $brandURL = "&brandName=".$brand;
  $pageURL = "&page=".$page;
}
//BRAND AND SORT BY
if (!isset($_GET['search']) && !isset($_GET['category']) && isset($_GET['brandName']) && isset($_GET['sortBy']) && !isset($_GET['page'])) {
  $brand = $_GET['brandName'];
  $sortBy=$_GET['sortBy'];
  $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND brand='".$brand."' UNION SELECT * FROM items WHERE bestSeller='1' AND brand !='".$brand."' LIMIT 3";
  $brandSQL= " AND brand='".$brand."' ";  
  $limitSQL = "LIMIT ". $itemsPerPage; //PAGE is not set
  $categorySQL="";//NO CATEGORY SET
  $countItemsSql = $baseSQL.$brandSQL; //First Items the visitor will see on main shop page
  $sortByURL = "&sortBy=".$sortBy;
  $brandURL = "&brandName=".$brand;
  if ($sortBy=="A-Z") {
    $sortBySQL = " ORDER BY name ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
    ';
  }else if($sortBy=="Z-A"){
    $sortBySQL = " ORDER BY name DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
    ';
  }else if($sortBy=="H-L"){
    $sortBySQL = " ORDER BY sellPrice DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
    ';
  }else if($sortBy=="L-H"){
    $sortBySQL = " ORDER BY sellPrice ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
    ';
  }else if($sortBy=="best"){
    $sortBySQL = " AND bestSeller='1' ";
    $countItemsSql = $baseSQL . $brandSQL .$sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
    ';
  }else if($sortBy=="new"){
    $sortBySQL = " AND dateAdded  > '".date("Y/m/d", strtotime('today - 30 days'))."' ";
    $countItemsSql = $baseSQL . $brandSQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
    ';
  }
}

//CATEGORY PAGE AND SORT-BY SET
if (!isset($_GET['search']) && isset($_GET['category']) && !isset($_GET['brandName']) && isset($_GET['sortBy']) && isset($_GET['page'])) {
  $category = $_GET['category'];
  $sortBy=$_GET['sortBy'];
  $page=$_GET['page'];
  if ($page== 1 || $page%2==1) { 
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND category NOT LIKE '%".$category."| %' UNION SELECT * FROM items WHERE bestSeller='1' AND category like '%".$category."| %' LIMIT 3";
  }else{
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND category like '%".$category."| %' UNION SELECT * FROM items WHERE bestSeller='1' AND category NOT LIKE '%".$category."| %' LIMIT 3" ;
  }
  $categorySQL= " AND category like '%".$category."| %'";
  $brandSQL="";//NO BRAND SET
  if ($page != 1) {
    $limitSQL = " LIMIT ".($page-1)*$itemsPerPage .', '. $itemsPerPage;  
  }else{
    $limitSQL= " LIMIT ". $itemsPerPage;  
  }
  $countItemsSql = $baseSQL.$categorySQL; //First Items the visitor will see on main shop page
  $sortByURL = "&sortBy=".$sortBy;
  $categoryURL = "&category=".$category;
  $pageURL = "&page=".$page;
  if ($sortBy=="A-Z") {
    $sortBySQL = " ORDER BY name ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>

    ';
  }else if($sortBy=="Z-A"){
    $sortBySQL = " ORDER BY name DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
    ';
  }else if($sortBy=="H-L"){
    $sortBySQL = " ORDER BY sellPrice DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
    ';
  }else if($sortBy=="L-H"){
    $sortBySQL = " ORDER BY sellPrice ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
    ';
  }else if($sortBy=="best"){
    $sortBySQL = " AND bestSeller='1' ";
    $countItemsSql = $baseSQL . $categorySQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
    ';
  }else if($sortBy=="new"){
    $sortBySQL = " AND dateAdded  > '".date("Y/m/d", strtotime('today - 30 days'))."' ";
    $countItemsSql = $baseSQL . $categorySQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$viewURL.'">Sort by Best Sellers</a></option>
    ';
  }
}
//BRAND SORT-BY AND PAGE SET 
if (!isset($_GET['search']) && !isset($_GET['category']) && isset($_GET['brandName']) && isset($_GET['sortBy']) && isset($_GET['page'])) {
  $brand = $_GET['brandName'];
  $sortBy=$_GET['sortBy'];
  $page=$_GET['page'];
  if ($page== 1 || $page%2==1) { 
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND brand!='".$brand."' UNION SELECT * FROM items WHERE bestSeller='1' AND brand='".$brand."' ORDER BY name DESC LIMIT 3";
  }else{
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND brand='".$brand."' UNION SELECT * FROM items WHERE bestSeller='1' AND brand!='".$brand."' LIMIT 3" ;
  }
  $brandSQL= " AND brand='".$brand."' "; 
  $categorySQL="";//NO CATEGORY SET
  if ($page != 1) {
    $limitSQL = " LIMIT ".($page-1)*$itemsPerPage .', '. $itemsPerPage;  
  }else{
    $limitSQL= " LIMIT ". $itemsPerPage;  
  }
  $countItemsSql = $baseSQL.$brandSQL; //First Items the visitor will see on main shop page
  $sortByURL = "&sortBy=".$sortBy;
  $brandURL = "&brandName=".$brand;
  $pageURL = "&page=".$page;
  if ($sortBy=="A-Z") {
    $sortBySQL = " ORDER BY name ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
    ';
  }else if($sortBy=="Z-A"){
    $sortBySQL = " ORDER BY name DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
    ';
  }else if($sortBy=="H-L"){
    $sortBySQL = " ORDER BY sellPrice DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
    ';
  }else if($sortBy=="L-H"){
    $sortBySQL = " ORDER BY sellPrice ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
    ';
  }else if($sortBy=="best"){
    $sortBySQL = " AND bestSeller='1' ";
    $countItemsSql = $baseSQL . $brandSQL .$sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
    ';
  }else if($sortBy=="new"){
    $sortBySQL = " AND dateAdded  > '".date("Y/m/d", strtotime('today - 30 days'))."' ";
    $countItemsSql = $baseSQL . $brandSQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=new'.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
    ';
  }
}
//BRAND CATEGORY AND SORT-BY SET
if (!isset($_GET['search']) && isset($_GET['category']) && isset($_GET['brandName']) && isset($_GET['sortBy']) && !isset($_GET['page'])) {
  $category = $_GET['category'];
  $sortBy=$_GET['sortBy'];
  $brand=$_GET['brandName'];
  $popularItemsSQL = "SELECT * FROM items WHERE (bestSeller='1' AND brand='".$brand."') || (bestSeller='1' AND category like '%".$category."| %') UNION SELECT * FROM items WHERE (bestSeller='1' AND brand !='".$brand."') || (bestSeller='1' AND category NOT LIKE '%".$category."| %')  LIMIT 3";
  $categorySQL= " AND category like '%".$category."| %'";
  $brandSQL= " AND brand='".$brand."' "; 
  $limitSQL= " LIMIT ". $itemsPerPage;  //NO PAGE SET
  $countItemsSql = $baseSQL.$categorySQL.$brandSQL; //First Items the visitor will see on main shop page
  $sortByURL = "&sortBy=".$sortBy;
  $categoryURL = "&category=".$category;
  $brandURL = "&brandName=".$brand;
  if ($sortBy=="A-Z") {
    $sortBySQL = " ORDER BY name ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
    ';
  }else if($sortBy=="Z-A"){
    $sortBySQL = " ORDER BY name DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
    ';
  }else if($sortBy=="H-L"){
    $sortBySQL = " ORDER BY sellPrice DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
    ';
  }else if($sortBy=="L-H"){
    $sortBySQL = " ORDER BY sellPrice ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
    ';
  }else if($sortBy=="best"){
    $sortBySQL = " AND bestSeller='1' ";
    $countItemsSql = $baseSQL . $brandSQL . $categorySQL .$sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
    ';
  }else if($sortBy=="new"){
    $sortBySQL = " AND dateAdded  > '".date("Y/m/d", strtotime('today - 30 days'))."' ";
    $countItemsSql = $baseSQL . $brandSQL . $categorySQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
    ';
  }
}
//BRAND CATEGORY AND PAGE SET
if (!isset($_GET['search']) && isset($_GET['category']) && isset($_GET['brandName']) && !isset($_GET['sortBy']) && isset($_GET['page'])) {
  $category = $_GET['category'];
  $brand=$_GET['brandName'];
  $page=$_GET['page'];
  if ($page== 1 || $page%2==1) { 
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND brand='".$brand."' UNION SELECT * FROM items WHERE bestSeller='1' AND brand !='".$brand."'  LIMIT 3";
  }else{
    $popularItemsSQL = "SELECT * FROM items WHERE bestSeller='1' AND category like '%".$category."| %' UNION SELECT * FROM items WHERE bestSeller='1' AND category NOT LIKE '%".$category."| %' order by name DESC LIMIT 3";
  }
  $categorySQL= " AND category like '%".$category."| %'"; 
  if ($page != 1) {
    $limitSQL = "LIMIT ".($page-1)*$itemsPerPage .', '. $itemsPerPage;  
  }else{
    $limitSQL= "LIMIT ". $itemsPerPage;  
  }
  $sortBySQL = " ORDER BY name "; //NO SORT BY SET
  $brandSQL= " AND brand='".$brand."' "; 
  $countItemsSql = $baseSQL.$categorySQL.$brandSQL; 
  $categoryURL = "&category=".$category;
  $brandURL = "&brandName=".$brand;
  $pageURL = "&page=".$page;
}

//BRAND CATEGORY PAGE AND SORT BY SET (all set)
if (!isset($_GET['search']) && isset($_GET['category']) && isset($_GET['brandName']) && isset($_GET['sortBy']) && isset($_GET['page'])) {
  $category = $_GET['category'];
  $sortBy=$_GET['sortBy'];
  $page=$_GET['page'];
  $brand=$_GET['brandName'];
  if ($page== 1 || $page%2==1) { 
    $popularItemsSQL = "SELECT * FROM items WHERE (bestSeller='1' AND brand='".$brand."') || (bestSeller='1' AND category like '%".$category."| %') UNION SELECT * FROM items WHERE (bestSeller='1' AND brand !='".$brand."') || (bestSeller='1' AND category NOT LIKE '%".$category."| %')  LIMIT 3";
  }else{
    $popularItemsSQL = "SELECT * FROM items WHERE (bestSeller='1' AND brand='".$brand."') || (bestSeller='1' AND category like '%".$category."| %') UNION SELECT * FROM items WHERE (bestSeller='1' AND brand !='".$brand."') || (bestSeller='1' AND category NOT LIKE '%".$category."| %') order by name DESC LIMIT 3";
  }
  $categorySQL= " AND category like '%".$category."| %'";
  $brandSQL= " AND brand='".$brand."' "; 
  if ($page != 1) {
    $limitSQL = " LIMIT ".($page-1)*$itemsPerPage .', '. $itemsPerPage;  
  }else{
    $limitSQL= " LIMIT ". $itemsPerPage;  
  }
  $countItemsSql = $baseSQL.$categorySQL.$brandSQL; //First Items the visitor will see on main shop page
  $sortByURL = "&sortBy=".$sortBy;
  $categoryURL = "&category=".$category;
  $pageURL = "&page=".$page;
  $brandURL = "&brandName=".$brand;
  if ($sortBy=="A-Z") {
    $sortBySQL = " ORDER BY name ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
    ';
  }else if($sortBy=="Z-A"){
    $sortBySQL = " ORDER BY name DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
    ';
  }else if($sortBy=="H-L"){
    $sortBySQL = " ORDER BY sellPrice DESC ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
    ';
  }else if($sortBy=="L-H"){
    $sortBySQL = " ORDER BY sellPrice ";
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
    ';
  }else if($sortBy=="best"){
    $sortBySQL = " AND bestSeller='1' ";
    $countItemsSql = $baseSQL . $brandSQL . $categorySQL .$sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
    ';
  }else if($sortBy=="new"){
    $sortBySQL = " AND dateAdded  > '".date("Y/m/d", strtotime('today - 30 days'))."' ";
    $countItemsSql = $baseSQL . $brandSQL . $categorySQL . $sortBySQL;
    $selectByOptions = '
      <option value="'.$baseURL.'sortBy=new'.$categoryURL.$brandURL.$viewURL.'">Sort by New Items</a></option>
      <option value="'.$baseURL.'sortBy=A-Z'.$categoryURL.$brandURL.$viewURL.'">Sort by Name A-Z</a></option>
      <option value="'.$baseURL.'sortBy=Z-A'.$categoryURL.$brandURL.$viewURL.'">Sort by Name Z-A</a></option>
      <option value="'.$baseURL.'sortBy=H-L'.$categoryURL.$brandURL.$viewURL.'">Sort by Price High-Low</a></option>
      <option value="'.$baseURL.'sortBy=L-H'.$categoryURL.$brandURL.$viewURL.'">Sort by Price Low-High</a></option>
      <option value="'.$baseURL.'sortBy=best'.$categoryURL.$brandURL.$viewURL.'">Sort by Best Sellers</a></option>
    ';
  }
}

if (!isset($_GET['search'])) {
  $itemSQL = $baseSQL.$categorySQL.$brandSQL.$sortBySQL.$limitSQL; 
}else{
  $itemSQL = $itemSQL.$limitSQL; 
}

$countItemsResult = $mysqli->query($countItemsSql);
$totalNumOfItems = mysqli_num_rows($countItemsResult);

$numberOfPages = floor($totalNumOfItems / $itemsPerPage);

if ($totalNumOfItems % $itemsPerPage != 0) {
  if ($numberOfPages == 0) {
    $numberOfItemsOnPage = $totalNumOfItems % $itemsPerPage;
  }else{
    $numberOfItemsOnPage = $itemsPerPage; 
  }
  $numberOfPages++;
}else{
  $numberOfItemsOnPage = $itemsPerPage;
}

if ($numberOfPages > 1 && $page > 1) {
  $startingNumber = $itemsPerPage * ($page-1) + 1;
  $endingNumber = $startingNumber + $numberOfItemsOnPage -1;
}

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Grid Shop</title>
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
      <header class="section page-header">
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
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="#">Shop</a>
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
                    <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.php">Contact</a></li>
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
              <h2 class="breadcrumbs-custom-title">Grid Shop</h2>
            </div>
          </div>
        </div>
        <div class="breadcrumbs-custom-footer">
          <div class="container">
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Home</a></li>
              <li><a href="grid_shop.php">Shop</a></li>
              <li class="active">Grid Shop</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Section Shop-->
      <section class="section section-xxl bg-default text-md-left pt-3 pt-lg-5">
        <div class="container">
          <div class="row row-50">
            <div class="col-md-4 col-xl-3">
              <div class="aside row row-30 row-md-50 justify-content-md-between">
                <!-- <div class="aside-item col-12">
                  <h6 class="aside-title">Filter by Price</h6>
                  <div class="rd-range" data-min="0" data-max="999" data-min-diff="100" data-start="[10, 250]" data-step="1" data-tooltip="false" data-input=".rd-range-input-value-1" data-input-2=".rd-range-input-value-2"></div>
                  <div class="group-xs group-justify">
                    <div>
                      <button class="button button-sm button-primary button-zakaria" type="button">Filter</button>
                    </div>
                    <div>
                      <div class="rd-range-wrap">
                        <div class="rd-range-title">Price:</div>
                        <div class="rd-range-form-wrap"><span>$</span>
                          <input class="rd-range-input rd-range-input-value-1" id="test" type="text" name="value-1">
                        </div>
                        <div class="rd-range-divider"></div>
                        <div class="rd-range-form-wrap"><span>$</span>
                          <input class="rd-range-input rd-range-input-value-2" type="text" name="value-2">
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                <div class="aside-item  col-md-12 col-lg-12">
                  <!-- RD Search Form-->
                  <form class="rd-search form-search mb-3" action="grid_shop.php" method="GET">
                    <div class="form-wrap">
                      <label class="form-label" for="search-form">Search ...</label>
                      <input class="form-input" id="search-form" type="text" name="search" autocomplete="off">
                      <button class="button-search fl-bigmug-line-search74" type="submit"></button>
                    </div>
                  </form>
                  <div class="row mt-0">
                    <div class="col-6 col-md-12 col-lg-12">
                      <h6 class="aside-title mt-sm-3">Categories</h6>
                      <ul class="list-shop-filter">
                        <?php
                          $sql = "SELECT DISTINCT * FROM categories";
                          $result = $mysqli->query($sql);
                          $numRows = $result->num_rows;
                          if ($numRows > 0){ //They have pending attendance
                            while($row = $result->fetch_assoc()){
                              if ($category == $row['id']) {
                                echo '
                                <li>
                                  <a href="'.$baseURL.$brandURL.$sortByURL.$viewURL.'">
                                    <label class="checkbox-inline">
                                      <input name="input-group-radio" value="'.$row['category'].'" type="checkbox" checked>'.$row['category'].'
                                    </label>
                                    <!-- <span class="list-shop-filter-number">(18)</span> -->
                                  </a>
                                </li>
                                ';  
                              }else{
                                echo '
                                <li>
                                  <a href="'.$baseURL.'category='.$row['id'].$brandURL.$sortByURL.$viewURL.'">
                                    <label class="checkbox-inline">
                                      <input name="input-group-radio" value="'.$row['category'].'" type="checkbox">'.$row['category'].'
                                    </label>
                                    <!-- <span class="list-shop-filter-number">(18)</span> -->
                                  </a>
                                </li>
                                ';
                              }
                            }
                          }
                        ?>
                      </ul>
                    </div>
                    <div class="col-6 col-md-12 col-lg-12 mt-md-3">
                      <h6 class=" mt-sm-3 aside-title">Brands</h6>
                      <ul class="list-shop-filter">
                        <?php
                          $sql = "SELECT DISTINCT * FROM brands";
                          $result = $mysqli->query($sql);
                          $numRows = $result->num_rows;
                          if ($numRows > 0){ //They have pending attendance
                            while($row = $result->fetch_assoc()){
                              if ($brand == $row['id']) {
                                echo '
                                <li>
                                  <a href="'.$baseURL.$categoryURL.$sortByURL.$viewURL.'">
                                    <label class="checkbox-inline">
                                      <input name="input-group-radio" value="'.$row['brand'].'" type="checkbox" checked>'.$row['brand'].'
                                    </label>
                                    <!-- <span class="list-shop-filter-number">(18)</span> -->
                                  </a>
                                </li>
                                ';  
                              }else{
                                echo '
                                <li>
                                  <a href="'.$baseURL.'brandName='.$row['id'].$categoryURL.$sortByURL.$viewURL.'">
                                    <label class="checkbox-inline">
                                      <input name="input-group-radio" value="'.$row['brand'].'" type="checkbox">'.$row['brand'].'
                                    </label>
                                    <!-- <span class="list-shop-filter-number">(18)</span> -->
                                  </a>
                                </li>
                                ';
                              }
                            }
                          }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="aside-item col-sm-6 col-lg-12 d-none d-md-block">
                  <h6 class="aside-title">Popular products</h6>
                  <div class="row row-10 row-lg-20 gutters-10">
                    <?php 
                      //$itemSQL="SELECT * FROM items";  
                      $resultItems = $mysqli->query($popularItemsSQL);
                      $numItems = $resultItems->num_rows;
                      //if there are employees in the users table 
                      if ($numItems > 0){
                        while($row = $resultItems->fetch_assoc()){
                          
                          $itemImages = array(); //initialize array
                          $dir = new DirectoryIterator('images/items/'.$row['itemHash'].'_'.$row['id']); //create directory iterator
                          foreach($dir as $file){ //loop through iterator
                            $fileBits = explode(".",$file);
                            if($fileBits[1]=="jpg" || $fileBits[1]=="jpeg" || $fileBits[1]=="png"){ //confirm that item is image
                              array_push($itemImages, 'images/items/'.$row['itemHash'].'_'.$row['id'].'/'.$file);
                            }
                          }
                          if (sizeof($itemImages) > 0) {
                            $ogPath = $itemImages[0];
                          }

                          if (strpos($row['name'], '|') !== false){ //it  has a |
                            $names = explode("|", $row["name"]);
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
                            $nameString = $row['name'];
                          }

                          echo'
                          <div class="col-4 col-sm-6 col-md-12">
                            <!-- Product Minimal-->
                            <article class="product-minimal">
                              <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                                <div class="unit-left"><a class="product-minimal-figure" href="viewItem.php?Item='.$row['itemHash'].'_'.$row['id'].'"><img src="'.$ogPath.'" alt="" width="106" height="104"/></a></div>
                                <div class="unit-body">
                                  <p class="product-minimal-title"><a href="viewItem.php?Item='.$row['itemHash'].'_'.$row['id'].'">'.$nameString.'</a></p>
                                  <div class="product-price-wrap">
                                  <a href="viewItem.php?Item='.$row['itemHash'].'_'.$row['id'].'">';
                                    if ($row['salePrice'] == '0.00' || $row['salePrice']===null) {
                                      echo'<div class="product-minimal-price">$'.$row['sellPrice'].'</div>';
                                    }
                                    else{
                                      echo'
                                      <div class="d-flex">
                                        <div class="product-price product-price-old mt-2" >$'.$row['sellPrice'].'</div>
                                        <div class="product-minimal-price ml-2">$'.$row['salePrice'].'</div>
                                      </div>';
                                    }
                            echo '</a>
                                  </div>
                                </div>
                              </div>
                            </article>
                          </div>';
                        }
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 col-xl-9">
              <div class="product-top-panel group-md mt-4 mt-sm-0">
                <div class="d-none d-sm-block d-md-none d-lg-block">
                  <?php
                  if ($page==1) {
                    echo '<p class="product-top-panel-title">Showing 1–'.$numberOfItemsOnPage.' of '.$totalNumOfItems.' results</p>';
                  }
                  elseif($page > 1){
                    echo '<p class="product-top-panel-title">Showing '.$startingNumber.'–'.$endingNumber.' of '.$totalNumOfItems.' results</p>';
                  }
                  ?>
                </div>
                <div>
                  <div class="group-sm group-middle">
                    <div class="product-top-panel-sorting">
                      <select  onChange="window.location.href=this.value">
                        <?php
                          if ($sortByURL == "") { //NOTHING SET
                            echo'
                              <option value="'.$baseURL.'sortBy=A-Z'.$brandURL.$categoryURL.$searchURL.'">Sort by Name A-Z</option>
                              <option value="'.$baseURL.'sortBy=Z-A'.$brandURL.$categoryURL.$searchURL.'">Sort by Name Z-A</option>
                              <option value="'.$baseURL.'sortBy=L-H'.$brandURL.$categoryURL.$searchURL.'">Sort by Price Low-High</option>
                              <option value="'.$baseURL.'sortBy=H-L'.$brandURL.$categoryURL.$searchURL.'">Sort by Price High-Low</option>
                              <option value="'.$baseURL.'sortBy=best'.$brandURL.$categoryURL.$searchURL.'" >Sort by Best Sellers</option>
                              <option value="'.$baseURL.'sortBy=new'.$brandURL.$categoryURL.$searchURL.'" >Sort by New Items</option>
                              ';
                          }
                          else {
                            echo $selectByOptions;
                          }
                        ?>
                      </select>
                    </div>
                    <div class="product-view-toggle">
                      <?php
                        if(!isset($_GET['view'])){
                          echo'
                          <a class="mdi mdi-apps product-view-link product-view-grid active" href="#"></a>
                          <a class="mdi mdi-format-list-bulleted product-view-link product-view-list" href="'.$baseURL.$sortByURL.$brandURL.$categoryURL.$pageURL.'&view=list"></a>';
                        }else{
                          if ($view!='list') {
                            echo'
                              <a class="mdi mdi-apps product-view-link product-view-grid active" href="#"></a>
                              <a class="mdi mdi-format-list-bulleted product-view-link product-view-list" href="'.$baseURL.$sortByURL.$brandURL.$categoryURL.$pageURL.'&view=list"></a>';
                          }
                          else{
                            echo'
                              <a class="mdi mdi-apps product-view-link product-view-grid" href="'.$baseURL.$sortByURL.$brandURL.$categoryURL.$pageURL.'&view=grid"></a>
                              <a class="mdi mdi-format-list-bulleted product-view-link product-view-list active" href="#"></a>';    
                          }
                        }
                      ?>
                    </div>
                  </div>
                  <div class="d-sm-none d-md-block d-lg-none mb-0 mt-3">
                    <?php
                    if ($page==1) {
                      echo '<p class="product-top-panel-title">Showing 1–'.$numberOfItemsOnPage.' of '.$totalNumOfItems.' results</p>';
                    }
                    elseif($page > 1){
                      echo '<p class="product-top-panel-title">Showing '.$startingNumber.'–'.$endingNumber.' of '.$totalNumOfItems.' results</p>';
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="row row-30 row-lg-50 mt-md-3">
                <?php 
                  $resultItems = $mysqli->query($itemSQL);
                  $numItems = $resultItems->num_rows;
                  //if there are employees in the users table 
                  if ($numItems > 0){
                    while($row = $resultItems->fetch_assoc()){
                      $path1 = ''; $path2='';
                      $jpgPath = 'images/items/'.$row['itemHash'].'_'.$row['id'].'/Photo0.jpg';
                      $jpegPath = 'images/items/'.$row['itemHash'].'_'.$row['id'].'/Photo0.jpeg';
                      $pngPath = 'images/items/'.$row['itemHash'].'_'.$row['id'].'/Photo0.png';
                      if (file_exists($jpgPath)){
                        $path1 = $jpgPath;
                      }
                      if (file_exists($jpegPath)){
                        $path1 = $jpegPath;
                      }
                      if(file_exists($pngPath)){
                        $path1 = $pngPath;
                      }
                      $jpgPath = 'images/items/'.$row['itemHash'].'_'.$row['id'].'/Photo1.jpg';
                      $jpegPath = 'images/items/'.$row['itemHash'].'_'.$row['id'].'/Photo1.jpeg';
                      $pngPath = 'images/items/'.$row['itemHash'].'_'.$row['id'].'/Photo1.png';
                      if (file_exists($jpgPath)){
                        $path2 = $jpgPath;
                      }
                      else if (file_exists($jpegPath)){
                        $path2 = $jpegPath;
                      }
                      else if(file_exists($pngPath)){
                        $path2 = $pngPath;
                      }
                      else{
                        $path2 = $path1;
                      }

                      $nameString = "";
                      if (strpos($row['name'], '|') !== false){ //it  has a |
                        $names = explode("|", $row["name"]);
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
                        $nameString = $row['name'];
                      }

                      if ($view!='list') {
                        echo '
                          <div class="col-6 col-lg-6 col-xl-4">
                            <!-- Product-->
                            <a href="viewItem.php?Item='.$row['itemHash'].'_'.$row['id'].'">
                              <article class="product">
                                <div class="product-body">
                                  <div class="product-figure"><img src="'.$path1.'" alt="" onmouseover="this.src=\''.$path2.'\';" onmouseout="this.src=\''.$path1.'\';"/>
                                  </div>
                                  <h5 class="product-title"><a href="viewItem.php?Item='.$row['itemHash'].'_'.$row['id'].'">'.$nameString.'</a></h5>
                                  <div class="product-price-wrap">';
                                  if ($row['salePrice'] == '0.00' || $row['salePrice']===null) {
                                    echo'<div class="product-price">$'.$row['sellPrice'].'</div>';
                                  }
                                  else{
                                    echo'<div class="product-price product-price-old">$'.$row['sellPrice'].'</div>';
                                    echo'<div class="product-price">$'.$row['salePrice'].'</div>';
                                  }
                            echo' </div>
                                </div>';
                                obtainBadges($row);
                            echo'<div class="product-button-wrap pb-3">
                                  <div class="product-button"><a  href="viewItem.php?Item='.$row['itemHash'].'_'.$row['id'].'" class="button button-secondary button-zakaria fl-bigmug-line-search74"></a></div>
                                  <div class="product-button"><a class="button button-primary button-zakaria fl-bigmug-line-shopping202" href="cart-page.html"></a></div>
                                </div>
                              </article>
                            </a>
                          </div>
                        ';
                      }else{
                        echo'
                          <div class="col-11 col-sm-9 col-md-12 col-xl-11 mx-auto">
                            <article class="product-modern text-center text-md-left" style="max-width:100%;">
                              <div class="unit unit-spacing-0 flex-xs-row">
                                <div class="unit-left">
                                  <a class="product-modern-figure" href="viewItem.php?Item='.$row['itemHash'].'_'.$row['id'].'">
                                      <img src="'.$path1.'" alt="" class="product-modern-figure-img" onmouseover="this.src=\''.$path2.'\';" onmouseout="this.src=\''.$path1.'\';" />
                                  </a>
                                </div>
                                <div class="unit-body">
                                  <div class="product-modern-body pt-2 pb-1">
                                    <h4 class="product-modern-title"><a href="viewItem.php?Item='.$row['itemHash'].'_'.$row['id'].'">'.$nameString.'</a></h4>
                                    <div class="product-price-wrap mt-0">';
                                      if ($row['salePrice'] == '0.00' || $row['salePrice']===null) {
                                        echo'<div class="product-price">$'.$row['sellPrice'].'</div>';
                                      }
                                      else{
                                        echo'<div class="product-price product-price-old">$'.$row['sellPrice'].'</div>';
                                        echo'<div class="product-price">$'.$row['salePrice'].'</div>';
                                      }
                              echo' </div>
                                    <p class="product-modern-text d-none d-lg-block mt-2 mb-4">'.$row['description'].'</p>
                                    <div class="d-flex listView_productButtons mt-2 mt-lg-0">
                                      <div class="productButton mr-md-3"><a  href="viewItem.php?Item='.$row['itemHash'].'_'.$row['id'].'" class="button button-secondary fl-bigmug-line-search74 productButton2"></a></div>
                                      <div class="productButton"><a class="button button-primary  fl-bigmug-line-shopping202 productButton2" href="cart-page.html"></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                              obtainBadges($row);
                      echo' </article>
                          </div>
                        ';
                      }
                    }
                  }else{
                    $noResults = "TRUE";
                    echo "<h4 class='mx-auto mt-3 mt-md-5'>No Results Found</h4>";
                  }
                ?>
                
              </div>
              <?php
                if ($noResults != "TRUE") {
                  echo'
                    <div class="pagination-wrap">
                      <!-- Bootstrap Pagination-->
                      <nav aria-label="Page navigation">
                        <ul class="pagination">';
                            $url = "grid_shop.php?";
                            //Only 1 page of results
                            if ( $page == 1 && $numberOfPages == 1) { 
                               echo'<li class="page-item page-item-control disabled"><a class="page-link" href="#" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>';
                               echo'<li class="page-item active"><span class="page-link">1</span></li>';
                               echo'<li class="page-item page-item-control disabled"><a class="page-link" href="#" aria-label="Next"><span class="icon" aria-hidden="true"></span></a></li>';
                            }
                            //First Page of Many Pages of Results 
                            else if ($page==1 && $numberOfPages > 1){
                              echo'<li class="page-item page-item-control disabled"><a class="page-link" href="#" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>';
                              echo'<li class="page-item active"><span class="page-link">1</span></li>';
                              for($i=2; $i<=$numberOfPages; $i++){
                                $pagePart = 'page='.$i;
                                echo'
                                <li class="page-item">
                                  <a class="page-link" href="'.$url.$pagePart.$sortByURL.$categoryURL.$brandURL.$viewURL.$searchURL.'">'.$i.'</a>
                                </li>';
                              } 
                              $nextPage = $page+1;
                              $pagePart = 'page='. $nextPage;
                              echo'<li class="page-item page-item-control"><a class="page-link" href="'.$url.$pagePart.$sortByURL.$categoryURL.$brandURL.$viewURL.$searchURL.'" aria-label="Next"><span class="icon" aria-hidden="true"></span></a></li>';       
                            }
                            //Not First Page of Many Pages BUT Not the Last Page
                            elseif ($page != 1 && $page != $numberOfPages){
                              $previousPage = $page-1;
                              $pagePart = 'page='.$previousPage;
                              echo'<li class="page-item page-item-control"><a class="page-link" href="'.$url.$pagePart.$sortByURL.$categoryURL.$brandURL.$viewURL.$searchURL.'" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>';
                              //figure out how many pages before current page
                              for($i=1; $i<$page; $i++){
                                $pagePart = "page=".$i; 
                                echo '
                                <li class="page-item">
                                  <a class="page-link" href="'.$url.$pagePart.$sortByURL.$categoryURL.$brandURL.$viewURL.$searchURL.'">'.$i.'</a>
                                </li>';
                              }
                              echo'<li class="page-item active"><span class="page-link">'.$page.'</span></li>';
                              for($i=$page+1; $i<=$numberOfPages; $i++){
                                $pagePart = "page=".$i; 
                                echo '
                                <li class="page-item">
                                  <a class="page-link" href="'.$url.$pagePart.$sortByURL.$categoryURL.$brandURL.$viewURL.$searchURL.'">'.$i.'</a>
                                </li>';
                              }
                              $nextPage = $page+1;
                              $pagePart = 'page='.$nextPage;
                              echo'<li class="page-item page-item-control"><a class="page-link" href="'.$url.$pagePart.$sortByURL.$categoryURL.$brandURL.$viewURL.$searchURL.'" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>';

                            }
                            else{
                              $previousPage = $page-1;
                              $pagePart = 'page='.$previousPage;
                              echo'<li class="page-item page-item-control"><a class="page-link" href="'.$url.$pagePart.$sortByURL.$categoryURL.$brandURL.$viewURL.$searchURL.'" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>';
                              //figure out how many pages before current page
                              for($i=1; $i<$page; $i++){
                                $pagePart = "page=".$i; 
                                echo '
                                <li class="page-item">
                                  <a class="page-link" href="'.$url.$pagePart.$sortByURL.$categoryURL.$brandURL.$viewURL.$searchURL.'">'.$i.'</a>
                                </li>';
                              }
                              echo'<li class="page-item active"><span class="page-link">'.$page.'</span></li>';
                            }
                    echo'<!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item page-item-control"><a class="page-link" href="#" aria-label="Next"><span class="icon" aria-hidden="true"></span></a></li> -->
                        </ul>
                      </nav>
                    </div>
                  ';
                }
              ?>
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
function obtainBadges($row){
  if ($row['salePrice'] != '0.00' && $row['bestSeller'] == '0' && itemIsNew($row['dateAdded'])=="FALSE") {
    echo'<span class="product-badge product-badge-sale">Sale</span>';
  }
  elseif ($row['salePrice'] == '0.00' && $row['bestSeller'] == '1' && itemIsNew($row['dateAdded'])=="FALSE") {
    echo'<span class="product-badge product-badge-bestSeller">Best Seller</span>';
  }
  elseif ($row['salePrice'] == '0.00' && $row['bestSeller'] == '0' && itemIsNew($row['dateAdded'])=="TRUE") {
    echo'<span class="product-badge product-badge-new">New</span>';
  }
  //Best Seller and On Sale
  elseif ($row['salePrice'] != '0.00' && $row['bestSeller'] == '1' && itemIsNew($row['dateAdded'])=="FALSE") {
    echo'<span class="product-badge product-badge-sale" style="margin-top:30px;">Sale</span>';
    echo'<span class="product-badge product-badge-bestSeller">Best Seller</span>';
  }
  //Best Seller and New Item
  elseif ($row['salePrice'] == '0.00' && $row['bestSeller'] == '1' && itemIsNew($row['dateAdded'])=="TRUE") {
    echo'<span class="product-badge product-badge-bestSeller">Best Seller</span>';
    echo'<span class="product-badge product-badge-new" style="margin-top:30px;">New</span>';
  }
  //OnSale and New Item
  elseif ($row['salePrice'] != '0.00' && $row['bestSeller'] == '0' && itemIsNew($row['dateAdded'])=="TRUE") {
    echo'<span class="product-badge product-badge-sale">Sale</span>';
    echo'<span class="product-badge product-badge-new" style="margin-top:30px;">New</span>';
  }
  //OnSale and New Item and Best Seller
  elseif ($row['salePrice'] != '0.00' && $row['bestSeller'] == '1' && itemIsNew($row['dateAdded'])=="TRUE") {
    echo'<span class="product-badge product-badge-sale" style="margin-top:60px;">Sale</span>';
    echo'<span class="product-badge product-badge-new" style="margin-top:30px;">New</span>';
    echo'<span class="product-badge product-badge-bestSeller">Best Seller</span>';
  }
}

function itemIsNew($date){if(strtotime($date) < strtotime('-30 days')){return "FALSE";}else{return "TRUE";}}
?>