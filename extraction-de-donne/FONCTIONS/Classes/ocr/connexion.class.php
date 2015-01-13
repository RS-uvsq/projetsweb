<?php
class Connect 
{
private static $db=null;
	function db() 
	{	
		if(!Connect ::$db) 
		{
			
			try
			{
			
			Connect::$db=new PDO('mysql:host=localhost;dbname=saul','root','');
			 
		    }
		catch(Exception $e)
		{
		  die('Erreur:' .$e->getMessage());
		}
		}
		return Connect ::$db;
	}
	
}

?>