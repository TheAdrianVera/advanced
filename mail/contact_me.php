<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
// Check for empty fields
if(empty($_POST['name'])     ||
   empty($_POST['email'])    ||
   empty($_POST['phone'])    ||
   empty($_POST['address'])  ||
   empty($_POST['city'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

   $name = strip_tags(htmlspecialchars($_POST['name']));
   $email = strip_tags(htmlspecialchars($_POST['email']));
   $phone = strip_tags(htmlspecialchars($_POST['phone']));
   $address = strip_tags(htmlspecialchars($_POST['address']));
   $city = strip_tags(htmlspecialchars($_POST['city']));
   $physician = strip_tags(htmlspecialchars($_POST['physician']));
   $medicare = strip_tags(htmlspecialchars($_POST['medicare']));
   $insurance = strip_tags(htmlspecialchars($_POST['insurance']));
   $care_type = strip_tags(htmlspecialchars($_POST['care_type']));
   $emergency_contact_name = strip_tags(htmlspecialchars($_POST['emergency_contact_name']));
   $emergency_contact_phone = strip_tags(htmlspecialchars($_POST['emergency_contact_phone']));

// Create the email and send the message
$to = 'mvera@ahsllc.org'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$to_secondary = 'nlaboy@ahsllc.org'; //secondary email

//$to_mum = 'maria.vera74@gmail.com';
$email_subject = "[CLIENT REFERRAL] AHSLLC Website Referral Form:  $name";
$email_body = "You have received a new message from your Advanced Healthcare Referral Form.\n\n"."Here are the details:\n\nClient Name: $name\n\nClient Email: $email\n\nClient Phone: $phone\n\nAddress:\n$address\n\nCity: $city\n\nPhysician: $physician\n\nCovered by Medicare:\n$medicare\n\nInsurance: $insurance\n\nCare Type Needed: $care_type\n\nEmergency Contact Name: $emergency_contact_name\n\nEmergency Contact Phone: $emergency_contact_phone";
$headers = "From: noreply@ahsllc.org\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";
mail($to_secondary,$email_subject,$email_body,$headers);
mail($to,$email_subject,$email_body,$headers);

//mail($to_mum,$email_subject,$email_body,$headers);
return true;
?>
