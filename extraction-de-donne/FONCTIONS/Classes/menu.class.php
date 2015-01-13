<?php
require_once("Classes/DB.php");

class menu
{
public function  __construct(){}	


public function Exist( $men1)
{
$db=DB::connect();
 $j=0;
 $sql="SELECT nom_menu  FROM menu";
 
 
   foreach ($db->query($sql) as $row) {
         if(strcmp($row['nom_menu'],"$men1")==0)
		     $j=1;
        
  }
  return $j;
}
public  function AjoutMenu( $men1 )
{
$db=DB::connect();
 $j=0;
 $sql="SELECT nom_menu  FROM menu";
 
 
   foreach ($db->query($sql) as $row) {
         if(strcmp($row['nom_menu'],"$men1")==0)
		     $j=1;
        
  }
	
 
  if($j!=1)
  {
$req=$db->exec("INSERT INTO menu(nom_menu,date_menu)  VALUES( '$men1'  ,NOW())");
 if($req) 
  $j=-1;
  }
     
   
   
	  return $j;
 
}
public function Modifmenu($id,$name)
{

   $db=DB::connect();
   $req1=$db->query("DELETE  FROM menu WHERE id_menu=$id");
   try{
   $req2=$db->exec("INSERT INTO menu(nom_menu,date_menu) VALUES('$name',NOW())");
   }
   catch(Exception $e)
   {
   die("Erreur: " .$e->getMessage());
   }
   
   $req3=$db->query("SELECT * FROM menu WHERE nom_menu='$name'");
   
   $req4=$req3->fetch();
   $req1=$db->query("UPDATE sousmenu SET id_sous_menu='$req4[id_menu]' WHERE id_sous_menu=$id");
   
   if(  $req1)
     return 1;
	 else
	 return 0;
				
}
public function AfficheMenu($men1)
{
$db=DB::connect();
$req=$db->query( "SELECT nom_menu,DATE_FORMAT('date_menu , %d/%m/%Y %Hh%im%ss') FROM menu ");
if(!req)
{
 echo 'erreur!';
 return 0;
}
else
{
  return $req;
}
}
public function SupMenu($men1)
{
$db=DB::connect();
$req=$db->query ( "DELETE FROM menu WHERE id_menu='$men1'");
if($req)
return 1;
else
return 0;
}
}



class SOUSMENU
{
private static $k=1;
public function  __construct(){}	

public function verifID($iD)
{
$db=DB::connect();
 $j=0;
 foreach($db->query("SELECT id_menu FROM menu" ) as $boy)
      {if(strcmp($boy["id_menu"],$iD)==0)
	       $j=1;
		   }
		   
		   return $j;
		   
}
public  function AjoutSmenu( $men1,$ig )
{
$db=DB::connect();

 $j=0;
 $sql="SELECT nom_sous_menu  FROM sousmenu";
 
 
   foreach  ($db->query($sql) as $row1) {
         if(strcmp($row1['nom_sous_menu'],"$men1")==0)
		     $j=1;
        
  }
	
 
  if($j!=1)
  {
  $m=SOUSMENU::$k;
$req=$db->exec("INSERT INTO sousmenu(id_sous_menu,nom_sous_menu,date_sous_menu)  VALUES($ig,'$men1',NOW())");
//$req1=$db->query("UPDATE sousmenu SET id_sous_menu=$ig WHERE id_sous_menu=$m");




 if($req ) 
 {
 $ig++;
  SOUSMENU::$k=$ig;
  $j=-1;
  }
  
  }
     
   
   
	  return $j;
 
}
public function SverifID($name)
{
$db=DB::connect();
 $j=0;
 foreach($db->query("SELECT nom_sous_menu FROM sousmenu" ) as $boy)
      {if(strcmp($boy["nom_sous_menu"],$name)==0)
	       $j=1;
		   }
		   
		   return $j;
		   
}

public function ModifSmenu($men1,$firstname)
{
$db=DB::connect();
$req = $db->query("UPDATE sousmenu SET nom_sous_menu= '$firstname' WHERE  nom_sous_menu='$men1' ");
if($req)
return true;
else
return false;
				
}

public function AfficheSmenu($men1)
{
$db=DB::connect();
$req=$db->q-ery( "SELECT nom_sous_menu,DATE_FORMAT('date_sous_menu , %d/%m/%Y %Hh%im%ss') FROM sousmenu ");
if(!req)
{
 echo 'erreur!';
 return 0;
}
else

  return 1;

}


}

?>