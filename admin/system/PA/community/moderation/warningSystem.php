<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-20 11:55:25
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-20 12:36:54 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");

include("system/tools/textareaController.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST["submitNewAvert"]))
    {
        $safeName = htmlentities($_POST["submitNewAvert"]);
    }
    if(isset($_POST["submitNewAction"]))
    {
        
    }
}

?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Avertissements</h2>
    </div>
</div>

<div class="bg-white overflow-hidden m-2">
  <div class="px-4 py-1 sm:p-3 flex flex-row-reverse w-full">
    <button onclick="showModal('modalCreateAction');" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
        <i class="fas fa-plus m-1"></i>
        Créer une action
    </button>
    <button onclick="showModal('modalCreateAvert');" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
        <i class="fas fa-plus m-1"></i>
        Créer un avertissement
    </button>
  </div>
</div>


<div id="modalCreateAvert" class="fixed z-10 inset-0 overflow-y-auto hidden">
  <div class="flex items-end min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block transform bg-white overflow-hidden shadow rounded-lg w-3/5">
        <div class="px-4 py-5 sm:px-6 w-full grid justify-items-end">
            <button onclick="hideAllModal()" class="inline-flex px-2.5 py-1.5 shadow-sm text-xs font-medium rounded text-white bg-orange-600 hover:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-600">
                <i class="fas fa-times m-1"></i>
            </button>
        </div>
        <div>
            <form action="#" method="POST" class="divide-y divide-gray-200">
                <div class="mx-5 py-3 grid grid-cols-4">
                    <div class="col-span-1">
                        <label for="name" class="block text-base font-bold font-medium text-gray-700 mt-4 sm:mt-3">Nom<span class="text-red-600 font-bold">*</span></label>
                    </div>
                    <div class="col-span-2 col-start-2">
                        <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                    </div>
                </div>
                <div class="mx-5 py-3 grid grid-cols-4">
                    <div class="col-span-1">
                        <label for="points" class="block text-base font-bold font-medium text-gray-700 mt-4 sm:mt-3">Points<span class="text-red-600 font-bold">*</span></label>
                    </div>
                    <div class="col-span-2 col-start-2">
                        <input type="number" name="points" id="points" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        <p class="mt-2 text-sm text-gray-500">Mettre la valeur à <strong>-1</strong> revient à mettre un nombre de point infini</p>
                    </div>
                </div>
                <div class="mx-5 py-3 grid grid-cols-4">
                    <div class="col-span-1">
                        <label for="expire" class="block text-base font-bold font-medium text-gray-700 mt-4 sm:mt-3">Expire<span class="text-red-600 font-bold">*</span></label>
                    </div>
                    <div class="col-span-2 col-start-2">
                        <input type="number" name="expire" id="expire" class="mt-1 inline-block w-4/5 border border-gray-300 rounded-md shadow-sm py-2 mx-2 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        <label for="points" class="inline-block text-base font-medium text-gray-700">jours</label>
                        <p class="mt-2 text-sm text-gray-500">Mettre la valeur à <strong>-1</strong> revient à ne pas faire expirer l'avertissement</p>
                    </div>
                </div>
                <div class="mx-5 py-3 grid grid-cols-4">
                    <div class="col-span-1">
                        <label for="notes" class="block text-base font-bold font-medium text-gray-700 mt-4 sm:mt-3">Note pour les membres</label>
                    </div>
                    <div class="col-span-2 col-start-2">
                        <textarea name="notes" id="textarea" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm"></textarea>
                        <p class="mt-2 text-sm text-gray-500">Mettre la valeur à <strong>-1</strong> revient à mettre un nombre de point infini</p>
                    </div>
                </div>

            </form>
        </div>
        <div class="px-4 py-4 sm:px-6">
            <button type="submit" name="submitNewAvert" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
            Enregistrer
            </button>
            <button onclick="hideAllModal()" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gray-300 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Annuler
            </button>
        </div>
    </div>

  </div>
</div>

