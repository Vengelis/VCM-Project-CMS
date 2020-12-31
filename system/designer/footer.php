<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
?>
<!--<div class="h-3/4"></div>-->
<footer class="bg-gray-50 overflow-hidden shadow rounded-lg mt-3">
    <div class="px-8 py-12 grid justify-items-center text-center">
        <div>
            <p class="text-base">Made with <a href="https://tailwindui.com" target="_blank" class="text-orange-500">tailwindcss</a> by <a href="https://github.com/Vengelis" target="_blank" class="text-orange-500">Vengelis</a></p>
            <p class="text-base"><a href="#" class="text-gray-700">Mentions légales</a> - <a href="#" class="text-gray-700">Politique de confidentialité</a></p>
        </div>
    </div>
</footer>