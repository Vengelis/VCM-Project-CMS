<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-04 15:44:04
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:42:41 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}

function compareSession()
{
    $updatedMember = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_users WHERE ID = ?", array($_SESSION['userID']));
    
    $response = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($_SESSION['firstGroup']));
    $serverValue = $response['lastUpdate'];

    foreach($_SESSION['otherGroups'] as $groupID)
    {
        $response = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($groupID));
        $serverValue += $lastUpdate['lastUpdate'];
    }

    if($serverValue != $_SESSION['allLastUpdateGroup'])
    {
        reconnectUser();
    }
}