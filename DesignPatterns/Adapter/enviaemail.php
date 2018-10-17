<?php

require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailerAdapter.php';

$mail = new PHPMailerAdapter;
$mail->setUseSmtp();
$mail->setSmtpHost('smtp.gmail.com', 465);
$mail->setSmtpUser('wpmj1277@gmail.com', 'juninho95');
$mail->setFrom('wpmj1277@gmail.com', 'Walter');
$mail->addAddress('walterjr77@hotmail.com', 'Destinatário');
$mail->setSubject('Oi Cara');
$mail->setHtmlBody('<b>Isso é um <i>teste</i></b>');
$mail->send();