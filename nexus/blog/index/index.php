<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}

?>

<div class="flex flex-col">
    
    <div class="grid grid-cols-5 gap-2 h-screen bg-gray-100">
            <div class="col-span-1">
                <h3 class="text-4xl text-gray-800">titre</h3>
                <p class="text-xs text-gray-500">date de publication</p>
                <p class="text-xs text-gray-500 ">commentaires</p>
            </div>
            <div class="col-span-4 bg-white overflow-hidden shadow-lg sm:rounded-lg m-3">contenu</div>
        
    </div>
</div>

<?php


// exemple de blog : https://polinacide.wordpress.com/

?>