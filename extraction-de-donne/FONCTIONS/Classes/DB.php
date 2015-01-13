<?php
class DB 
{
private static $db=null;
	function connect() 
	{	
		if(!DB::$db) 
		{
			
			try
			{
			
			DB::$db=new PDO('mysql:host=localhost;dbname=baseher','root','');
			 
		    }
		catch(Exception $e)
		{
		  die('Erreur:' .$e->getMessage());
		}
		}
		return DB::$db;
	}
	
}

?>