<?php
include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");
?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Modules</h2>
        <h3 class="text-sm text-gray-200">Centre de gestion des modules. Les modules sont des applications qui vont être ajouté au CMS</h3>
    </div>
</div>

<div class="bg-white overflow-hidden m-2">
  <div class="px-4 sm:p-3 flex flex-row-reverse w-full">
    <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=mod_add" class="inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
    <i class="fas fa-plus m-1"></i>
    Ajouter
    </a>
  </div>
</div>

<div class="bg-white shadow overflow-hidden sm:rounded-md m-2">
  <ul class="divide-y divide-gray-200">
    <li>
      <a href="#" class="block hover:bg-gray-50">
        <div class="px-4 py-4 sm:px-6">
          <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-orange-600 truncate">
              VCM Core
            </p>
            <div class="ml-2 flex-shrink-0 flex">
              <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full " style="background-color: #FCD34D; color: #92400E;">
                <i class="fas fa-lock m-1"></i>
                Verrouillé
              </p>
            </div>
          </div>
          <div class="mt-2 sm:flex sm:justify-between">
            <div class="sm:flex">
                <p class="flex items-center text-sm text-gray-500">
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                </svg>
                Vengelis
                </p>
                <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                    VCM Project - CMS | Coeur du site.
                </p>
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
              <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
              </svg>
              <p>
                Dernière mise à jour
                <time datetime="2020-23-12">23 décembre 2020</time>
              </p>
            </div>
          </div>
        </div>
      </a>
    </li>
    <?php
        $directory = 'nexus';
        $scannedModules = array_diff(scandir($directory), array('..', '.'));
        foreach($scannedModules as $module)
        {
            if($module != "core")
            {
                include("nexus/".$module."/admin/PA_Module_InfoModList.php");
            }
        }
        ?>
  </ul>
</div>


<?php
include("system/designer/PA_menu_bottom.php");
?>