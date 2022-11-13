<?php
//PHP Mailer
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Captcha
//on vérifie que la méthode POST est utilisée
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //On vérifie si le champ "recaptcha-response" contient une valeur
    if (empty($_POST['recaptcha-response'])) {
        header('Location: ../../contact.php');
    } else {
        // On prépare l'URL
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=6Ld1oKIgAAAAAFP_3JLQgzj1AXsVFRAUAQzVUizj&response={$_POST['recaptcha-response']}";


        // On vérifie si curl est installé
        if (function_exists('curl_version')) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            
        } else {
            // On utilisera file_get_contents
            $response = file_get_contents($url);
        }
        //On vérifie qu'on a une réponse
        if (empty($response) || is_null($response)) {
            header('Location: ../../contact.php');
        } else {
            $data = json_decode($response);
            if ($data->succes) {
                // On vérifie que tous les champs sont remplis
                if (
                    isset($_POST['Nom']) && !empty($_POST['Nom']) &&
                    isset($_POST['Prenom']) && !empty($_POST['Prenom']) &&
                    isset($_POST['email']) && !empty($_POST['email']) &&
                    isset($_POST['phone']) && !empty($_POST['phone']) &&
                    isset($_POST['object']) && !empty($_POST['object']) &&
                    isset($_POST['txtArea']) && !empty($_POST['txtArea'])
                    
                ) {
                    //On nettoie le contenu
                    $Nom = strip_tags($_POST['Nom']);
                    $Prenom = strip_tags($_POST['Prenom']);
                    $email = strip_tags($_POST['email']);
                    $phone = strip_tags($_POST['phone']);
                    $object = strip_tags($_POST['object']);
                    $txtArea = htmlspecialchars($_POST['txtArea']);

                    //Load Composer's autoloader
                    require 'vendor/autoload.php';

                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    // $name = $_POST['name'];
                    // $surname = $_POST['surname'];
                    // $email = $_POST['email'];
                    // $message = $_POST['message'];

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'chao.victrard@gmail.com';                     //SMTP username
                        $mail->Password   = 'mjwfpkhktlftjqxk';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom("{$_POST['email']}", "{$_POST['Nom']}", "{$_POST['Prenom']}");
                        $mail->addAddress('victrard@gmail.com', 'VIC');     //Add a recipient
                        // $mail->addAddress('ellen@example.com');               //Name is optional
                        // $mail->addReplyTo('info@example.com', 'Information');
                        // $mail->addCC('cc@example.com');
                        // $mail->addBCC('bcc@example.com');

                        //Attachments
                        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Here is the subject';
                        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


                        //envoi du mail
                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
            } else {
                header('refresh:3;Location: ../../contact.php');
            }
        }
    }
} else {
    http_response_code(405);
    echo 'Méthode non autorisée';
}
