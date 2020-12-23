<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
?>
<a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Accueil</a>
<a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Blog</a>
<a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Forum</a>
<a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Discord</a>