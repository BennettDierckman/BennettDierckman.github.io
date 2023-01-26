<?php

require('required.php');
date_default_timezone_set('PST');

//ESCAPE ALL INPUT VARIABLES (Mitigates injection attacts and brings variables to scope)
$name = $mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);
$company = $mysqli->escape_string($_POST['company']);
$title = $mysqli->escape_string($_POST['title']);
$message = $mysqli->escape_string($_POST['message']);

//Determine selected service
$selectedService = $mysqli->escape_string($_POST['selectedService']);
if ($selectedService == 'developerShield'){
    $subject = "Service Request: Developer Shield";   
    $service = "Developer Shield";
}
else if($selectedService == 'documentShield'){
    $subject = "Service Request: Document Shield";
    $service = "Document Shield";
}

else if($selectedService == 'dataCenterServices'){
    $subject =  "Service Request: Data Center Services ";
    $service = "Data Center Services";
}
else if($selectedService == 'databaseManagement'){
    $subject =  "Service Request: Database Management ";
    $service = "Database Management";
}
else if($selectedService == 'networkManagement'){
    $subject =  "Service Request: Network Management";
    $service = "Network Management";
}
else if($selectedService == 'applicationManagement'){
    $subject =  "Service Request: Application Management ";
    $service = "Application Management";
}
else if($selectedService == 'remoteInfrastructureManagement'){
    $subject =  "Service Request: Remote Infrastructure Management";
    $service = "Remote Infrastructure Management";
}


else if($selectedService == 'implementationServices'){
    $subject =  "Service Request: Implementation Services";
    $service = "Implementation Services";
}
else if($selectedService == 'resourcing'){
    $subject =  "Service Request: Resourcing";
    $service = "resourcing";
}

else if($selectedService == 'cloudConsultation'){
    $subject =  "Service Request: Cloud Consultation";
    $service = "Cloud Consultation";
}
else if($selectedService == 'cloudArchitecture'){
    $subject =  "Service Request: Cloud Architecture";
    $service = "Cloud Architecture";
}
else if($selectedService == 'migratingAndDeployment'){
    $subject =  "Service Request: Migrating and Deployment";
    $service = "Migrating and Deployment";
}
else if($selectedService == 'managedServices'){
    $subject =  "Service Request: Managed Services";
    $service = "Managed Services";
}
else if($selectedService == 'monitoringAndHelpDesk'){
    $subject =  "Service Request: Monitoring and Help Desk";
    $service = "Monitoring and Help Desk";
}

else if($selectedService == 'office365'){
    $subject =  "Service Request: Office on tthe Cloud - O365";
    $service = "Office on the Cloud - O365";
}
else if($selectedService == 'desktopVirtualization'){
    $subject =  "Service Request: Desktop Virtualization - VDI";
    $service = "Desktop Virtualization - VDI";
}
else if($selectedService == 'enterpriseAppStore'){
    $subject =  "Service Request: Enterprise App Store";
    $service = "Enterprise App Store";
}
else if($selectedService == 'uxMonitoring'){
    $subject =  "Service Request: User Experience Monitoring";
    $service = "User Experience Monitoring";
}
else if($selectedService == 'endpointSecurity'){
    $subject =  "Service Request: Endpoint Security";
    $service = "Endpoint Security";
}

else if($selectedService == 'itServiceManagement'){
    $subject =  "Service Request: IT Service Management";
    $service = "IT Service Management";
}
else if($selectedService == 'devOps'){
    $subject =  "Service Request: Dev Ops";
    $service = "Dev Ops";
}
else if($selectedService == 'itProcessAutomation'){
    $subject =  "Service Request: IT Process Automation";
    $service = "IT Process Automation";
}




$headers = "From: ". $email ."\r\n";
$message_body = "Message from Contact page:\n\n".$name.", ".$title." at ".$company."\n has requested " .$service. " consultation. \n\nMessage: \n" .$message;

        if (mail( "bennett@shieldio.com", "GFC Contact Page General Message", $message_body, $headers )){
            echo "<script type='text/javascript'> document.location = '../../contact2.html'; </script>"; 
        }
        else{
            echo "<script type='text/javascript'> document.location = '../../contact.html'; </script>"; 
        }
?>