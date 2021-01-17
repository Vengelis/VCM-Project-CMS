<?php
include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['captchaSubmit']))
    {
        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global SET value = ? WHERE paramKey = 'spamPrevent_captcha_enabled'", array(htmlentities($_POST['spamPrevent_captcha_enabled'])));

        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global SET value = ? WHERE paramKey = 'spamPrevent_captcha_private_key'", array(htmlentities($_POST['reCAPTCHAsprivateKey'])));
        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global SET value = ? WHERE paramKey = 'spamPrevent_captcha_public_key'", array(htmlentities($_POST['reCAPTCHAsiteKey'])));
    }
}

?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Prévention de spam</h2>
        <h3 class="text-sm text-gray-200">Centre de gestion des sécurités contre le spam.</h3>
    </div>
</div>

<div class="bg-white overflow-hidden m-2">
  <div class="px-4 sm:p-3 flex flex-row-reverse w-full">
  <a href="index.php?app=admin&mod=community&ctl=members&cmpt=create" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        <i class="fas fa-key m-1"></i>
        Activer le service "marquage nocif"
    </a>  
  <a href="index.php?app=admin&mod=community&ctl=members&cmpt=create" class="mx-1 inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
        <i class="fas fa-exclamation-triangle m-1"></i>
        Journal du service anti-spam
    </a>
  </div>
</div>

<div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
  <div class="md:grid md:grid-cols-6 md:gap-6">
    <div class="md:col-span-2">
      <h3 class="text-lg font-medium leading-6 text-gray-900">CAPTCHA</h3>
      <p class="mt-1 text-sm text-gray-500">
        Service de vérification d'utilisateur authentique
      </p>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-4">
      <form action="#" method="POST">
        <div class="block">
            <span class="text-gray-900">Type de CAPTCHA</span>
            <div class="mt-2">
                <?php
                    $getInfo = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'spamPrevent_captcha_enabled'", array());
                    $nothinSelected = "";
                    $invisibleSelected = "";
                    if($getInfo['value'] == "nothing")
                    {
                        $nothinSelected = "checked";
                    }
                    elseif($getInfo['value'] == "invisible")
                    {
                        $invisibleSelected = "checked";
                    }
                ?>
                <div>
                    <label class="inline-flex items-center w-full">
                        <input type="radio" class="form-radio text-orange-500" name="spamPrevent_captcha_enabled" value="nothing" <?php echo $nothinSelected ;?>>
                        <span class="ml-2 text-gray-900">Aucun</span>
                    </label>
                    <p class="ml-5 text-xs text-gray-600">Désactive la vérification des utilisateurs par CAPTCHA</p>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-orange-500" name="spamPrevent_captcha_enabled" value="invisible" <?php echo $invisibleSelected ;?>>
                        <span class="ml-2">Invisible reCAPTCHA</span>
                    </label>
                    <p class="ml-5 text-xs text-gray-600">Vérification des utilisateurs par CAPTCHA invisible. L'onglet de CPATCHA sera visible en bas à droite lors des vérifications des utilisateurs.</p>
                </div>
            </div>
        </div>
        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
        <div>
            <label for="reCAPTCHAsiteKey" class="block font-medium text-gray-900">Clé reCAPTCHA du site</label>
            <?php $getValue = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'spamPrevent_captcha_public_key'", array()); ?>
            <input type="text" name="reCAPTCHAsiteKey" id="reCAPTCHAsiteKey" value="<?php echo $getValue['value'] ; ?>" class="p-1 pl-2 mt-1 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
        </div> 
        <div class="mt-5">
            <label for="reCAPTCHAsprivateKey" class="block font-medium text-gray-900">Clé secrète reCAPTCHA</label>
            <?php $getValue = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'spamPrevent_captcha_private_key'", array()); ?>
            <input type="text" name="reCAPTCHAsprivateKey" id="reCAPTCHAsprivateKey" value="<?php echo $getValue['value'] ; ?>" class="p-1 pl-2 mt-1 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
        </div>
        <div class="divide-y divide-gray-200">
            <div class="mt-4 flex justify-end sm:px-6">
                <button type="submit" name="captchaSubmit" class="mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
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

