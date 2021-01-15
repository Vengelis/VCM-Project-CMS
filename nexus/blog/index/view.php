<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../index.php?app=system&mod=errors&ctl=display&cmpt=404");
    </script><?php
}
?>

<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 m-8">
<?php

$query = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."nexus_blog_topic", array(), false);
while($data = $query->fetch())
{
	

?>
  <div class="bg-white overflow-hidden shadow rounded-lg">
	<img class="h-48 w-full" src="system/medias/images/blog/<?php echo $data['image'] ; ?>" alt="Workflow">
	<div class="p-5 w-full">
		<p class="text-xl mb-3"><?php echo $data['title'] ; ?><a class="text-sm text-gray-500"><?php echo $data['date'] ; ?></a> </p>
		<p class="text-base text-justify text-gray-500"><?php 
		$reformat = str_replace('&lt;', '<', $data['content']);
		$reformat = str_replace('&gt;', '>', $reformat);
		echo substr($reformat,0,64) ; 
		?></p>
	</div>
	<a href="index.php?app=nexus&mod=blog&ctl=index&cmpt=index&bID=<?php echo $data['ID']; ?>" class="m-5 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-orange-500 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
	    Lire plus
	</a>
  </div>
  <?php }?>
</div>

