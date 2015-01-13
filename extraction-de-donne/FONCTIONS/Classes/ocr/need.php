
<?php
function myfu($del1)
{
$length = strlen($del1);
$ni=0;
$tableau= array();
$val="";
$fl=0;
    for($x = 0; $x < $length; $x++)
	{
    $letter = substr($del1, $x, 1);
        if($letter <> " ")
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
		   /*if($fl==1)
		   {*/
		          
		      // echo $val." ";
		     $tableau[$ni]=$val;
			  /*if($tableau[$ni]=="d'usage")
			 echo "<pre>$tableau[$ni]</pre>";*/
			 
			 
			 
			 if($fl==1)
			 {
			 $fl=0;
			 $val="";
			 $ni=$ni+1;
			 }
			
			//}
			
            //echo "<br />Position&nbsp;&nbsp; $x ===> &nbsp;&nbsp; Empty";
			}
    }
	return  $tableau;
	}
	?>