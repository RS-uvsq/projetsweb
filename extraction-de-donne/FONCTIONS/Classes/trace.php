<?php
require_once("FONCTIONS/Classes/connexion.class.php");
require_once("FONCTIONS/Classes/sh.class.php");
require_once("FONCTIONS/Classes/IDCERF.php");
 
?>
<?php
function  Ocr_Search($monfichier)
{
/*************TYPE DERREUR ET SIGNIFICATION************/
   
  // $erreur====>VARIABLE RETOURNER PAR  LA FONCTION   Ocr_Search(..)
 //$erreur=1 ,SIGNIFIE QUE LE MODELE N'EXISTE PAS DANS LA TABLE MODE!
 // $erreur= 2 , SIGNIFIE QUE PLUSIEURS  NUMEROS DE CERFA  A ETE TROUVE,DONC IL EST NECESSAIRE D'INQUER LE BON NUMERO DE CERFA!
 // $erreur=3,INDIQUE QUE UN OU PLUSIEURS Marqueurs de debut ou/et  de fin non  ETE trouvé!
 //  $erreur=0,INDIQUE QUE TOUT S'EST BIEN PASSE,
 
 
 
 /***********************************************/
 $cd=new Connect();
	$base=$cd->db();
$vals="";
$erreur=0;//TOUT S'EST BIEN PASSE
$icerf=NUMCERF($monfichier);
//echo "aide". get_resource_type ($monfichier);
           if($icerf[0]==1)
		   
		   {
		   
         $mode="SELECT * FROM  modele WHERE ID_CERFA='$icerf[1]'  ";
		 //echo $icerf[1];
		// print_r("ici".$base->query($mode)."fin");
		 
		    if($base->query($mode)->fetch()!= NULL)
			{
			echo "ok";
                $sql1="SELECT * FROM  cerfa where ID='1'";
                $sql2="SELECT * FROM champs WHERE ID_CERFA=$icerf[1] ";
               
      foreach ($base->query($sql2) as $don2)
	    {
		
		
		$valeur=NULL;
		foreach ($base->query($sql1) as $don1)
		{
		
		    
		   if($don2["TYPE"]!="CHECKBOX" && $don2["TYPE"]!="TABLE" )
           {  
		  
           $a1=$don1["ID"];
		   
		   $s=trim($don2["MDEBUT"]);
		  
         $a2=GETTYPE($s[1]);
		   
	    ///PARTIE DU PROGRAMME A EXECUTEE
	
		   $valeur=Search( $don2["MDEBUT"],$don2["MDEFIN"],$monfichier,$erreur);
		   // echo $valeur." ___"." ";
		   
		   ///parfite du programme IMPORTANTFINNNNN
		  
		   
		   }
		      if(($don2["TYPE"]=="CHECKBOX"  || $don2["TYPE"]=="TABLE"))
			  {
			         $sql3='SELECT * FROM OPTIONS WHERE ID_CHAMPS=$don2["ID_CHAMPS"]';
			          foreach ($base->query($sql3) as $don3)
	              {
		              //if($don2["ID_CHAMPS"]==$don3["ID_CHAMPS"])           
		              $valeur=Search( $don3[" MDEBUT "],$don3["MDEFIN"],$monfichier,$erreur);
					 
					  
					  if($valeur)
					  {
					  $a1=$don1["ID"];
			         $base->exec("INSERT INTO CHAMP(ID,VALEUR)  VALUES($a1,'$valeur')");
					 }
			      }
			   }
		  
		
		
		 
		  
		   
      if($valeur)
	   {
	       
		 //  echo $a1;
		     
		  		$base->exec("INSERT INTO champ(ID,VALEUR)  VALUES($a1,' $valeur')");
			     
			    
				
		   
		   
		    
		   
        }
		
		
		
		}
		$valeur=0;
		$vals=" ";
		
    }
	}//FIN MODE
	else
	$erreur=1; //ERREUR 1 SIGNIFIE QUE LE MODELE NEXISTE PAS DANS LA BASE!
	}//FIN ICERF
         else
	$erreur= 2; //ERREUR 2 SIGNIFIE PLUSIEUR NUMERO DE CERFA EXISTE ET QUIL FAUT SIGNIFIER LE BON NUMERO DE CERFA!
	
	
	///////FIN
return $erreur;
}
?>