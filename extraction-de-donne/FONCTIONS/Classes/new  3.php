<?php


class MT
{
public function  __construct(){}	


public function Search( $del1,$del2,$filename)
{



$del1 = trim($del1);

$boo=1;
$l=0;//indice d'incrÃ©mentation  pour la lecture de chaque caractÃ¨re de la variable $del1
$arret=1;// indice d'arret de la boucle while
$valeur="";//variable temporaire  pour stocker les mots d'une chaine de caractÃ¨re si $del1 en ai une
$tableau= array();// crétion du tableau qui contiendra chaque mot de la chaine de caractÃ¨re $del1 si elle en ai une
$table=array();
$s=0;//indice d'incrÃ©mentation du tableau $tableau 
$f=0;//variable qui indique si $del1 est bien un tableau pour stocker la derniÃ¨re valeur lu($valeur) dans le tableau($tableau)
$taille=count($del1);//retourne la taille de la variable $del1
//$v1 et $v2 permettre de faire une recherche continue du marqueur de fin dans le fichier texte une fois que le marqueur de debut a été trouvé

$v1=0;
$v2=0;

//$b1 est un boolean qui indique si le marqueur de debut a été trouvé ,$b2 celui du marqueur de fin
$b1=-1;
$b2=-1;



$c=0;
$x=-1;
$k=0;
//booleen d'arret sur la recherche de MDEBUT ($t1)

$t1=1;
$cash=1;//booleen du tableau $del1 si s'en ai un

// si $del1 est de type tableau ,chacun de ces mots est stocké dans le tableau "$tableau"
while($arret)
{

 if(empty($del1[$l])==0)
 {
 //echo $del1[$l]." ";
 if(ord($del1[$l])==0 ||ord($del1[$l])==160)
 echo $del1[$l].":"."probleme"." ";
 if($del1[$l]==" ")
 {
 $table[$s]=$valeur;
 $valeur="";
 $f=1;
 $s=$s+1;
 }
 
 if($del1[$l]!=" ")
 $valeur.=$del1[$l];
 
 
 $l=$l+1;
 }
 else
 $arret=0;
}
// si  $del1 est bien de type tableau ,on modifie la valeur de "$taille"
if($f)
{
 $table[$s]=$valeur;
 
 $inc=0;
 $taille=count($table);
 
 echo "taille avant:".$taille." ";
    for($p=0;$p<$taille;$p++)
	    {
		
		 if($taille>12)
		 {
		 $table[12]=trim($table[12]);
		 //echo $p."-".ord($table[12])." ";
		 }
		
		    if(ord($table[$p])!=160 && ord($table[$p])!=0 )
			 
			 {
			 
			
			 $tableau[$inc]=$table[$p];
			 $inc=$inc+1;
			 }
		
		}
		$taille=count($tableau);
		
		
		echo "taille apres:".$taille." ";
		
 }
  
		

 // ouverture du fichier
 $monfichier = fopen($filename, 'r');
 
 if($monfichier){
 $i=0;
 
 //parcours de chaque ligne du fichier
 while(!feof($monfichier) )
{
$ligne=fgets($monfichier);

//"$piece" est une variable temporaire qui stocke le contenu de chaque ligne du fichier

$pieces = explode(" ", $ligne);


if($v1==0 && $v2==0)
{
$b1=0;
$v=" ";
$b2=0;
}
if($v1==1 && $v2==0)
  $b1=1;
$j=0;
  
	      
   foreach ($pieces as $value)
   {
   
     
    if($value==$del2)
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
	  
    if(strcmp($del1,$value)==0 && $t1)
	 { 
	   
	    $b1=1;
	 
	    $b2=0; 
         $c=1;
		 $t1=0;
		 
	 }
	 }
	 
	  if($taille >1  )
	  {
	  
	          if(!empty($tableau[$k]))
	  {
	      
	  if(strcmp($tableau[$k],$value)==0 && $cash)
	  {
	   
		if($taille-1==$k)
		 {
		
		     $cash=0;
			 $b1=1;
	 
	    $b2=0; 
         $c=1;
			 
			 }
			
		
			 
	       $x=1;
	       $k=$k+1;
	  }
	  else
	  {
	  $x=0;
	  $k=0;
	  $t1=1;
	  }
	  }
	  
	  
	     
	    
	     
	  }
	  
	  
	 
	  
	 
	
   }
    $i=$i+1; 
   if($b1==1 && $b2==1)
   {
    
  $v2=1;
  
   
  
 
   
   
   }
   
   
   
}
   if($b2!=1 && $b1==1)
    $v="Marqueur de Fin non trouvÃ©";
	 if($b1!=1 && $b2==1)
    $v="Marqueur de Debut non trouvÃ©";
	if($b1!=1 && $b2!=1)
	$v="Marqueurs Non trouvÃ©!";
	fclose($monfichier);
	return $v;
}


}
}
?>