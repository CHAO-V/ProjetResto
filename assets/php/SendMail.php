<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './../../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'chao.victrard@gmail.com';
    $mail->Password = 'mjwfpkhktlftjqxk';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom("{$_POST['email']}", "{$_POST['Nom']}", "{$_POST['Prenom']}");
    $mail->addAddress('chao.victrard@gmail.com', 'CHAO');

    $mail->isHTML(true);
    $mail->Subject = "{$_POST['object']}";
    $mail->Body = "{$_POST['txtArea']}";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<div style='margin: auto; font-size: 2em; text-align: center; margin-top: 45vh'>Votre message a été envoyé 
                    <br>
                    <a href='./../../contact.php' style='text-decoration: none'>Retour au blog</a></div>";
} catch (Exception $e) {
    echo "Votre message n'a pas été envoyé : {$mail->ErrorInfo}";
}

?>