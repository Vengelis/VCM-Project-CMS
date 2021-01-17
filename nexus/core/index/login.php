<?php
include("system/actions/forms/connexion.php");
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}
if(verifySession() && $_SESSION['login'] != "VisitorSystemUser")
{
    ?><script>
    document.location.replace("index.php");
    </script><?php
}
$displayError = false;
if(isset($_POST['submited']))
{
    $response = connectUser(htmlentities($_POST["login"]) , htmlentities($_POST["password"]));
  
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
        if(!isset($_POST['remember_me']))
        {
          $remember = "off";
        }
        else
        {
          $remember = "on";
        }
        $_SESSION['WantToLiveInfinite'] = $remember;
        ?><script>
        document.location.replace("index.php");
        </script><?php
    }
}

?>

<div class="bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <?php if($displayError) { ?>
    <div class="mx-2 sm:mx-24 rounded-md bg-red-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                </div>
                <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">
                    Un problème est survenu lors de la connexion:
                </h3>
                <div class="mt-2 text-sm text-red-700">
                    <?php echo $errorMessage ; ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
      Connexion avec un compte
    </h2>
    <p class="mt-2 text-center text-sm text-gray-600 max-w">
      Ou
      <a href="index.php?app=nexus&mod=core&ctl=index&cmpt=register" class="font-medium text-orange-600 hover:text-orange-500">
        s'enregistrer
      </a>
    </p>
  </div>

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form class="space-y-6" action="#" method="POST">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">
            Identifiant
          </label>
          <div class="mt-1">
            <input id="login" name="login" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">
            Mot de passe
          </label>
          <div class="mt-1">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-orange-600 form-checkbox focus:ring-orange-500 border-gray-300 rounded">
            <label for="remember_me" class="ml-2 block text-sm text-gray-900">
              Rester connecté
            </label>
          </div>

          <div class="text-sm">
            <a href="#" class="font-medium text-orange-600 hover:text-orange-500">
              Mot de passe oublié ?
            </a>
          </div>
        </div>

        <div>
          <button type="submit" name="submited" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
            Connexion
          </button>
        </div>
      </form>

      <div class="mt-6">
        <div class="relative">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white text-gray-500">
              Ou se connecter avec
            </span>
          </div>
        </div>

        <div class="mt-6 grid grid-cols-2 gap-3">
          <div>
            <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
              <span class="sr-only">Connexion avec Twitter</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
              </svg>
            </a>
          </div>

          <div>
            <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
              <span class="sr-only">Connexion avec GitHub</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
