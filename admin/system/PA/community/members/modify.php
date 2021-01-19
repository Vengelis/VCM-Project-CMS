<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:35:54 
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

$alertDisplay = false;
$alertSuccess = false;
$alertMessage = "";

if(!isset($_GET['mid']))
{
    ?><script>
    document.location.replace("index.php?app=system&mod=errors&ctl=display&cmpt=ae");
    </script><?php
}
else
{
    $mid = htmlentities($_GET['mid']);
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['profilSended']))
    {
        if(empty($_POST['username']))
        {
            $alertDisplay = true;
            $alertMessage .= "<li>Vous devez spécifier un nom d'utilisateur.</li>";
        }
        if(empty($_POST['email']))
        {
            $alertDisplay = true;
            $alertMessage .= "<li>Vous devez spécifier une adresse mail.</li>";
        }
        if(empty($_POST['firstGroup']))
        {
            $alertDisplay = true;
            $alertMessage .= "<li>Vous devez spécifier un groupe principal valide.</li>";
        }
        $userImageProfil = "";
        if(isset($_FILES))
        {
            if(!verifUploadedFileSize($_FILES['user_photo']["size"]))
            {
                $userImageProfil = "";
                $alertDisplay = true;
                $alertMessage .= "<li>la photo a une trop grande taille pour être envoyée !.</li>";
            }
            else
            {
                $pdpRndString = "IPM-".$_POST['username'].generateRandomString()."-";
                $userImageProfil = $pdpRndString.$_FILES['user_photo']["name"];
                move_uploaded_file($_FILES['user_photo']["tmp_name"], "system/medias/images/memberProfils/".$pdpRndString.$_FILES['user_photo']["name"]);
                if (!file_exists("system/medias/images/memberProfils/".$pdpRndString.$_FILES['user_photo']["name"])) 
                {
                    $userImageProfil = "default.png";
                }
            }
        }
        else
        {
            $userImageProfil = "default.png";
        }
        
        if(!isset($_POST['otherGroups']))
        {
            $og = serialize(array());
        }
        else
        {
            $og = serialize($_POST['otherGroups']);
        }

        if($alertDisplay == false)
        {
            $safeUsername = htmlentities($_POST['username']);
            $safeDescription = htmlentities($_POST['description']);
            $safeFirstGroup = htmlentities($_POST['firstGroup']);
            $safeEmail = htmlentities($_POST['email']);

            executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_users SET username = ?, description = ? , firstGroup = ?, otherGroups = ?, email = ?, imageProfil = ? WHERE ID = ?", array($safeUsername, $safeDescription, $safeFirstGroup, $og, $safeEmail, htmlentities($userImageProfil), $mid));
            $getLastInt = executeQuery("SELECT lastUpdate FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups WHERE ID = ?", array($mid));
            $getLastInt['lastUpdate']++;
            $updateGroup = executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups SET lastUpdate = ? WHERE ID = ?", array($getLastInt['lastUpdate'], $mid));
            $alertSuccess = true;
            
        }
        
    }
}
$getValue = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_users WHERE ID = ?", array($mid));
?>

<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Membres</h2>
        <h3 class="text-sm text-gray-200">Modification d'un membre.</h3>
    </div>
</div>


<input class="hidden" name="typeForm" id="typeForm" value="create"></input>

