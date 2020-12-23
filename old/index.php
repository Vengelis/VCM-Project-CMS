<?php
if(!file_exists("global_conf.php"))
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
    require_once("global_conf.php");
    
}

if(empty($GC))
{

    header("Location: admin/installateur/index.php");
    exit;
}
require_once("handler.php");