<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
$Lifetime = 3600;
ini_set("session.gc_maxlifetime", $Lifetime);
ini_set("session.gc_divisor", "1");
ini_set("session.gc_probability", "1");
ini_set("session.cookie_lifetime", "0");
session_start();

/*

    User Data Cookies:

    $_SESSION['isLogged']<bool>         - Vérifier si utilisateur authentifié
    $_SESSION['paLogged']<bool>         - Vérifier si utilisateur authentifié au PA
    $_SESSION['lastUpdate']<int>        - Compteur incrémentale +1 à chaque modification de l'utilisateur
    $_SESSION['login']<string>          - Nom d'authentification
    $_SESSION['username']<string>       - Nom d'utilisateur
    $_SESSION['description']<string>    - Description
    $_SESSION['lastIP']<string>         - Dernière IP d'authentification
    $_SESSION['firstGroup']<object>     - Object du groupe primaire
    $_SESSION['otherGroups']<objects>   - Liste d'objets des groupes secondaires
    $_SESSION['allPermissions']<strings>- Liste des permissions en fonction des groupes
    $_SESSION['email']<string>          - Adresse mail de l'utilisateur
    $_SESSION['banned']<bool>           - Si l'utilisateur est banni ou non
    $_SESSION['warnLevel']<int>         - Nombre de points de l'utilisateur

    Pemrissions:

    '*'                                 - All Access and all bypass
    'PA_ACCESS'                         - Accès Panel Administration
    'PM_ACCESS'                         - Accès Panel Modération

*/

function createVisitor()
{
    $_SESSION['isLogged'] = false;
    $_SESSION['paLogged'] = false;
    $_SESSION['lastUpdate'] = 0;
    $_SESSION['login'] = "Visteur";
    $_SESSION['username'] = "Visisteur";
    $_SESSION['description'] = "Simple visiteur";
    $_SESSION['lastIP'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['firstGroup'] = array('Visteur');
    $_SESSION['otherGroups'] = array();
    $_SESSION['allPermissions'] = array();
    $_SESSION['email'] = "NULL";
    $_SESSION['banned'] = false;
    $_SESSION['warnLevel'] = 0;
}
?>