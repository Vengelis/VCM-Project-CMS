<?php
require("system/mailer/controller.php");

if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

function validAccount($user, $email)
{
    $title = "VCM Project CMS - Validation inscription";
    $body = getValidEmailTemplate();
    if(sendMail($email, $user, $title, $body))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function registerCreateVerifyToken($user, $email)
{
    

    $token = verifCode();
    $insert = executeQuery("INSERT INTO ".$GLOBALS['GC']['sql_tbl_prefix']."system_pending_registration VALUES (NULL,?,?)", array($email, $token));
    $title = "VCM Project CMS - Validation inscription";
    $body = getEmailFormatToken($token);
    if(sendMail($email, $user, $title, $body))
    {
        return true;
    }
    else
    {
        return false;
    }

}
function verifCode(){
    $key = '';
    $str = strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
    for ($i=0; $i < 7; $i++) {
       $key .= $str[$i];
    }
    return $key;
 }
function keyGenerator($separator = ""){
    $key = '';
    $str = strtoupper(substr(md5(uniqid(rand(), true)), 0, 25));
    for ($i=0; $i < 25; $i++) {
       if ($i == 5 OR $i == 10 OR $i == 15 OR $i == 20){
          $key .= $separator;
       }
       $key .= $str[$i];
    }
    return $key;
 }
