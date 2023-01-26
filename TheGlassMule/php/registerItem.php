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
    $hash = $mysqli->escape_string(md5( rand(0,1000)));

    print_r($_FILES);
    echo '<br>'.sizeof($_FILES['itemPics']['name']);

    // foreach ($_FILES['itemPics']['name'] as )
    // $total = count($_FILES['upload']['name']);
    echo '<br>';
    foreach ($includes as $included){
        echo $included . ' ';
        $dbIncludes = $dbIncludes . $included.', ';
    }
    echo "<br>". $dbIncludes . '<br>';

    echo '<br>';
    foreach ($artists as $artist){
        echo $artist . ' ';
        $dbArtists = $dbArtists . $artist.', ';
    }
    echo "<br> ". $dbArtists . '<br>';
    $dbArtists = " ". $dbArtists;

    echo 'description: '.$description .'<br>';
    echo 'sellPrice: '.$sellPrice .'<br>';
    echo 'salePrice: '.$salePrice .'<br>';

    // $quantity = (int)$quantity;
    // $relevance = (int)$relevance;
    // $buyPrice = (int)$buyPrice;
    // $sellPrice = (int)$sellPrice;
    // $salePrice = (int)$salePrice;
    echo gettype($name).'<br>';
    echo gettype($dbArtists).'<br>';
    echo gettype($category).'<br>';
    echo gettype($subCategory).'<br>';
    echo gettype($nailSize).'<br>';
    echo gettype($quantity).'<br>';
    echo gettype($relevance).'<br>';
    echo gettype($dbIncludes).'<br>';
    echo gettype($description).'<br>';
    echo gettype($sellPrice).'<br>';
    echo gettype($salePrice).'<br>';
    echo gettype($hash).'<br>';

    echo 'Name: '.$name .'<br>';
    echo 'Artist: '.$dbArtists .'<br>';
    echo 'Category: '.$category .'<br>';
    echo 'Sub Cateory: '.$subCategory .'<br>';
    echo 'nailSize: '.$nailSize .'<br>';
    echo 'quantity: '.$quantity .'<br>';
    echo 'relevance: '.$relevance .'<br>';
    echo 'includes: '.$dbIncludes .'<br>';
    echo 'description: '.$description .'<br>';
    echo 'sellPrice: '.$sellPrice .'<br>';
    echo 'salePrice: '.$salePrice .'<br>';
    

    if($_FILES['itemPics']['name'][0] != ''){
        if(mkdir("../images/items/$hash")){ //if item is in db and file on server has been created

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
                    echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($fileType != "png" && $fileType!="jpg" && $fileType!="jpeg") {
                    $_SESSION['message'] = "Sorry, only png, jpg, and jpeg files are permitted."; //set error message
                    $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
                    echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
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
                        echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
                    }
                }
            }
            $statement = $mysqli->prepare("INSERT INTO items (name, artistName, category, subCategory, nailSize, quantity, relevance, includes, description, sellPrice, salePrice, itemHash) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($statement, "ssssssssssss", $name, $dbArtists, $category, $subCategory, $nailSize, $quantity, $relevance, $dbIncludes, $description, $sellPrice, $salePrice, $hash);
            if(mysqli_stmt_execute($statement)){
                mysqli_stmt_close($statement);  
                $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
                $_SESSION['itemHash'] = $hash;
                echo "<script type='text/javascript'> document.location = 'addItemPhotos.php'; </script>"; //Send them to error page
            }else{
                $_SESSION['message'] = "Unable to insert data."; //set error message
                $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
                echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
            }
        }
        else{
            $_SESSION['message'] = "Unable to create directory for Images."; //set error message
            $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
        }
    }else{
        $_SESSION['message'] = "Please Re-upload item with at lest 1 image."; //set error message
        $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
    }
?>