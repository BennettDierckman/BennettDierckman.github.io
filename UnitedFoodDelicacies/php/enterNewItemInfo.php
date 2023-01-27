<?php
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $id = $mysqli->escape_string($_POST["id"]);
    $hash = $mysqli->escape_string($_POST["itemHash"]);

    $oldName = $mysqli->escape_string($_POST["oldName"]);
    $oldDistributor = $mysqli->escape_string($_POST["oldDistributor"]);
    $oldCategory = $mysqli->escape_string($_POST["oldCategory"]);
    $oldBrand = $mysqli->escape_string($_POST["oldBrand"]);
    $oldBestSeller = $mysqli->escape_string($_POST["oldBestSeller"]);
    $oldInStock =  $mysqli->escape_string($_POST["oldInStock"]);
    $oldDescription = $mysqli->escape_string($_POST["oldDescription"]);
    $oldBuyPrice = $mysqli->escape_string($_POST["oldBuyPrice"]);
    $oldSellPrice = $mysqli->escape_string($_POST["oldSellPrice"]);
    $oldSalePrice = $mysqli->escape_string($_POST["oldSalePrice"]);
    $oldPerPack = $mysqli->escape_string($_POST["oldPerPack"]);
    $oldWeight = $mysqli->escape_string($_POST["oldWeight"]);

    $name = "";
    $englishName = $mysqli->escape_string($_POST["englishName"]);
    $arabicName = $mysqli->escape_string($_POST["arabicName"]);
    $farsiName = $mysqli->escape_string($_POST["farsiName"]);
    if ( $englishName =='' &&  $farsiName=='' && $arabicName=='' )  {
        $name = $oldName;
    }
    elseif($englishName!='' && $farsiName!='' && $arabicName=='' ){
        $name = $englishName . ' | ' . $farsiName;
    }
    elseif ($englishName!='' && $farsiName=='' && $arabicName!='' ) {
        $name = $englishName . ' | ' . $arabicName;
    }
    elseif ($englishName!='' && $farsiName=='' && $arabicName=='' ) {
        $name = $englishName;
    }
    elseif ($englishName!='' && $farsiName!='' && $arabicName!='' ) {
        $name = $englishName . ' | ' . $farsiName . ' | ' . $arabicName;
    }
    elseif ($englishName=='' && $farsiName!='' && $arabicName!='' ) {
        $name = ' | ' . $farsiName . ' | ' . $arabicName;
    }
    

    $inStock = $mysqli->escape_string($_POST["inStock"]);
    if ($inStock == '3' || $inStock == 3) {
        $inStock = $oldInStock;
    }

    $bestSeller = $mysqli->escape_string($_POST["bestSeller"]);
    if ($bestSeller == '3' || $bestSeller == 3) {
        $bestSeller = $oldBestSeller;
    }
    

    $distributors = $_POST["distributors"];
    if (sizeof($distributors) == 0) {
        $dbDistributors = $oldDistributor; 
    }else{
        $dbDistributors = '';
        foreach ($distributors as $distributor){
            $dbDistributors = $dbDistributors . $distributor.', ';
        }
    }

    $categories = $_POST["categories"];
    if (sizeof($categories) == 0) {
        $dbCategories = $oldCategory;
    }else{
        $dbCategories = '';
        foreach ($categories as $category){
            $dbCategories = $dbCategories . $category.'| ';
        }
    }

    $brand = $mysqli->escape_string($_POST["brand"]);
    if ($brand=='same') {
        $brand = $oldBrand;
    }

    $description = $mysqli->escape_string($_POST["description"]);
    if ($description == "") {
        $description = $oldDescription;
    }

    $sellPrice = $mysqli->escape_string($_POST["sellPrice"]);
    if ($sellPrice == "") {
        $sellPrice = $oldSellPrice;
    }
    $salePrice = $mysqli->escape_string($_POST["salePrice"]);
    if ($salePrice == "") {
        $salePrice = $oldSalePrice;
    }
    $buyPrice = $mysqli->escape_string($_POST["buyPrice"]);
    if ($buyPrice == "") {
        $buyPrice = $oldBuyPrice;
    }

    $perPack = $mysqli->escape_string($_POST["perPack"]);
    if ($perPack == "") {
        $perPack = $oldPerPack;
    }

    $weight = $mysqli->escape_string($_POST["weight"]);
    if ($weight == "") {
        $weight = $oldWeight;
    }    

    $statement = $mysqli->prepare("UPDATE items SET name=?, distributor=?, category=?, brand=?, inStock=?, bestSeller=?, description=?, buyPrice=?, sellPrice=?, salePrice=?, perPack=?, weight=? WHERE id=?");
    mysqli_stmt_bind_param($statement, "sssssssssssss", $name, $dbDistributors, $dbCategories, $brand, $inStock, $bestSeller, $description, $buyPrice, $sellPrice, $salePrice, $perPack, $weight, $id);
    if(mysqli_stmt_execute($statement)){
        mysqli_stmt_close($statement);
    } 
    
    $directory = "../images/items/".$hash."_".$id;

    if($_FILES['itemPics']['name'][0] != ''){
        if(delete_files("../images/items/".$hash."_".$id."/")){
            if(mkdir($directory)){ //if item is in db and file on server has been created
                for ($i = 0; $i < sizeof($_FILES['itemPics']['name']); $i += 1) {  
                    $target_dir = "../images/items/".$hash."_".$id."/";
                    $target_file = $target_dir . basename($_FILES["itemPics"]["name"][$i]);
                    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $uploadName = $target_dir . "Photo" .$i. "." . $fileType;

                    $uploadOk = 1;
                    // Check file size
                    if ($_FILES["itemPics"]["size"][$i] > 15000000) {
                        $_SESSION['message'] = "File too Large."; //set error message
                        $_SESSION['directTo'] = "mannageItems.php";  //set previous page
                        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($fileType != "png" && $fileType!="jpg" && $fileType!="jpeg") {
                        $_SESSION['message'] = "Sorry, only png, jpg, and jpeg files are permitted."; //set error message
                        $_SESSION['directTo'] = "manageItems.php";  //set previous page
                        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "<br>Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                        $pngPath = $target_dir. "Photo".$i.".png";
                        $jpgPath = $target_dir . "Photo".$i.".jpg";
                        $jpegPath = $target_dir . "Photo".$i.".jpeg";
                        if (file_exists($pngPath)){
                            unlink($pngPath);
                        }
                        if (file_exists($jpgPath)){
                            unlink($jpgPath);
                        }
                        if (file_exists($jpegPath)){
                            unlink($jpegPath);
                        }
                        if (move_uploaded_file($_FILES["itemPics"]["tmp_name"][$i], $uploadName)) {
                            $_SESSION["message"] = "Uploaded";
                        } else {
                            $_SESSION['message'] = "unable to update item's images."; //set error message
                            $_SESSION['directTo'] = "manageItems.php";  //set previous page
                            echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
                        }
                    }
                }
                $_SESSION['message'] = "Item Successfully Updated."; //set error message
                $_SESSION['directTo'] = "manageItems.php";  //set previous page
                echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
            }
            else{
                $_SESSION['message'] = "Unable to create directory for Images."; //set error message
                $_SESSION['directTo'] = "dashboard.php";  //set previous page
                echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
            }
        }else{
            $_SESSION['message'] = "Unable to delete old item photos.";
            $_SESSION['directTo'] = "manageItems.php";
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
        }
    }else{
        $_SESSION['message'] = "Item info updated.";
        $_SESSION['directTo'] = "manageItems.php";
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
    }

    function delete_files($target) {
        if(is_dir($target)){
            $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
            foreach( $files as $file ){
                delete_files( $file );      
            }
            rmdir( $target );
            return true;
        } elseif(is_file($target)) {
            unlink( $target );  
            return false;
        }
    }
?>