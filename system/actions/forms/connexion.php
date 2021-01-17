<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

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
                $_SESSION['userID'] = $query['ID'];
                $_SESSION['lastUpdate'] = $query['lastUpdate'];
                $_SESSION['login'] = $login;
                $_SESSION['username'] = $query['username'];
                $_SESSION['description'] = $query['description'];
                $_SESSION['lastIP'] = $_SERVER['REMOTE_ADDR'];
                $_SESSION['firstGroup'] = $query['firstGroup'];
                $_SESSION['otherGroups'] = unserialize($query['otherGroups']);
                $_SESSION['allPermissions'] = array();
                
                $lastUpdate = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($query['firstGroup']));
                $_SESSION['allLastUpdateGroup'] = $lastUpdate['lastUpdate'];
                $permission1 = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups_perms_links WHERE groupKey = ?", array($_SESSION['firstGroup']), false);
                while($data = $permission1->fetch())
                { 
                    $permOfGroup = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_permissions WHERE ID = ?", array($data["permissionKey"]));
                    array_push($_SESSION['allPermissions'], $permOfGroup["permKey"]);
                }
                foreach($_SESSION['otherGroups'] as $groupID)
                {
                    $lastUpdate = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($groupID));
                    $_SESSION['allLastUpdateGroup'] += $lastUpdate['lastUpdate'];
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

                $_SESSION['WantToLiveInfinite'] = false;
                $_SESSION['TTL'] = time();

                return "SUCCESS:CONNECTED";
            }
            
        }
    }
    
}