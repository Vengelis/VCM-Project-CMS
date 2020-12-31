<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
function createVisitor()
{
    $query = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_users WHERE login = ?", array("VisitorSystemUser"));
    $_SESSION['isLogged'] = false;
    $_SESSION['paLogged'] = false;
    $_SESSION['lastUpdate'] = $query['lastUpdate'];
    $_SESSION['login'] = "VisitorSystemUser";
    $_SESSION['username'] = "Visiteur";
    $_SESSION['description'] = "Simple Visteur";
    $_SESSION['lastIP'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['firstGroup'] = 2;
    $_SESSION['otherGroups'] = array();
    $_SESSION['allPermissions'] = array();
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
?>