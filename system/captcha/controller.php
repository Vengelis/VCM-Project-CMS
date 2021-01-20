<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-04 15:44:04
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:39:45 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

function verifyIdentity($token)
{
    $piK = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'spamPrevent_captcha_private_key'", array());
    $apiResponse = "https://www.google.com/recaptcha/api/siteverify?secret=".$piK['value']."&response=".$token;

    if(function_exists('curl_version')){
        $curl = curl_init($apiResponse);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
    }else{
        $response = file_get_contents($apiResponse);
    }

    if(empty($response) || is_null($response)){
        return false;
    }else{
        $data = json_decode($response);
        if($data->success){
            return true;
        }else{
            return false;
        }
    }
}