<div id="modalCreateAction" class="fixed z-10 inset-0 overflow-y-auto hidden">
  <div class="flex items-end min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block transform bg-white overflow-hidden shadow rounded-lg w-3/5">
        <div class="px-4 py-5 sm:px-6 w-full grid justify-items-end">
            <button onclick="hideAllModal()" class="inline-flex px-2.5 py-1.5 shadow-sm text-xs font-medium rounded text-white bg-orange-600 hover:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-600">
                <i class="fas fa-times m-1"></i>
            </button>
        </div>
        <div>
            <form action="#" method="POST" class="divide-y divide-gray-200">
                <div class="mx-5 py-3 grid grid-cols-4">
                    <div class="col-span-1">
                        <label for="points" class="block text-base font-bold font-medium text-gray-700 mt-4 sm:mt-3">Points necessaires<span class="text-red-600 font-bold">*</span></label>
                    </div>
                    <div class="col-span-2 col-start-2">
                        <input type="number" name="points" id="points" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        <p class="mt-2 text-sm text-gray-500" >La valeur <strong>-1</strong> n'est pas disponible</p>
                    </div>
                </div>
                <div class="mx-5 py-3 grid grid-cols-4">
                    <div class="col-span-1">
                        <label for="modContent" class="block text-base font-bold font-medium text-gray-700 mt-4 sm:mt-3">Modérer le contenu</label>
                    </div>
                    <div class="col-span-2 col-start-2">
                        <input type="number" name="modContent" id="modContent" class="mt-1 inline-block w-4/5 border border-gray-300 rounded-md shadow-sm py-2 mx-2 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        <label for="modContent" class="inline-block text-base font-medium text-gray-700">jours</label>
                        <p class="mt-2 text-sm text-gray-500" >Mettre la valeur à <strong>-1</strong> revient à ne pas faire expirer l'action</p>
                    </div>
                </div>
                <div class="mx-5 py-3 grid grid-cols-4">
                    <div class="col-span-1">
                        <label for="limiteContent" class="block text-base font-bold font-medium text-gray-700 mt-4 sm:mt-3">Limiter le contenu</label>
                    </div>
                    <div class="col-span-2 col-start-2">
                        <input type="number" name="limiteContent" id="limiteContent" class="mt-1 inline-block w-4/5 border border-gray-300 rounded-md shadow-sm py-2 mx-2 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        <label for="limiteContent" class="inline-block text-base font-medium text-gray-700">jours</label>
                        <p class="mt-2 text-sm text-gray-500" >Mettre la valeur à <strong>-1</strong> revient à ne pas faire expirer l'action</p>
                    </div>
                </div>
                <div class="mx-5 py-3 grid grid-cols-4">
                    <div class="col-span-1">
                        <label for="banMember" class="block text-base font-bold font-medium text-gray-700 mt-4 sm:mt-3">Bannir le membre</label>
                    </div>
                    <div class="col-span-2 col-start-2">
                        <input type="number" name="banMember" id="banMember" class="mt-1 inline-block w-4/5 border border-gray-300 rounded-md shadow-sm py-2 mx-2 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        <label for="banMember" class="inline-block text-base font-medium text-gray-700">jours</label>
                        <p class="mt-2 text-sm text-gray-500" >Mettre la valeur à <strong>-1</strong> revient à ne pas faire expirer l'action</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-4 py-4 sm:px-6">
            <button type="submit" name="submitNewAction" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
            Enregistrer
            </button>
            <button onclick="hideAllModal()" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gray-300 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Annuler
            </button>
        </div>
    </div>

  </div>
</div>

<main class="mt-2 w-full">
    <div class="pb-6 lg:pb-16 px-2">
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
            <aside class="py-6 lg:col-span-2">
                <nav>
                <a href="#" id="display-motifPanel" onclick="showHidePanel('motifPanel');" class="bg-orange-50 border-orange-500 text-orange-700 hover:bg-orange-50 hover:text-orange-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                    <span class="truncate">
                    Motifs
                    </span>
                </a>
                <a href="#" id="display-actPanel" onclick="showHidePanel('actPanel');" class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group mt-1 border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                    <span class="truncate">
                    Actions
                    </span>
                </a>
                <a href="#" id="display-paramPanel" onclick="showHidePanel('paramPanel');" class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group mt-1 border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                    <span class="truncate">
                    Paramètres
                    </span>
                </a>
                </nav>
            </aside>
            <div class="lg:grid lg:col-span-10">
                <form action="#" id="motifPanel" class="divide-y divide-gray-200 w-full p-2" method="POST" enctype="multipart/form-data">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Motif
                                        </th>
                                        <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Points attribués
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        <?php
                                            $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_warning_list", array(), false);
                                            while($data = $query->fetch())
                                            { 
                                        ?>
                                            <tr class="bg-white">
                                                <td class="px-8 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    <?php echo $data['name'] ?>
                                                </td>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                                    <?php 
                                                        if($data['points'] == -1) {
                                                            echo '<span class="text-red-600">Infini</span>';
                                                        } else {
                                                            echo $data['points']." points";
                                                        }
                                                    ?>
                                                </td>
                                                <td class="px-4 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                                        <i class="fas fa-pencil m-1"></i>
                                                    </a>
                                                    <a class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                                        <i class="fas fa-trash-alt m-1"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="#" id="actPanel" class="divide-y divide-gray-200 w-full p-2 hidden" method="POST" enctype="multipart/form-data">
                    2
                </form>
                <form action="#" id="paramPanel" class="divide-y divide-gray-200 w-full p-2 hidden" method="POST" enctype="multipart/form-data">
                    3
                </form>
            </div>
        </div>
      </div>
    </div>
</main>

<script>
function showModal(panel){
    document.getElementById(panel).classList.remove('hidden');
}
function hideAllModal(){
    document.getElementById("modalCreateAvert").classList.add('hidden');
    document.getElementById("modalCreateAction").classList.add('hidden');
}

</script>
<?php
include("system/designer/PA_menu_bottom.php");
?>