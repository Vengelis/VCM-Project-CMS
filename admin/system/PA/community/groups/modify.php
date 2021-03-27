<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-04 15:44:04
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:35:16 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */

if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}

include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");

if(!isset($_GET['gid']))
{
    ?><script>
    document.location.replace("index.php?app=system&mod=errors&ctl=display&cmpt=ae");
    </script><?php
}
else
{
    $gid = htmlentities($_GET['gid']);
}

$size = "0 KB";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_FILES))
    {
        $notUpload = false;

        $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
    
        if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
            $notUpload = true;
        }
        
        if (!file_exists('system/medias/images/temp')) {
            mkdir('system/medias/images/temp', 0777);
        }
        if(!$notUpload)
        {
            move_uploaded_file($_FILES['file']['tmp_name'], 'system/medias/images/temp/'.killAccent($_FILES['file']['name']));
            unlink($_FILES['file']['tmp_name']);
            
        }
    }

    if(isset($_POST['pa_visuels']))
    {
        $groupName = htmlentities($_POST['groupName']);
        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups SET Name = ? WHERE ID = ?", array($groupName, $gid));

        if(htmlentities($_POST['iconeUpdated']) == "true")
        {
            if($_POST['haveIcone'] == "NULL")
            {
                executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups SET icone = ? WHERE ID = ?", array(NULL, $gid));
            }
            else
            {
                $icone = htmlentities($_POST['haveIcone']);
                rename('system/medias/images/temp/'.$icone, 'system/medias/images/groups/'.$icone);
                $size = FileSizeConvert(filesize('system/medias/images/groups/'.killAccent($icone)));
                executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups SET icone = ? WHERE ID = ?", array(killAccent($icone), $gid));
            }
            
        }

        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups SET code = ? WHERE ID = ?", array($_POST["code"], $gid));
        if(isset($_POST["preferCode"]))
        {
            executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups SET  	isIcone = ? WHERE ID = ?", array(0, $gid));
        }
        else
        {
            executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups SET  	isIcone = ? WHERE ID = ?", array(1, $gid));
        }

        $getLastInt = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($gid));
        $getLastInt['lastUpdate']++;
        $updateGroup = executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups SET lastUpdate = ? WHERE ID = ?", array($getLastInt['lastUpdate'], $gid));
    }
    if(isset($_POST['pa_perms']))
    {
        executeQuery("DELETE FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups_perms_links WHERE groupKey = ?", array($gid));
        foreach($_POST['permscheck'] as $pid => $value) {
            executeQuery("INSERT INTO ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups_perms_links VALUES (NULL,?,?)", array($gid, $pid));
        }
        $getLastInt = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($gid));
        $getLastInt['lastUpdate']++;
        $updateGroup = executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups SET lastUpdate = ? WHERE ID = ?", array($getLastInt['lastUpdate'], $gid));
    }
    
    ?><script>
        document.location.replace("index.php?app=admin&mod=community&ctl=groups&cmpt=dashboard");
    </script><?php
}
$getValue = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($gid));
?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Groupes</h2>
        <h3 class="text-sm text-gray-200">Modification d'un groupe</h3>
    </div>
</div>

<div class="mt-3 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
  <div class="md:grid md:grid-cols-6 md:gap-6">
    <div class="md:col-span-2">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Détail du groupe</h3>
      <p class="mt-1 text-sm text-gray-500">
        Paramètres d'affichage du groupe
      </p>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-4">
      <form action="#" method="POST">
        <div>
            <label for="groupName" class="block font-medium text-gray-900">Nom du groupe</label>
            <input type="text" name="groupName" id="groupName" value="<?php echo $getValue['Name'] ; ?>" class="p-1 pl-2 mt-1 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="sm:col-span-6 mt-5 sm:mt-0">
            <label for="cover_photo" class="block font-medium text-gray-900">
                Bannière image du groupe
            </label>
            <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md" id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600" id="drag_upload_file">
                        <label for="fileUpload" class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-orange-500">
                            <span>Envoyer un fichier</span>
                            <input id="fileUpload" name="fileUpload" type="button" class="sr-only" onclick="file_explorer();">
                        </label>
                        <p class="pl-1">ou glisser et déposer le fichier ici</p>
                        <input type="file" id="selectfile" style="display: none">
                    </div>
                    <p class="text-xs text-gray-500">
                        Extensions autorisées: PNG, JPG, JPEG et GIF
                    </p>
                </div>
            </div>
        </div>
        <div class="flex mt-2">
            <div class="mr-4 w-2/5 flex-shrink-0">
                <input type="text" id="iconeUpdated" name="iconeUpdated" style="display: none" value="false">
                <input type="text" id="haveIcone" name="haveIcone" style="display: none" value="<?php echo $getValue['icone']; ?>">
                <?php 
                    if(file_exists('system/medias/images/groups/'.$getValue['icone']) && !is_null($getValue['icone']))
                    {
                        $size = filesize('system/medias/images/groups/'.$getValue['icone']);
                        echo '<img class="object-contain h-48 w-full h-full" id="image" src="system/medias/images/groups/'.$getValue['icone'].'">';
                    }
                    else
                    {
                        echo '<img class="object-contain h-48 w-full h-full" id="image" src="">';
                    }
                ?>
            </div>
            <div>
                <?php
                if(is_null($getValue['icone']))
                {
                    $getValue['icone'] = "Aucune image attachée";
                }
                ?>
                <h4 class="text-base font-bold" id="fileName"><?php echo $getValue['icone'] ; ?></h4>
                <p class="mt-1 text-sm">Taille: <span id="size"><?php echo $size ; ?></span> <a href="#" onclick="deleteFile();" class="sm:ml-5 text-red-600"><i class="fas fa-trash-alt"></i> Supprimer</a></p>
            </div>
        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <label class="block mt-5 sm:mt-0">
            <span class="text-gray-900 font-medium">Formatage par code HTML</span>
            <textarea name="code" class="form-textarea mt-1 block w-full" rows="3" placeholder="Enter some long form content."><?php echo $getValue['code'] ; ?></textarea>
        </label>

        <div class="block mt-3">
            <label class="inline-flex items-center">
                <?php
                if($getValue['isIcone'])
                {
                    echo '<input type="checkbox" name="preferCode" class="form-checkbox text-orange-600">';
                }
                else
                {
                    echo '<input type="checkbox" name="preferCode" class="form-checkbox text-orange-600" checked>';
                }
                ?>
                <span class="ml-2 text-sm">Privilégier le formatage code que le formatage par image</span>
            </label>
        </div>

        <div class="divide-y divide-gray-200">
            <div class="mt-4 flex justify-end sm:px-6">
                <button type="submit" name="pa_visuels" class="mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
                    Sauvegarder
                </button>
            </div>
        </div>

      </form>
    </div>
  </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

