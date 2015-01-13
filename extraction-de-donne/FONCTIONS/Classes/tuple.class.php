

<?php
class AddTuple
{
private static $mytuple=null;
	function add($vid1,$vid2,$valeur) 
	{	
	
	
		if(!AddTuple::$mytuple) 
		{
		$vals=" ";
			
			try
			{
			
			$table=Connect::db() ;
			echo $valeur." ";
			 foreach ($valeur as $value)
			 {
			  $vals=$value.$vals; 
			 
			 }
   {echo $vals;
         
           
   }
			AddTuple::$mytuple=$table->exec("INSERT INTO valeurchamp(idc,idcerf,val)  VALUES($vid1,$vid2,'$valeur')");
	
			} 
		    
		catch(Exception $e)
		{
		  die('Erreur:' .$e->getMessage());
		}
		}
		$table = null;
		if(!AddTuple::$mytuple)
		echo "ERRRRRRRRRRRRRRRRRRRRRRRRREUR";
		return AddTuple::$mytuple;
		}
	
	
}

?>