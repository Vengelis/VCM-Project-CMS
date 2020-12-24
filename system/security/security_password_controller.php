<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

/*

    Only BCRPYT method implemented

*/

function passHash($pass)
{
    return password_hash($pass, PASSWORD_BCRYPT);
}

function verifyPass($verifPass, $original)
{
    return password_verify($verifyPass, $hash);
}