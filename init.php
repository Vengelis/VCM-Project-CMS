<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:43:37 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


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
                "page_params"   => "nexus/pages/admin/parameters.php",

                "sets_global"   => "admin/system/PA/system/settings/globals_settings.php",
                "sets_policy"   => "admin/system/PA/system/settings/policy.php",
                "sets_mails"    => "admin/system/PA/system/settings/emails.php",
                "sets_lo_re"    => "admin/system/PA/system/settings/login_register.php",
                "sets_2FA"      => "admin/system/PA/system/settings/2FA.php",
                "sets_adv"      => "admin/system/PA/system/settings/advanced_settings.php"
            )
        ),
        "community" => array(
            "members" => array(
                "dashboard"     => "admin/system/PA/community/members/dashboard.php",
                "create"        => "admin/system/PA/community/members/create.php",
                "modify"        => "admin/system/PA/community/members/modify.php",
                "delete"        => "admin/system/PA/community/members/delete.php"
            ),
            "groups" => array(
                "dashboard"     => "admin/system/PA/community/groups/dashboard.php",
                "modify"        => "admin/system/PA/community/groups/modify.php",
                "create"        => "admin/system/PA/community/groups/create.php",
                "delete"        => "admin/system/PA/community/groups/delete.php"
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
                "rv"            => "system/errors/display/robot_verification.php",
                "ae"            => "system/errors/display/argument_error.php"
            )
        )
    ),
    "nexus" => array(
        "core" => array(
            "index" => array(
                "iv1"           => "nexus/core/index/nexus_index_t1.php",
                "login"         => "nexus/core/index/login.php",
                "register"      => "nexus/core/index/register.php",
                "va"            => "nexus/core/index/validate_accoun.php",
                "disconnect"    => "system/actions/forms/disconnect.php"
            )
        ),
        "blog" => array(
            "index" => array(
                "index"         => "nexus/blog/index/index.php",
                "view"          => "nexus/blog/index/view.php",
                "edit"          => "nexus/blog/index/edit.php"
            )
        ),
        "forum" => array(
            "index" => array(
                "index"       => "nexus/forum/index/accueil.php",
                "categorie"         => "nexus/forum/index/categorie.php",
                "creation"         => "nexus/forum/index/creation.php",
                "topic"         => "nexus/forum/index/topic.php",

            )
        )
    )
);