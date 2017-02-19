<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->isSMTP(true); // telling the class to use SMTP
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
$mail->SMTPSecure = 'tls';
$mail->Host = 'tls://smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "dominhsang94@gmail.com"; // SMTP username
$mail->Password = "dominhsang"; // SMTP password
// TCP port to connect to
$mail->setFrom('dominhsang94@gmail.com');
$mail->AddAddress("dominhsang@student.ptithcm.edu.vn");
$mail->Subject = "DEMO MAILER";
$mail->Body = "こんにちは";
$mail->WordWrap = 70;
//Send email and check if it was sent
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
echo 'Message has been sent';
