<?php
$nombre = $_POST["name"];
$email = $_POST["email"];
$tema = $_POST["subject"];
$mensaje = $_POST["message"];
$body = "Nombre y Apellido: " . $nombre . "<br>Correo: " . $email . "<br>Tema: " . $tema . "<br>Mensaje: " . $mensaje; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/phpmailer/Exception.php';
require 'assets/phpmailer/PHPMailer.php';
require 'assets/phpmailer/SMTP.php';
require 'assets/phpmailer/constante.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.zoho.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@wasabidev.com.br';
    $mail->Password   = EMAIL_PASSWORD;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('info@wasabidev.com.br', $nombre);
    $mail->addAddress($email, $nombre);

    //Content
    $mail->isHTML(true);
    $mail->Subject = ($tema);
    $mail->Body    = ($body);

    $mail->send();
    echo 'Email enviado correctamente!';
} catch (Exception $e) {
    echo 'Lo siento pero hubo un error...' . $e->getMessage();
}