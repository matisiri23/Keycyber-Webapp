<?php
$name ="name";
$email ="d7613758@gmail.com";
$subject = "test";
$message = "test";

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "d7613758@gmail.com";
$mail->Password = "bwet inbw zxqj pazc";

$mail->setFrom($email, $name);
$mail->addAddress("d7613758@gmail.com");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();
echo "email sent";
