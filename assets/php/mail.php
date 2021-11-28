<?php

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//create mailing instance
$mail = new PHPMailer(true);
// echo "connection made";

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                      //Send using SMTP
    // $mail->IsMail();                                     
    $mail->Host       = '';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('support@websitejan.nl', 'MiRotterdam');
    $mail->addAddress('jard.nogwat@gmail.com'); 
    $email = "email";
    // $age = $_POST['age'];
    $age="age";

    //get latest filename in file without the extention
    $files = scandir('../../upload', SCANDIR_SORT_DESCENDING);
    $newest_file = $files[0];
    $wo_ext = substr($newest_file, 0, strrpos($newest_file, "."));
    $imagenr = $wo_ext + 1;

    $image = $_POST['ontwerp'];
    // $image = '../../upload/2.jpg';
    file_put_contents('../../upload/' . $imagenr .'.png', file_get_contents($image));
    $my_path ="/subdomains/mirotterdam/upload/". $imagenr .".png";
    $mail->addAttachment($my_path);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Ontwerp inzending';
    $mail->Body    = "Email = ". $email . "\r\n<br>  Leeftijd = " . $age . "\r\n <br> Het ingezonde ontwerp:";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header("Location: https://mirotterdam.websitejan.nl"); 
exit();





//functions
    // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
              //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $email = $_POST['email'];
    // if($email){
    //   $mail->addCC($email);
    // };

    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('assets/img/designs/');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name  