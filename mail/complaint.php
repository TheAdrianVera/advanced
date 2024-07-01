<?php

// Check for empty fields in Anonmyous Feedback Form
if(empty($_POST['feedback_subject'])     ||
   empty($_POST['feedback_date'])    ||
   empty($_POST['feedback_body']))
   {
   echo "No Information Provided!";
   return false;
   }


   //Variables for Complaint Email
   $feedback_subject = strip_tags(htmlspecialchars($_POST['feedback_subject']));
   $feedback_date = strip_tags(htmlspecialchars($_POST['feedback_date']));
   $feedback_body = strip_tags(htmlspecialchars($_POST['feedback_body']));

  //Receiving Emails of Anonmyous Feedback Form
  $to = 'nlaboy@ahsllc.org';
  $to_info = 'info@ahsllc.org';

  //Email Subject
  $email_subject = "[ANONMYOUS FEEDBACK FORM] AHSLLC Web Form Subject:  $feedback_subject";

  //Email Body
  $email_body = "You have received a new message from your Advanced Healthcare Anonmyous Feedback Form.\n\n"."Here are the details:\n\nFeedback Subject: $feedback_subject\n\nFeedback Date: $feedback_date\n\nFeedback Content: $feedback_body";

  //Email Headers
  $headers = "From: noreply@ahsllc.org\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
  $headers .= "Reply-To: ANONMYOUS";

  //Emails to be Sent
  mail($to,$email_subject,$email_body,$headers);
  mail($to_info,$email_subject,$email_body,$headers);

  return true;
?>
