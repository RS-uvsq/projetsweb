<?php
include_once("Classes/DB.php");
include_once("Classes/menu.class.php");
$db=DB::connect();  
?>
<!DOCTYPE html PUBLIC >
<html>
<head>

<meta  charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="her.css" />
<title> Accusal</title>
</head>
<body>
<?php


 if(isset($_GET["sm"]) AND empty($_GET["sm"])==0)
 {
        $sql="SELECT * FROM sousmenu WHERE id_sous_menu=$_GET[sm]";
		$rest=$db->query("SELECT nom_menu,id_menu FROM menu WHERE id_menu=$_GET[sm]");
		$val=$rest->fetch();
		$ty=$db->query($sql);
		?>
		 <fieldset style="border:1px solid black ;width:500px">
		 <legend><h2 style="color:blue;"> <?php echo $val["nom_menu"]; ?> </h2></legend>
		 <?php
		foreach( $ty as $tab)
		{
		?>
         <span style="font-size:19px; margin:15px ;color:green;">- <?php echo $tab["nom_sous_menu"]; ?> </span>
		   		<span style="font-size:15px;" > <a href="DeleteSousMenu.php?pm1=<?php echo  $tab["nom_sous_menu"] ;?>&ef=<?php echo  $tab["id_sous_menu"] ;?> "><em>Supprimer Le Sous Menu</em></a><span style="font-size:25px;font-weight:bold">|</span><a href="Cree_Sous_Menu.php?id3=<?php echo  $tab["nom_sous_menu"] ;?> & myid=<?php echo  $tab["id_sous_menu"] ;?>"> <em>Modifier le Nom du Sous Menu</em></a> </span> 
				<br/>
		<?php
		}
		$ty->closeCursor() ;
		?>
				<p  style="font-size:15px;padding-left:65px" ><a href="afficherMenu.php"><em>Afficher Les Menus </em>  </a> <span> | </span><a href="cree_Menu.php"><em>Cree un menu</em>  </a></p>
		</fieldset>
		
		<?php
		}
		else
		{
		?>
		<p>impossible d'Afficher les sous menus!</p>
		<?php
		}
		?>

		</body>
		</html>
