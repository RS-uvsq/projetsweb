<?php
require_once("Classes/connexion.class.php");
require_once("Classes/search.class.php");
 
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 
<link rel="stylesheet" href="her.css" type="text/css" />
<title>ACCUEIL</title>
</head>
<body>
<h1 style="color:red;text-decoration:underline;"> tous mes fichiers se trouvent dans le dossier <em style="color:blue">Classes </em> </h1>
<?php
$base=Connect::db();

$sql1="SELECT * FROM  cerfa";
$sql2="SELECT * FROM champs";
$sql3="SELECT * FROM OPTIONS";

$vals="";
  
  
      foreach ($base->query($sql2) as $don2)
	    {
		$valeur=NULL;
		foreach ($base->query($sql1) as $don1)
		{
		
		    
		   if($don1["ID_CERFAE"]==$don2["ID_CERFA"] && $don2["TYPE"]!="CHECKBOX" && $don2["TYPE"]!="TABLE" )
           {  

           $a1=$don2["ID_CHAMPS"];
		   
		   $s=trim($don2["MDEBUT"]);
		  
         $a2=GETTYPE($s[1]);
		   
	  
		   $valeur=MT::Search( $don2["MDEBUT"],$don2["MDEFIN"],$don2["MDEBUTS"],$don2["MDEFINS"],"Classes/fac.txt");
		   
		   }
		      if($don2["TYPE"]=="CHECKBOX"  || $don2["TYPE"]=="TABLE")
			  {
			          foreach ($base->query($sql3) as $don3)
	              {
		              if($don2["ID_CHAMPS"]==$don3["ID_CHAMPS"])           
		              $valeur=MT::Search( $don3[" MDEBUT "],$don3["MDEFIN"],$don3["MDEBUTS"],$don3["MDEFINS"],"Classes/fac.txt");
					 
					  
					  if($valeur)
					  {
					  $a1=$don2["ID_CHAMPS"];
			         $base->exec("INSERT INTO CHAMP(ID,VALEUR)  VALUES($a1,'$valeur')");
					 }
			      }
			   }
		  
		
		
		 
		  
		   
      if($valeur)
	   {
	       
		     
		  		 $base->exec("INSERT INTO champ(ID,VALEUR)  VALUES($a1,'$valeur')");
			     
			    
				
		   
		   
		    
		   
        }
		else
		echo"AUCUNE DELIMITATION DE CE GENRE DANS LE FICHIER!";
		
		
		}
		$valeur=0;
		$vals=" ";
		
    }
?>

<h2 style="color:green;">  OPERATION TERMINEE!!!" </h2>



</body>
</html>