<?php

require("temp_global_conf.php");

$progressBar = 0;
$progressMessage = "";

if(!isset($_GET['stage'])) $stage = 0;
else
{
    $stage = htmlentities($_GET['stage']);
    switch($stage) {
        default:
            $progressBar = 1;
            $progressMessage = "ERROR:WRONG_BUILDER";
            break;
        case 1:
            $progressBar = 5;
            $progressMessage = "Contruction des tables...";
            include("admin/installer/controller/conceptors/buildTables.php");
            break;
        case 2:
            $progressMessage = "Peuplement des tables...";
            $progressBar = 25;
            //include("admin/installer/controller/conceptors/buildTables.php");
            break;
        case 3:
            $progressMessage = "...";
            $progressBar = 25;
            break;
    }
}
?>
<form action="#" method="POST">
<div class="bg-white rounded-lg shadow p-6">
    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="px-4 py-5 sm:px-6">
            <nav aria-label="Progress">
                <ol class="space-y-4 md:flex md:space-y-0 md:space-x-8">
                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-orange-600 hover:border-orange-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-orange-600 font-semibold uppercase group-hover:text-orange-800">Etape 0</span>
                            <span class="text-sm font-medium">Bienvenue</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-orange-600 hover:border-orange-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-orange-600 font-semibold uppercase group-hover:text-orange-800">Etape 1</span>
                            <span class="text-sm font-medium">Verification du système</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-orange-600 hover:border-orange-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-orange-600 font-semibold uppercase group-hover:text-orange-800">Etape 2</span>
                            <span class="text-sm font-medium">Détail du serveur</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-orange-600 hover:border-orange-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-orange-600 font-semibold uppercase group-hover:text-orange-800">Etape 3</span>
                            <span class="text-sm font-medium">Super administrateur</span>
                        </a>
                    </li>

                    <li class="md:flex-1">
                        <a class="pl-4 py-2 flex flex-col border-l-4 border-orange-400 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                            <span class="text-xs text-orange-400 font-semibold uppercase">Etape 4</span>
                            <span class="text-sm font-medium">Installation</span>
                        </a>
                    </li>
                    
                    <li class="md:flex-1">
                        <a class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-xs text-gray-500 font-semibold uppercase group-hover:text-gray-700">Etape 5</span>
                            <span class="text-sm font-medium">Finitions</span>
                        </a>
                    </li>
                </ol>
            </nav>

        </div>
        <div class="px-4 py-5 sm:p-6">
            <div class="divide-y divide-gray-200">
                <p class="text-base"><?php echo $progressMessage ; ?></p>
                <div class="shadow w-full bg-grey-100 mt-1 rounded-lg">
                    <div class="rounded-lg bg-orange-500 text-xs leading-none py-1 text-center text-white" style="width: <?php echo $progressBar ; ?>%"><?php echo $progressBar ; ?>%</div>
                </div>
           </div>
        </div>
        <div class="px-4 py-4 sm:px-6 text-center">
            
        </div>
    </div>
</div>