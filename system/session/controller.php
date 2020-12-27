<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
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
            $_SESSION['TTL'] = time();
            session_regenerate_id(true);
        }
    }
}




?>