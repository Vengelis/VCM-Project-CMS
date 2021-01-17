<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
?>
<script>
  function changeNavBarAdmin() {
    if (document.getElementById("navAdmin").classList.contains('hidden')) {
        document.getElementById("navAdmin").classList.remove('hidden');
    } else {
        document.getElementById("navAdmin").classList.add('hidden');
    }
  function showPanel(panelName) {

  }
}
</script>
<div class="min-h-full flex overflow-hidden bg-white">
  <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
  <div id="navAdmin" class="hidden">
    <div class="fixed inset-0 flex z-40">

      <div class="fixed inset-0">
        <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
      </div>

      <div tabindex="0" class="relative flex-1 flex flex-col max-w-xs w-full bg-gray-600 focus:outline-none">
        <div class="absolute top-0 right-0 -mr-12 pt-2">
          <button onclick="changeNavBarAdmin()" type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
            <span class="sr-only">Close sidebar</span>
            <!-- Heroicon name: x -->
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
          <div class="flex-shrink-0 flex items-center px-4">
            <img class="h-8 w-auto" src="vcmTitle.png" alt="Workflow">
          </div>
          <nav aria-label="Sidebar" class="mt-5">
            <div class="px-2 space-y-1">
              <a href="#" class="bg-gray-600 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-cog mr-2 ml-1"></i>
                Système
              </a>
              <a href="#" class="bg-gray-600 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-browser mr-2 ml-1"></i>
                Applications
              </a>
              <a href="#" class="bg-gray-600 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-user mr-2 ml-1"></i>
                Communauté
              </a>
              <a href="#" class="bg-gray-600 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-home mr-2 ml-1"></i>
                Accueil
              </a>
              <a href="#" class="bg-gray-600 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-chart-bar mr-2 ml-1"></i>
                Statistiques
              </a>
              <a href="#" class="bg-gray-600 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-pencil mr-2 ml-1"></i>
                Apparences
              </a>
              <a href="#" class="bg-gray-600 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-long-arrow-alt-left mr-2 ml-1"></i>
                Retour au site
              </a>
            </div>
          </nav>
        </div>
      </div>
      <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Force sidebar to shrink to fit close icon -->
      </div>
    </div>
  </div>

  <!-- Static sidebar for desktop -->
  <div class="hidden lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-42">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex flex-col h-0 flex-1 bg-gray-700">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
          <nav class="flex-1" aria-label="Sidebar">
            <div class="px-2 space-y-1">
              <a href="#" id="1" class="masterMenu bg-gray-700 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-cog mr-2 ml-1"></i>
                Système
              </a>
              <a href="#" id="2" class="masterMenu bg-gray-700 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-browser mr-2 ml-1"></i>
                Applications
              </a>
              <a href="#" id="3" class="masterMenu bg-gray-700 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-user mr-2 ml-1"></i>
                Communauté
              </a>
              <a href="#" id="4" class="masterMenu bg-gray-700 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-home mr-2 ml-1"></i>
                Accueil
              </a>
              <a href="#" id="5" class="masterMenu bg-gray-700 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-chart-bar mr-2 ml-1"></i>
                Statistiques
              </a>
              <a href="#" id="6" class="masterMenu bg-gray-700 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-pencil mr-2 ml-1"></i>
                Apparences
              </a>
            </div>
          </nav>
        </div>
        <div class="flex-shrink-0 flex pb-2">
        <nav class="flex-1" aria-label="Sidebar">
            <div class="px-2 space-y-1">
              <a href="index.php" class="bg-gray-600 text-gray-100 hover:bg-gray-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-long-arrow-alt-left mr-2 ml-1"></i>
                Retour au site
              </a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="flex flex-col min-w-0 flex-1 overflow-hidden ">
    <div class="lg:hidden">
      <div class="flex items-center justify-between bg-gray-50 border-b border-gray-200 px-1 py-1.5">
        <div>
          <button onclick="changeNavBarAdmin()" type="button" class="-mr-3 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900">
            <span class="sr-only">Open sidebar</span>
            <!-- Heroicon name: menu -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="flex-1 relative z-0 flex overflow-hidden">
    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last bg-gray-200" tabindex="0">
        <div class="absolute inset-0">
          
        
      

