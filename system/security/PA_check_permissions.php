<?php 
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