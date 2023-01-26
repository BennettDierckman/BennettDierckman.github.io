<?php
require ("db.php");

$sql1="SELECT * FROM items";
$result1 = $mysqli->query($sql1);
$numRows1 = $result1->num_rows;
//if there are employees in the users table 
if ($numRows1 > 0){
while($row = $result1->fetch_assoc()){
	mkdir("../images/items/".$row['itemHash']);
}
}
?>
