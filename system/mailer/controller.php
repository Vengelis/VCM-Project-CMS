<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('system/mailer/Exception.php');
include('system/mailer/PHPMailer.php');
include('system/mailer/SMTP.php');

include("system/mailer/mail_template_send_token.php");
include("system/mailer/mail_template_send_valid.php");

if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

function sendMail($toMail, $toName, $title, $body)
{
    $mail = new PHPMailer(); // add true in () for debug

    try {
        
        $smtpHost = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_host'", array());
        $smtpUsername = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_username'", array());
        $smtpPassword = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_password'", array());
        $smtpPort = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_port'", array());
        $smtpRespondMail = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_respond_mail'", array());
        $smtpRespondName = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_respond_name'", array());

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        $mail->isSMTP();       
        $mail->Host       = $smtpHost['value'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUsername['value'];
        $mail->Password   = $smtpPassword['value'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = intval($smtpPort['value']);

        $mail->setFrom($toMail, $toName);
        $mail->addAddress($toMail, $toName);
        $mail->addReplyTo($smtpRespondMail['value'], $smtpRespondName['value']);

        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }

}
