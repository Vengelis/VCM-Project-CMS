<?php

require("system/db/db_controller.php");

$continue = true;

$errorHost=false;
$errorName=false;
$errorUser=false;
$errorPort=false;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $host = htmlentities($_POST['host']);
    $dbname = htmlentities($_POST['dbname']);
    $user = htmlentities($_POST['login']);
    $password = htmlentities($_POST['password']);
    $port = htmlentities($_POST['port']);
    $prefix = htmlentities($_POST['prefix']);

    if(empty($host))
    {
        $continue=false;
        $errorHost=true;
    }
    if(empty($dbname))
    {
        $continue=false;
        $errorName=true;
    }
    if(empty($user))
    {
        $continue=false;
        $errorUser=true;
    }
    if(empty($port))
    {
        $continue=false;
        $errorPort=true;
    }
    if(TryDbConnexion($host, $dbname, $user, $password, $port) == 'ERROR:ERROR_BDD_CONNECTION')
    {
        $continue=false;
        $errorHost=true;
    }
    if($continue)
    {
        $input = '<?php

    $INFO = array(
        "sql_host" => "'.$host.'",
        "sql_database" => "'.$dbname.'",
        "sql_user" => "'.$user.'",
        "sql_pass" => "'.$password.'",
        "sql_port" => '.$port.',
        "sql_tbl_prefix" => "'.$prefix.'",
    );

?>
        ';
        $fp = fopen('temp_global_conf.php', 'w+');
        fwrite($fp,  $input);
        fclose($fp);
        ?>
        <script>
        document.location.replace("index.php?ctli=step3&part=3");
        </script>
        <?php
    }
}
?>
<form action="#" method="POST">
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
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-orange-600 hover:border-orange-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-orange-600 font-semibold uppercase group-hover:text-orange-800">Etape 1</span>
                            <span class="text-sm font-medium">Verification du système</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="pl-4 py-2 flex flex-col border-l-4 border-orange-400 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                            <span class="text-xs text-orange-400 font-semibold uppercase">Etape 2</span>
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
            <div class="space-y-8 divide-y divide-gray-200">
                <?php if(!$continue) { ?>
                <div class="rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                        <!-- Heroicon name: x-circle -->
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        </div>
                        <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            Des erreurs sont survenues
                        </h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                            <?php
                                if($errorHost) echo "<li>Une erreur est survenue lors de la connexion au serveur MySQL. Verifiez que les identifiants sont correctes ou que l\'adresse IP du serveur soit la bonne. Si vous ne disposez pas de ces informations, contactez votre fournisseur d\'hébergement pour obtenir de l\'aide</li>" ;
                                if($errorName) echo "<li>Vous devez renseigner un nom de base de données correcte.</li>";
                                if($errorUser) echo "<li>Vous devez renseigner un nom d'utilisateur valide.</li>";
                                if($errorPort) echo "<li>Vous devez renseigner un numero de port valide.</li>";
                            ?>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">

                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Détails du serveur SQL
                        </h3>
                        <p class="mt-1 w-full text-sm text-gray-500">
                        Avant de commencer à paramètrer le CMS, vérifiez que vous avez créé une base de données pour acceuillir le CMS.
                        </p>
                    </div>
                    <div class="space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Host
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="host" id="host" value="localhost" class="border p-1 max-w-lg block w-full shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <p class="mt-1 w-full text-xs text-gray-500">
                                    Si vous utilisez une base de données sur le même serveur que votre instace web, laissez localhost.
                                </p>
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Login
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="login" id="login" class="border p-1 max-w-lg block w-full shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <p class="mt-1 w-full text-xs text-gray-500">
                                    Privilégiez un utilisateur unique à l'instance VCM. N'utilisez pas l'identifiant ROOT. Cela pourrait causer des dommages irréversibles à votre base de données si vous modifiez l'instance.
                                </p>
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Password
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="password" name="password" id="password" class="border p-1 max-w-lg block w-full shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Database name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="dbname" id="dbname" class="border p-1 max-w-lg block w-full shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Prefix
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="prefix" id="prefix" class="border p-1 max-w-lg block w-full shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <p class="mt-1 w-full text-xs text-gray-500">
                                    Si vous devez faire plusieurs instance de VCM CMS dans la même base de données, renseignez un prefix pour éviter un mélange des tables. Si vous souhaitez faire deux instances sur la même base de données, n'utilisez pas cet installateur ! Rendez-vous directement sur <a class="text-orange-500" href="https://vlogis-dev.ovh">VCM Project</a> pour obtenir tous les renseignements necessaire pour ne pas casser vos précédenets instances !
                                </p>
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Port
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="number" name="port" id="port" value="3306" class="border p-1 max-w-lg block w-full shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="px-4 py-4 sm:px-6 text-center">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Suivant
            </button>
        </div>
    </div>
</div>
</form>