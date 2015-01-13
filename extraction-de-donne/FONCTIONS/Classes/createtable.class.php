<?php


class Ctable 
{
private static $mytable=null;
	function TaBle() 
	{	
		if(! Ctable::$mytable) 
		{
			
			try
			{
			
			$table=Connect::db() ;
			Ctable::$mytable=$table->query(" 
	CREATE TABLE ValeurChamp(
	  id INT AUTO_INCREMENT,
	  idcerfa INT,
	  value TEXT,
	)");
			} 
		    
		catch(Exception $e)
		{
		  die('Erreur:' .$e->getMessage());
		}
		}
		$table = null;
		return Ctable::$mytable;
		}
	
	
}

?>