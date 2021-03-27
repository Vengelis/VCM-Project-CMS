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
            session_regenerate_id();
        }
        $_SESSION['TTL'] = time();
    }
    else
    {
        if(time() - $_SESSION['TTL'] > 86400) // 24 heures = 86400 || 12 heures = 43200 ;
        {
            session_destroy();
        }
        else
        {
            if(time() - $_SESSION['TTL'] > 1800)
            {
                $_SESSION['TTL'] = time();
                session_regenerate_id();
            }
        }
    }
}





/*

// Ne devrait pas se produire habituellement. Cela pourrait être une 
// attaque ou en raison d'un réseau instable. Supprimez tout l'état 
// d'authentification de cette session utilisateurs.


remove_all_authentication_flag_from_active_sessions($_SESSION['userid']);






    Suppression d'ancienne session et rappel de la nouvelle

$session_id_to_destroy = 'nill2if998vhplq9f3pj08vjb1';
// 1. commit session if it's started.
if (session_id()) {
    session_commit();
}

// 2. store current session id
session_start();
$current_session_id = session_id();
session_commit();

// 3. hijack then destroy session specified.
session_id($session_id_to_destroy);
session_start();
session_destroy();
session_commit();

// 4. restore current session id. If don't restore it, your current session will refer     to the session you just destroyed!
session_id($current_session_id);
session_start();
session_commit();
*/
?>