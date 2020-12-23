<?php

require_once("utils.php");

$doNotPass=false;

$errorHost=false;
$errorUser=false;
$errorName=false;
$errorPath=false;
$errorPass=false;
function TryDbConnexion($host, $dbname, $user, $password) { try { return (new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password)); } catch (Exception $ex) { return('ERROR:ERROR_BDD_CONNECTION'); } }
if(isset($_POST["execute"]))
{
    if(empty($_POST["db_host"]))
    {
        $doNotPass=true;
        $errorHost=true;
    }
    if(empty($_POST["db_user"]))
    {
        $doNotPass=true;
        $errorUser=true;
    }
    if(empty($_POST["db_name"]))
    {
        $doNotPass=true;
        $errorName=true;
    }
    if(empty($_POST["root_path"]))
    {
        $doNotPass=true;
        $errorPath=true;
    }
    if(TryDbConnexion($_POST["db_host"], $_POST["db_name"], $_POST["db_user"], $_POST["db_password"]) == 'ERROR:ERROR_BDD_CONNECTION')
    {
        $doNotPass=true;
        $errorHost=true;
    }
    if(!$doNotPass)
    {
        $input = '<?php

    $INFO = array(
        "sql_host" => "'.$_POST["db_host"].'",
        "sql_database" => "'.$_POST["db_name"].'",
        "sql_user" => "'.$_POST["db_user"].'",
        "sql_pass" => "'.$_POST["db_password"].'",
        "sql_port" => '.$_POST["db_port"].',
        "sql_tbl_prefix" => "'.$_POST["db_prefix"].'",
        "sql_use_utf8" => "'.$_POST["use_utf8_encoding"].'",
        "root_path" => "'.$_POST["root_path"].'"
    );

?>
        ';
        $fp = fopen($parentDirectory.'temp_global_conf.php', 'w+');
        fwrite($fp,  $input);
        fclose($fp);
        //file_put_contents(realpath($parentDirectory.'temp_global_conf.php'), $input);   

        ?>
        <script>
        document.location.replace("index.php?step=4");
        </script>
        <?php
        /*header('Location: index.php?step=4', TRUE, 302);
        exit();*/
    }
}
else
{
    $doNotPass=true;
}

