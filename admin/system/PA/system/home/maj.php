<?php
include("system/security/PA_checkup.php");
include("system/designer/PA_menu_top.php");
?>
<div class="bg-gray-700 overflow-hidden w-full">
    <div class="px-4 py-5 sm:p-6">
        <h2 class="text-xl text-white">Mise à jours</h2>
        <h3 class="text-sm text-gray-200">Centre de gestion des mises à jours de VCM CMS</h3>
    </div>
</div>

<div class="m-8 bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
  <div class="px-4 py-5 sm:px-6">
    <h3 class="text-xl">Maintenance team</h3>
  </div>
  <div class="px-4 py-5 sm:p-6">
    <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
      <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
        <div class="w-full flex items-center justify-between p-6 space-x-6">
        <img class="w-20 h-20 bg-gray-300 flex-shrink-0" src="https://cdn.discordapp.com/avatars/178151615801327616/aba7197f311298b70e78c77b8bbfd37c.png?size=4096" alt="">
          <div class="flex-1">
            <div class="flex items-center space-x-3">
              <h3 class="text-gray-900 text-sm font-medium">Vengelis - Gabriel T.</h3>
              <span class="flex-shrink-0 inline-block px-2 py-0.5 text-white text-xs font-medium bg-red-600 rounded-lg"><strong>Master Referee</strong></span>
            </div>
            <p class="mt-1 text-gray-500 text-sm">Project Master, Front/Back-end developer</p>
            <p class="mt-1 text-gray-500 text-sm">Sectors: <span class="inline-block px-2 py-0.5 text-white text-xs font-medium bg-orange-400 rounded-lg"><i class="fas fa-globe-europe"></i> Global Design</span> <span class="inline-block px-2 py-0.5 text-white text-xs font-medium bg-red-600 rounded-lg"><i class="fas fa-shield-alt"></i> Security</span></p>
          </div>
        </div>
      </li>
      <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
        <div class="w-full flex items-center justify-between p-6 space-x-6">
        <img class="w-20 h-20 bg-gray-300 flex-shrink-0" src="https://cdn.discordapp.com/avatars/234039543429332992/dc25e84ff926beac70ce8d6047053705.png?size=4096" alt="">
          <div class="flex-1">
            <div class="flex items-center space-x-3">
              <h3 class="text-gray-900 text-sm font-medium">Théo S.</h3>
              <span class="flex-shrink-0 inline-block px-2 py-0.5 text-white text-xs font-medium bg-orange-400 rounded-lg">Developer</span>
            </div>
            <p class="mt-1 text-gray-500 text-sm">Front Developer</p>
            <p class="mt-1 text-gray-500 text-sm">Sectors: <span class="inline-block px-2 py-0.5 text-white text-xs font-medium bg-green-600 rounded-lg"><i class="fab fa-wpforms"></i> Forum Design</span></p>
          </div>
        </div>
      </li>
      <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
        <div class="w-full flex items-center justify-between p-6 space-x-6">
        <img class="w-20 h-20 bg-gray-300 flex-shrink-0" src="https://cdn.discordapp.com/avatars/618393985492189205/266fc7193c42c7b7e72b8c9b62eddc76.png?size=4096" alt="">
          <div class="flex-1">
            <div class="flex items-center space-x-3">
              <h3 class="text-gray-900 text-sm font-medium">Gladys D.</h3>
              <span class="flex-shrink-0 inline-block px-2 py-0.5 text-white text-xs font-medium bg-orange-400 rounded-lg">Developer</span>
            </div>
            <p class="mt-1 text-gray-500 text-sm">Front Developer</p>
            <p class="mt-1 text-gray-500 text-sm">Sectors: <span class="inline-block px-2 py-0.5 text-white text-xs font-medium bg-green-600 rounded-lg"><i class="fas fa-blog"></i> Blog Design</span></p>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>

<div class="rounded-md bg-yellow-50 p-4 m-5">
  <div class="flex">
    <div class="flex-shrink-0">
      <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
      </svg>
    </div>
    <div class="ml-3">
      <h3 class="text-sm font-medium text-yellow-800">
        Element en cours de développement
      </h3>
      <div class="mt-2 text-sm text-yellow-700">
        <p>
          L'équipe de VCM s'excuse de ne pas pouvoir vous fournir cette page. Elle est encore en cours de développement et des méthodes pour construire cela sont encore en cours de reflexion.
        </p>
      </div>
    </div>
  </div>
</div>

<?php
include("system/designer/PA_menu_bottom.php");
?>