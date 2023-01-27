<?php
require	("db.php");

session_start();

$firstName = $mysqli->escape_string($_POST['fn']);
$lastName = $mysqli->escape_string($_POST['ln']);
$email = $mysqli->escape_string($_POST['email']);
$company = $mysqli->escape_string($_POST['company']);
$title = $mysqli->escape_string($_POST['title']);
$question = $mysqli->escape_string($_POST['question']);
$currentPage = $mysqli->escape_string($_POST['currentPage']);

$existingVisitorSQL = "SELECT * FROM visitors WHERE email='$email'";
$existingVisitorResult = $mysqli->query($existingVisitorSQL);
$existingVisitorNumRows = $existingVisitorResult->num_rows;

if ($existingVisitorNumRows < 1){
	$newVisitorSQL = "INSERT INTO visitors (first_name, last_name, email, company, title) VALUES ('$firstName', '$lastName', '$email', '$company', '$title')";
	if ($mysqli->query($newVisitorSQL)) {
		$newVisitorSQL = "SELECT * FROM visitors WHERE email='$email'";
		$newVisitorResult = $mysqli->query($newVisitorSQL);
		if ($newVisitorResult) {
			while($row = $newVisitorResult->fetch_assoc()){
				$id=$row['id'];
			}		
		}
	}
}
else{
	while($row = $existingVisitorResult->fetch_assoc()){
		$id=$row['id'];
	}
}

if ($id != "") {
	$questionSQL = "INSERT INTO questions (visitor, question, page) VALUES ('$id', '$question', '$currentPage')";
	if ($mysqli->query($questionSQL)) {
		$_SESSION['questionMessage'] = "Thank you for submitting your question.";
		echo "<script type='text/javascript'> document.location = '".$currentPage."'; </script>";
	}
	
}else{
	echo "issue uploading your question to our server";
}



?>