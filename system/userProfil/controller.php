<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:42:31 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
function createVisitor()
{
    $visitorGroupID = executeQuery("SELECT ID FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE sysKeyCode = ?", array("Guest"));
    $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_users WHERE login = ?", array("VisitorSystemUser"));
    $_SESSION['isLogged'] = false;
    $_SESSION['paLogged'] = false;
    $_SESSION['userID'] = $query['ID'];
    $_SESSION['lastUpdate'] = $query['lastUpdate'];
    $_SESSION['login'] = "VisitorSystemUser";
    $_SESSION['username'] = "Visiteur";
    $_SESSION['description'] = "Simple Visteur";
    $_SESSION['lastIP'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['firstGroup'] = $visitorGroupID['ID'];
    $_SESSION['otherGroups'] = array();
    $_SESSION['allPermissions'] = array();
    $lastUpdate = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($query['firstGroup']));
    $_SESSION['allLastUpdateGroup'] = $lastUpdate['lastUpdate'];
    $permission1 = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups_perms_links WHERE groupKey = ?", array($_SESSION['firstGroup']), false);
    while($data = $permission1->fetch())
    { 
        $permOfGroup = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_permissions WHERE ID = ?", array($data["permissionKey"]));
        array_push($_SESSION['allPermissions'], $permOfGroup["permKey"]);
    }
    $_SESSION['email'] = "Nothing";
    $_SESSION['banned'] = false;
    $_SESSION['warnLevel'] = 0;
    $_SESSION['validateAccount'] = 1;
}
function verifySession()
{
    if(!isset($_SESSION["lastUpdate"]))
    {
        createVisitor();
        return false;
    }
    else
    {
        return true;
    }
}

function reconnectUser() {
    $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_users WHERE ID = ?", array($_SESSION["userID"]));

    $_SESSION['userID'] = $query['ID'];
    $_SESSION['lastUpdate'] = $query['lastUpdate'];
    $_SESSION['username'] = $query['username'];
    $_SESSION['description'] = $query['description'];
    $_SESSION['lastIP'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['firstGroup'] = $query['firstGroup'];
    $_SESSION['otherGroups'] = unserialize($query['otherGroups']);
    $_SESSION['allPermissions'] = array();
    
    $lastUpdate = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($query['firstGroup']));
    $_SESSION['allLastUpdateGroup'] = $lastUpdate['lastUpdate'];
    $permission1 = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups_perms_links WHERE groupKey = ?", array($_SESSION['firstGroup']), false);
    while($data = $permission1->fetch()) { 
        $permOfGroup = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_permissions WHERE ID = ?", array($data["permissionKey"]));
        array_push($_SESSION['allPermissions'], $permOfGroup["permKey"]);
    } foreach($_SESSION['otherGroups'] as $groupID) {
        $lastUpdate = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($groupID));
        $_SESSION['allLastUpdateGroup'] += $lastUpdate['lastUpdate'];
        $permission2 = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups_perms_links WHERE groupKey = ?", array($groupID), false);
        while($data = $permission2->fetch()) { 
            $permOfGroup = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_permissions WHERE ID = ?", array($data["permissionKey"]));
            array_push($_SESSION['allPermissions'], $permOfGroup["permKey"]);
        }
    }

    $_SESSION['email'] = $query['email'];
    $_SESSION['banned'] = $query['banned'];
    $_SESSION['warnLevel'] = $query['warnLevel'];
    $_SESSION['imageProfil'] = $query['imageProfil'];
    $_SESSION['validateAccount'] = $query['validateAccount'];

    $_SESSION['TTL'] = time();
}
?>