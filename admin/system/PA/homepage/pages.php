<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-02-01 11:43:16
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-02-02 17:24:00 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}

include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");
?>

<?php
include("system/designer/PA_menu_bottom.php");
?>