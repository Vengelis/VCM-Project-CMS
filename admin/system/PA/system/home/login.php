<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:36:29 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


include("system/security/PA_checkup.php");
include("system/actions/forms/connexion.php");

$displayError = false;

if(isset($_POST["sended"]))
{
  $response = connectUser(htmlentities($_POST["username"]) , htmlentities($_POST["password"]), true);
  
  if($response == "ERROR:INVALID_USER")
  {
    $errorMessage = "Utilisateur invalide";
    $displayError = true;
  }
  elseif($response == "ERROR:WRONG_PASSWORD")
  {
    $errorMessage = "Mot de passe incorrecte";
    $displayError = true;
  }
  elseif($response == "ERROR:USER_IS_BANNED")
  {
    $errorMessage = "Utilisateur banni";
    $displayError = true;
  }
  elseif($response == "SUCCESS:CONNECTED")
  {
    ?><script>
    document.location.replace("index.php?app=admin&mod=system&ctl=PA&cmpt=dashboard");
    </script><?php
  }
}

?>
<div class="h-5/6 flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-200">
  <div class="max-w-4xl w-full space-y-8 px-4 py-4 border border-gray-200 rounded-md bg-white">
    <?php if($displayError) { ?>
    <div class="sm:mx-48">
      <div class="rounded-md bg-red-50 p-4">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-red-800">
              Erreur de connexion
            </h3>
            <div class="mt-2 text-sm text-red-700">
              <p class="text-base"><?php echo $errorMessage ; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <div>
      <img class="mx-auto h-48 w-auto" src="VCM_Project_Logo.png" alt="Workflow">
      <h2 class="mt-6 text-center text-2xl font-bold text-gray-900">
        Pannel Administration
      </h2>
    </div>
    <form class="mt-8 space-y-6" action="index.php?app=admin&mod=system&ctl=PA&cmpt=login" method="POST">
      <input type="hidden" name="sended" value="true">
      <div class="sm:mx-16">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Utilisateur</label>
            <input id="username" name="username" type="text" autocomplete="username" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nom d'utilisateur">
          </div>
          <div>
            <label for="password" class="sr-only">Mot de passe</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Mot de passe">
          </div>
        </div>
        <div class="w-full grid justify-items-center grid-cols-1 sm:grid-cols-2">
          <button type="submit" class="mt-3 group relative w-5/6 flex inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <svg class="h-5 w-5 text-orange-500 group-hover:text-orange-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            Connexion
          </button>
          <a href="index.php" class="mt-3 group relative w-5/6 flex inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Retour au site
          </a>
        </div>
      </div>
      
    </form>
  </div>
</div>

