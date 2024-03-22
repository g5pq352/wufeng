<?php
    require_once('PHPMailer/PHPMailerAutoload.php');
    include 'smtpsetting.php';
    /////////////////////////////////////////////////////////////////

    $phpmailer->SetFrom('maysuregun@gmail.com', 'test');
    $phpmailer->AddReplyTo('maysuregun@gmail.com', 'test');

    $phpmailer->AddAddress("maysuregun@gmail.com","test-聯絡我們通知");

    $phpmailer->Subject = "test";

    $mailContent = "<div style='max-width: 500px; letter-spacing: 1px;'>"

        ."測試文字： $_POST['title'] <br><br>"

        ."</div>";


    $phpmailer->Body = $mailContent;
    $phpmailer->IsHTML(true);

    if(!$phpmailer->Send()) {
        echo "<div class='err'>傳送時失敗，請稍後再試，或連絡客服！</div>";
    } else {
        echo "感謝您的來信！我們將會儘快回覆您。<br>Thanks for your message, and we'll contact you ASAP.";
    }
?>