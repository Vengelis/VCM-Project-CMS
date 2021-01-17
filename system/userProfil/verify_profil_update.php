<?php 
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