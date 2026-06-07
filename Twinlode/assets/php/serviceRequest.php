<?php

require('required.php');

//ESCAPE ALL INPUT VARIABLES (Mitigates injection attacts and brings variables to scope)
$name = $mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);
$company = $mysqli->escape_string($_POST['company']);
$title = $mysqli->escape_string($_POST['title']);
$message = $mysqli->escape_string($_POST['message']);
$requestedService = $mysqli->escape_string($_POST['service']); //--> hidden input field above submit button in code from contact.html
$previousPage = $mysqli->escape_string($_POST['previousPage']); //--> hidden input field above submit button in code from contact.html

//Get Current Date and Time in EST
$date = new DateTime();
$date->setTimezone(new DateTimeZone('America/Detroit'));
$current_time = $date->format('Y-m-d H:i:s');

//figure out the selected service's category
if($requestedService == 'Developer Shield' || $requestedService == 'Document Shield'){
    $requestedServiceCategory = 'Data Security';
}
else if ($requestedService == 'Data Center Services' || $requestedService == 'Database Management' || $requestedService == 'Networking Management' || $requestedService == 'Application Management' || $requestedService == 'Remote Infrastructure Management' ){
	$requestedServiceCategory = 'Managed Services';
}
else if ($requestedService == 'Implementation Services' || $requestedService == 'Resourcing'){
	$requestedServiceCategory = 'Professional Services';
}
else if ($requestedService == 'Cloud Consultation' || $requestedService == 'Architecting Services' || $requestedService == 'Migrating and Deployment' || $requestedService == 'Managed Services' || $requestedService == 'Monitoring and Help Desk'){
	$requestedServiceCategory = 'Cloud Services';
}
else if ($requestedService == 'Office on the Cloud - O365' || $requestedService == 'Desktop Virtualization - VDI' || $requestedService == 'Enterprise App Store' || $requestedService == 'UX Monitoring' || $requestedService == 'Endpoint Security'){
	$requestedServiceCategory = 'Digital Workspace Services';
}
else if($requestedService == 'IT Service Management' || $requestedService == 'DevOps' || $requestedService == 'IT Process Automation' ){
	$requestedServiceCategory = 'Automation Services';
}

//Insert into serviceRequests Table 
$statement = $mysqli->prepare("INSERT INTO serviceRequests (name, email, company, title, message, requestedServiceCategory, requestedService, requestDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($statement, "ssssssss", $name, $email, $company, $title, $message, $requestedServiceCategory, $requestedService, $current_time);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);

$headers = "From: ". $email ."\r\n";
$message_body = "Message from Service page:\n\n".$name." ".$title." at ".$company."\n has requested " .$requestedService. " consultation. \n\nMessage: \n" .$message;

        if (mail( "bennett@shieldio.com", "Service Consultation Request from GFC.com", $message_body, $headers )){
            echo "<script type='text/javascript'> document.location = '" . $previousPage . "'; </script>"; 
        }
        else{
            echo "<script type='text/javascript'> document.location = '" . $previousPage . "'; </script>"; 
        }
?>