<?php
if(!file_exists(realpath('../global_conf.php')))
{
    echo "
    <br>
    <h1 style='color: red;'> Erreur critique !</h1>
    <h2>Le système ne posède pas les fichiers necessaire à la configuration de VCM. Verifiez que global_conf.php dans la racine de VCM soit bien présent !</h2>
    <p>Dans le cas contraire, transférez le fichier global_conf.php dans la racine VCM.</p>
    ";
    return;
}
else
{
    require(realpath('../global_conf.php'));
    
}
if(empty($GC))
{
    header('Location: installateur/index.php', TRUE, 302);
    exit();
}