<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-02-01 11:43:16
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-02-02 17:24:00 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateGroup = executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global SET value = ? WHERE paramKey = ?", array($_POST["typeSelected"], "homepage_model"));
}

$getModel = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = ?", array("homepage_model"));

include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");
?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Modèles</h2>
        <h3 class="text-sm text-gray-200">Choisissez un modèle de page d'accueil correspondant au mieux à vos attentes</h3>
    </div>
</div>
<form method="POST">
<input type="text" id="selected" name="typeSelected" class="hidden" value="<?php echo $getModel["value"] ; ?>"/>
<div class="m-3 bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
    <div class="px-4 py-5 sm:px-6">
        <h2 class="text-xl">Format de présentation</h2>
    </div>
    <div class="px-4 py-5 sm:p-6">
        <ul class="grid grid-cols-1 gap-6 md:grid-cols-1 lg:grid-cols-3">
            <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="flex-1 flex flex-col p-3">
                    <img class="w-auto flex-shrink-0 mx-auto bg-black border border-grey-50" src="system/medias/images/indexModels/simple.png" alt="">
                    <h3 class="mt-3 text-gray-900 text-base font-medium">Simple</h3>
                    <p class="mt-2 text-gray-500 text-xs font-medium">Modèle de présentation d'entreprise ou de vente de service par une entreprise.</p>
                    <p class="mt-2 text-red-600 text-xs font-medium">Colonne unique</p>
                </div>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="-ml-px w-0 flex-1 flex">
                            <?php
                            if($getModel["value"] == "type1") {
                                ?>
                                    <a onclick="showCheck('1')" id="model-notSelected-1" class="hidden relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                        <i class="far fa-square text-gray-400 text-xl"></i>
                                        <span class="ml-2">Selectionner</span>
                                    </a>
                                    <a id="model-selected-1" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                        <i class="far fa-check-square text-orange-400 text-xl"></i>
                                        <span class="ml-2 text-orange-400">Selectionné</span>
                                    </a>
                                <?php
                            } else {
                                ?>
                                    <a onclick="showCheck('1')" id="model-notSelected-1" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                        <i class="far fa-square text-gray-400 text-xl"></i>
                                        <span class="ml-2">Selectionner</span>
                                    </a>
                                    <a id="model-selected-1" class="hidden relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                        <i class="far fa-check-square text-orange-400 text-xl"></i>
                                        <span class="ml-2 text-orange-400">Selectionné</span>
                                    </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="flex-1 flex flex-col p-3">
                    <img class="w-auto flex-shrink-0 mx-auto bg-black border border-grey-50" src="system/medias/images/indexModels/double.png" alt="">
                    <h3 class="mt-3 text-gray-900 text-base font-medium">Double</h3>
                    <p class="mt-2 text-gray-500 text-xs font-medium">Modèle de site communautaire. Grand espace à gauche et petit espace à droite pour compléter avec des widgets.</p>
                    <p class="mt-2 text-red-600 text-xs font-medium">2 colonnes</p>
                </div>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="-ml-px w-0 flex-1 flex">
                            <?php
                            if($getModel["value"] == "type2") {
                                ?>
                                <a onclick="showCheck('2')" id="model-notSelected-2" class="hidden relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <i class="far fa-square text-gray-400 text-xl"></i>
                                    <span class="ml-2">Selectionner</span>
                                </a>
                                <a id="model-selected-2" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <i class="far fa-check-square text-orange-400 text-xl"></i>
                                    <span class="ml-2 text-orange-400">Selectionné</span>
                                </a>
                                <?php
                            } else {
                                ?>
                                <a onclick="showCheck('2')" id="model-notSelected-2" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <i class="far fa-square text-gray-400 text-xl"></i>
                                    <span class="ml-2">Selectionner</span>
                                </a>
                                <a id="model-selected-2" class="hidden relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <i class="far fa-check-square text-orange-400 text-xl"></i>
                                    <span class="ml-2 text-orange-400">Selectionné</span>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="flex-1 flex flex-col p-3">
                    <img class="w-auto flex-shrink-0 mx-auto bg-black border border-grey-50" src="system/medias/images/indexModels/triple.png" alt="">
                    <h3 class="mt-3 text-gray-900 text-base font-medium">Triple</h3>
                    <p class="mt-2 text-gray-500 text-xs font-medium">Modèle moins courant. Présentation en deux colonnes principales puis une colonne secondaire.</p>
                    <p class="mt-2 text-red-600 text-xs font-medium">3 colonnes</p>
                </div>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="-ml-px w-0 flex-1 flex">
                            <?php
                            if($getModel["value"] == "type3") {
                                ?>
                                <a onclick="showCheck('3')" id="model-notSelected-3" class="hidden relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <i class="far fa-square text-gray-400 text-xl"></i>
                                    <span class="ml-2">Selectionner</span>
                                </a>
                                <a id="model-selected-3" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <i class="far fa-check-square text-orange-400 text-xl"></i>
                                    <span class="ml-2 text-orange-400">Selectionné</span>
                                </a>
                                <?php
                            } else {
                                ?>
                                <a onclick="showCheck('3')" id="model-notSelected-3" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <i class="far fa-square text-gray-400 text-xl"></i>
                                    <span class="ml-2">Selectionner</span>
                                </a>
                                <a id="model-selected-3" class="hidden relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <i class="far fa-check-square text-orange-400 text-xl"></i>
                                    <span class="ml-2 text-orange-400">Selectionné</span>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <input id="selectedPanel" name="selectedPanel" class="hidden"/>
    </div>
    <div class="px-4 py-4 sm:px-6">
        <button type="submit" class="inline mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
            Appliquer
        </button>
        <p class="inline lg:text-sm text-xs text-red-600">En appliquant les modifications, les données utilisées sur le modèle de page actuel seront écrasées car les widgets ne seront pas compatibles avec le nouveau modèle (sauf widgets compatibles).</p>
    </div>
</div>
</form>
<script>
function removeAllCheck(){
    document.getElementById("model-selected-1").classList.add('hidden');
    document.getElementById("model-notSelected-1").classList.remove('hidden');
    document.getElementById("model-selected-2").classList.add('hidden');
    document.getElementById("model-notSelected-2").classList.remove('hidden');
    document.getElementById("model-selected-3").classList.add('hidden');
    document.getElementById("model-notSelected-3").classList.remove('hidden');
}
function showCheck(panel){
    removeAllCheck();
    document.getElementById("selected").value = "type"+panel;
    document.getElementById("model-notSelected-" + panel).classList.add('hidden');
    document.getElementById("model-selected-" + panel).classList.remove('hidden');
}


</script>

<?php
include("system/designer/PA_menu_bottom.php");
?>