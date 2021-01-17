<?php
include("system/userProfil/new_verify_key.php");

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

$valid = false;
$displayError = false;
$errorMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(empty($_POST['keypass']) || is_null($_POST['keypass']))
    {
        $displayError = true;
        $errorMessage = "Vous devez spécifier une clé valide";
    }
    else
    {
        $keypass = htmlentities($_POST['keypass']);
        $getEmail = executeQuery("SELECT userEmail FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_pending_registration WHERE validKey = ?;", array($keypass));
        if(empty($getEmail['userEmail']) || is_null($getEmail['userEmail']))
        {
            $displayError = true;
            $errorMessage = "La clé renseignée n'est pas valide";
        }
        else
        {
            $email = $getEmail['userEmail'];
            executeQuery("DELETE FROM ".$GLOBALS['GC']['sql_tbl_prefix']."system_pending_registration WHERE validKey = ?", array($keypass));
            $user = executeQuery("SELECT username FROM ".$GLOBALS['GC']['sql_tbl_prefix']."community_users WHERE email = ;", array($email));
            executeQuery("UPDATE ".$GLOBALS['GC']['sql_tbl_prefix']."community_users SET validateAccount = 1 WHERE email = ?", array($email));

            validAccount($user['username'], $email);

            $valid = true;
        }
    }
}



?>
<div class="bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">

    <?php if($valid) {?>
    <div class="rounded-md bg-green-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            </div>
            <div class="ml-3">
            <h3 class="text-sm font-medium text-green-800">
                Inscription validée
            </h3>
            <div class="mt-2 text-sm text-green-700">
                <p>
                Votre compte a bien été validé ! Vous pouvez maintenant naviguer sur la plateforme librement ! 
                </p>
            </div>
            <div class="mt-4">
                <div class="-mx-2 -my-1.5 flex">
                <a href="index.php?app=nexus&mod=core&ctl=index&cmpt=login" class="bg-green-50 px-2 py-1.5 rounded-md text-sm font-medium text-green-800 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                    Se connecter
                </a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php } ?>

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
                    Un problème est survenu lors de la validation de votre compte:
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
      Valider l'inscription
    </h2>
  </div>

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form class="space-y-6" action="#" method="POST">
        <div>
          <label for="keypass" class="block text-sm font-medium text-gray-700">
            Code de validation
          </label>
          <div class="mt-1">
            <input id="keypass" name="keypass" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
          </div>
          <p class="mt-3 text-sm text-gray-500">Le code de validation vous a été envoyé par mail. Copiez le code reçu et collez le dans la case dédiée à cela.
          <br>Si vous n'avez pas reçu de code, contactez l'administrateur du site pour obtenir de l'aide.</p>
        </div>
        <div>
          <button type="submit" name="submited" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
            Faire valider
          </button>
        </div>
      </form>
    </div>
  </div>
</div>