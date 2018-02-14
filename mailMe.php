<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'cvaworking@gmail.com';                 // SMTP username
    $mail->Password = 'nziqtneyjqazjsbg';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('cva.working@gmail.com', 'Mailer');
    $mail->addAddress('cva.working@gmail.com', 'Php Expert');     // Add a recipient
    $mail->addAddress('cva.working@gmail.com');               // Name is optional
    $mail->addReplyTo('cva.working@gmail.com', 'Information');
    $mail->addCC('cva.working@gmail.com');
    $mail->addBCC('cva.working@gmail.com');

    /*//Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Alert Your Machine Out of Control';
    $mail->Body    = 'Your Machine is Accessed By another One Person <br> Current Location :';
    $mail->AltBody = 'How to access your machine and stop unAuthorized Access from that person ?';

    $mail->send();
    echo 'Message has been sent';
} 
catch (Exception $e) 
{
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

