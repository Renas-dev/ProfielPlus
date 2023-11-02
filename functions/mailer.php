<?php
/* This file makes the connection to the mailer with the usage of a gmail smtp server.
Which requires the user to have composer installed as it runs locally
*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/../vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = "lighytrix@gmail.com";
$mail->Password = "wdat wcex rrnb ursb";

$mail->isHTML(true);

return $mail;