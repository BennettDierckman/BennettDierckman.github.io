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

    $itemHash = $mysqli->escape_string($_POST["itemHash"]);
    $itemId = $mysqli->escape_string($_POST["itemId"]);

    if ($itemHash!='' && $itemId!=''){
        $sql="DELETE FROM items WHERE id='".$itemId."' AND itemHash='".$itemHash."'";
        if($mysqli->query($sql)){
            if(delete_files("../images/items/".$itemHash."_".$itemId."/")){
                $_SESSION['message'] = "Item Deleated."; //set error message
                $_SESSION['directTo'] = "manageItems.php";  //set previous page
                echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
            }else{
                $_SESSION['message'] = "Unable to delete directory of item images.";
                $_SESSION['directTo'] = "manageItems.php";  //set previous page
                echo "<script type='text/javascript'> document.location = 'message.php'; </script>";//Send them to error page            
            }
        }
        else{
            $_SESSION['message'] = "Unable to delete item from database.";
            $_SESSION['directTo'] = "manageItems.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
        }
    }else{
        $_SESSION['message'] = "Session has timed out, please log in again.";
        $_SESSION['directTo'] = "manageItems.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to error page
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

