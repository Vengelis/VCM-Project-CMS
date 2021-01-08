<?php
include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");

// Create function component
include("admin/system/PA/community/actions/createMember.php");

$alertDisplay = false;
$alertSuccess = false;
$alertMessage = "";

if(isset($_POST['sended']))
{
    if(empty($_POST['username']))
    {
        $alertDisplay = true;
        $alertMessage .= "<li>Vous devez spécifier un nom d'utilisateur.</li>";
    }
    if(empty($_POST['login']))
    {
        $alertDisplay = true;
        $alertMessage .= "<li>Vous devez spécifier un nom d'authentificaton.</li>";
    }
    if(empty($_POST['email']))
    {
        $alertDisplay = true;
        $alertMessage .= "<li>Vous devez spécifier une adresse mail.</li>";
    }
    if(empty($_POST['password']))
    {
        $alertDisplay = true;
        $alertMessage .= "<li>Vous devez spécifier un mot de passe.</li>";
    }
    if(empty($_POST['cpassword']))
    {
        $alertDisplay = true;
        $alertMessage .= "<li>Vous devez spécifier un mot de passe.</li>";
    }
    if(empty($_POST['firstGroup']))
    {
        $alertDisplay = true;
        $alertMessage .= "<li>Vous devez spécifier un groupe principal valide.</li>";
    }
    if(!empty($_POST['password']) && empty($_POST['cpassword']))
    {
        if($_POST['password'] != $_POST['cpassword'])
        {
            $alertDisplay = true;
            $alertMessage .= "<li>Les mots de passe ne concordent pas.</li>";
        }
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
        $safeLogin = htmlentities($_POST['login']);
        $safeUsername = htmlentities($_POST['username']);
        $safeDescription = htmlentities($_POST['description']);
        $safeFirstGroup = htmlentities($_POST['firstGroup']);
        $safeEmail = htmlentities($_POST['email']);

        if(createMember($safeLogin, $safeUsername, $safeDescription, passHash($_POST['password']), $_SERVER['REMOTE_ADDR'], $safeFirstGroup, $og, $safeEmail, $userImageProfil, 1))
        {
            $alertSuccess = true;
        }
        else
        {
            $alertDisplay = true;
            $alertMessage .= "<li>La création du compte n'a pas aboutie. Un compte doit déjà exister sous le même login ou le même adresse mail.</li>";
        }
        
    }
    
}

/* Code pour modifier un utilisateur

if(!isset($_GET["form"]))
{
    $form = "profilForm";
}
else
{
    $form = "unknow";
    $files = scandir('admin/system/PA/community/members/components/');
    foreach($files as $file) {
        if($file == $_GET["profilForm"].".php")
        {
            $form = $_GET["profilForm"];
        }
    }
    if($form == "unknow")
    {
        $form == "profilForm";
    }
}

<?php
            include("admin/system/PA/community/members/components/".$form.".php");
            ?>

*/

?>

<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Membres</h2>
        <h3 class="text-sm text-gray-200">Création d'un membre.</h3>
    </div>
</div>

<!-- Création des formulaires de création de compte -->
<input class="hidden" name="typeForm" id="typeForm" value="create"></input>

<main class="mt-2">
    <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
        <!-- Pour la modification des comptes
          <aside class="py-6 lg:col-span-3">
            <nav>
              <a href="index.php?app=admin&mod=community&ctl=members&cmpt=create&form=profilForm" class="bg-orange-50 border-orange-500 text-orange-700 hover:bg-orange-50 hover:text-orange-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                <svg class="text-orange-500 group-hover:text-orange-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="truncate">
                  Profile
                </span>
              </a>
              
              <a href="index.php?app=admin&mod=community&ctl=members&cmpt=create&form=passForm" class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group mt-1 border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                <span class="truncate">
                  Mot de passe
                </span>
              </a>
              <a href="index.php?app=admin&mod=community&ctl=members&cmpt=create&form=paramsForm" class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group mt-1 border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="truncate">
                  Paramètres
                </span>
              </a>
              <a href="#" class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group mt-1 border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="truncate">
                  Notifications
                </span>
              </a>
            </nav>
          </aside>-->

            <!-- Uniquement pour la création des comptes ! -->
            <div name="alertSuccess" id="alertSuccess" class="hidden rounded-md bg-green-50 p-4 lg:col-span-12 m-5">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        </div>
                        <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800">
                            Création du compte
                        </h3>
                        <div class="mt-2 text-sm text-green-700">
                            <p>
                            La création du compte s'est effectuée sans encombre !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div name="alertWrongExt" id="alertWrongExt" class="hidden rounded-md bg-red-50 p-4 lg:col-span-12 m-5">
                <div class="flex">
                    <div class="flex-shrink-0">
                    <!-- Heroicon name: x-circle -->
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
            <div name="alertBox" id="alertBox" class="hidden rounded-md bg-red-50 p-4 lg:col-span-12 m-5">
                <div class="flex">
                    <div class="flex-shrink-0">
                    <!-- Heroicon name: x-circle -->
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">
                        Des erreurs sont survenues lors de la création du profil !
                    </h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            <?php echo $alertMessage ; ?>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
            <form action="#" class="divide-y divide-gray-200 lg:col-span-12" method="POST" enctype="multipart/form-data">
                <!-- Profile section -->
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
                            <input type="text" name="username" id="username" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        </div>
                        </div>

                        <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm"></textarea>
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
                            <input type="text" name="login" id="login" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Adresse mail<a class="text-red-800">*</a></label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe<a class="text-red-800">*</a></label>
                            <input type="password" name="password" id="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label for="cpassword" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe<a class="text-red-800">*</a></label>
                            <input type="password" name="cpassword" id="cpassword" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        </div>
                        
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block">
                                <span class="text-gray-700">Groupe principal<a class="text-red-800">*</a></span>
                                <select name="firstGroup" class="form-select block w-full mt-1">
                                <?php
                                    $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_groups", array(), false);
                                    while($data = $query->fetch())
                                    { 
                                        ?>
                                        <option value="<?php echo $data['ID']; ?>"><?php echo $data['Name']; ?></option>
                                        <?php
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
                                    while($data = $query->fetch())
                                    { 
                                        ?>
                                        <option value="<?php echo $data['ID']; ?>"><?php echo $data['Name']; ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pt-6 divide-y divide-gray-200">
                    <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                        <input class="hidden" name="sended" id="sended" value="sended"></input>
                        <button type="submit" class="mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
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
  </main>
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