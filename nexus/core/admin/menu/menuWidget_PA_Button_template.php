<?php

    /*  -------------------------------------------------------------------
     *
     *  Afficher un bouton sur le menu manager du panel administrateur
     *
     *  -------------------------------------------------------------------
     */

function displayPaMenuButton($fc_id, $fc_name, $fc_child, $fc_link = false) {
    ?>

    <a onclick="showParam(<?php echo $fc_id ;?>)" id="<?php echo $fc_id ;?>" href="#" class="dgbut text-gray-600 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md border-2 border-gray-200 rounded-lg p-2" aria-current="page">
        <input type="text" class="hidden menuButton" name="buttonMenu[]" id="buttonMenu" value="<?php echo $fc_id ;?>"/>
        <div class="grid grid-cols-2 w-full">
            <div><?php echo $fc_name ;?></div>
            <?php if($fc_child) { ?>
                <div class="text-right my-auto">
                    <i onclick="fc_redirect('<?php echo $fc_link ;?>')" class="fas fa-server"></i>
                </div>
            <?php } ?>
        </div>
    </a>

    <?php
}

    /*  -------------------------------------------------------------------
     *
     *  Afficher un bouton retour du menu manager
     *
     *  -------------------------------------------------------------------
     */

function displayReturnButton() {
    ?>

    <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=menu_editor" class="text-blue-500 hover:bg-blue-50 hover:text-blue-900 flex items-center px-3 py-2 text-sm font-medium rounded-md border-2 border-blue-200 rounded-lg p-2 mb-5" aria-current="page">
        <span class="w-full">
            <i class="fa fa-long-arrow-alt-left mr-1"></i>
            Retour
        </span>
    </a>

    <?php
}

    /*  -------------------------------------------------------------------
     *
     *  Afficher les paramètres des boutons du menu manager
     *
     *  -------------------------------------------------------------------
     */

function displayPaMenuButtonParams($fc_id) {
    ?>
    <form action="#" method="POST">
        <input type="text" class="hidden" name="formID" id="formID" value="<?php echo $fc_id ;?>"/>
        <div id="menuButtonParam_<?php echo $fc_id ;?>" class="hidden menuParam bg-white overflow-hidden shadow divide-y divide-gray-200">
            <div class="p-2 bg-gray-50">
                Type d'élément du menu
            </div>
            <div class="p-2">
                <ul class="grid grid-cols-3 gap-2">
                    <li class="col-span-1 flex shadow-sm rounded-md">
                        <div class="flex-shrink-0 flex items-center justify-center w-16 bg-yellow-400 text-white text-sm font-medium rounded-l-md">
                            T
                        </div>
                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                <a href="#" class="text-gray-900 font-medium hover:text-gray-600">Templates</a>
                                <p class="text-gray-500">16 Members</p>
                            </div>
                            <div class="flex-shrink-0 pr-2">
                                <button class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Open options</span>
                                    <!-- Heroicon name: solid/dots-vertical -->
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="" class="p-2 bg-gray-50">
                Type d'élément du menu
            </div>
            <div class="p-2">

            </div>
            <div class="p-2 grid place-items-center bg-gray-50">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Sauvegarder
                </button>
            </div>
        </div>
    </form>


    <?php
}

?>
