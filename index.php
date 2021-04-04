<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:43:27 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


$exe=true;
if(!file_exists("globalConf.php"))
{
    echo "
    <br>
    <h1 style='color: red;'> Erreur critique !</h1>
    <h2>Le système ne possède pas les fichiers nécessaires à la configuration de VCM. Vérifiez que le fichier globalConf.php soit bien présent dans la racine du CMS VCM</h2>
    <p>Dans le cas contraire, transférez le fichier globalConf.php de l'archive vierge dans la racine VCM.</p>
    " ;
    return;
}
else
{
    require("init.php");
    
    require_once("globalConf.php");
    $GLOBALS['GC'] = $GC;
    if(empty($GLOBALS['GC']))
    {
        $ctli = "home";
        if(isset($_GET['ctli']) && !is_null($_GET['ctli']) || !empty($_GET['ctli'])) 
        {
            $ctli = htmlentities($_GET['ctli']);
        }
        include("system/designer/head.php");
        include("admin/installer/designer/header.php");
        include("admin/installer/controller/".$ctli.".php");
        include("admin/installer/designer/footer.php");
    }
    else
    {
        require("handler.php");

        $app = "nexus";
        $mod = "core";
        $ctl = "index";
        $cmpt = "iv1";

        if(isset($_GET['app'])) $app = htmlentities($_GET['app']);
        if(isset($_GET['mod'])) $mod = htmlentities($_GET['mod']);
        if(isset($_GET['ctl'])) $ctl = htmlentities($_GET['ctl']);
        if(isset($_GET['cmpt'])) $cmpt = htmlentities($_GET['cmpt']);

        //var_dump($init[$app][$mod][$ctl][$cmpt]);

        if(!empty($init[$app][$mod][$ctl][$cmpt]))
        {
            include("system/designer/head.php");
            include("system/designer/header.php");
            include($init[$app][$mod][$ctl][$cmpt]);
            include("system/designer/footer.php");
        }
        else
        {
            ?><script>
            document.location.replace("index.php?app=system&mod=errors&ctl=display&cmpt=404");
            </script><?php
        }
    }
}

