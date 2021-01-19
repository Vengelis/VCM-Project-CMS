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
    <h2>Le système ne possède pas les fichiers nécessaires à la configuration de VCM. Vérifiez que le fichier global_conf.php soit bien présent dans la racine de VCM</h2>
    <p>Dans le cas contraire, transférez le fichier global_conf.php dans la racine VCM.</p>
    " ;
    return;
}
else
{
    require_once("globalConf.php");
    $GLOBALS['GC'] = $GC;

    require("init.php");
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

if(empty($GC))
{
    ?><script>
    document.location.replace("admin/installateur/index.php");
    </script><?php
}

