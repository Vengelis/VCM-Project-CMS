<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('Exception.php');
include('PHPMailer.php');
include('SMTP.php');

function sendMail($toMail, $toName, $title, $body)
{
    $mail = new PHPMailer();

    try {
        
        $smtpHost = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE smtp_host", array());
        $smtpUsername = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE smtp_username", array());
        $smtpPassword = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE smtp_password", array());
        $smtpPort = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE smtp_port", array());
        $smtpRespondMail = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE smtp_respond_mail", array());
        $smtpRespondName = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE smtp_respond_name", array());

        $mail->isSMTP();                    
        $mail->Host       = $smtpHost['value'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUsername['value'];
        $mail->Password   = $smtpPassword['value'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = intval($smtpPort['value']);

        $mail->setFrom($toMail, $toName);
        $mail->addReplyTo($smtpRespondMail['value'], $smtpRespondName['value']);

        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }

}
