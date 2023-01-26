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
    $previousPage = $mysqli->escape_string($_SESSION["previousPage"]);

    if ($itemHash!=''){
        $sql="DELETE FROM items WHERE itemHash='".$itemHash."'";
        if($mysqli->query($sql)){
            if(delete_files("../images/items/".$itemHash."/")){
                $_SESSION['message'] = "Item Deleated.";
                echo "<script type='text/javascript'> document.location = '".$previousPage."'; </script>"; 
            }else{
                $_SESSION['message'] = "Unable to Delete Directory";
                echo "<script type='text/javascript'> document.location = 'error.php'; </script>";   
            }
        }
        else{
            $_SESSION['message'] = "Unable to Delete";
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; 
        }
    }else{
        $_SESSION['message'] = "Unable to Delete2";
            echo "<script type='text/javascript'> document.location = 'error.php'; </script>"; 
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

