<?php

require("temp_global_conf.php");

$continue = false;

$errorUsername = false;
$errorLogin = false;
$errorPassword = false;
$errorEmail = false;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $username = htmlentities($_POST['username']);
    $login = htmlentities($_POST['login']);
    $password =  htmlentities($_POST['password']);
    $email = htmlentities($_POST['email']);

    if(empty($_POST["username"]))
    {
        $errorDisplayname=true;
    }
    if(empty($_POST["login"]))
    {
        $errorUsername=true;
    }
    if(empty($_POST["password"]))
    {
        $errorPassword=true;
    }
    if(empty($_POST["email"]))
    {
        $errorEmail=true;
    }
    if(!$doNotPass)
    {
        $continue = true;

        $input = '<?php

        $INFO = array(
            "sql_host" => \''.$INFO["sql_host"].'\',
            "sql_database" => \''.$INFO["sql_database"].'\',
            "sql_user" => \''.$INFO["sql_user"].'\',
            "sql_pass" => \''.$INFO["sql_pass"].'\',
            "sql_port" => '.$INFO["sql_port"].',
            "sql_tbl_prefix" => \''.$INFO["sql_tbl_prefix"].'\',
            "temp_root_user" => \''.$username.'\',
            "temp_root_login" => \''.$login.'\',
            "temp_root_password" => \''.$password.'\',
            "temp_root_mail" => \''.$email.'\'
            
        );
    
    ?>
            ';
        file_put_contents('temp_global_conf.php', $input)
        ?>
        <script>
        document.location.replace("index.php?ctli=step4&part=4");
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
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-orange-600 hover:border-orange-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-orange-600 font-semibold uppercase group-hover:text-orange-800">Etape 2</span>
                            <span class="text-sm font-medium">Détail du serveur</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="pl-4 py-2 flex flex-col border-l-4 border-orange-400 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                            <span class="text-xs text-orange-400 font-semibold uppercase">Etape 3</span>
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
                                if($errorUsername) echo "<li>Vous devez renseigner un nom d'utilisateur valide.</li>" ;
                                if($errorLogin) echo "<li>Vous devez renseigner un identifiant correcte.</li>";
                                if($errorPassword) echo "<li>Vous devez renseigner un mot de passe valide.</li>";
                                if($errorEmail) echo "<li>Vous devez renseigner une adresse email valide.</li>";
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
                        Création du super administrateur
                        </h3>
                        <p class="mt-1 w-full text-sm text-gray-500">
                        Le compte Super-Admin est le compte qui va vous servir à configurer vos premiers paramètres du site. Dès que possible, faite un compte administrateur utilisateur afin de ne pas utiliser ce compte pour des usages courants.
                        </p>
                    </div>
                    <div class="space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Username
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="username" id="username" value="root" class="border p-1 max-w-lg block w-full shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Login
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="login" id="login" class="border p-1 max-w-lg block w-full shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
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
                                Email address
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="email" id="email" class="border p-1 max-w-lg block w-full shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
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