?>
<form action="index.php?step=3" method="post" enctype="multipart/form-data">
<div class="column has-background-white">
    <div class="container" style="margin: 0 auto; text-align: center;">
        <div class="container is-max-widescreen" style="text-align: left;">
            <div class="notification is-light">
                <h3 class="title is-3">Détails du serveur MySQL</h3>
            </div>
        </div>
        <br>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="padding-top: 2% ;text-align: right;">
                <h6 class="subtitle is-6">Adresse serveur <strong class="has-text-danger-dark">*</strong></h6>
                </div>
                <div class="column is-three-fifths"  style="text-align: left;">
                    <div class="control  has-icons-left">
                        <?php
                            if(!$errorHost){echo '<input class="input" type="text" name="db_host" value="localhost">';}
                            else {echo '<input class="input is-danger" type="text" name="db_host" value="'.$_POST["db_host"].'">';}
                        ?>
                        <span class="icon is-small is-left">
                            <i class="fa fa-server"></i>
                        </span>
                        <?php if($errorHost) { echo '<p class="content is-small has-text-danger"><i class="fa fa-exclamation-triangle"></i> Une erreur est survenue lors de la connexion au serveur MySQL. Verifiez que les identifiants sont correctes ou que l\'adresse IP du serveur soit la bonne. Si vous ne disposez pas de ces informations, contactez votre fournisseur d\'hébergement pour obtenir de l\'aide </p>'; }?>
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
                            if(!$errorUser) { echo '<input class="input" type="text" name="db_user">' ; }
                            else { echo '<input class="input is-danger" type="text" name="db_user" value="'.$_POST["db_user"].'">'; }
                        ?>
                        <span class="icon is-small is-left">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php if($errorUser) { echo '<p class="content is-small has-text-danger"><i class="fa fa-exclamation-triangle"></i> Vous devez renseigner un nom d\'utilisateur </p>'; }?>
                        <p class="content is-small has-text-grey-light">Si vous n'êtes pas sûr du nom d'utilisateur et du mot de passe de votre serveur MySQL, contactez votre fournisseur d'hébergement pour obtenir de l'aide. </p>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="margin: auto;text-align: right;">
                <h6 class="subtitle is-6">Mot de passe</h6>
                </div>
                <div class="column is-three-fifths">
                    <div class="control  has-icons-left">
                        <?php
                            if(!$errorPass){echo '<input class="input" type="password" name="db_password">';}
                            else {echo '<input class="input is-danger" type="password" name="db_password" value="'.$_POST["db_password"].'">';}
                        ?>
                        <span class="icon is-small is-left">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="text-align: right;">
                <h6 class="subtitle is-6">Nom de la base de données <strong class="has-text-danger-dark">*</strong></h6>
                </div>
                <div class="column is-three-fifths" style="text-align: left;">
                    <div class="control">
                        <input class="input" type="text" name="db_name">
                        <p class="content is-small has-text-grey-light">Si la base de données n'existe pas, rendez-vous sur votre panel d'administration sql et créez une base de données dédié à VCM. Nous vous conseillons de faire une table dédié à ce dernier. Si votre utilisateur de MySQL n'a pas la permission et que vous n'êtes pas sûr de savoir comment créer une base de données, contactez votre fournisseur d'hébergement pour obtenir de l'aide. </p>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="margin: auto;text-align: right;">
                <h6 class="subtitle is-6">Port</h6>
                </div>
                <div class="column is-three-fifths">
                    <div class="control">
                        <input class="input" type="text" name="db_port" value=3306>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="padding-top: 2% ;text-align: right;">
                <h6 class="subtitle is-6">Préfix des tables</h6>
                </div>
                <div class="column is-three-fifths" style="text-align: left;">
                    <div class="control">
                        <input class="input" type="text" name="db_prefix">
                        <p class="content is-small has-text-grey-light">Si paramètre renseigné, toutes les tables de base de données créées seront préfixées avec la valeur fournie. Il est recommandé de laisser cette case vide. </p>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="text-align: right;">
                <h6 class="subtitle is-6">Utiliser l'encodage UTF-8</h6>
                </div>
                <div class="column is-three-fifths" style="text-align: left;">
                    <div class="field">
                        <input class="is-checkradio" id="use_utf8_encoding" type="checkbox" name="use_utf8_encoding" checked="checked">
                        <label for="use_utf8_encoding">Oui</label>
                        <p class="content is-small has-text-grey-light">Certains symboles non communs (tels que les écritures historiques, les symboles musicaux et les Emoji) nécessitent plus d'espace dans la base de données pour être stockés. Si vous laissez ce paramètre désactivé, les utilisateurs ne pourront pas utiliser ces symboles sur votre site. S'il est activé, ces caractères pourront être utilisés, mais la base de données utilisera plus d'espace disque. </p>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <br>
        <div class="container is-max-widescreen" style="text-align: left;">
            <div class="notification is-light">
                <h3 class="title is-3">Détails du web <span class="tag is-warning">A renseigner mais pas implémenté</span></h3>
            </div>
        </div>
        <br>
        <div class="field">
            <div class="columns">
                <div class="column is-one-fifth" style="padding-top: 2% ;text-align: right;">
                <h6 class="subtitle is-6">URL du dossier racine <strong class="has-text-danger-dark">*</strong></h6>
                </div>
                <div class="column is-three-fifths" style="text-align: left;">
                    <div class="control">
                        <?php
                            if(!$errorPath){echo '<input class="input" type="text" name="root_path">';}
                            else {echo '<input class="input is-danger" type="text" name="root_path" value="'.$_POST["root_path"].'">';}
                        ?>
                        <?php if($errorPath) { echo '<p class="content is-small has-text-danger"><i class="fa fa-exclamation-triangle"></i> Vous devez renseigner l\'URL du dossier parent du site ! </p>'; }?>
                        <p class="content is-small has-text-grey-light">Pour la bonne conduite de la configuration, il est préférable de mettre la redirection DNS. Exemple: www.mon-url.fr</p>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>
        <br>
        <div class="buttons" style="margin: auto;width: 30%;">
            <button type="submit" name="execute" class="button is-dark">Continuer</button>
        </div>
    </div>
</div>
