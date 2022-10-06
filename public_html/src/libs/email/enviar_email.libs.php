<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/phpmailer/src/Exception.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/phpmailer/src/PHPMailer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/phpmailer/src/SMTP.php');


function enviar_email($nomedestinatario, $emaildestinatario, $assunto, $texto){

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';    
        $mail->SMTPAuth   = true;     
        $mail->Username   = 'spacewide1305@gmail.com';
        $mail->Password   = 'chefsikjgabcajpl';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->setFrom('testesw@gmail.com', 'SpaceWide');
        $mail->addAddress($emaildestinatario, $nomedestinatario);
        $mail->isHTML(true);
        $mail->Subject    = $assunto;
        $mail->Body       = $texto;
        $mail->WordWrap   = 50;
        $mail->SMTPDebug  = 2;
        $mail->send();
        
        registrar_log('Mensagem enviada');

    } catch (Exception $ero) {
        registrar_log("Messagem não foi enviada. Mailer Error: {$mail->ErrorInfo}");
    }

}
?>