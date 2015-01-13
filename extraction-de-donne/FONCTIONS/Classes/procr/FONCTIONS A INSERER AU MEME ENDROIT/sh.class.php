  <?php

require_once("Classes/need.php");
require_once("Classes/IDCERF.php");
	

function Search( $del1,$del2,$monfichier,& $res)
{


	//echo "aide". get_resource_type ($monfichier);


$boo=1;
$l=0;//indice d'incrÃ©mentation  pour la lecture de chaque caractÃ¨re de la variable $del1
$arret=1;// indice d'arret de la boucle while
$valeur="";//variable temporaire  pour stocker les mots d'une chaine de caractÃ¨re si $del1 en ai une
$tableau= array();// crétion du tableau qui contiendra chaque mot de la chaine de caractÃ¨re $del1 si elle en ai une
$table=array();
$valeu="";
$inc=0;
$s=0;//indice d'incrÃ©mentation du tableau $tableau 
$f=0;//variable qui indique si $del1 est bien un tableau pour stocker la derniÃ¨re valeur lu($valeur) dans le tableau($tableau)
$taille=count($del1);//retourne la taille de la variable $del1
//$v1 et $v2 permettre de faire une recherche continue du marqueur de fin dans le fichier texte une fois que le marqueur de debut a été trouvé

$v1=0;
$v2=0;

//$b1 est un boolean qui indique si le marqueur de debut a été trouvé ,$b2 celui du marqueur de fin
$b1=-1;
$b2=-1;

$v="";

$c=0;
$x=-1;
$k=0;
//booleen d'arret sur la recherche de MDEBUT ($t1)

$t1=1;
$cash=1;//booleen du tableau $del1 si s'en ai un




// si $del1 est de type tableau  ou pas  ,chacun de ces mots est stocké dans le tableau "$tableau"




/////debut
$ret_str="";
$pin=0;
$str= trim($del1); 
$val="";
$fl=0;
$ni=0;


	
///////fin
  

$j=0;
//echo $del1[0]." ";

$tableau=myfu($del1);
$taille=count($tableau);
//echo $taille." _____";



       
		 

// si  $del1 est bien de type tableau ,on modifie la valeur de "$taille"
	

 // ouverture du fichier
  $sign=0;
 
 //$monfichier = fopen($filename, 'r');
 $k1=0;
 if($monfichier){
 
 $i=0;
 $k=0;
 
 //$read=file($filename);
 
 $teste1=0;

//echo $monfichier[0]."___";


 $cerfa=0;
 	
 //parcours de chaque ligne du fichier
 foreach ($monfichier as $op => $value)
   {
    
     
	//echo "<pre> $op => $value </pre>";
	   
	  
       if($value==$del1)
	  {
	 
	  $b1=1;
	  $v2=1;
	  } 
    if($value==$del2 &&  $v1==1)
	  {
	 
	  $b2=1;
	  $v2=1;
	  }
   if($b1==1 && $b2!=1  && $c)
   {
      if($value!=":" )
	  {
	 
   $v.=$value." ";
  
   }
   
   
  
   
   
  
    
    
   
   if($del2=="#")
   return $v;
   
   $v1=1;
   }
   if($taille==1)
	  {
	  
    if(strcmp($tableau[0],$value)==0 && $t1)
	 { 
	   
	    $b1=1;
	 
	    $b2=0; 
         $c=1;
		 $t1=0;
		 $v1=0;
		 
	 }
	 }
	 if($taille >1  )
	  {
	  
	   
	 
	  
	 $l=ord($value);
	   
		  
		   
		   
	          if(!empty($tableau[$k]))
	  {
	    $miss=myfu($value);
	      
		     if(!empty($miss[0]))
			 {
	  if(strcmp($tableau[$k],$miss[0])==0 && $cash)
	  {
	  
	 
	      
	       
	     
	   $sign=1;
		if($taille-1==$k)
		 {
		
		     $cash=0;
			 $b1=1;
	 
	    $b2=0; 
         $c=1;
		 $v1=0;
			 
		 }
		 else
		 {
		  $x=1;
	       $k=$k+1;
		
		 $k1=$k;
		 }
			
			 
	      
		   
	  }
	  else
	  {
	   
	   
	  $x=0;
	 if(ord($value)>32 &&  ord($value)!=160)
	 {
	  
	  
	  $k=0;
	  }
	  
	  $t1=1;
	  $sign=0;
	  }
	  }
	  
	  }
	  
	    
	     
	  }
  
	  
    
	  
	  
	 
	  
	 
	
   
   
	
	 
	
   if($b1==1 && $b2==1)
   {
    
  $v2=1;
   
   }
   
   
   
}
 

// $res=3 Marqueurs de debut ou/et  de fin non trouvé
   if($b2!=1 && $b1==1)
    $res=3;
	 if($b1!=1 && $b2==1)
    $res=3;
	if($b1!=1 && $b2!=1)
	$res=3;
	
	
}
else
echo "impossible de lire le fichier!"." ";
return $v;

}

?>