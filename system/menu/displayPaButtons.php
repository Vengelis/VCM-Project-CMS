
<?php


function buildMenuButton($parent) {

    $getBuildOrder = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_menu_build_order WHERE parentKey = ? ", array($parent));
    $buildOrder = unserialize($getBuildOrder["orderList"]);
    foreach ($buildOrder as $value) {
        $getBuildButtons = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_menu_build_list WHERE ID = ?", array($value));

        $getChild = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_menu_build_list WHERE parent = ?", array($getBuildButtons["ID"]), false);
        $haveChild = 0;
        while($data2 = $getChild->fetch()) {
            $haveChild++;
        }
        if($haveChild > 0) {
            displayPaMenuButton($getBuildButtons["ID"], $getBuildButtons["name"], true, "index.php?app=admin&mod=system&ctl=PA&cmpt=menu_editor&parent=".$getBuildButtons["ID"]);
        } else {
            displayPaMenuButton($getBuildButtons["ID"], $getBuildButtons["name"], false);
        }
    }
}

function buildMenuParams($parent) {

    $getBuildOrder = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_menu_build_order WHERE parentKey = ? ", array($parent));
    $buildOrder = unserialize($getBuildOrder["orderList"]);
    foreach ($buildOrder as $value) {
        $getBuildButtons = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_menu_build_buttonparams WHERE buttonKey = ?", array($value));

        displayPaMenuButtonParams($getBuildButtons["buttonKey"]);

    }

}

?>