<main class="mt-2">
    <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
            <aside class="py-6 lg:col-span-3">
                <nav>
                <a href="#" id="display-profilPanel" onclick="showHidePanel('profilPanel');" class="bg-orange-50 border-orange-500 text-orange-700 hover:bg-orange-50 hover:text-orange-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                    <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="truncate">
                    Profile
                    </span>
                </a>
                
                <a href="#" id="display-passPanel" onclick="showHidePanel('passPanel');" class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group mt-1 border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                    <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                    <span class="truncate">
                    Mot de passe
                    </span>
                </a>
                <a href="#" id="display-modPanel" onclick="showHidePanel('modPanel');" class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group mt-1 border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                    <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="truncate">
                    Modération
                    </span>
                </a>
                </nav>
            </aside>
            <div class="lg:grid lg:col-span-9">
                <div name="alertSuccess" id="alertSuccess" class="hidden rounded-md bg-green-50 p-4 m-5">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            </div>
                            <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">
                                Modification du compte
                            </h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>
                                La modification du compte s'est effectuée sans encombre !
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div name="alertWrongExt" id="alertWrongExt" class="hidden rounded-md bg-red-50 p-4 m-5">
                    <div class="flex">
                        <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        </div>
                        <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            Erreur sur l'image !
                        </h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Le format de l'image est invalide ! (trop lourde ou mauvaise extension)</li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <div name="alertBox" id="alertBox" class="hidden rounded-md bg-red-50 p-4 m-5">
                    <div class="flex">
                        <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        </div>
                        <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            Des erreurs sont survenues lors de la modification du profil !
                        </h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                <?php echo $alertMessage ; ?>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <form action="#" id="passPanel" class="divide-y divide-gray-200 w-full hidden" method="POST" enctype="multipart/form-data">
                    <div class="rounded-md bg-yellow-50 p-4 m-5">
                        <div class="flex">
                            <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            </div>
                            <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">
                                Element en cours de développement
                            </h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <p>
                                L'équipe de VCM s'excuse de ne pas pouvoir vous fournir cette page. Elle est encore en cours de développement et des méthodes pour construire cela sont encore en cours de reflexion.
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="#" id="modPanel" class="divide-y divide-gray-200 w-full hidden" method="POST" enctype="multipart/form-data">
                    <div class="rounded-md bg-yellow-50 p-4 m-5">
                        <div class="flex">
                            <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            </div>
                            <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">
                                Element en cours de développement
                            </h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <p>
                                L'équipe de VCM s'excuse de ne pas pouvoir vous fournir cette page. Elle est encore en cours de développement et des méthodes pour construire cela sont encore en cours de reflexion.
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="#" id="profilPanel" class="divide-y divide-gray-200 w-full" method="POST" enctype="multipart/form-data">
                    <div class="py-6 px-4 sm:p-6 lg:pb-8">
                        <div>
                        <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                        <p class="mt-1 text-sm text-gray-500">
                            Ces informations seront affichées publiquement, alors faites attention à ce que vous partagez.
                        </p>
                        </div>

                        <div class="mt-6 flex flex-col lg:flex-row">
                        <div class="flex-grow space-y-6">
                            <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">
                                Nom d'utilisateur<a class="text-red-800">*</a>
                            </label>
                            <div class="mt-1 rounded-md shadow-sm flex">
                                <input type="text" name="username" id="username" value="<?php echo $getValue['username']; ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                            </div>
                            </div>

                            <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm"><?php echo $getValue['description']; ?></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Brève description de votre profil. Les URL sont liés par des hyperliens.
                            </p>
                            </div>
                        </div>

                        <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                            <div class="mt-1 lg:hidden">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                                        <img class="rounded-full h-full w-full" src="system/medias/images/memberProfils/default.png" alt="">
                                    </div>
                                    <div class="ml-5 rounded-md shadow-sm">
                                        <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-light-blue-500">
                                            <label for="user_photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                            <span>Changer</span>
                                            <span class="sr-only"> Photo d'utilisateur</span>
                                            </label>
                                            <input type="file" id="user_photo2" name="user_photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden relative rounded-sm overflow-hidden lg:block">
                                <img class="relative rounded-sm w-40 h-40" src="system/medias/images/memberProfils/default.png" alt="">
                                <label for="user_photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                                    <span>Changer</span>
                                    <span class="sr-only"> Photo d'utilisateur</span>
                                    <input type="file" id="user_photo" name="user_photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                </label>
                            </div>
                        </div>
                        </div>

                        <div class="mt-6 grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="login" class="block text-sm font-medium text-gray-700">Identifiant de connexion<a class="text-red-800">*</a></label>
                                <input disabled type="text" value="<?php echo $getValue['login']; ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                            </div>

                            <div class="col-span-12 sm:col-span-6">
                                <label for="email" class="block text-sm font-medium text-gray-700">Adresse mail<a class="text-red-800">*</a></label>
                                <input type="email" name="email" id="email" value="<?php echo $getValue['email']; ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                            </div>
                            
                            <div class="col-span-12 sm:col-span-6">
                                <label class="block">
                                    <span class="text-gray-700">Groupe principal<a class="text-red-800">*</a></span>
                                    <select name="firstGroup" class="form-select block w-full mt-1">
                                        <?php
                                            $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups", array(), false);
                                            $primaryGroup = $getValue["firstGroup"];
                                            while($data = $query->fetch()) 
                                            { 
                                                if($data["ID"] == $primaryGroup)
                                                {
                                                    echo '<option id="'.$data["ID"].'" selected> '.$data["Name"].'</option>';
                                                }
                                                else
                                                {
                                                    echo '<option id="'.$data["ID"].'"> '.$data["Name"].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </label>
                            </div>
                            
                            <div class="col-span-12 sm:col-span-6">
                                <label class="block">
                                    <span class="text-gray-700">Groupes secondaires</span>
                                    <select name="otherGroups[]" id="otherGroups[]" class="form-multiselect block w-full mt-1" multiple="multiple">
                                        <?php
                                            $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups", array(), false);
                                            $objGroups = (array) unserialize($getValue["otherGroups"]);
                                            while($data = $query->fetch())
                                            { 
                                                foreach($objGroups as $group)
                                                {
                                                    
                                                    if($data["ID"] == $group)
                                                    {
                                                        if($data["ID"] != $primaryGroup)
                                                        {
                                                            echo '<option id="'.$data["ID"].'" selected> '.$data["Name"].'</option>';
                                                        }
                                                    }
                                                }
                                            }
                                            $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups", array(), false);
                                            while($data = $query->fetch())
                                            { 
                                                $stop = false;
                                                foreach($objGroups as $group)
                                                {
                                                    if($data["ID"] == $group)
                                                    {
                                                        $stop = true;
                                                    }
                                                }
                                                if(!$stop)
                                                {
                                                    echo '<option id="'.$data["ID"].'"> '.$data["Name"].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 divide-y divide-gray-200">
                        <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                            <button type="submit" name="profilSended" class="mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
                                Sauvegarder
                            </button>
                            <a href="index.php?app=admin&mod=community&ctl=members&cmpt=dashboard" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Annuler
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </main>
<script>
function showPanel(panel) {
    document.getElementById(panel).classList.remove('hidden');
    document.getElementById("display-" + panel).classList.remove('border-transparent');
    document.getElementById("display-" + panel).classList.remove('text-gray-900');
    document.getElementById("display-" + panel).classList.remove('hover:bg-gray-50');
    document.getElementById("display-" + panel).classList.remove('hover:text-gray-900');
    document.getElementById("display-" + panel).classList.add('bg-orange-50');
    document.getElementById("display-" + panel).classList.add('border-orange-500');
    document.getElementById("display-" + panel).classList.add('text-orange-700');
    document.getElementById("display-" + panel).classList.add('hover:bg-orange-50');
    document.getElementById("display-" + panel).classList.add('hover:text-orange-700');
    
}
function hideAllPanel(panel) {
    if(!(document.getElementById(panel).classList.contains("hidden"))){
        document.getElementById(panel).classList.add('hidden');
        document.getElementById("display-" + panel).classList.remove('bg-orange-50');
        document.getElementById("display-" + panel).classList.remove('border-orange-500');
        document.getElementById("display-" + panel).classList.remove('text-orange-700');
        document.getElementById("display-" + panel).classList.remove('hover:bg-orange-50');
        document.getElementById("display-" + panel).classList.remove('hover:text-orange-700');
        document.getElementById("display-" + panel).classList.add('border-transparent');
        document.getElementById("display-" + panel).classList.add('text-gray-900');
        document.getElementById("display-" + panel).classList.add('hover:bg-gray-50');
        document.getElementById("display-" + panel).classList.add('hover:text-gray-900');
    }
}
function showHidePanel(panel)
{
    hideAllPanel('profilPanel');
    hideAllPanel('passPanel');
    hideAllPanel('modPanel');
    showPanel(panel);
}
</script>
<?php
include("system/security/profil_check_upload.php");
if($alertDisplay == true)
{
    ?>
    <script>document.getElementById("alertBox").className = "rounded-md bg-red-50 p-4 lg:col-span-12 m-5";</script>
    <?php
}
if($alertSuccess == true)
{
    ?>
    <script>document.getElementById("alertSuccess").className = "rounded-md bg-green-50 p-4 lg:col-span-12 m-5";</script>
    <?php
}
include("system/designer/PA_menu_bottom.php");
?>