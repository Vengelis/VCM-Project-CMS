<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-15 17:07:29
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:38:15 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}

if(!isset($_GET["bID"]))
{
    ?><script>
    document.location.replace("index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}
else
    {
        $bID = htmlentities($_GET["bID"]);
        $query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."nexus_blog_topic WHERE ID=?", array($bID));
        if($query == false)
        {
            ?><script>
            document.location.replace("index.php?app=system&mod=errors&ctl=display&cmpt=404");
            </script><?php
        }
    }
?>

<div class="flex flex-col">
    
    <div class="grid grid-cols-5 gap-2 h-screen bg-gray-100">
            <div class="col-span-1">
                <h3 class="text-4xl text-gray-800"><?php echo $query['title'] ; ?></h3>
                <p class="text-xs text-gray-500"><?php echo $query['date'] ; ?></p>
            </div>
            <div class="col-span-4 bg-white overflow-hidden shadow-lg sm:rounded-lg m-3"><?php 
                $reformat = str_replace('&lt;', '<', $query['content']);
                $reformat = str_replace('&gt;', '>', $reformat);
                echo $reformat ; 
                ?></div>
        
    </div>
</div>

<?php


// exemple de blog : https://polinacide.wordpress.com/

?>