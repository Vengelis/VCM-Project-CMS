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