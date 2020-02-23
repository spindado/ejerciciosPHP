<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use model\PHPMailer\PHPMailer;
use model\PHPMailer\SMTP;
use model\PHPMailer\Exception;

spl_autoload_register(function ($clase) {
    include_once str_replace("\\", "/", $clase) . ".php";
});

require './env.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = MAIL;                     // SMTP username
    $mail->Password   = PASSWORD;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom(MAIL, 'Mailer');
    //$mail->setFrom('from@example.com', 'Mailer');
    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress(MAIL);               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    /*$mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('./image.png', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Register';
    $mail->Body    = 'Bienvenido/a. Acabas de registrarte en App_bookstore.</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("Refresh: 2; url=./view/main.php");
    echo '<p>Message has been sent</p><br>';
} catch (Exception $e) {
    header("Refresh: 2; url=./view/main.php");
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}