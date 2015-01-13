

<?php
function teste($del1,$del2,$test)
{

$pieces = explode(" ", $test);
$tab=Array();
$b1=0;
$b2=0;
$j=0;
$i=0;
   foreach ($pieces as $value)
   {
    if($value==$del2)
	  $b2=1;
   if($b1==1 && $b2!=1)
   {
   $tab[$j]=$value;
   $j=$j+1;
   }
    if($value==$del1)
	  $b1=1;
	 
	  
   }
   return $tab;
}
?>
<?php
$del1="NAISSANCE";
$del2="VILLE:";
$tes="NOM: yorick ET NAISSANCE 25/10/1987 VILLE: LIBREVILLE PAYS: GABON TEL: 0614885846";
if(teste($del1,$del2,$tes))
{
$va=teste($del1,$del2,$tes);
 foreach ($va as $tr)
   {
      echo $tr ." ";
   }
}
else
echo "BINAIRE";


?>