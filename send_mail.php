<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->CharSet = PHPMailer::CHARSET_UTF8;

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'rustamshar@inbox.ru';
$mail->Password = 'zy2QcWAFBVyKmAHkNHGw';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

$mail->setFrom('rustamshar@inbox.ru', 'От сайта');
$mail->addAddress('rustamshar1981@gmail.com', 'Me');

$body = '<p><strong>Имя:</strong> '.$name.'</p>'; 
$body .= '<p><strong>Телефон:</strong> '.$phone.'</p>'; 
$body .= '<p><strong>Email:</strong> '. $email.'</p>'; 
$body .= '<p><strong>Сообщение:</strong> '.$message.'</p>';

$theme = '[Заявка с www.sdproect.ru]';

$mail->isHTML(true);
$mail->Subject = $theme;
$mail->Body = $body;

$mail->send();
?>