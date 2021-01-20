<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 19:57:27 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */

if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

function sessionParams()
{
    $secure = false; 
    $httponly = true;
    $samesite = 'lax';
    $maxlifetime = 34819200; // 13 mouths

    if(PHP_VERSION_ID < 70300) {
        session_set_cookie_params($maxlifetime, '/; samesite='.$samesite, $_SERVER['HTTP_HOST'], $secure, $httponly);
    } else {
        session_set_cookie_params([
            'lifetime' => $maxlifetime,
            'path' => '/',
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => $secure,
            'httponly' => $httponly,
            'samesite' => $samesite
        ]);
    }
}
if(!isset($_SESSION['TTL']))
{
    sessionParams();
}

session_start();

if(isset($_SESSION['WantToLiveInfinite']))
{
    if($_SESSION['WantToLiveInfinite'] == "on")
    {
        if(time() - $_SESSION['TTL'] > 1800)
        {
            session_regenerate_id(true);
        }
        $_SESSION['TTL'] = time();
    }
    else
    {
        if(time() - $_SESSION['TTL'] > 43200)
        {
            session_destroy();
        }
        else
        {
            if(time() - $_SESSION['TTL'] > 1800)
            {
                $_SESSION['TTL'] = time();
                session_regenerate_id(true);
            }
        }
    }
}




?>