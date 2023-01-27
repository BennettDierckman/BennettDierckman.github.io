<?php
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $englishName = $mysqli->escape_string($_POST["englishName"]);
    $farsiName = $mysqli->escape_string($_POST["farsiName"]);
    $arabicName = $mysqli->escape_string($_POST["arabicName"]);
    $distributors = $_POST["distributors"];
    $dbDistributors = '';
    $categories = $_POST["categories"];
    $dbCategories = '';
    $brand = $mysqli->escape_string($_POST["brand"]);
    $bestSeller = $mysqli->escape_string($_POST["bestSeller"]);
    $description = $mysqli->escape_string($_POST["description"]);
    $sellPrice = $mysqli->escape_string($_POST["sellPrice"]);
    $salePrice = $mysqli->escape_string($_POST["salePrice"]);
    $buyPrice = $mysqli->escape_string($_POST["buyPrice"]);
    $weight = $mysqli->escape_string($_POST["weight"]);
    $perPack = $mysqli->escape_string($_POST["perPack"]);
    $dateAdded = date("Y/m/d");
    $hash = $mysqli->escape_string(md5( rand(0,1000)));

    print_r($_FILES);
    echo '<br>'.sizeof($_FILES['itemPics']['name']);

    // if (isset($_POST['farsiName']) && isset($_POST['arabicName']) ) { <-- does not work these variables are set no matter what
    //     $name = $englishName . ' | ' . $farsiName . ' | ' . $arabicName;
    // }elseif(isset($_POST['farsiName']) && !isset($_POST['arabicName']) ){
    //     $name = $englishName . ' | ' . $farsiName;
    // }elseif (!isset($_POST['farsiName']) && isset($_POST['arabicName'])) {
    //     $name = $englishName . ' | ' . $arabicName;
    // }else{
    //     $name = $englishName;
    // }

    if ( $farsiName=='' && $arabicName=='' )  {
        $name = $englishName;
    }
    elseif($farsiName!='' && $arabicName=='' ){
        $name = $englishName . ' | ' . $farsiName;
    }
    elseif ($farsiName=='' && $arabicName!='' ) {
        $name = $englishName . ' | ' . $arabicName;
    }
    elseif ($farsiName!='' && $arabicName!='' ) {
        $name = $englishName . ' | ' . $farsiName . ' | ' . $arabicName;
    }

    echo '<br>';
    if (sizeof($categories) != 0) {
        foreach ($categories as $category){
            echo $category . ' ';
            $dbCategories = $dbCategories . $category.'| ';
        }
    }
    echo "<br>". $dbCategories . '<br>';

    echo '<br>';
    if (sizeof($distributors) != 0) {
        foreach ($distributors as $distributor){
            echo $distributor . ' ';
            $dbDistributors = $dbDistributors . $distributor.', ';
        }
    }
    echo "<br> ". $dbDistributors . '<br>';


    echo 'description: '.$description .'<br>';
    echo 'sellPrice: '.$sellPrice .'<br>';
    echo 'salePrice: '.$salePrice .'<br>';

    // $quantity = (int)$quantity;
    // $relevance = (int)$relevance;
    // $buyPrice = (int)$buyPrice;
    // $sellPrice = (int)$sellPrice;
    // $salePrice = (int)$salePrice;
    echo gettype($name).'<br>';
    echo gettype($dbDistributors).'<br>';
    echo gettype($dbCategories).'<br>';
    echo gettype($description).'<br>';
    echo gettype($sellPrice).'<br>';
    echo gettype($salePrice).'<br>';
    echo gettype($buyPrice).'<br>';
    echo gettype($hash).'<br>';

    echo 'Name: '.$name .'<br>';
    echo 'Artist: '.$dbDistributors .'<br>';
    echo 'Category: '.$dbCategories .'<br>';
    echo 'Brand: '.$brand .'<br>';
    echo 'Best Seller: '.$bestSeller .'<br>';
    echo 'description: '.$description .'<br>';
    echo 'sellPrice: '.$sellPrice .'<br>';
    echo 'salePrice: '.$salePrice .'<br>';
    echo 'buyPrice: '.$buyPrice .'<br>';
    echo 'hash: '.$hash .'<br>';



    $statement = $mysqli->prepare("INSERT INTO items (name, distributor, category, brand, bestSeller, description, buyPrice, sellPrice, salePrice, itemHash, perPack, weight, dateAdded) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
    mysqli_stmt_bind_param($statement, "sssssssssssss", $name, $dbDistributors, $dbCategories, $brand, $bestSeller, $description, $buyPrice, $sellPrice, $salePrice, $hash, $perPack, $weight, $dateAdded);
    if(mysqli_stmt_execute($statement)){
        mysqli_stmt_close($statement);
        echo "<br>success";
        $result = $mysqli->query("SELECT * FROM items ORDER BY id");
        if ( $result->num_rows > 0 ) {
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
            }
        }
        echo "<br>". $id;
    } 
    
    $directory = "../images/items/".$hash."_".$id;
    echo $directory;
    if($_FILES['itemPics']['name'][0] != ''){
        if(mkdir($directory)){ //if item is in db and file on server has been created
            for ($i = 0; $i < sizeof($_FILES['itemPics']['name']); $i += 1) {  
                $target_dir = "../images/items/".$hash."_".$id."/";
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
                    $_SESSION['directTo'] = "dashboard.php";  //set previous page
                    echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($fileType != "png" && $fileType!="jpg" && $fileType!="jpeg") {
                    $_SESSION['message'] = "Sorry, only png, jpg, and jpeg files are permitted."; //set error message
                    $_SESSION['directTo'] = "dashboard.php";  //set previous page
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
                        echo "<br>The file ". basename( $_FILES["itemPics"]["name"][$i]). " has been uploaded.<br>";
                        $_SESSION["message"] = "Uploaded";
                    } else {
                        $_SESSION['message'] = "unable to upload."; //set error message
                        $_SESSION['directTo'] = "dashboard.php";  //set previous page
                        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
                    }
                }
            }
            $_SESSION['message'] = "Item Successfully Uploaded."; //set error message
            $_SESSION['directTo'] = "dashboard.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
        }
        else{
            deleteEntry($id);
            $_SESSION['message'] = "Unable to create directory for Images."; //set error message
            $_SESSION['directTo'] = "dashboard.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
        }
    }else{
        deleteEntry($id);
        $_SESSION['message'] = "Please Re-upload item with at lest 1 image."; //set error message
        $_SESSION['directTo'] = "dashboard.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
    }

function deleteEntry($id){
    global $mysqli;
    $sql = "DELETE FROM items where id=".$id;
    if ($mysqli->query($sql)) {
        echo "deleated";
    }
}
?>