<?php
include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");
?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Tableau de bord</h2>
        <h3 class="text-sm text-gray-200">VCM CMS v0.1-Build</h3>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full py-5 px-5">
  <div class="col-span-1 md:col-span-2">

    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 w-full h-full">
        <div class="px-4 py-3 bg-gray-200 text-gray-900 flex items-center">
            <i class="mr-1 text-sm fas fa-chevron-right"></i>
            <p class="text-sm font-bold">Notes administratives</p>
        </div>
        <div class="p-2">
            <form>
                <textarea class="form-textarea mt-1 block w-full text-sm" rows="4" placeholder="Enter some long form content."></textarea>
                <button type="submit" class="inline-flex items-center mt-1 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Sauvegarder
                </button>
            </form>
        </div>
    </div>


  </div>
  <div class="col-span-1">
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 w-full h-full relative">
        <div class="px-4 py-3 bg-gray-200 text-gray-900 flex items-center">
            <i class="mr-1 text-sm fas fa-chevron-right"></i>
            <p class="text-sm font-bold">Echecs de connexion PA</p>
        </div>
        <div class="p-2">
            <ul class="mx-3 mt-2">
                <li class="flex items-center text-black"><i class="mr-1 text-sm fas fa-exclamation-triangle text-red-500"></i><strong>Vengelis</strong> <span class="text-gray-600 mx-1">></span> <span class="text-blue-800">23/12/2020 02:13</span></li>
            </ul>
            <a class="absolute inline-flex items-center bottom-0 mb-2 mt-1 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Consulter
            </a>
        </div>
    </div>
  </div>
  <div class="col-span-1 md:col-span-2">
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 w-full h-full relative">
        <div class="px-4 py-3 bg-gray-200 text-gray-900 flex items-center">
            <i class="mr-1 text-sm fas fa-chevron-right"></i>
            <p class="text-sm font-bold">Derniers rapports administratifs</p>
        </div>
        <div class="p-2 h-52">
            <p class="text-gray-600 italic">Nothing to see here ...</p>
        </div>
    </div>
  </div>
  <div class="col-span-1">
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 w-full h-full relative">
        <div class="px-4 py-3 bg-gray-200 text-gray-900 flex items-center">
            <i class="mr-1 text-sm fas fa-chevron-right"></i>
            <p class="text-sm font-bold">Utilisateurs en attente d'approbation</p>
        </div>
        <div class="p-2">
            <ul class="mx-3 mt-2">
                <li class="flex items-center text-black"><i class="mr-1 text-sm fas fa-user-plus" style="color: #ffdd57;"></i><strong>NewUser</strong> <span class="text-gray-600 mx-1">></span> <span class="text-blue-800">23/12/2020 02:13</span></li>
            </ul>
            <a class="absolute inline-flex items-center bottom-0 mb-2 mt-1 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Consulter
            </a>
        </div>
    </div>
  </div>
</div>

<?php
include("system/designer/PA_menu_bottom.php");
?>