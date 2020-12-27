<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}


/*

    User Data Session:

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

function connectUser($login, $password, $isPA = false)
{
    $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_users WHERE login = ?", array($login));
    if(empty($query))
    {
        return "ERROR:INVALID_USER";
    }
    else
    {
        if(!verifyPass($password, $query['password']))
        {
            return "ERROR:WRONG_PASSWORD";
        }
        else
        {
            if($query["banned"] == 1)
            {
                return "ERROR:USER_IS_BANNED";
            }
            else
            {
                $_SESSION['isLogged'] = true;
                $_SESSION['paLogged'] = $isPA;
                $_SESSION['lastUpdate'] = $query['lastUpdate'];
                $_SESSION['login'] = $login;
                $_SESSION['username'] = $query['username'];
                $_SESSION['description'] = $query['description'];
                $_SESSION['lastIP'] = $_SERVER['REMOTE_ADDR'];
                $_SESSION['firstGroup'] = $query['firstGroup'];
                $_SESSION['otherGroups'] = unserialize($query['otherGroups']);
                $_SESSION['allPermissions'] = array();
                $permission1 = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups_perms_links WHERE groupKey = ?", array($_SESSION['firstGroup']), false);
                while($data = $permission1->fetch())
                { 
                    $permOfGroup = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_permissions WHERE ID = ?", array($data["permissionKey"]));
                    array_push($_SESSION['allPermissions'], $permOfGroup["permKey"]);
                }
                foreach($_SESSION['otherGroups'] as $groupID)
                {
                    $permission2 = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups_perms_links WHERE groupKey = ?", array($groupID), false);
                    while($data = $permission2->fetch())
                    { 
                        $permOfGroup = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_permissions WHERE ID = ?", array($data["permissionKey"]));
                        array_push($_SESSION['allPermissions'], $permOfGroup["permKey"]);
                    }
                }
                $_SESSION['email'] = $query['email'];
                $_SESSION['banned'] = $query['banned'];
                $_SESSION['warnLevel'] = $query['warnLevel'];
                $_SESSION['imageProfil'] = $query['imageProfil'];
                $_SESSION['validateAccount'] = $query['validateAccount'];
                return "SUCCESS:CONNECTED";
            }
            
        }
    }
    
}