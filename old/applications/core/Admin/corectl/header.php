<?php
require(realpath('./../../../handler.php'));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>VCM Administration</title>
        <?php
        require(realpath('./../../../system/htmlHelpers/callingT3.html'));
        ?>
    </head>
    <body>
        <section class="hero is-dark is-small">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                    <a class="navbar-item">
                        <img src="./../../../system/medias/images/admin/vcmTitle.png" alt="VCM Project Logo - Administration">
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            <a class="navbar-item">
                                <p><span class="icon"><i class="fa fa-home"> </i></span> Retour au site</p>
                            </a>
                            <a class="navbar-item">
                                <p><span class="icon"><i class="fa fa-question-circle"> </i></span> Support</p>
                            </a>
                            <a class="navbar-item">
                                <p><span class="icon"><i class="fa fa-user"> </i></span> _Compte_</p>
                            </a>
                        </div>
                    </div>
                </div>
                </nav>
            </div>
        </section>
        <nav class="navbar pl-5 has-background-light">
            <div id="navMenubd-example" class="navbar-menu">
                <div class="navbar-item has-dropdown is-hoverable is-mega has-background-light">
                    <div class="navbar-link flex">
                    <p><span class="icon"><i class="fa fa-cog"> </i></span> Système</p> 
                    </div>
                    <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
                        <div class="container is-fluid">
                            <div class="columns">
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Vue d'ensemble</h1>
                                    <a class="navbar-item " href="index.php">
                                        Tableau de bord
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=maj">
                                        Mises à jours
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Fournitures</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_applications">
                                        Applications
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_plugins">
                                        Plugins
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_menu">
                                        Editeur de menu
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_api">
                                        API
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Paramètres</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_gc">
                                        Configuration générale
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_politiques">
                                        Politiques
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_mail">
                                        Paramètres Email
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_login_register">
                                        Connexion et Enregistrement
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_2FA">
                                        Double authentification
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_ga">
                                        Configuration avancée
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Support</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_faq">
                                        FAQ
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_contact">
                                        Contact
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <hr class="navbar-divider">
                        <div class="navbar-item">
                            <div class="navbar-content">
                                <div class="level is-mobile">
                                    <div class="level-left">
                                    <div class="level-item">
                                        <p><strong>Gardez votre site à jour ! </strong>Consultez le site pour garder votre site à jour en consultant la page de VCM Project</p>
                                    </div>
                                    </div>
                                    <div class="level-right">
                                    <div class="level-item">
                                        <a class="button is-info bd-is-rss is-small" href="#">
                                            <span class="icon is-small">
                                                <i class="fa fa-question"></i>
                                            </span>
                                            <span>Visiter</span>
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="navbar-item has-dropdown is-hoverable is-mega has-background-light">
                    <div class="navbar-link flex">
                    <p><span class="icon"><i class="fa fa-clone"> </i></span> Applications</p> 
                    </div>
                    <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
                        <div class="container is-fluid">
                            <div class="columns">
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Forum</h1>
                                    <a class="navbar-item " href="#">
                                        Forum
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Actions Pré-enregistrées
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Flux RSS
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Paramètres
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Blog</h1>
                                    <a class="navbar-item " href="#">
                                        Paramètres
                                    </a>
                                    <a class="navbar-item " href="#">
                                        Blog
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable is-mega has-background-light">
                    <div class="navbar-link flex">
                    <p><span class="icon"><i class="fa fa-user"> </i></span> Communauté</p>
                    </div>
                    <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
                        <div class="container is-fluid">
                            <div class="columns">
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Membres</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=m_membres">
                                        Membres
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=m_groupes">
                                        Groupes
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=m_oai">
                                        Outil d'adresse IP
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Paramètres des membres</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=m_profil">
                                        Profil
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=m_rep">
                                        Réputations et Réactions
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=m_notif">
                                        Notifications
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=m_ban">
                                        Paramètres de bannissement
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=m_rangs">
                                        Rangs
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Contenu de modération</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=mod_auto">
                                        Modération automatique
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=mod_prev">
                                        Prévention de spam
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=mod_avert">
                                        Avertissements
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Staff</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_mod">
                                        Modérateurs
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_admin">
                                        Administrateurs
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=s_equipe">
                                        Présentation d'équipe
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable is-mega has-background-light">
                    <div class="navbar-link flex">
                    <p><span class="icon"><i class="fa fa-home"> </i></span> Accueil</p>
                    </div>
                    <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
                        <div class="container is-fluid">
                            <div class="columns">
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Gestion des pages</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=a_pages">
                                        Pages
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=a_blocs">
                                        Blocs
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=a_modeles">
                                        Modèles
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=a_medias">
                                        Médias
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Contenu</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=a_bdd">
                                        Base de données
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=a_articles">
                                        Articles
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable is-mega has-background-light">
                    <div class="navbar-link flex">
                    <p><span class="icon"><i class="fa fa-line-chart"> </i></span> Statistiques <span class="tag is-warning">WIP<span></p> 
                    </div>
                    <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
                        <div class="container is-fluid">
                        <div class="notification is-warning">
                            Module en cours de développement
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable is-mega has-background-light">
                    <div class="navbar-link flex">
                    <p><span class="icon"><i class="fa fa-pencil"> </i></span> Apparences</p>
                    </div>
                    <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
                        <div class="container is-fluid">
                            <div class="columns">
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Apparence</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=theme">
                                        Thèmes
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=footer">
                                        Pied de page
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Editeurs</h1>
                                    <a class="navbar-item " href="#">
                                        Outils <span class="tag is-warning ml-2">WIP<span>
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=e_emote">
                                        Emote
                                    </a>
                                    <a class="navbar-item " href="index.php?app=core&mod=e_params">
                                        Paramètres
                                    </a>
                                </div>
                                <div class="column">
                                    <h1 class="title is-6 is-mega-menu-title">Pays</h1>
                                    <a class="navbar-item " href="index.php?app=core&mod=langages">
                                        Langues
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        