<?php
    $part = "0";
    if(isset($_GET['part']) && !is_null($_GET['part']) || !empty($_GET['part']))
    {
        $part = htmlentities($_GET['part']);
    }
?>
<div>
  <div class="bg-gray-800 pb-32">
    <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="border-b border-gray-700">
          <div class="flex items-center justify-between h-16 px-4 sm:px-0">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="block lg:hidden h-8 w-auto" src="vcmTitle.png" alt="Workflow">
                <img class="hidden lg:block h-8 w-auto" src="vcmTitle.png" alt="Workflow">
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <header class="py-10">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">
        Instance Installer - Step: <?php echo $part ; ?> / 5
        </h1>
      </div>
    </header>
  </div>

  <main class="-mt-32">
    <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
      
    