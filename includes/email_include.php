<?php
require '../commons/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'udayanganihhdm@gmail.com';
$mail->Password = 'hhdum076';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

