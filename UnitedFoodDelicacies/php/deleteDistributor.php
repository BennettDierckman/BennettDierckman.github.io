<?php
    //Establishes connection with database
    require("db.php");

    //Start the Session -> Allows us to carry variables around the application
    session_start();

    $id = $mysqli->escape_string($_POST["distributorId"]);//bring in the distributorID from the calling page

    $statement = $mysqli->prepare("DELETE FROM distributors WHERE id=?"); //create delete statement
    mysqli_stmt_bind_param($statement, "s", $id); //Bind variable
    if (mysqli_stmt_execute($statement)) { //If the statement is executed (and the distributor is deleted)
        //Now, we must edit the category of any item that used to contain the distributor
        $result = $mysqli->query("SELECT * FROM items");
        if ( $result->num_rows > 0 ){ //There are items.
            while($item = $result->fetch_assoc()){ //loop through each item
                $distributors = explode(", ", $item['distributor']); //Explode string of distributor IDs into array
                if (in_array( $id, $distributors)) { //The item has the distributor that is to be deleated
                    $newDistributors = ""; //initialize string for item's revized distributor list
                    for($i=0; $i < sizeof($distributors) - 2; $i++){
                        if ($distributors[$i] != $id) { //If the distributor is not the one that is to be deleated
                            $newDistributors = $newDistributors . $distributors[$i] . ", ";
                        }
                    }
                    $sql = "UPDATE items SET distributor='".$newDistributors."' WHERE id='".$item['id']."'";
                    if (! $mysqli->query($sql)) {
                        $_SESSION['message'] = "Something went wrong."; //set error message
                        $_SESSION['directTo'] = "dashboard.php";  //set previous page
                        echo "<script type='text/javascript'> document.location = 'message.php'; </script>";
                    }
                }
            }
            $_SESSION['message'] = "Distributor Deleted."; //set error message
            $_SESSION['directTo'] = "dashboard.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to   
        }
        else{// No items contained the distributor
            $_SESSION['message'] = "Distributor Deleted."; //set error message
            $_SESSION['directTo'] = "dashboard.php";  //set previous page
            echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to    
        }
    }else{
        $_SESSION['message'] = "Unable to locate/delete Distributor."; //set error message
        $_SESSION['directTo'] = "dashboard.php";  //set previous page
        echo "<script type='text/javascript'> document.location = 'message.php'; </script>"; //Send them to 
    }
?>