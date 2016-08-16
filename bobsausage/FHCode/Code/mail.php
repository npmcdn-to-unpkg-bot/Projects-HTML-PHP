<?php

    require "PHPMailerAutoload.php";
    include "class.phpmailer.php";
    include "class.smtp.php";
    
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $message = $_POST['goals'];

    $address = 'info@foxhealth.co.uk';
    $password = 'q4qe^CWkW';
    $email = new PHPmailer();
    $email->isSMTP();
    $email->CharSet = 'UTF-8';
    $email->Host = 'mail.foxhealth.co.uk';
    $email->SMTPAuth = true;
    $email->Username = $address;
    $email->Password = $password;
    $email->Port = 587;
    $email->setFrom($address, 'Form submit');
    $email->Subject = "Form submit";

    $finalMessage = "Name: " . $name . ". Email: " . $mail . ". Goals: " . $message;

    $email->Body    = "$finalMessage";
    $email->AltBody = "$finalMessage";
    $email->addAddress($address, 'Form submit');
    
    if(!$email->send()) {
        echo 'Error: ' . $email->ErrorInfo;
    } else {
        echo 'Thanks for your message. Peter will be in touch with you shortly';
    }
    
?>