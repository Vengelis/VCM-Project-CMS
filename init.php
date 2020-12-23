<?php
$cssIsWeb = true;
$init = array(
    "admin" => array(
        "system" => array(
            "PA" => array(
                "dashboard"     => "system/home/dashboard.php",
                "maj"           => "system/home/maj.php",
                "login"         => "system/home/login.php",

                "mod_dash"      => "system/modules/dashboard.php",
                "mod_add"       => "system/modules/add.php",
                "mod_del"       => "system/modules/delete.php",
                "mod_dis"       => "system/modules/disable.php",

                "pl_dash"       => "system/plugins/dashboard.php",
            )
        )
    ),
    "system" => array(
        "errors" => array(
            "display" => array(
                "security"      => "security.php",
                "404"           => "404.php"
            )
        )
    ),
    "nexus" => array(
        "core" => array(
            "index" => array(
                "iv1"           => "nexus_index_t1.php"
            )
        )
    )
);