<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:41:54 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
function loggedUserAsPermission($perm)
{
    if(in_array('*',$_SESSION['allPermissions']) || in_array($perm,$_SESSION['allPermissions']))
    {
        return true; 
    }
    else
    {
        return false;
    }
}

function breakLUAP($perm, $key){
    if(loggedUserAsPermission($perm) == false)
    {
        ?><script>
        document.location.replace("index.php?app=system&mod=errors&ctl=display&cmpt=vp&key=".$key);
        </script><?php
    }
}