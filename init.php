<?php
$cssIsWeb = true;
$init = array(
    "admin" => array(
        "system" => array(
            "PA" => array(
                "dashboard"     => "admin/system/PA/system/home/dashboard.php",
                "maj"           => "admin/system/PA/system/home/maj.php",
                "login"         => "admin/system/PA/system/home/login.php",

                "mod_dash"      => "admin/system/PA/system/modules/dashboard.php",
                "mod_add"       => "admin/system/PA/system/modules/add.php",
                "mod_del"       => "admin/system/PA/system/modules/delete.php",
                "mod_dis"       => "admin/system/PA/system/modules/disable.php",

                "pl_dash"       => "admin/system/PA/system/plugins/dashboard.php",

                "page_dash"     => "nexus/pages/admin/dashboard.php",
                "page_create"   => "nexus/pages/admin/create.php",
                "page_modify"   => "nexus/pages/admin/modify.php",
                "page_delete"   => "nexus/pages/admin/delete.php",
                "page_params"   => "nexus/pages/admin/parameters.php"
            )
        ),
        "community" => array(
            "members" => array(
                "dashboard"     => "admin/system/PA/community/members/dashboard.php",
                "create"        => "admin/system/PA/community/members/create.php"
            ),
            "moderation" => array(
                "spam_prevent"  => "admin/system/PA/community/moderation/spamPrevention.php"
            )
        )
    ),
    "system" => array(
        "errors" => array(
            "display" => array(
                "security"      => "system/errors/display/security.php",
                "404"           => "system/errors/display/404.php",
                "vp"            => "system/errors/display/violation_permission.php",
                "rv"            => "system/errors/display/robot_verification.php"
            )
        )
    ),
    "nexus" => array(
        "core" => array(
            "index" => array(
                "iv1"           => "nexus/core/index/nexus_index_t1.php",
                "login"         => "nexus/core/index/login.php",
                "register"      => "nexus/core/index/register.php",
                "va"            => "nexus/core/index/validate_account.php",
                "disconnect"    => "system/actions/forms/disconnect.php"
            )
        )
    )
);