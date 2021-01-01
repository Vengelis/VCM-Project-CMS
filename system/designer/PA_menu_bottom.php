<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
?>
        </div>
    </main>
    <aside class="hidden relative xl:order-first xl:flex xl:flex-col flex-shrink-0 w-56">

        <div id="subMenu1" class="absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Système</p>
          <br>
          <p class="text-base text-white">Vue d'ensemble</p>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=dashboard" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Tableau de bord</a>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=maj" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Mises à jours</a>
          <br>
          <p class="text-base text-white">Fournitures</p>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=mod_dash" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Modules</a>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=pl_dash" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Plugins</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Editeur de menu</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">API REST</a>
          <br>
          <p class="text-base text-white">Paramètres</p>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=sets_global" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Configuration générale</a>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=sets_policy" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Politiques</a>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=sets_mails" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Paramètres Email</a>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=sets_lo_re" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Connexion et enregistrement</a>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=sets_2FA" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Double authentification</a>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=sets_adv" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Configuration avancée</a>
          <br>
          <p class="text-base text-white">Support</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">FAQ</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Contact</a>

        </div>

        <div id="subMenu2" class="hidden absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Applications</p>
          <br>
          <?php
            $directory = 'nexus';
            $scannedModules = array_diff(scandir($directory), array('..', '.'));
            foreach($scannedModules as $module)
            {
              if($module != "core")
              {
                echo '<p class="text-base text-white">'.ucfirst($module).'</p>';
                include("nexus/".$module."/admin/PA_Module_MenuList.php");
                echo "<br>";
              }
            }
          ?>
        </div>

        <div id="subMenu3" class="hidden absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Communauté</p>
          <br>
          <p class="text-base text-white">Membres</p>
          <a href="index.php?app=admin&mod=community&ctl=members&cmpt=dashboard" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Membres</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Groupes</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Outils d'adresse IP</a>
          <br>
          <p class="text-base text-white">Paramètres des membres</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Profil</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Réputaions et réactions</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Notifications</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Rangs</a>
          <br>
          <p class="text-base text-white">Modération</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Modération automatique</a>
          <a href="index.php?app=admin&mod=community&ctl=moderation&cmpt=spam_prevent" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Prévention de spam</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Avertissement</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Paramètres de banissement</a>
          <br>
          <p class="text-base text-white">Staff</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Administrateur</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Modérateur</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Equipe</a>
        </div>

        <div id="subMenu4" class="hidden absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Accueil</p>
          <br>
          <p class="text-base text-white">Gestion de l'accueil</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Modèle Index</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Construction de l'accueil</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Pages</a>
        </div>

        <div id="subMenu5" class="hidden absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Statistiques</p>
          <br>
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-yellow-100 text-yellow-800">
            En cours de construction
          </span>
        </div>

        <div id="subMenu6" class="hidden absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Apparences</p>
          <br>
          <p class="text-base text-white">Apparence</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Thèmes</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Pied de page</a>
          <br>
          <p class="text-base text-white">Editeur</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Outils</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Emotes</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Paramètres</a>
          <br>
          <p class="text-base text-white">Pays</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Langues</a>
        </div>
      </aside>
    </div>
  </div>
</div>
<script>

const masterMenus = document.querySelectorAll('.masterMenu');
selectedMenuID = 1;
for (const masterMenu of masterMenus) {
    masterMenu.addEventListener('mouseover', showSubMenu);
}
function showSubMenu() {
    document.getElementById("subMenu"+selectedMenuID).className += " hidden";
    selectedMenuID = this.id;
    document.getElementById("subMenu"+selectedMenuID).className = "absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700";
}
    

</script>