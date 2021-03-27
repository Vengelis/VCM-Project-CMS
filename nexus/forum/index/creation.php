<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}

?>




<nav class="bg-white border-b border-gray-200 flex" aria-label="Breadcrumb">
  <ol class="max-w-screen-xl w-full px-4 flex space-x-4 sm:px-6 lg:px-8">
    <li class="flex">
      <div class="flex items-center">
        <a href="http://cms/VCM-Project-CMS/index.php" class="text-gray-400 hover:text-gray-500">
         
          <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
          </svg>
          <span class="sr-only">Home</span>
        </a>
      </div>
    </li>
    <li class="flex">
      <div class="flex items-center">
        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
        </svg>
        <a href="http://cms/VCM-Project-CMS/index.php?app=nexus&mod=forum&ctl=index&cmpt=accueil" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Forum</a>
      </div>
    </li>
    <li class="flex">
      <div class="flex items-center">
        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
        </svg>
        <a href="http://cms/VCM-Project-CMS/index.php?app=nexus&mod=forum&ctl=index&cmpt=categorie" aria-current="page" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Catégorie</a>
      </div>
    </li>
    <li class="flex">
      <div class="flex items-center">
        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
        </svg>
        <a href="http://cms/VCM-Project-CMS/index.php?app=nexus&mod=forum&ctl=index&cmpt=creation" aria-current="page" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Creation</a>
      </div>
    </li>
  </ol>
</nav>

<ul class="divide-y mx-40">
  <li class="py-4">
  <div class=" md:flex md:items-center md:justify-between ">
   <div class="flex-1 min-w-0">
      <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-400 pb-3">
          <label for="email" class="block text-sm font-medium text-black font-bold">Titre du Topic:</label>
          <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="inserez un titre">
        </div>
        <div class="max-w-7xl bg-white pb-3 border-2 border-gray-400 border-opacity-100 pb-60">
        <h3 class=" ml-2">Ecrivez le contenu du Topic ici</h3>
        </div>
        <button type="button" class=" mt-2 inline-flex items-center px-4 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Validez
        </button>
      </div>
    </div>
  </div>
  </li>
</ul>