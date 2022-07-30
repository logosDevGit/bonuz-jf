<?php
header('Content-Type: application/json; charset=utf-8');

require_once('./vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$phone = filter_input(INPUT_POST, "phone");
$ur = filter_input(INPUT_POST, "UR");
$city = filter_input(INPUT_POST, "city");
$message = filter_input(INPUT_POST, "message");


$mailHTML = " 
Email: $email
<br>
\nNome: $name
<br>
\nTelefone: $phone
<br>
\nEstado: $ur
<br>
\nCidade: $city
<br>
\nMensagem: $message
";

$subject = "Contato Jurídico Familiar";

$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com'; 			//Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'helpdesk@bonuz.it';                     //SMTP username
    $mail->Password   = 'RSl1m031r0!';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('helpdesk@bonuz.it', 'Helpdesk');
    $mail->addAddress('contato@bonuz.it', 'Contato Bonuz');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $mailHTML;

    $mail->send();
    header('Location: https://www.bonuz.it/juridico-familiar?sucess=ok');
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}