<div class="mt-3 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
  <div class="md:grid md:grid-cols-6 md:gap-6">
    <div class="md:col-span-2">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Permissions du groupe</h3>
      <p class="mt-1 text-sm text-gray-500">
        Permission d'accès aux différents services du CMS
      </p>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-4">
      <form action="#" method="POST">
        <div class="block">
        <?php
            $allPermissionsOfGroup = array();
            $permOfGroup = executeQuery("SELECT permissionKey FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups_perms_links WHERE groupKey = ?", array($gid), false);
            while($data = $permOfGroup->fetch())
            { 
                array_push($allPermissionsOfGroup, $data['permissionKey']);
            }
            $directory = 'nexus';
            $scannedApplication = array_diff(scandir($directory), array('..', '.'));
            foreach($scannedApplication as $app)
            {
                if($app == "core")
                {
                    $displayApp = "System";
                }
                else
                {
                    $displayApp = ucfirst($app);
                }
                ?>
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200 mb-3">
                    <div class="px-4 py-4 sm:px-6 bg-gray-100">
                        <h4 class="text-lg font-medium leading-6 text-red-600"><?php echo $displayApp ?><a onclick="showHidePanel('perm<?php echo $displayApp ; ?>');"><i class="ml-2 fas fa-eye text-gray-400 hover:text-orange-600"></i></a></h4>
                    </div>
                    <div id="perm<?php echo $displayApp ; ?>" class="px-4 py-5 sm:p-6">
                    <?php
                    $mods = executeQuery("SELECT module FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_permissions WHERE application = ?", array($app), false);
                    $modsAlreadyPassed = array();
                    while($data = $mods->fetch())
                    { 
                        if(!in_array($data['module'], $modsAlreadyPassed))
                        {
                            array_push($modsAlreadyPassed, $data['module']);
                            $ctls = executeQuery("SELECT controller FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_permissions WHERE application = ? AND module = ?", array($app, $data['module']), false);
                            $ctlAlreadyPassed = array();
                            ?>
                            <div class="pb-2 mb-2  border-b border-gray-200">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    <i class="fas fa-window-maximize text-gray-600"></i> <?php echo ucfirst($data['module']) ; ?>
                                </h3>
                            </div>
                            <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                            <?php
                            while($dataCtl = $ctls->fetch())
                            { 
                                if(!in_array($dataCtl['controller'], $ctlAlreadyPassed))
                                {
                                    array_push($ctlAlreadyPassed, $dataCtl['controller']);
                                    ?>
                                    <div class="mb-5 ml-3">
                                        <span class="text-gray-900 ml-2"><i class="fas fa-window-restore text-gray-600"></i> <?php echo ucfirst($dataCtl['controller']) ; ?></span>
                                        <div class="mt-2">
                                        <?php
                                        $perms = executeQuery("SELECT ID, description, permKey FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_permissions WHERE application = ? AND module = ? AND controller = ?", array($app, $data['module'], $dataCtl['controller']), false);
                                        while($dataPerm = $perms->fetch())
                                        {
                                            $checked = "";
                                            if(in_array($dataPerm['ID'], $allPermissionsOfGroup))
                                            {
                                                $checked = "checked";
                                            }
                                            ?>
                                            <div class="ml-8">
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" name="permscheck[<?php echo $dataPerm['ID']; ?>]" class="form-checkbox text-orange-600" <?php echo $checked; ?>>
                                                    <span class="ml-2"><i class="fas fa-cogs text-gray-600"></i> <?php echo ucfirst($dataPerm['description']); ?></span>
                                                </label>
                                            </div>
                                            <?php
                                        } 
                                        ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                
                            } ?>
                            </div>
                            
                            <?php
                        }
                    } ?>
                    </div>
                </div>
                <?php
            }?>
            </div>
            <?php
        ?>
        <div class="divide-y divide-gray-200">
            <div class="mt-4 flex justify-end sm:px-6">
                <button type="submit" name="pa_perms" class="mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
                    Sauvegarder
                </button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>

function showHidePanel(panel)
{
    if(document.getElementById(panel).classList.contains("hidden"))
    {
        document.getElementById(panel).classList.remove('hidden');
    }
    else
    {
        document.getElementById(panel).classList.add('hidden');
    }
    
}

</script>
<?php
include("system/security/js_drag_drop_controller.php");
include("system/designer/PA_menu_bottom.php");
?>