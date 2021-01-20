<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:41:59 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

if(loggedUserAsPermission('PA_ACCESS'))
{   
    //var_dump($_SESSION['paLogged']);
    if($_SESSION['paLogged'] == false && $_GET['cmpt'] != 'login')
    {
        ?><script>
        document.location.replace("index.php?app=admin&mod=system&ctl=PA&cmpt=login");
        </script><?php
    }
}
else
{
    ?><script>
    document.location.replace("index.php?app=system&mod=errors&ctl=display&cmpt=vp&key=A-PA");
    </script><?php
} 
?>