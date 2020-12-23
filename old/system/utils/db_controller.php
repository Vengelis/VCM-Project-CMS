<?php

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
	//var_dump($response);
	if ($fetch)
	{
		$data = $response->fetch();
		$response->closeCursor();
		return ($data);
	}else Return ($response);
}

?>