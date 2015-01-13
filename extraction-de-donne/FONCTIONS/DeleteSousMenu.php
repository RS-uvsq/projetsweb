<?php
include_once("Classes/DB.php");
include_once("Classes/menu.class.php");
$db=DB::connect();
if(empty($_GET["pm1"])==0)
{
$tab1=array();
$counter=0;
$req2=$db->exec( "DELETE FROM sousmenu WHERE nom_sous_menu='$_GET[pm1]'");
$req=$db->query("SELECT COUNT(nom_sous_menu) AS nb FROM sousmenu  WHERE  id_sous_menu='$_GET[ef]'");
$t=$req->fetch();

}
  if($t['nb'])
  {
  
$te="afficherSousMenu.php?sm=" .@$_GET["ef"] ."";
	  header("location:$te");
	  }
	  else
	  
 header("location:afficherMenu.php");
 
 
 ?>