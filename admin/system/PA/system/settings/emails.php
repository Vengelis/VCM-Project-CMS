<?php
include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['pa_mails']))
    {
        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global SET value = ? WHERE paramKey = 'smtp_respond_mail'", array(htmlentities($_POST['smtp_respond_mail'])));
    }
    if(isset($_POST['ctl_mails']))
    {
        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global SET value = ? WHERE paramKey = 'smtp_host'", array(htmlentities($_POST['smtp_host'])));
        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global SET value = ? WHERE paramKey = 'smtp_port'", array(htmlentities($_POST['smtp_port'])));
        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global SET value = ? WHERE paramKey = 'smtp_username'", array(htmlentities($_POST['smtp_username'])));
        executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global SET value = ? WHERE paramKey = 'smtp_password'", array(htmlentities($_POST['smtp_password'])));
    }
}

?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Paramètres mails</h2>
        <h3 class="text-sm text-gray-200">Centre de gestion du controleur de mail.</h3>
    </div>
</div>

<div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
  <div class="md:grid md:grid-cols-6 md:gap-6">
    <div class="md:col-span-2">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Paramètres d'affichage des mails</h3>
      <p class="mt-1 text-sm text-gray-500">
        Affichage du mail
      </p>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-4">
      <form action="#" method="POST">
        <div>
            <label for="smtp_respond_mail" class="block font-medium text-gray-900">Email entrante</label>
            <?php $getValue = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_respond_mail'", array()); ?>
            <input type="text" name="smtp_respond_mail" id="smtp_respond_mail" value="<?php echo $getValue['value'] ; ?>" class="p-1 pl-2 mt-1 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
            <p class="text-xs text-gray-600">Cette adresse est communiquée aux utilisateurs sur les écrans d’erreurs ou d'inscription/connexion</p>
        </div>
        <div class="divide-y divide-gray-200">
            <div class="mt-4 flex justify-end sm:px-6">
                <button type="submit" name="pa_mails" class="mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
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
  <div class="md:grid md:grid-cols-6 md:gap-6">
    <div class="md:col-span-2">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Controleur SMTP</h3>
      <p class="mt-1 text-sm text-gray-500">
        Controleur d'envoie de mail du site. Information SMTP necessaire. Protocole standard défini sur SSL.
      </p>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-4">
      <form action="#" method="POST">
        <div>
            <label for="smtp_host" class="block font-medium text-gray-900">Hote SMTP</label>
            <?php $getValue = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_host'", array()); ?>
            <input type="text" name="smtp_host" id="smtp_host" value="<?php echo $getValue['value'] ; ?>" class="p-1 pl-2 mt-1 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
        </div> 
        <div class="mt-5">
            <label for="smtp_port" class="block font-medium text-gray-900">Port SMTP</label>
            <?php $getValue = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_port'", array()); ?>
            <input type="number" name="smtp_port" id="smtp_port" value="<?php echo $getValue['value'] ; ?>" class="p-1 pl-2 mt-1 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
        </div> 
        <div class="mt-5">
            <label for="smtp_username" class="block font-medium text-gray-900">Utilisateur SMTP</label>
            <?php $getValue = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_username'", array()); ?>
            <input type="text" name="smtp_username" id="smtp_username" value="<?php echo $getValue['value'] ; ?>" class="p-1 pl-2 mt-1 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
        </div> 
        <div class="mt-5">
            <label for="smtp_password" class="block font-medium text-gray-900">Mot de passe SMTP</label>
            <?php $getValue = executeQuery("SELECT value FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_config_global WHERE paramKey = 'smtp_password'", array()); ?>
            <input type="text" name="smtp_password" id="smtp_password" value="<?php echo $getValue['value'] ; ?>" class="p-1 pl-2 mt-1 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
        </div>
        <div class="divide-y divide-gray-200">
            <div class="mt-4 flex justify-end sm:px-6">
                <button type="submit" name="ctl_mails" class="mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
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