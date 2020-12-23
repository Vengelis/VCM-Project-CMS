<?php
require_once("utils.php");
require_once(realpath('./../../temp_global_conf.php'));

require_once("step5_et1.php");
require_once("step5_et2.php");
/*require_once("step5_et3.php");
require_once("step5_et5.php");
require_once("step5_et6.php");*/

if(!isset($_GET["etp"]))
{
    $etape = 0;
    $composant = "core";
    build_globalconf();
}
else
{
    $etape = $_GET["etp"];
    $composant = $_GET["cps"];
}

?>
<form action="index.php?step=5" method="post" enctype="multipart/form-data">
<div class="column has-background-white">
    <div class="container" style="margin: 0 auto; text-align: center;">
        <div class="container is-max-widescreen" style="text-align: left;">
            <div class="notification is-light">
                <h3 class="title is-3">Installation du CMS ...</h3>
            </div>
        </div>
        <br>
        <p class="content is-small has-text-danger-dark" style="text-align: left;"><strong>Attention: </strong>Ne fermez pas cette page pendant l'installation du CMS ! Des boutons de fin d'installation vous serons présentés dès la fin des processus. En cas de problème d'installation, contactez le support par mail.</p>
        <br>
        <!--

        Etape1: Application du fichier global_conf
        Etape2: Création des tables
        Etape3: Création des groupes originaux
        Etape4: Définition des permissions des groupes
        Etape5: Création des utilisateurs classiques (Visiteur et Super Admin)
        Etape6: Edition finale du fichier global_conf.php
        
        -->
        <p class="content is-small has-text-grey"><strong>Etape: </strong><?php echo $etape; ?> / 6</p>
        <progress class="progress is-info" value="<?php echo $etape * 10; ?>" max="100"></progress>
        <p class="content is-small has-text-grey"><strong>Composant: </strong><?php echo $composant; ?></p>
        <progress class="progress is-warning" value="" max="100"></progress>
        <br>
    </div>
</div>
