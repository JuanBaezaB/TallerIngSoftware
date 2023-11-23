<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Configuración del servidor
    $mail->SMTPDebug = 0;                             
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'eurofranoficial@gmail.com';                 
    $mail->Password = 'jfadldgrgdbpwjwn';                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('jbaeza@ing.ucsc.cl', 'Joe User');     

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>