<div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
    <div class="rounded-md bg-yellow-50 p-4 mb-3">
        <div class="flex">
            <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            </div>
            <div class="ml-3">
            <h3 class="text-sm font-medium text-yellow-800">
                En développement
            </h3>
            <div class="mt-2 text-sm text-yellow-700">
                <p>
                Le service est en cours de développement et n'est pas implémenté pour le moment.
                </p>
            </div>
            </div>
        </div>
    </div>
  <div class="md:grid md:grid-cols-6 md:gap-6">
    <div class="md:col-span-2">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Marquage nocif</h3>
      <p class="mt-1 text-sm text-gray-500">
        Service d'enregistrement des comptes les plus suspectés sur les instances de VCM CMS avec l'outil de marquage nocif. Ce service est une base de données regroupant les mails ayant eu des marquages nocifs.
      </p>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-4">
      <form action="#" method="POST">
        <div class="block">
            <span class="text-gray-900">Activer le service "marquage nocif" ?</span>
            <div class="mt-2">
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-green-600">
                        <span class="ml-2">Oui</span>
                    </label>
                    <p class="ml-5 text-xs text-gray-600">Pour que le service fonctionne, vous devez enregistrer votre site sur la plateforme officielle de VCM Project.</p>
                </div>
            </div>
        </div>
        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
        <div>
            <span class="text-gray-900">Action à entreprendre lorsqu'un membre est marqué "nocif":</span>
            <div class="mt-2">
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-orange-500">
                        <span class="ml-2">Empécher les nouvelles publications</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-orange-500">
                        <span class="ml-2">Masquer les contenus</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-orange-500">
                        <span class="ml-2">Supprimer les contenus</span>
                    </label>
                    <p class="ml-5 text-xs text-gray-600">Les contenus ne seront pas récupérables</p>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-orange-500">
                        <span class="ml-2">Bannir le membre</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-orange-500">
                        <span class="ml-2">Signaler le membre à VCM</span>
                    </label>
                    <p class="ml-5 text-xs text-gray-600">L'email et l'adresse IP associés à ce mail lors de la dernière connexion du membre marqué seront envoyés au service de "marquage nocif" de VCM Project</p>
                </div>
            </div>
        </div>
        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
        <div>
            <span class="text-gray-900">Mesure à prendre contre les inscriptions marquées nocives:</span>
            <div class="mt-2">
                <label class="block">
                    <span class="text-gray-700 text-sm">Marquage de niveau 1</span>
                    <select class="form-select block w-1/2 mt-1 text-sm">
                        <option value="1" selected>Admettre une inscription normale</option>
                        <option value="2">Marquer le compte pour une validation manuelle</option>
                        <option value="3">Admettre l'inscription et le bannissement immediat</option>
                        <option value="4">Interdire l'inscription</option>
                    </select>
                    <p class="text-xs text-gray-600">Faible probabilité d'être nocif</p>
                </label>
                <label class="block mt-2">
                    <span class="text-gray-700 text-sm">Marquage de niveau 2</span>
                    <select class="form-select block w-1/2 mt-1 text-sm">
                        <option value="1">Admettre une inscription normale</option>
                        <option value="2" selected>Marquer le compte pour une validation manuelle</option>
                        <option value="3">Admettre l'inscription et le bannissement immediat</option>
                        <option value="4">Interdire l'inscription</option>
                    </select>
                    <p class="text-xs text-gray-600">Utilisateur connu pour une activités suspectes</p>
                </label>
                <label class="block mt-2">
                    <span class="text-gray-700 text-sm">Marquage de niveau 3</span>
                    <select class="form-select block w-1/2 mt-1 text-sm">
                        <option value="1">Admettre une inscription normale</option>
                        <option value="2">Marquer le compte pour une validation manuelle</option>
                        <option value="3" selected>Admettre l'inscription et le bannissement immediat</option>
                        <option value="4">Interdire l'inscription</option>
                    </select>
                    <p class="text-xs text-gray-600">Utilisateur connu pour des activités nocives</p>
                </label>
                <label class="block mt-2">
                    <span class="text-gray-700 text-sm">Marquage de niveau 4</span>
                    <select class="form-select block w-1/2 mt-1 text-sm">
                        <option value="1">Admettre une inscription normale</option>
                        <option value="2">Marquer le compte pour une validation manuelle</option>
                        <option value="3">Admettre l'inscription et le bannissement immediat</option>
                        <option value="4" selected>Interdire l'inscription</option>
                    </select>
                    <p class="text-xs text-gray-600">Utilisateur nocif</p>
                </label>
            </div>
        </div>
        <div class="divide-y divide-gray-200">
            <div class="mt-4 flex justify-end sm:px-6">
                <input class="hidden" name="sended" id="sended" value="sended"></input>
                <button type="submit" class="mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
                    Sauvegarder
                </button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include("system/designer/PA_menu_bottom.php");
?>