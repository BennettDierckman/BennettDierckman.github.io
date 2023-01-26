<?php
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $name = $mysqli->escape_string($_POST["name"]);
    $artists = $_POST["artists"];
    $dbArtists = '';
    $category = $mysqli->escape_string($_POST["category"]);
    $subCategory = $mysqli->escape_string($_POST["subCategory"]);
    $nailSize = $mysqli->escape_string($_POST["nailSize"]);
    $quantity = $mysqli->escape_string($_POST["quantity"]);
    $relevance = $mysqli->escape_string($_POST["relevance"]);
    $includes = $_POST["includes"];
    $dbIncludes = '';
    $description = $mysqli->escape_string($_POST["description"]);
    $sellPrice = $mysqli->escape_string($_POST["sellPrice"]);
    $salePrice = $mysqli->escape_string($_POST["salePrice"]);
    $hash = $mysqli->escape_string($_POST['itemHash']);

    $sql1 = "SELECT * FROM items WHERE itemHash='$hash'";
    $result1 = $mysqli->query($sql1);
    $numRows1 = $result1->num_rows;
    //if there are employees in the users table 
    if ($numRows1 > 0){
        $counter = 1;
        while($row = $result1->fetch_assoc()){
            $oldName = $row['name'];
            $oldArtistName = $row['artistName'];
            $oldCategory = $row['category'];
            $oldSubCategory = $row['subCategory'];
            $oldNailSize = $row['nailSize'];
            $oldQuantity = $row['quantity'];
            $oldRelevance = $row['relevance'];
            $oldIncludes = $row['includes'];
            $oldDescription = $row['description'];
            $oldSellPrice = $row['sellPrice'];
            $oldSalePrice = $row['salePrice'];
        }
    }

    if($name==''){ 
        $name = $oldName;
    }
    if(sizeof($artists)==0){
        $dbArtists = $oldArtistName;
    }else{
        foreach ($artists as $artist){
            $dbArtists = $dbArtists . $artist.', ';
        }
    }
        $dbArtists = " ". $dbArtists;
    if($category=='Same'){
        $category = $oldCategory;
    }
    if($subCategory=='Same'){
        $subCategory = $oldSubCategory;
    }
    if($nailSize=='Same'){
        $nailSize = $oldNailSize;
    }
    if($relevance=='Same'){
        $relevance = $oldRelevance;
    }
    if(sizeof($includes)==0){
        $dbIncludes = $oldIncludes;
    }else{
        foreach ($includes as $included){
            $dbIncludes = $dbIncludes . $included.', ';
        }
    }
    if($description==''){
        $description = $oldDescription;
    }
    if($sellPrice==0){
        $sellPrice = $oldSellPrice;
    }

    // $statement = $mysqli->prepare("INSERT INTO items (name, artistName, category, subCategory, nailSize, quantity, relevance, includes, description, buyPrice, sellPrice, salePrice, itemHash) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement = $mysqli->prepare("UPDATE items SET name=?, artistName=?, category=?, subCategory=?, nailSize=?, quantity=?, relevance=?, includes=?, description=?, sellPrice=?, salePrice=? WHERE itemHash=?");
    mysqli_stmt_bind_param($statement, "ssssssssssss", $name, $dbArtists, $category, $subCategory, $nailSize, $quantity, $relevance, $dbIncludes, $description, $sellPrice, $salePrice, $hash);
    if(mysqli_stmt_execute($statement)){
        mysqli_stmt_close($statement);  
        // echo "<script type='text/javascript'> document.location = 'manageItems.php'; </script>"; //Send them to error page
        if(sizeof($_FILES['itemPics']['name']) > 0){
            if($_FILES['itemPics']['name'][0] != ''){
                if(delete_files("../images/items/".$hash."/")){
                    if(mkdir("../images/items/".$hash."/")){
                        for ($i = 0; $i < sizeof($_FILES['itemPics']['name']); $i += 1) {  
                            $target_dir = "../images/items/".$hash."/";
                            $target_file = $target_dir . basename($_FILES["itemPics"]["name"][$i]);
                            echo $target_file;
                            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            echo "<br>" . $fileType;
                            $uploadName = $target_dir . "Photo" .$i. "." . $fileType;
                            echo "<br>".$uploadName;

                            $uploadOk = 1;
                            // Check file size
                            if ($_FILES["itemPics"]["size"][$i] > 15000000) {
                                $_SESSION['message'] = "File too Large."; //set error message
                                $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
                                // echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
                                $uploadOk = 0;
                            }
                            // Allow certain file formats
                            if($fileType != "png" && $fileType!="jpg" && $fileType!="jpeg") {
                                $_SESSION['message'] = "Sorry, only png, jpg, and jpeg files are permitted."; //set error message
                                $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
                                // echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
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
                                    echo "<br>The file ". basename( $_FILES["itemPics"]["name"][$i]). " has been uploaded.<br>";
                                    $_SESSION["message"] = "Professional Photograph Uploaded";
                                    // echo "<script type='text/javascript'> document.location = 'mainDashboard.php'; </script>";
                                } else {
                                    $_SESSION['message'] = "unable to upload."; //set error message
                                    $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
                                    // echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
                                }
                            }
                        }
                        echo "<script type='text/javascript'> document.location = 'manageItems.php'; </script>"; //Send them to error page
                    }else{
                        $_SESSION['message'] = "Unable to Re-make item photo directory."; //set error message
                        $_SESSION['previousPage'] = "manageItems.php";  //set previous page
                        echo "FAIL";
                        // echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
                    }
                }else{
                    $_SESSION['message'] = "Unable to dalete existing photos."; //set error message
                    $_SESSION['previousPage'] = "manageItems.php";  //set previous page
                    echo "FAIL";
                    // echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
                }
            }
            else{
                echo "<script type='text/javascript'> document.location = 'manageItems.php'; </script>"; //Send them to error page
            }
        }
    }else{
        $_SESSION['message'] = "Unable to insert data."; //set error message
        $_SESSION['previousPage'] = "manageItems.php";  //set previous page
        echo "FAIL";
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
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