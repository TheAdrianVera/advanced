<?php
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
$to = 'nlaboy@ahsllc.org';
$to_info = 'info@ahsllc.org';

//Email Subject
$email_subject = "[CLIENT REFERRAL] AHSLLC Website Referral Form:  $name";
//Email Body
$email_body = "You have received a new message from your Advanced Healthcare Referral Form.\n\n"."Here are the details:\n\nClient Name: $name\n\nClient Email: $email\n\nClient Phone: $phone\n\nAddress:\n$address\n\nCity: $city\n\nPhysician: $physician\n\nCovered by Medicare:\n$medicare\n\nInsurance: $insurance\n\nCare Type Needed: $care_type\n\nEmergency Contact Name: $emergency_contact_name\n\nEmergency Contact Phone: $emergency_contact_phone";
//Email Headers
$headers = "From: noreply@ahsllc.org\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";

//Mail Functions
mail($to,$email_subject,$email_body,$headers);
mail($to_info,$email_subject,$email_body,$headers);

return true;
?>
