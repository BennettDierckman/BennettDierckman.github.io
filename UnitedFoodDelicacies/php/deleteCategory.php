<?php
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    $id = $mysqli->escape_string($_POST["categoryId"]);//bring in the distributorID from the calling page

    $statement = $mysqli->prepare("DELETE FROM categories WHERE id=?"); //create delete statement
    mysqli_stmt_bind_param($statement, "s", $id); //Bind variable
    if (mysqli_stmt_execute($statement)) { //If the statement is executed (and the distributor is deleted)
        //Now, we must edit the category of any item that used to contain the distributor
        $result = $mysqli->query("SELECT * FROM items");
        if ( $result->num_rows > 0 ){ //There are items.
            while($item = $result->fetch_assoc()){ //loop through each item
                $categories = explode("| ", $item['category']); //Explode string of distributor IDs into array
                if (in_array( $id, $categories)) { //The item has the distributor that is to be deleated
                    $newCategories = ""; //initialize string for item's revized distributor list
                    for($i=0; $i < sizeof($categories) - 2; $i++){
                        if ($categories[$i] != $id) { //If the distributor is not the one that is to be deleated
                            $newCategories = $newCategories . $categories[$i] . "| ";
                        }
                    }
                    $sql = "UPDATE items SET category='".$newCategories."' WHERE id='".$item['id']."'";
                    if (! $mysqli->query($sql)) {
                        $_SESSION['message'] = "Something went wrong."; //set error message
                        $_SESSION['directTo'] = "dashboard.php";  //set previous page
                        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
                    }
                }
            }
            $_SESSION['message'] = "Category Deleted."; //set error message
            $_SESSION['directTo'] = "dashboard.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to   
        }
        else{// No items contained the distributor
            $_SESSION['message'] = "Category Deleted."; //set error message
            $_SESSION['directTo'] = "dashboard.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to    
        }
    }else{
        $_SESSION['message'] = "Unable to locate/delete Category."; //set error message
        $_SESSION['directTo'] = "dashboard.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to 
    }
?>