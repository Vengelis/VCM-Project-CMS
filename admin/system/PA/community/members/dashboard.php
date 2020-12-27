<?php
include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");
?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Membres</h2>
        <h3 class="text-sm text-gray-200">Centre de gestion des membres du site.</h3>
    </div>
</div>

<div class="bg-white overflow-hidden m-2">
  <div class="px-4 sm:p-3 flex flex-row-reverse w-full">
    <a href="#" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
        <i class="fas fa-file-export m-1"></i>
        exporter une liste de membre
    </a>
    <a href="#" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
        <i class="fas fa-file-import m-1"></i>
        importer une liste de membre
    </a>
    <a href="index.php?app=admin&mod=community&ctl=members&cmpt=create" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
        <i class="fas fa-plus m-1"></i>
        Créer un membre
    </a>
  </div>
</div>

<div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 m-2">
  <div>
    <span class="relative z-0 inline-flex rounded-md m-1">
        <a class="relative inline-flex items-center px-4 py-1 rounded-l-md border border-orange-600 bg-orange-600 text-xs font-medium text-white hover:bg-orange-800 focus:z-10 focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-800">
            Tous
        </a>
        <a class="-ml-px relative inline-flex items-center px-4 py-1 border border-gray-300 bg-white text-xs font-medium text-gray-700 hover:bg-orange-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500">
            Administrateur
        </a>
        <a class="-ml-px relative inline-flex items-center px-4 py-1 border border-gray-300 bg-white text-xs font-medium text-gray-700 hover:bg-orange-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500">
            Banni
        </a>
        <a class="-ml-px relative inline-flex items-center px-4 py-1 rounded-r-md border border-gray-300 bg-white text-xs font-medium text-gray-700 hover:bg-orange-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500">
            En approbation
        </a>
    </span>
    <a class="inline-flex items-center px-4 py-1 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-orange-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
    Rechercher
    </a>
  </div>
  <div>

<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nom
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Adresse mail
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Inscription
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Groupes
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Adresse IP
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php
                $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_users", array(), false);
                while($data = $query->fetch())
                { 
                    ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://cdn.discordapp.com/avatars/178151615801327616/aba7197f311298b70e78c77b8bbfd37c.png?size=4096" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                <?php echo $data['username'] ; ?>
                                </div>
                                <div class="text-sm text-gray-500">
                                <?php echo $data['description'] ; ?>
                                </div>
                            </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $data['email'] ; ?></div>
                            <?php
                            if($data['validateAccount'] == 0)
                            {
                                echo '<div class="text-sm text-red-300">En attente d\'approbation</div>';
                            } else {
                                echo '<div class="text-sm text-green-300">Validé</div>';
                            }
                            ?>
                            
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-700"><?php echo $data['registered'] ; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            
                            <?php 
                                $group = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."groups WHERE ID = ?", array($data['firstGroup']));
                                echo $group['code'] ;

                                $secondaryGroup = unserialize($data['otherGroups']);
                            ?>
                            <div class="text-xs text-gray-500 mt-1">
                            <?php
                                $endedGroup = end($secondaryGroup);
                                foreach($secondaryGroup as $ogroup)
                                {
                                    $oogroup = executeQuery("SELECT Name FROM ".$GLOBALS['GC']['sql_tbl_prefix']."groups WHERE ID = ?", array($ogroup));
                                    if($ogroup != $endedGroup) echo $oogroup['Name'].", " ;
                                    else echo $oogroup['Name'];
                                    
                                } ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo $data['lastIP'] ; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <i class="fas fa-eye m-1"></i>
                            </a>
                            <a class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <i class="fas fa-ban m-1"></i>
                            </a>
                            <a class="inline-flex items-center px-2.5 py-1.5 shadow-sm text-xs font-medium rounded text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800">
                                <i class="fas fa-flag m-1"></i>
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

  </div>
</div>

<?php
include("system/designer/PA_menu_bottom.php");
?>