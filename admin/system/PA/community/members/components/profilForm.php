<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
?>
            <form action="#" class="divide-y divide-gray-200 lg:col-span-9" method="POST">
                <!-- Profile section -->
                <div class="py-6 px-4 sm:p-6 lg:pb-8">
                    <div>
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                    <p class="mt-1 text-sm text-gray-500">
                        Ces informations seront affichées publiquement, alors faites attention à ce que vous partagez.
                    </p>
                    </div>

                    <div class="mt-6 flex flex-col lg:flex-row">
                    <div class="flex-grow space-y-6">
                        <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">
                            Nom d'utilisateur
                        </label>
                        <div class="mt-1 rounded-md shadow-sm flex">
                            <input type="text" name="username" id="username" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        </div>
                        </div>

                        <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Brève description de votre profil. Les URL sont liés par des hyperliens.
                        </p>
                        </div>
                    </div>

                    <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                        <div class="mt-1 lg:hidden">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                                <img class="rounded-full h-full w-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80h" alt="">
                                </div>
                                <div class="ml-5 rounded-md shadow-sm">
                                <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-light-blue-500">
                                    <label for="user_photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                    <span>Changer</span>
                                    <span class="sr-only"> Photo d'utilisateur</span>
                                    </label>
                                    <input type="file" id="user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="hidden relative rounded-sm overflow-hidden lg:block">
                            <img class="relative rounded-sm w-40 h-40" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                            <label for="user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                                <span>Changer</span>
                                <span class="sr-only"> Photo d'utilisateur</span>
                                <input type="file" id="user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="mt-6 grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="login" class="block text-sm font-medium text-gray-700">Identifiant de connexion</label>
                            <input type="text" name="login" id="login" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Adresse mail</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label class="block">
                                <span class="text-gray-700">Groupe principal</span>
                                <select class="form-select block w-full mt-1">
                                    <option>Groupe1</option>
                                    <option>Groupe2</option>
                                </select>
                            </label>
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label class="block">
                                <span class="text-gray-700">Groupes secondaires</span>
                                <select class="form-multiselect block w-full mt-1" multiple>
                                    <option>Groupe1</option>
                                    <option>Groupe2</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pt-6 divide-y divide-gray-200">
                    <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                        <button type="submit" class="mr-2 bg-orange-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800">
                            Sauvegarder
                        </button>
                        <a href="index.php?app=admin&mod=community&ctl=members&cmpt=dashboard" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Annuler
                        </a>
                    </div>
                </div>
            </form>