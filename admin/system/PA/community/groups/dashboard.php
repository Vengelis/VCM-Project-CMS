<?php
include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");
?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Groupes</h2>
        <h3 class="text-sm text-gray-200">Centre de gestion des groupes et des permissions du site.</h3>
    </div>
</div>

<div class="bg-white overflow-hidden m-2">
  <div class="px-4 sm:p-3 flex flex-row-reverse w-full">
    <a href="#" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
        <i class="fas fa-file-export m-1"></i>
        exporter la liste des groupes
    </a>
    <a href="#" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
        <i class="fas fa-file-import m-1"></i>
        importer une liste de groupes
    </a>
    <a href="index.php?app=admin&mod=community&ctl=members&cmpt=create" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
        <i class="fas fa-plus m-1"></i>
        Créer un groupe
    </a>
  </div>
</div>

<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nom du groupe
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Apperçu
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php
                $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups", array(), false);
                while($data = $query->fetch())
                { 
                    ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                <?php echo $data['Name'] ; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php echo $data['code'] ; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="index.php?app=admin&mod=community&ctl=groups&cmpt=modify&gid=<?php echo $data['ID'] ; ?>" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <i class="fas fa-pen m-1"></i>
                            </a>
                            <a class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <i class="fas fa-lock m-1"></i>
                            </a>
                            <?php if($data['sysKeyCode'] != "Administrator" && $data['sysKeyCode'] != "Guest" && $data['sysKeyCode'] != "Member") { ?>
                            <a href="index.php?app=admin&mod=community&ctl=groups&cmpt=delete&gid=<?php echo $data['ID'] ; ?>" class="inline-flex items-center px-2.5 py-1.5 shadow-sm text-xs font-medium rounded text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800">
                                <i class="fas fa-ban m-1"></i>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
include("system/designer/PA_menu_bottom.php");
?>