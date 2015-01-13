<?php
require_once("Classes/DB.php");
include_once("Classes/menu.class.php");
 if(isset($_GET["id"]))
 {
  
  
  
   
 if(MENU::SupMenu($_GET["id"]))
  {
  $db1=DB::connect();
  $sql="SELECT COUNT(*) as Count  FROM menu";
  $rt=$db1->query($sql);
  $po=$rt->fetch();
  if($po['Count'])
  header("location:afficherMenu.php");
  else
  header("location:Cree_Menu.php");
 }
 }
  
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="her.css" type="text/css" />
<title>Affichage Des menus</title>
</head>
<body>

  <?php
  $db=DB::connect();
  $sql="SELECT id_menu ,nom_menu,DATE_FORMAT(date_menu,' Le %d/%m/%Y à %Hh%im%ss') AS date1 FROM menu";
  
  
      foreach ($db->query($sql) as $don)
	    {
  ?>
        <form style="border:1px solid black ;width:500px">
        <h3  style="margin:15px ;color:silver"> Nom du Menu:  <span style="text-decoration:none;color:black;font-size:20px;font-weight:bold;margin:5px"><?php echo $don['nom_menu']  ;?></span> </h3> 
		<h3 style="margin:15px ;color:silver"> Date de Creation: <em style="color:black;font-size:15px;text-decoration:none;"><?php echo  $don['date1']; ?> </em> </h3>
		<h3  style="margin:15px ;color:silver"> Nombre de Sous-Menu: 
		<?php  
		$sql1="SELECT nom_sous_menu,DATE_FORMAT(date_sous_menu,' Le %d/%m/%Y à %Hh%im%ss') AS date2 FROM sousmenu WHERE id_sous_menu='$don[id_menu] '";
		$labelle=array();
		$i=0;
		foreach($db->query($sql1) as $tab)
		{
		   $labelle[$i]["nom_sous_menu"]=$tab["nom_sous_menu"];
		   $i++;
		}
		if(count($labelle)) 
		{
		?>
		<span style="color:blue;"><?php echo count($labelle) ;?></span><a  id="pto"  href="afficherSousMenu.php?sm=<?php $req=$db->query($sql);echo $don["id_menu"] ?>">(voir le contenu)</a>
		<?php
		}
		else
		   echo "0";
		   
		
		  ?>
		</h3>
		<h4 align="center"><a href="afficherMenu.php?id=<?php echo  $don["id_menu"] ;?> " >Supprimer Le Menu</a><span style="font-size:25px;font-weight:bold">|</span><a href="Cree_Sous_Menu.php?pate1=<?php echo  $don["id_menu"] ;?> " >Ajouter un Sous-Menu</a><span style="font-size:25px;font-weight:bold">|</span><a href="Cree_Menu.php?id1=<?php echo  $don["id_menu"] ;?>">Modifier le Nom du Menu</a> </h4> 
	
		</form>
		<?php 
		}
		
		?>
		<p  style="font-size:15px;margin-left:0px;padding-top:50px;clear:both" ><a href="afficherMenu.php"><h3 id="yl">Afficher La Liste Des Menus </a> <span style="font-size:15px"> | </span><a href="cree_Menu.php">Cree un menu</h3>  </a></p>
		
</body>
</html>
