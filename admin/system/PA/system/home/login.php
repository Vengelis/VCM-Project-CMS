<?php
include("system/security/PA_checkup.php");
?>
<div class="h-5/6 flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-200">
  <div class="max-w-4xl w-full space-y-8 px-4 py-4 border border-gray-200 rounded-md bg-white">
    <div>
      <img class="mx-auto h-48 w-auto" src="VCM_Project_Logo.png" alt="Workflow">
      <h2 class="mt-6 text-center text-2xl font-bold text-gray-900">
        Pannel Administration
      </h2>
    </div>
    <form class="mt-8 space-y-6" action="index.php?app=admin&mod=system&ctl=PA&cmpt=login" method="POST">
      <input type="hidden" name="remember" value="true">
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
        <button type="submit" class="group relative w-5/6 flex inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-orange-500 group-hover:text-orange-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Connexion
        </button>
        <a href="index.php" class="group relative w-5/6 flex inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
          Retour au site
        </a>
      </div>
    </form>
  </div>
</div>

