<?php
$error = '';
if(!isset($_POST['Send']))
{
	$errors .= "You need to submit the form";
	echo "error; You NEED TO submit the form!";
}
$name = $POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

//validating
if(empty($name)||empty ($email) || empty($message))
{
	$errors .= "\n Error: all fields required";
	echo "Name and Email ID mandatory! ";
	exit;
}
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$visitor_email))
{
    $errors .= "\n Error: Invalid email address";
}
$email_from = 'asbh13cs@cmrit.ac.in';
$email_subject = "New form Submission";
$email_body = "You have received a new message from the user $name.\n".
	"Email address: $visitor_email\n".
	"Here is the message:\n $message".
	
$to = "asbh13cs@cmrit.ac.in";
$headers = "From: $email_from \r\n";

mail($to, $email_subject, $email_body, $headers);

?>