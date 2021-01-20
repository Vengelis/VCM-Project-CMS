<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:40:58 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
if(!isset($_GET['key']))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
/* 
    Liste des clés d'erreurs de violation:

    A-PA                    - Tentative d'intrusion sur le panel d'administtration
*/
?>
<div class="fixed z-10 inset-0 overflow-y-auto bg-gray-500">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <span class="sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Erreur - Permission inssufisante !
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            Vous n'êtes pas en mesure d'accéder au pages demandant des permissions spécifiques.
                        </p>
                        <p class="text-sm text-gray-500">
                            Message erreur: <?php echo "Intégrer la variable du message d'erreur en fonction de la clé d'erreur"; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <a href="index.php" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>