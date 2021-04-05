<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:43:22 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


// - Handler session & cookies
require('system/session/controller.php');
require('system/cookies/controller.php');

// - Handler db
require('system/db/db_controller.php');

// - Handler security
require('system/security/security_password_controller.php');    // Password system controller
require('system/security/PA_check_permissions.php');            // Permission system controller
require('system/security/file_upload_controller.php');          // File upload system controller

// - Handler user profil
require("system/userProfil/controller.php");
require("system/userProfil/verify_profil_update.php");

// - Handler Modal
require("system/modal/controller.php");
?>







