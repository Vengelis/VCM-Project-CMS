<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-04 15:44:04
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:36:09 
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

if(!isset($_GET['uid']))
{
    ?><script>
    document.location.replace("index.php?app=system&mod=errors&ctl=display&cmpt=ae");
    </script><?php
}
$uid = htmlentities($_GET['uid']);
$user = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_users WHERE ID = ?", array($uid));

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $param = htmlentities($_POST['delete_user']);
    if(isset($_POST['save_logs']))
    {
        $savelogs = "save_logs";
    }
    else
    {
        $savelogs = "no_save_logs";
    }

}
?>

<div class="bg-white shadow sm:rounded-lg mx-24 my-24 p-5">
    <form action="#" method="POST">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Valider la suppression du compte
                </h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">
                    Vous êtes sur le point de supprimer un compte utilisateur. Cette action est irreversible !
                    </p>
                </div>
                <div class="mt-2">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-orange-600" name="delete_user" value="continue_display" checked>
                            <span class="ml-2">Continuer d'afficher <?php echo $user['username'] ; ?></span>
                        </label>
                        <p class="text-xs text-gray-500 ml-5">
                            En choisissant de continuer d'afficher '<?php echo $user['username'] ; ?>', le nom d'utilisateur devient impossible à reprendre sans la suppression de toute trace de cet utilisateur. Pour l'effacer completement, faites une purge du système.
                        </p>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-orange-600" name="delete_user" value="change_invite">
                            <span class="ml-2">Tout changer en 'Compte supprimé'</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox text-orange-600" name="save_logs" value="save_logs">
                            <span class="ml-2">Supprimer les logs de modération</span>
                            <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            Pas implémenté
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                <span><i class="fas fa-user-times text-white mr-1"></i> Supprimer <?php echo $user['username'] ; ?></span>
            </button>
            <a href="index.php?app=admin&mod=community&ctl=members&cmpt=dashboard" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
            Annuler
            </a>
        </div>
    </form>
</div>

<?php
include("system/designer/PA_menu_bottom.php");
?>