<?php

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['Subject'];
    $body = $_POST['body'];

    require_once "php/PHPMailer.php";
    require_once "php/SMTP.php";
    require_once "php/Exception.php";

    $mail = new PHPMailer();

    //smtp seting
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "a.s.d.l30042002@gmail.com";
    $mail->Password = "isdqocenkuwuyybj";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email seting 
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("a.s.d.l30042002@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email terkirim";
    }
    else
    {
        $status = "failed";
        $response = "Ada masalah : <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>