<?php

require_once("utils.php");
require_once(realpath($parentDirectory.'temp_global_conf.php'));
require_once(realpath($parentDirectory.'system/utils/password_controller.php'));

$doNotPass=false;

$errorUsername=false;
$errorDisplayname=false;
$errorPassword=false;
$errorEmail=false;

if(isset($_POST["execute"]))
{
    if(empty($_POST["temp_root_user"]))
    {
        $doNotPass=true;
        $errorDisplayname=true;
    }
    if(empty($_POST["temp_root_login"]))
    {
        $doNotPass=true;
        $errorUsername=true;
    }
    if(empty($_POST["temp_root_password"]))
    {
        $doNotPass=true;
        $errorPassword=true;
    }
    if(empty($_POST["temp_root_confirm_password"]))
    {
        $doNotPass=true;
        $errorPassword=true;
    }
    if(empty($_POST["temp_root_mail"]))
    {
        $doNotPass=true;
        $errorEmail=true;
    }
    if($_POST["temp_root_password"] != $_POST["temp_root_confirm_password"])
    {
        $doNotPass=true;
        $errorEmail=true;
    }
    if(!$doNotPass)
    {

        $input = '<?php

        $INFO = array(
            "sql_host" => \''.$INFO["sql_host"].'\',
            "sql_database" => \''.$INFO["sql_database"].'\',
            "sql_user" => \''.$INFO["sql_user"].'\',
            "sql_pass" => \''.$INFO["sql_pass"].'\',
            "sql_port" => '.$INFO["sql_port"].',
            "sql_tbl_prefix" => \''.$INFO["sql_tbl_prefix"].'\',
            "sql_use_utf8" => \''.$INFO["sql_use_utf8"].'\',
            "root_path" => "'.$INFO["root_path"].'",
            "temp_root_user" => \''.$_POST["temp_root_user"].'\',
            "temp_root_login" => \''.$_POST["temp_root_login"].'\',
            "temp_root_password" => \''.HashPass($_POST["temp_root_password"]).'\',
            "temp_root_mail" => \''.$_POST["temp_root_mail"].'\'
            
        );
    
    ?>
            ';
        file_put_contents($parentDirectory.'temp_global_conf.php', $input)
        ?>
        <script>
        document.location.replace("index.php?step=5");
        </script>
        <?php
    }
}

?>
<form action="index.php?step=4" method="post" enctype="multipart/form-data">
<div class="column has-background-white">
    <div class="container" style="margin: 0 auto; text-align: center;">
        <div class="container is-max-widescreen" style="text-align: left;">
            <div class="notification is-light">
                <h3 class="title is-3">Détails du compte Super Administrateur</h3>
            </div>
        </div>
        <br>
        <p class="content is-small has-text-info-dark" style="text-align: left;"><strong>Information: </strong>Le compte Super-Admin est le compte qui va vous servir à configurer vos premiers paramètres du site. Dès que possible, faite un compte administrateur utilisateur afin de ne pas utiliser ce compte pour des usages courants.</p>
        <br>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="padding-top: 2% ;text-align: right;">
                <h6 class="subtitle is-6">Nom d'utilisateur <strong class="has-text-danger-dark">*</strong></h6>
                </div>
                <div class="column is-three-fifths" style="text-align: left;">
                    <div class="control  has-icons-left">
                        <?php
                            if(!$errorDisplayname){echo '<input class="input" type="text" name="temp_root_user" value="root">';}
                            else {echo '<input class="input is-danger" type="text" name="temp_root_user" value="'.$_POST["temp_root_user"].'">';}
                        ?>
                        <span class="icon is-small is-left">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php if($errorDisplayname) { echo '<p class="content is-small has-text-danger"><i class="fa fa-exclamation-triangle"></i> Vous devez spécifier un nom d\'utilisateur </p>'; }?>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="padding-top: 2% ;text-align: right;">
                <h6 class="subtitle is-6">Identifiant <strong class="has-text-danger-dark">*</strong></h6>
                </div>
                <div class="column is-three-fifths" style="text-align: left;">
                    <div class="control  has-icons-left">
                        <?php
                            if(!$errorUsername){echo '<input class="input" type="text" name="temp_root_login">';}
                            else {echo '<input class="input is-danger" type="text" name="temp_root_login" value="'.$_POST["temp_root_login"].'">';}
                        ?>
                        <span class="icon is-small is-left">
                            <i class="fa fa-sign-in"></i>
                        </span>
                        <?php if($errorUsername) { echo '<p class="content is-small has-text-danger"><i class="fa fa-exclamation-triangle"></i> Vous devez spécifier un login valide </p>'; }?>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="padding-top: 2% ;text-align: right;">
                <h6 class="subtitle is-6">Mot de passe <strong class="has-text-danger-dark">*</strong></h6>
                </div>
                <div class="column is-three-fifths" style="text-align: left;">
                    <div class="control  has-icons-left">

                        <?php
                            if(!$errorPassword){echo '<input class="input" type="password" name="temp_root_password">';}
                            else {echo '<input class="input is-danger" type="password" name="temp_root_password" value="'.$_POST["temp_root_password"].'">';}
                        ?>
                        <span class="icon is-small is-left">
                            <i class="fa fa-lock"></i>
                        </span>
                        <?php if($errorPassword) { echo '<p class="content is-small has-text-danger"><i class="fa fa-exclamation-triangle"></i> Le mot de passe ne concorde pas avec la vérification </p>'; }?>

                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="padding-top: 2% ;text-align: right;">
                <h6 class="subtitle is-6">Confirmer mot de passe <strong class="has-text-danger-dark">*</strong></h6>
                </div>
                <div class="column is-three-fifths" style="text-align: left;">
                    <div class="control  has-icons-left">
                        <?php
                            if(!$errorPassword){echo '<input class="input" type="password" name="temp_root_confirm_password">';}
                            else {echo '<input class="input is-danger" type="password" name="temp_root_confirm_password" value="'.$_POST["temp_root_confirm_password"].'">';}
                        ?>
                        <span class="icon is-small is-left">
                            <i class="fa fa-lock"></i>
                        </span>
                        <?php if($errorPassword) { echo '<p class="content is-small has-text-danger"><i class="fa fa-exclamation-triangle"></i> Le mot de passe ne concorde pas avec la vérification </p>'; }?>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="padding-top: 2% ;text-align: right;">
                <h6 class="subtitle is-6">Adresse Mail <strong class="has-text-danger-dark">*</strong></h6>
                </div>
                <div class="column is-three-fifths" style="text-align: left;">
                    <div class="control  has-icons-left">

                        <?php
                            if(!$errorEmail){echo '<input class="input" type="text" name="temp_root_mail">';}
                            else {echo '<input class="input is-danger" type="text" name="temp_root_mail" value="'.$_POST["temp_root_mail"].'">';}
                        ?>
                        <span class="icon is-small is-left">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <?php if($errorEmail) { echo '<p class="content is-small has-text-danger"><i class="fa fa-exclamation-triangle"></i> Vous devez spécifier un mail valide </p>'; }?>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <br>
        <div class="buttons" style="margin: auto;width: 30%;">
            <button type="submit" name="execute" class="button is-dark">Commencer l'installation</button>
        </div>
    </div>
</div>
