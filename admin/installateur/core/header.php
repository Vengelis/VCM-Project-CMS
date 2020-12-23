<?php

if(!file_exists(realpath('./../../global_conf.php')))
{
    echo "
    <br>
    <h1 style='color: red;'> Erreur critique !</h1>
    <h2>Le système ne possède pas les fichiers nécessaires à la configuration de VCM. Vérifiez que le fichier global_conf.php soit bien présent dans la racine de VCM !</h2>
    <p>Dans le cas contraire, transférez le fichier global_conf.php dans la racine VCM.</p>
    ";
    return;
}
else
{
    require(realpath('./../../global_conf.php'));
    
}
if(!empty($GC))
{
    header('Location: '.realpath('./../../index.php'), TRUE, 302);
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>VCM Installation</title>
        <link href="../../system/styles/bulma.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../system/styles/bulma-checkbox.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../system/styles/bulma-steps.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../system/styles/bulma-additionnal.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="../../system/styles/font-awesome.min.css"/>
    </head>
    <body>
        <section class="hero is-dark">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <a class="navbar-item">
                                <img src="core/imgs/vcmTitle.png" alt="Logo">
                            </a>
                        </div>
                        
                    </div>
                </nav>
            </div>

            <!-- Hero content: will be in the middle -->
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        Virtual Content Manager
                    </h1>
                    <h2 class="subtitle">
                        Installateur
                    </h2>
                </div>
            </div>
        </section>
        <section class="section has-background-light">
        <div class="container">
            <article class="message is-dark">
                <div class="message-header">
                    <p>VCM Project - Installation - Etape <?php echo $_GET["step"]; ?></p>
                </div>
                <div class="message-body has-background-white-bis">
                <div class="columns">
                    <div class="column is-one-fifth has-background-white-bis">
                        <ul class="steps is-vertical is-short ">
                            <li class="steps-segment <?php if($_GET["step"]==1){echo "is-active";}; ?> ">
                                <span href="#" class="steps-marker">
                                    <span class="icon">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </span>
                                <div class="steps-content">
                                    <p class="is-size-5">Accueil</p>
                                </div>
                            </li>
                            <li class="steps-segment <?php if($_GET["step"]==2){echo "is-active";}; ?>">
                                <span href="#" class="steps-marker">
                                    <span class="icon">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </span>
                                <div class="steps-content">
                                    <p class="is-size-5">Vérification</p>
                                </div>
                            </li>
                            <li class="steps-segment <?php if($_GET["step"]==3){echo "is-active";}; ?>">
                                <span href="#" class="steps-marker">
                                    <span class="icon">
                                        <i class="fa fa-server"></i>
                                    </span>
                                </span>
                                <div class="steps-content">
                                    <p class="is-size-5">Détails Serveur</p>
                                </div>
                            </li>
                            <li class="steps-segment <?php if($_GET["step"]==4){echo "is-active";}; ?>">
                                <span href="#" class="steps-marker">
                                    <span class="icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                                <div class="steps-content">
                                    <p class="is-size-5">Super Administrateur</p>
                                </div>
                            </li>
                            <li class="steps-segment <?php if($_GET["step"]==5){echo "is-active";}; ?>">
                                <span href="#" class="steps-marker">
                                    <span class="icon">
                                        <i class="fa fa-wrench"></i>
                                    </span>
                                </span>
                                <div class="steps-content">
                                    <p class="is-size-5">Installation</p>
                                </div>
                            </li>
                        </ul>
                    </div>
