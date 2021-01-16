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
  </ol>
</nav>

<ul class="divide-y mx-60">
<li class="py-4">
<div class=" md:flex md:items-center md:justify-between ">
  <div class="flex-1 min-w-0">
    <h2 class="mt-5 pb-2 text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
      Titre de la Catégorie
    </h2>
    <h3 class="text-sm">Description de la catégorie, quels topic y mettre et quel est son but</h3>
  </div>
  <div class="max-w-7xl">
            <button type="button" class="mt-5 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gray-400 hover:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create Topic
            </button>
        </div>  
</div>
</li>
</ul>



<ul class="divide-y mx-60 mt-2 mb-14">        
        <!--div class="px-4 py-5 sm:px-6 bg-gray-500">
            <div class="grid grid-cols-12">
            <h1 class="text-base font-bold text-white col-span-6">Topic</h1>
            <h1 class="text-base font-bold text-white col-span-2">Date de départ</h1>
            <h1 class="text-base font-bold text-white col-span-2">Reponse</h1>
            <h1 class="text-base font-bold text-white col-span-2">Derniers Messages</h1>
            </div>
        </div-->


        <div class="rounded-lg py-3 px-6 bg-gray-200 divide-y divide-gray-300">
            <div class="grid grid-cols-12 ">
                <div class="py-2 bg-grey overflow-hidden col-span-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                     <p class="text-xs">type du message</p>
                    </span>
                </div>
                <div class="py-2 px-2 bg-grey overflow-hidden col-span-7">
                    <p>titre du message</p>
                    <p class="text-xs ml-1">Par Admin, 00/00/00</p>                  
                </div>
                <div class="py-2 px-2 bg-grey overflow-hidden col-span-1">
                    <p class="text-sm">0 réponse</p>
                    <p class="text-sm">0 vues</p>
                </div>
                <div class="py-2 px-2 ml-1 bg-grey overflow-hidden col-span-1">
                    <img class="inline-block h-12 w-12 rounded-full" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png" alt="">
                </div>
                <div class="py-2 px-2 bg-grey overflow-hidden col-span-1">
                    <p class="text-sm">Admin</p>
                    <p class="text-xs"> 00/00/00</p>
                </div>
            </div>
            <div class="grid grid-cols-12">
                <div class="py-2 bg-grey overflow-hidden col-span-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                     <p class="text-xs">type du message</p>
                    </span>
                </div>
                <div class="py-2 px-2 bg-grey overflow-hidden col-span-7">
                    <p>titre du message</p>
                    <p class="text-xs ml-1">Par Admin, 00/00/00</p>                  
                </div>
                <div class="py-2 px-2 bg-grey overflow-hidden col-span-1">
                    <p class="text-sm">0 réponse</p>
                    <p class="text-sm">0 vues</p>
                </div>
                <div class="py-2 px-2 ml-1 bg-grey overflow-hidden col-span-1">
                    <img class="inline-block h-12 w-12 rounded-full" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png" alt="">
                </div>
                <div class="py-2 px-2 bg-grey overflow-hidden col-span-1">
                    <p class="text-sm">Admin</p>
                    <p class="text-xs"> 00/00/00</p>
                </div>
            </div>
            <div class="grid grid-cols-12">
                <div class="py-2 bg-grey overflow-hidden col-span-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                     <p class="text-xs">type du message</p>
                    </span>
                </div>
                <div class="py-2 px-2 bg-grey overflow-hidden col-span-7">
                    <p>titre du message</p>
                    <p class="text-xs ml-1">Par Admin, 00/00/00</p>                  
                </div>
                <div class="py-2 px-2 bg-grey overflow-hidden col-span-1">
                    <p class="text-sm">0 réponse</p>
                    <p class="text-sm">0 vues</p>
                </div>
                <div class="py-2 px-2 ml-1 bg-grey overflow-hidden col-span-1">
                    <img class="inline-block h-12 w-12 rounded-full" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png" alt="">
                </div>
                <div class="py-2 px-2 bg-grey overflow-hidden col-span-1">
                    <p class="text-sm">Admin</p>
                    <p class="text-xs"> 00/00/00</p>
                </div>
            </div>
        </div>
</ul>

