<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}
?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>


<form class="space-y-8 divide-y divide-gray-200 bg-gray-100">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 ml-8">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 font-bold text-base">
                Sujet de l'article
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2 w-11/12">
                <input id="about" name="about" rows="3" class="p-2 max-w-lg shadow-sm block w-full focus:ring-orange-500 focus:border-orange-500 sm:text-sm border-gray-300 rounded-md"></input>
                <p class="mt-2 text-sm text-gray-500">Ecrire en quelques mots</p>
            </div>
        </div>
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="cover_photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 font-bold text-base">
            Photo de l'article
          </label>
          <div class="mt-2 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
              <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-500">
                  <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-orange-500 hover:text-orange-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-orange-500">
                    <span>Upload a file</span>
                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                  </label>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">
                  PNG, JPG, GIF up to 10MB
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 font-bold text-base">
                Contenu de l'article
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2 w-11/12">
                <textarea id="about" name="about" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-orange-500 focus:border-orange-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                <p class="mt-2 text-sm text-gray-500">Ecrire en quelques mots</p>
            </div>
            
        </div>
        <div class="grid grid-cols-1 gap-4 place-items-center">
            <button type="button" class="m-4 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Publier
            </button>
        </div>
    </div>
</div>
