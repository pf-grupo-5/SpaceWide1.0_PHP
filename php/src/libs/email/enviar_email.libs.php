<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/PHPMailer/src/Exception.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/PHPMailer/src/PHPMailer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/PHPMailer/src/SMTP.php');


function enviaremail($nomedestinatario, $emaildestinatario, $assunto, $texto){

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';    
        $mail->SMTPAuth   = true;     
        $mail->Username   = 'testesw1305@gmail.com';
        $mail->Password   = 'dyalczocozjsmfqj';
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