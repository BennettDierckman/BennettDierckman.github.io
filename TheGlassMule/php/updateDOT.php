<?php
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    //pulls variables from register.html , Sanatizes them, and assignes them to various $variables
    $dealItemPrices = $_POST["dealItemPrices"];
    $dealItems = $_POST["dealItems"];
    $retailValue = $_POST["retailValue"];
    $dealPrice = $_POST["dealPrice"];
    $DOT = $_POST["DOT"];
    $contents= '';
    echo $retailValue ."<br>". $dealPrice ."<br>". $DOT;


    // foreach ($dealItems as $dealItem) {
    //     foreach ($dealItemPrices as $dealItemPrice) {
    //         $contents = $contents.$dealItem.' - ';
    //         $contents = $contents.$dealItemPrice.", ";
    //     }
    // }

    for ($i = 0; $i < sizeof($dealItemPrices); $i += 1) {
        $contents = $contents. $dealItems[$i] . " - " . $dealItemPrices[$i].", ";
    }

    if($_FILES['itemPics']['name'][0] != ''){
        if(delete_files("../images/DOT/".$DOT."/")){
            if(mkdir("../images/DOT/".$DOT."/")){
                for ($i = 0; $i < sizeof($_FILES['itemPics']['name']); $i += 1) {  
                    $target_dir = "../images/DOT/".$DOT."/";
                    $target_file = $target_dir . basename($_FILES["itemPics"]["name"][$i]);
                    echo $target_file;
                    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    echo "<br>" . $fileType;
                    $uploadName = $target_dir . $DOT . "." . $fileType;
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
                        $pngPath = $target_dir.$DOT."png";
                        $jpgPath = $target_dir.$DOT.".jpg";
                        $jpegPath = $target_dir.$DOT.".jpeg";
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
                            $_SESSION['message'] = "unable to upload new image."; //set error message
                            $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
                            echo "<script type='text/javascript'> document.location = 'error.php'; </script>";
                        }
                    }
                }
                echo "HERE";
                $statement = $mysqli->prepare("UPDATE shopDeals SET contents=?, retailValue=?, price=? WHERE Name=?");
                mysqli_stmt_bind_param($statement, "ssss", $contents, $retailValue, $dealPrice, $DOT);
                if(mysqli_stmt_execute($statement)){
                    mysqli_stmt_close($statement); 
                    echo "<script type='text/javascript'> document.location = 'mainDashboard.php'; </script>"; //Send them to error page
                }else{
                $_SESSION['message'] = "Unable to update deals table."; //set error message
                $_SESSION['previousPage'] = "mainDashboard.php";  //set previous page
                echo "FAIL";
                echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
            }
            }else{
                $_SESSION['message'] = "Unable to Re-make item photo directory."; //set error message
                $_SESSION['previousPage'] = "manageItems.php";  //set previous page
                echo "FAIL";
                echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
            }
        }else{
            $_SESSION['message'] = "Unable to dalete existing photos."; //set error message
            $_SESSION['previousPage'] = "manageItems.php";  //set previous page
            echo "FAIL";
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; //Send them to error page
        }
    }
    else{
        echo "<script type='text/javascript'> document.location = 'manageItems.php'; </script>"; //Send them to error page
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