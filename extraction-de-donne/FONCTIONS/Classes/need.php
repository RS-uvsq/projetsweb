
<?php
function myfu($del1)
{
     $tableau= array();
     
     $tab=explode("\n",$del1);
     foreach ($tab as $val)
     {
     $k=explode(" ",$val);
     foreach($k as $w)
     {
	  if(trim("**#**".$w)!= '**#**')
	  {
	$tableau[]=$w;
	  //echo utf8_decode($w)."<br>";
	  }
     }
     }
     
     /*
$length = strlen($del1);
$ni=0;
$tableau= array();
$val="";
$fl=0;
    for($x = 0; $x < $length; $x++)
	{
    $letter = substr($del1, $x, 1);
        if($letter <> "\n")
		{
           // echo "<br />Position&nbsp;&nbsp; $x ===>".substr($del1, $x, 1)."_".ord(substr($del1, $x, 1))." ";
			if(ord(substr($del1, $x, 1))!=160 && ord(substr($del1, $x, 1))>32 )
			{
			     if($val=="")
			     $val=substr($del1, $x, 1);
				 else
				 $val.=substr($del1, $x, 1);
				 //echo $val." ";
				 $tableau[$ni]=$val;
				 //echo$tableau[$ni]." ";
				 
				 
				 
				 
				 $fl=1;
				 }
		}
        else
		{  
		   
		          
		      // echo $val." ";
		     $tableau[$ni]=$val;
			  
			 
			 
			 
			 if($fl==1)
			 {
			 $fl=0;
			 $val="";
			 $ni=$ni+1;
			 }
			
			//}
			
            //echo "<br />Position&nbsp;&nbsp; $x ===> &nbsp;&nbsp; Empty";
			}
    }*/
    
     //print_r($tableau);
    
	return  $tableau;
	}
	?>