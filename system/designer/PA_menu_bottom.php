<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
?>
        </div>
        <!-- End main area -->
    </main>
    <aside class="hidden relative xl:order-first xl:flex xl:flex-col flex-shrink-0 w-56">
        <!-- Start secondary column (hidden on smaller screens) -->

        <!-- Panel Système -->
        <div id="subMenu1" class="absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Système</p>
          <br>
          <p class="text-base text-white">Vue d'ensemble</p>
          <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=dashboard" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Tableau de bord</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Mises à jours</a>
          <br>
          <p class="text-base text-white">Fournitures</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Modules</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Plugins</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Editeur de menu</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">API REST</a>
          <br>
          <p class="text-base text-white">Paramètres</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Configuration générale</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Politiques</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Paramètres Email</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Connexion et enregistrement</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Double authentification</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Configuration avancée</a>
          <br>
          <p class="text-base text-white">Support</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">FAQ</a>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Contact</a>

        </div>
        <!-- Fin Panel Système -->

        <div id="subMenu2" class="hidden absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Applications</p>
          <br>
        </div>

        <div id="subMenu3" class="hidden absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Communauté</p>
          <br>
          <p class="text-base text-white">Membres</p>
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Membres</a>
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
          <a href="#" class="text-gray-300 hover:bg-gray-800 group flex items-center px-2 py-1 text-sm rounded-md">Présvention de spam</a>
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
        </div>

        <div id="subMenu5" class="hidden absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Statistiques</p>
          <br>
        </div>

        <div id="subMenu6" class="hidden absolute inset-0 py-3 px-3 sm:px-3 lg:px-4 bg-gray-600 border-l border-gray-700">
          <p class="font-mono text-base text-gray-200">Apparences</p>
          <br>
        </div>


        <!-- End secondary column -->
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