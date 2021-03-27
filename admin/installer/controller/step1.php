<?php
$continue = true;
?>
<div class="bg-white rounded-lg shadow p-6">
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="px-4 py-5 sm:px-6">
            <nav aria-label="Progress">
                <ol class="space-y-4 md:flex md:space-y-0 md:space-x-8">
                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-orange-600 hover:border-orange-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-orange-600 font-semibold uppercase group-hover:text-orange-800">Etape 0</span>
                            <span class="text-sm font-medium">Bienvenue</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="pl-4 py-2 flex flex-col border-l-4 border-orange-400 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                            <span class="text-xs text-orange-400 font-semibold uppercase">Etape 1</span>
                            <span class="text-sm font-medium">Verification du système</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-gray-500 font-semibold uppercase group-hover:text-gray-700">Etape 2</span>
                            <span class="text-sm font-medium">Détail du serveur</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-gray-500 font-semibold uppercase group-hover:text-gray-700">Etape 3</span>
                            <span class="text-sm font-medium">Super administrateur</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-gray-500 font-semibold uppercase group-hover:text-gray-700">Etape 4</span>
                            <span class="text-sm font-medium">Installation</span>
                        </a>
                    </li>
                    
                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-gray-500 font-semibold uppercase group-hover:text-gray-700">Etape 5</span>
                            <span class="text-sm font-medium">Finitions</span>
                        </a>
                    </li>
                </ol>
            </nav>

        </div>
        <div class="px-4 py-5 sm:p-6">
            <div class="block">
                <span class="text-xl text-black">Vérification de l'environnement: </span>
                <div class="mt-2 ml-3">
                    <div class="my-1">
                    <?php
                    if(PHP_VERSION_ID < 700000)
                    {
                        $continue = false;
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-red-500" checked>
                                <span class="ml-2 text-gray-900">Version PHP <?php echo phpversion();?>. Mettez à jour imperativement votre version PHP (Version de développement: PHP 7.3.21).</span>
                            </label>
                        <?php
                    }
                    elseif(PHP_VERSION_ID <  70321)
                    {
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-400" checked>
                                <span class="ml-2 text-gray-900">Version PHP <?php echo phpversion();?>. Votre version de PHP est inferieur à celle recommandée (Version de développement: PHP 7.3.21).</span>
                            </label>
                        <?php
                    }
                    else
                    {
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-400" checked>
                                <span class="ml-2 text-gray-900">Version PHP <?php echo phpversion();?> (Version de développement: PHP 7.3.21).</span>
                            </label>
                        <?php
                    } ?>
                    
                    </div>
                    <div class="my-1">
                    <?php
                    if(!extension_loaded('mysqli'))
                    {
                        $continue = false;
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-red-500" checked>
                                <span class="ml-2 text-gray-900">MySQLi Extension pas chargée !</span>
                            </label>
                        <?php
                    }
                    else
                    {
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-400" checked>
                                <span class="ml-2 text-gray-900">MySQLi Extension chargée.</span>
                            </label>
                        <?php
                    } ?>
                    </div>

                    <div class="my-1">
                    <?php
                    if(!extension_loaded('openssl'))
                    {
                        $continue = false;
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-red-500" checked>
                                <span class="ml-2 text-gray-900">OpenSSL Extension pas chargée !</span>
                            </label>
                        <?php
                    }
                    else
                    {
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-400" checked>
                                <span class="ml-2 text-gray-900">OpenSSL Extension chargée.</span>
                            </label>
                        <?php
                    } ?>
                    </div>
                </div>
            </div>
            <div class="block mt-5">
                <span class="text-xl text-black">Vérification des fichiers système: </span>
                <div class="mt-2 ml-3">
                    <div class="my-1">
                    <?php
                    if(!is_writable(sys_get_temp_dir()))
                    {
                        $continue = false;
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-red-500" checked>
                                <span class="ml-2 text-gray-900">Le dossier de fichiers temporaires n'est pas accessible en écriture !</span>
                            </label>
                        <?php
                    }
                    else
                    {
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-400" checked>
                                <span class="ml-2 text-gray-900">Le dossier de fichiers temporaires accessible en écriture</span>
                            </label>
                        <?php
                    } ?>
                    </div>

                    <div class="my-1">
                    <?php
                    if(!is_writable(__DIR__))
                    {
                        $continue = false;
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-red-500" checked>
                                <span class="ml-2 text-gray-900">Le dossier racine du CMS n'est pas accessible en écriture !</span>
                            </label>
                        <?php
                    }
                    else
                    {
                        ?>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-400" checked>
                                <span class="ml-2 text-gray-900">Le dossier racine du CMS est accessible en écriture !</span>
                            </label>
                        <?php
                    } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 py-4 sm:px-6 text-center">
            <?php
                if($continue)
                {
                    ?>
                        <a href="index.php?ctli=step2&part=2" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            Suivant
                        </a>
                    <?php
                }
                else
                {
                    ?>
                        <a class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-200 hover:bg-orange-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-200">
                            Impossible
                        </a>
                    <?php
                }
            ?>
            
        </div>
    </div>

</div>