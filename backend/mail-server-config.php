<?php
use PHPMailer\PHPMailer\PHPMailer;

function send_mail_to_user($receiver, $subject, $message) {

    require_once("PHPMailer/PHPMailer.php");
    require_once("PHPMailer/SMTP.php");
    require_once("PHPMailer/Exception.php");

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "mail.bsepress.com"; // host address
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = true;
    $mail->Username = "bsewebapp@bsepress.com"; // server mail address
    $mail->Password = 'qs_h{Ij7w^st'; // server mail password
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom('bsewebapp@bsepress.com', 'BSE Web App'); // server mail, site name
    $mail->addAddress($receiver); //enter your email address
    $mail->Subject = ($subject);
    $mail->Body = $message;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }

}