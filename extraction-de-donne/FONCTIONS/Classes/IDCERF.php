 
<?php 

function NUMCERF($monfichier)
{

$teste=array();
$i=0;
$vs=0;
$cerfa=0;
$f="";
$k=0;
  foreach ($monfichier as $op => $value)
   {
    
     
	//echo "<pre> $op => $value </pre>";

     
	  if($cerfa==1)
	   {
	     $vs=$value." ";
	     if($k==0)
	     {
	     $f=$vs;
	     $k=1;
	     }
		 $i=$i+1;
		 $cerfa=0;
	   }
	 if($cerfa==0)
	   {
	   $test=myfu($value);
	     if(!empty($test[0]))
		 {
	        if($test[0]=="N°")
		
			   $cerfa=1;
			   
			}
	   }
	   
	   }
	   
	   
	   
	   
	    $teste[0]=$i;
		$teste[1]=$vs;
		 echo $vs."<br>";
	   return $teste;
		
	   }
	  
	   ?>