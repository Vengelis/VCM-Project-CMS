<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
if(!isset($_SESSION['isLogged']))
{
    createVisitor();
}
?>
<script>
function changeNavBar() {
    if (document.getElementById("navID").classList.contains('hidden')) {
        document.getElementById("navID").classList.remove('hidden');
        document.getElementById("closeButton").classList.remove('hidden');
        document.getElementById("openButton").classList.add('hidden');
    } else {
        document.getElementById("navID").classList.add('hidden');
        document.getElementById("closeButton").classList.add('hidden');
        document.getElementById("openButton").classList.remove('hidden');
    }
}
function displayProfilDropdown() {
    if (document.getElementById("profilDropdown").classList.contains('hidden')) {
        document.getElementById("profilDropdown").classList.remove('hidden');
    } else {
        document.getElementById("profilDropdown").classList.add('hidden');
    }
}
function notifDropdown() {
    if (document.getElementById("notifDropdown").classList.contains('hidden')) {
        document.getElementById("notifDropdown").classList.remove('hidden');
    } else {
        document.getElementById("notifDropdown").classList.add('hidden');
    }
}
</script>
<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button onclick="changeNavBar()" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
          <span class="sr-only">Menu</span>
          <svg id="openButton" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg id="closeButton" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">
          <img class="block lg:hidden h-8 w-auto" src="vcmTitle.png" alt="Workflow">
          <img class="hidden lg:block h-8 w-auto" src="vcmTitle.png" alt="Workflow">
        </div>
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <?php
                include("admin/system/menu/menu.php");
            ?>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div class="relative">  
            <div>  
                <button onclick="notifDropdown()" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">Notifications</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
            </div>
            <div id="notifDropdown" class="hidden absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20 sm:w-80 w-56">
                <div class="py-2">
                    <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                        <img class="h-12 w-12 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
                        <p class="text-gray-600 text-sm mx-2">
                            <span class="font-bold" href="#">Sara Salah</span> replied on the <span class="font-bold text-blue-500" href="#">Upload Image</span> artical . 2m
                        </p>
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                        <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="avatar">
                        <p class="text-gray-600 text-sm mx-2">
                            <span class="font-bold" href="#">Slick Net</span> start following you . 45m
                        </p>
                    </a>
                </div>
                <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">Voir les notifications</a>
            </div>
        </div>
        <div class="ml-3 relative">
          <?php
          if($_SESSION['isLogged'])
          {
              ?>
          <div>
            <button onclick="displayProfilDropdown()" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
              <span class="sr-only">Menu utilisateur</span>
              <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
          </div>

          <div id="profilDropdown" class="hidden absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20 w-56 divide-y divide-gray-200">
            <div class="py-1">  
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profil</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Paramètres</a>
            </div>
            <?php
                if(in_array('*',$_SESSION['allPermissions']) || in_array('PA_ACCESS',$_SESSION['allPermissions']) || in_array('PM_ACCESS',$_SESSION['allPermissions']))
                {
            ?>
            <div class="py-1">
                <?php
                if(in_array('*',$_SESSION['allPermissions']) || in_array('PM_ACCESS',$_SESSION['allPermissions']))
                {
                ?>
                <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve"><g id="Black"><g><polygon fill="none" stroke="#58595B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6.48,12.52 6,15.5 4.02,15.98 0.5,19.5 0.5,23.5 4.5,23.5 8.02,19.98 8.5,18 11.48,17.52 "/><line fill="none" stroke="#58595B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.98" y1="15.02" x2="18" y2="6"/><polygon fill="none" stroke="#58595B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="18,6 22,5 23.5,2 22,0.5 19,2 "/><polyline fill="none" stroke="#58595B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="11.5,9.5 8,6 7.5,2.5 5.5,0.5 2.5,0.5 4.5,2.5 4.5,4.5 2.5,4.5 0.5,2.5 0.5,5.5 2,7.5 6,8 9.5,11.5"/><polyline fill="none" stroke="#58595B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="14.5,12.5 18,16 21.5,16.5 23.5,18.5 23.5,21.5 21.5,19.5 19.5,19.5 19.5,21.5 21.5,23.5 18.5,23.5 16.5,22 16,18 12.5,14.5"/><line fill="none" stroke="#58595B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" y1="15.5" x2="8.5" y2="18"/></g></g><g id="Frames-24px"><rect fill="none" width="24" height="24"/></g>
                    </svg>
                    Panel Modération
                </a>
                <?php
                }
                if(in_array('*',$_SESSION['allPermissions']) || in_array('PA_ACCESS',$_SESSION['allPermissions']))
                {
                    ?>
                <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=dashboard" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"><g id="Layer_1"><path d="M1,14h3v2H1v14h3v2H1v14h3v4h42v-4h3V32h-3v-2h3V16h-3v-2h3V0H1V14z M44,48H6v-2h38V48z M47,34v10h-1H4H3V34h1h42H47z M44,32H6v-2h38V32z M47,18v10h-1H4H3V18h1h42H47z M44,16H6v-2h38V16z M3,2h44v10h-1H4H3V2z"/><rect x="6" y="5" width="2" height="4"/><rect x="11" y="5" width="2" height="4"/><rect x="16" y="5" width="2" height="4"/><rect x="21" y="5" width="2" height="4"/><rect x="42" y="6" width="2" height="2"/><rect x="26" y="6" width="13" height="2"/><rect x="6" y="21" width="2" height="4"/><rect x="11" y="21" width="2" height="4"/><rect x="16" y="21" width="2" height="4"/><rect x="21" y="21" width="2" height="4"/><rect x="42" y="22" width="2" height="2"/><rect x="26" y="22" width="13" height="2"/><rect x="6" y="37" width="2" height="4"/><rect x="11" y="37" width="2" height="4"/><rect x="16" y="37" width="2" height="4"/><rect x="21" y="37" width="2" height="4"/><rect x="42" y="38" width="2" height="2"/><rect x="26" y="38" width="13" height="2"/></g><g></g>
                    </svg>
                    Panel Administration
                </a>
                <?php
                }
                ?>
            </div>
            <?php
                }
            ?>
            <div class="py-1">
                <a href="#" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100" role="menuitem"><strong>Déconnexion</strong></a>
            </div>
          </div>
          <?php 
            }
            else
            {
                ?>
                <div>
                    <button onclick="displayProfilDropdown()" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                        <span class="sr-only">Visteur</span>
                        <svg class="h-8 w-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </button>
                </div>
                <div id="profilDropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                    <div class="py-1">  
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Connexion</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Inscription</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
      </div>
    </div>
  </div>

  <div id="navID" class="hidden transition sm:hidden">
    <div class="px-2 pt-2 pb-3 space-y-1">
        <?php
            include("admin/system/menu/menu.php");
        ?>
    </div>
  </div>
</nav>

