<?php

    $phpmailer = new PHPMailer();
    $phpmailer->SetLanguage('zh', '/PHPMailer/language/');
    $phpmailer->ContentType = "text/html";
    $phpmailer->CharSet = "UTF-8";
    $phpmailer->Encoding = "base64";
    $phpmailer->Timeout = 60;
    /////////////////////////////////////////////////////////////////

    $phpmailer->SingleTo = true; //will send mail to each email address individually


    $phpmailer->IsSMTP();
    // $phpmailer->SMTPDebug = 2; //上線應該要刪掉
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = "ssl";
    $phpmailer->Host = "smtp.gmail.com";
    $phpmailer->Port = 465;
    $phpmailer->Username = "sendmail@goods-design.com.tw";
    $phpmailer->Password = "jojegzonugxayyrv";

?>