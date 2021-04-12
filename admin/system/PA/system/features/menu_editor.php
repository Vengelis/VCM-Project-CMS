<?php

if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST["buttons"])){
        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_menu_build_order SET orderList = ? WHERE parentKey = ?", array(serialize(json_decode($_POST["buttons"])), $_POST["id"]));
    }
}

if(isset($_GET["parent"])) {
    $parent = htmlentities($_GET["parent"]);
    displayReturnButton();
} else {
    $parent = 0;
}

include("system/menu/controller.php");
include("nexus/core/admin/menu/menuWidget_PA_Button_template.php");
require("system/menu/displayPaButtons.php");

include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");
?>



<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Editeur du menu</h2>
        <h3 class="text-sm text-gray-200">Centre de gestion du menu utilisateur.</h3>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script>
<form method="POST">
<div class="h-subContener flex overflow-hidden bg-white">
    <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
        <div class="flex-1 relative z-0 flex overflow-hidden">
            <main class="hidden lg:block flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last bg-gray-200" tabindex="0">
                <!-- Start main area-->
                <div class="absolute inset-0 p-2">

                    <?php buildMenuParams($parent) ?>

                </div>
                <!-- End main area -->
            </main>
            <aside class="hidden lg:block relative xl:order-first xl:flex xl:flex-col flex-shrink-0 w-96 border-r border-gray-200">
                <!-- Start secondary column (hidden on smaller screens) -->
                <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">

                    <div class="text-xs text-gray-500">Publiez votre menu une fois que vous avez terminé vos modifications</div>

                    <a href="#" class="w-full text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 flex items-center px-3 py-2 text-sm font-medium rounded-md rounded-lg p-2 mb-3" aria-current="page">
                        <span class="w-full text-center">
                            <i class="fa fa-cloud-upload"></i>
                            Publier le menu
                        </span>
                    </a>
                    <div class="border-2 border-gray-200 rounded-lg p-2">

                        <input id="parentID" class="hidden" value="<?php echo $parent; ?>" />
                        <nav class="space-y-1 menuDragDrop" aria-label="Sidebar">

                        <?php buildMenuButton($parent) ?>

                        </nav>
                        <a onclick="launchModal('createButton')" class="text-orange-500 hover:bg-orange-50 hover:text-orange-900 flex items-center px-3 py-2 text-sm font-medium rounded-md border-2 border-orange-200 rounded-lg p-2 mt-5" aria-current="page">

                            <span class="truncate">
                                <i class="fas fa-plus mr-1"></i>
                                Ajouter un bouton
                            </span>
                        </a>
                    </div>
                </div>
                <!-- End secondary column -->
            </aside>
            <div class="lg:hidden flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last" tabindex="0">
                <!-- Start incompatble screen-->
                <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">
                    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Heroicon name: outline/exclamation -->
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Ecran incompatible
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Pour une meilleur experience utilisateur, nous avons désactivé volontairement la possibilité de modifier le menu quand l'écran n'est pas adapté à la modification. Passez sur un ecran minimum 1024px.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End incompatible screen -->
            </div>
        </div>
    </div>
</div>
</form>

<form method="POST">
<!-- This example requires Tailwind CSS v2.0+ -->
<div id="createButton" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                <button type="button" onclick="launchModal('createButton')" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">Close</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Création d'un bouton
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                test
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-600 text-base font-medium text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Créer
                </button>
                <button onclick="launchModal('createButton')" type="reset" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                    Annuler
                </button>
            </div>
        </div>
    </div>
</div>
</form>

<?php
include("system/menu/js_utils.php");
include("system/designer/PA_menu_bottom.php");
?>
