<?php

// Check for empty fields
if (empty($_POST['name']) ||
		empty($_POST['email']) ||
		empty($_POST['phone']) ||
		empty($_POST['message']) ||
		!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	echo "No arguments Provided!";
	return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'agung079@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

require('./PHPMailer/class.phpmailer.php');
$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';

$body = $email_body;

$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';

$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;

$mail->Username = 'author6601@gmail.com';
$mail->Password = 'ken09shin';

$mail->SetFrom('me.sender@gmail.com', $email_address);
$mail->AddReplyTo('no-reply@agung-s.com', 'no-reply');
$mail->Subject = $email_subject;
$mail->MsgHTML($body);

$mail->AddAddress($to, 'title1');
$mail->send();

return true;
?>
