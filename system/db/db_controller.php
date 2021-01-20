<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-03 19:30:56
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:39:57 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
function dbConnexion()
{
	try 
	{ 
		return (new PDO('mysql:host='.$GLOBALS['GC']["sql_host"].';dbname='.$GLOBALS['GC']["sql_database"].'', $GLOBALS['GC']["sql_user"], $GLOBALS['GC']["sql_pass"])); 
	}
	catch (Exception $ex) 
	{ 
		return('ERROR:ERROR_BDD_CONNECTION'); 
	}
}

function executeQuery($query, $args, $fetch = true)
{
	
	$bdd = dbConnexion();
	$response = $bdd->prepare($query);
	$response->execute($args);
	if ($fetch)
	{
		$data = $response->fetch();
		$response->closeCursor();
		return ($data);
	}else Return ($response);
}

?>