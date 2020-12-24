<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

function createMember($login, $username, $description, $password, $lastIP, $firstGroup, $otherGroups, $email, $imageProfil)
{
    $request = "SELECT * FROM " . $GLOBALS['GC']['sql_tbl_prefix'] . " users WHERE email = ?";
    $verifyMail = executeQuery($request, array($email));
    if(empty($verifyMail))
    {
        $request = "SELECT * FROM " . $GLOBALS['GC']['sql_tbl_prefix'] . "users WHERE login = ?";
        $verifyPseudo = executeQuery($request, array($login));
        if(empty($verifyMail))
        {
            executeQuery("INSERT INTO ".$GLOBALS['GC']['sql_tbl_prefix']."users VALUES (NULL,0,?,?,?,?,?,?,?,?,?,?,0,0,1)", array($login, $username, $description, $password, $lastIP, date("Y-m-d H:i:s"), $firstGroup, $otherGroups, $email, $imageProfil));
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