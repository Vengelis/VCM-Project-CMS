<?php
if (!defined('PHP_VERSION_ID')) {
    $version = explode('.',PHP_VERSION);
}

$parentDirectory="./../../";

$continue=true;
?>
<div class="column has-background-white">
    <div class="container">
        <div class="container is-max-widescreen">
            <div class="notification is-light">
                <h3 class="title is-3">Vérification de l'environnement</h3>
            </div>
        </div>
        <br>
        <div class="content">
            <h4 class="subtitle is-4">Prérequis PHP</h4>
            <div class="field">
                <?php
                    if(PHP_VERSION_ID < 70000)
                    {
                        $continue = false;
                        ?>
                            <input class="is-checkradio has-background-color is-danger" type="checkbox" checked="checked" readonly>
                            <label class="has-text-danger-ultralight">Version PHP <?php echo phpversion();?>. Mettez à jour imperativement votre version PHP (Version de développement: PHP 7.2.18).</label>
                        <?php
                    }
                    elseif(PHP_VERSION_ID <  70218)
                    {

                        ?>
                            <input class="is-checkradio has-background-color is-warning" type="checkbox" checked="checked" readonly>
                            <label class="has-text-warning-dark">Version PHP <?php echo phpversion();?> - Votre version de PHP est inferieur à celle recommandée (Version de développement: PHP 7.2.18).</label>
                        <?php
                    }
                    else
                    {
                        ?>
                            <input class="is-checkradio has-background-color is-success" type="checkbox" checked="checked" readonly>
                            <label class="has-text-success-dark">Version PHP <?php echo phpversion();?> (Version de développement: PHP 7.2.18).</label>
                        <?php
                    }
                ?>
            </div>
            <div class="field">
                <?php
                    if(!function_exists('mysqli_connect'))
                    {
                        $continue = false;
                        ?>
                            <input class="is-checkradio has-background-color is-danger" type="checkbox" checked="checked" readonly>
                            <label class="has-text-danger-dark">MySQLi Extension pas chargée !</label>
                        <?php
                    }
                    else
                    {
                        ?>
                            <input class="is-checkradio has-background-color is-success" type="checkbox" checked="checked" readonly>
                            <label class="has-text-success-dark">MySQLi Extension chargée.</label>
                        <?php
                    }
                ?>
            </div>
            <br>
            <h4 class="subtitle is-4">Prérequis Fichiers Système</h4>
            <!--

                Optimiser avec une boucle des paths 

            -->
            <div class="field">
                <?php
                    if(is_writable(realpath($parentDirectory)))
                    {
                        ?>
                        <input class="is-checkradio has-background-color is-success" type="checkbox" checked="checked" readonly>
                        <label class="has-text-success-dark">Dossier <?php echo realpath('./../../');?> accessible en écriture</label>
                        <?php
                    }
                    else
                    {
                        $continue = false;
                        ?>
                        <input class="is-checkradio has-background-color is-danger" type="checkbox" checked="checked" readonly>
                        <label class="has-text-danger-ultralight">Dossier <?php echo realpath('./../../');?> n'est pas accessible en écriture</label>
                        <?php
                    }
                ?>
            </div>
            <div class="field">
                <?php
                    if(is_writable(realpath($parentDirectory.'admin')))
                    {
                        ?>
                        <input class="is-checkradio has-background-color is-success" type="checkbox" checked="checked" readonly>
                        <label class="has-text-success-dark">Dossier <?php echo realpath('./../../admin');?> accessible en écriture</label>
                        <?php
                    }
                    else
                    {
                        $continue = false;
                        ?>
                        <input class="is-checkradio has-background-color is-danger" type="checkbox" checked="checked" readonly>
                        <label class="has-text-danger-ultralight">Dossier <?php echo realpath('./../../admin');?> n'est pas accessible en écriture</label>
                        <?php
                    }
                ?>
            </div>
            <div class="field">
                <?php
                    if(is_writable(realpath($parentDirectory.'system')))
                    {
                        ?>
                        <input class="is-checkradio has-background-color is-success" type="checkbox" checked="checked" readonly>
                        <label class="has-text-success-dark">Dossier <?php echo realpath('./../../system');?> accessible en écriture</label>
                        <?php
                    }
                    else
                    {
                        $continue = false;
                        ?>
                        <input class="is-checkradio has-background-color is-danger" type="checkbox" checked="checked" readonly>
                        <label class="has-text-danger-ultralight">Dossier <?php echo realpath('./../../system');?> n'est pas accessible en écriture</label>
                        <?php
                    }
                ?>
            </div>
            <div class="field">
                <?php
                    if(is_writable(realpath($parentDirectory.'global_conf.php')))
                    {
                        ?>
                        <input class="is-checkradio has-background-color is-success" type="checkbox" checked="checked" readonly>
                        <label class="has-text-success-dark">Fichier <?php echo realpath('./../../global_conf.php');?> accessible en écriture</label>
                        <?php
                    }
                    else
                    {
                        $continue = false;
                        ?>
                        <input class="is-checkradio has-background-color is-danger" type="checkbox" checked="checked" readonly>
                        <label class="has-text-danger-ultralight">Fichier <?php echo realpath('./../../global_conf.php');?> n'est pas accessible en écriture</label>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="buttons" style="margin: auto;width: 30%;">
            <?php
                if($continue)
                {
                    echo '<a class="button is-dark" href="index.php?step=3">Continuer</a>';
                }
                else
                {
                    echo '<a class="button is-dark" disabled>Continuer</a>';
                }
            ?>
            
        </div>
    </div>
</div>