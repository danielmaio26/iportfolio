<?php
$result="";
if(isset($_POST['submit'])){
    require 'assets/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.zoho.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='info@wasabidev.com.br';
    $mail->Password='Dvg6FR$edT';

    $mail->setFrom($_POST['email'],$_POST['name']);
    $mail->addAddress('info@wasabidev.com.br');

    $mail->isHTML(true);
    $mail->Subject='Enviado por '.$_POST['name'];
    $mail->Body='<h1 align=center>Nombre: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br
    >Mensaje: '.$_POST['message'].'</h1>';
    if(!$mail->send()){
        $result="Algo esta mal, por favor inténtelo de nuevo.";
    }
    else{
        $result="Gracias ".$_POST['name']." por contactarnos, espera la respuesta!";
    }
}
?>
