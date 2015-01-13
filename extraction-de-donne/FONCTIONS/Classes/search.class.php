<?php


class MT
{
public function  __construct(){}	


public function Search( $del1,$del2,$del11,$del22,$filename)
{


$boo=1;
$v1=0;
$v2=0;
$b1=-1;
$b2=-1;
$teste=0;
$c=0;
$x=-1;
 
 $monfichier = fopen($filename, 'r');
 if($monfichier){
 $i=0;
 while(!feof($monfichier))
{
$ligne=fgets($monfichier);
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
   
     if($del11 )
	 {
	 
	 if(strcmp($del11,$value)==0 && $b1)
	 {
	   
	   $x=$del11;
	  
	   $c=1;
	   }
	   else
	   if(!$x)
	   $b1=0;
	 }
	 else
	 $c=1;
    if($value==$del2)
	  {
	 
	  $b2=1;
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
  
  
    if(strcmp($del1,$value)==0)
	 { 
	   
	    $b1=1;
	 
	    $b2=0;
	    
	 }
	 
	
   }
    $i=$i+1; 
   if($b1==1 && $b2==1)
   {
    
  $v2=1;
  if($del11==":")
  echo  $v." ";
 fclose($monfichier);
   return $v;
   
   }
   
   
   
}
   if($b2!=1 && $b1==1)
    $v="Marqueur de Fin non trouvé";
	 if($b1!=1 && $b2==1)
    $v="Marqueur de Debut non trouvé";
	if($b1!=1 && $b2!=1)
	$v="Marqueurs Non trouvé!";
	fclose($monfichier);
	return $v;
}


}
}
?>