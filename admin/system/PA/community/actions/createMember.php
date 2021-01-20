<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:34:32 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

function createMember($login, $username, $description, $password, $lastIP, $firstGroup, $otherGroups, $email, $imageProfil, $valid = 0)
{
    $request = "SELECT * FROM " . $GLOBALS['GC']['sql_tbl_prefix'] . "community_users WHERE email = ?";
    $verifyMail = executeQuery($request, array($email));
    if(empty($verifyMail))
    {
        $request = "SELECT * FROM " . $GLOBALS['GC']['sql_tbl_prefix'] . "community_users WHERE login = ?";
        $verifyPseudo = executeQuery($request, array($login));
        if(empty($verifyMail))
        {
            executeQuery("INSERT INTO ".$GLOBALS['GC']['sql_tbl_prefix']."community_users VALUES (NULL,0,?,?,?,?,?,?,?,?,?,?,0,0,?)", array($login, $username, $description, $password, $lastIP, date("Y-m-d H:i:s"), $firstGroup, $otherGroups, $email, $imageProfil, $valid));
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}