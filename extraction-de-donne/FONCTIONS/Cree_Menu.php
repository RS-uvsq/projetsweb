


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta  charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="her.css" />
<title> Accueil</title>
</head>
<body>
  
  <?php 
  include_once("Classes/menu.class.php");
  $Menu= new MENU();
  $b=0;
        if(isset($_POST["texte"]) AND empty($_POST["texte"])==0)
        $n=$Menu->Exist($_POST["texte"]);
  if(isset($_GET["pape"]) AND isset($_POST["texte"]) AND empty($_POST["texte"])==0)
  {
  
	
    if(MENU::Modifmenu($_GET["pape"],$_POST["texte"]) AND $n!=1 )
	{
	
	
	?>
	<form>
				<h1>Le nom de Votre Menu a été Modifié avec succès.</h1>
				<h3><a href="afficherMenu.php">Afficher la liste des Menus</a> | <a href="Cree_Menu.php">Ajouter un nouveau Menu</a></h3>
			</form>
	<?php
	}
	else{ if($n==1) $b=1;  echo "ERROR menu";}
	
	
	
  }
	else
	{
	
 
  if( isset($_POST["texte"]) AND empty($_POST["texte"])==0)
  {
  $n=$Menu->AjoutMenu($_POST["texte"]);
    
	
	 if($n==0)
	 $b=-2;
     if($n==-1)
	 
	{
	       
		?>
			<form>
				<h1>Votre Menu a été créé avec succès.</h1>
				<h3><a href="afficherMenu.php">Afficher la liste des Menus</a> | <a href="Cree_Menu.php">Ajouter un nouveau Menu</a></h3>
			</form>
		<?php 
		exit();
	}
	else
	{
	  if($n==1)
       $b=1;
	   }
	}
	}
	  if(empty($_GET["pape"])==1 )
	  {
	
	 if(isset($_GET["id1"]) AND empty($_GET["id1"])==0 )
	 {
	
	 ?>
	  
	<form method="post" action="Cree_Menu.php?pape=<?php echo $_GET["id1"];?>">
	<?php
	}
	else
	{
	
	
	?>
	
<form method="post" action="Cree_Menu.php">
<?php
 }   
?>
<fieldset>
<legend> Crée un Menu </legend>
<p  ><label id="">Nom du Menu: </label> <input type="text"  name="texte" id="texte"/> </p>
<p align="right"><input type="submit"  value="Envoyer"/> </p>
</fieldset>

</form>

<?php
}
?>
<?php 
if (isset($_POST["texte"]) AND empty($_POST["texte"])==1)
{
   if(isset($_POST["id1"]) AND empty($_POST["id1"])==0)
   {
?>
<form method="post" action="Cree_Menu.php?pape=<?php echo $_GET["pape"];?>">
<fieldset>
<legend> Crée un Menu </legend>
<p  ><label id="">Nom du Menu: </label> <input type="text"  name="texte" id="texte"/> </p>
<p align="right"><input type="submit"  value="Envoyer"/> </p>
</fieldset>
</form>
<?php
}
?>
<p id="avertissement">Veuillez saisir le nom de votre Menu s'il vous plait!<p>
	<p  style="font-size:15px;margin-left:400px;padding-top:50px;clear:both" ><a href="afficherMenu.php"><h3 id="yl">Afficher La Liste Des Menus </a> <span style="font-size:15px"> | </span><a href="cree_Menu.php">Cree un menu</h3>  </a></p>
		
<?php 

}//FIN
else
{
 
if( $b==1)
{
?>

<p id="avertissement1">Ce nom existe déjà!<p>
	<p  style="font-size:15px;margin-left:400px;padding-top:50px;clear:both" ><a href="afficherMenu.php"><h3 id="yl">Afficher La Liste Des Menus </a> <span style="font-size:15px"> | </span><a href="cree_Menu.php">Cree un menu</h3>  </a></p>
		
<?php 
}

}
?>
<?php 

if( $b==-2)
{
?>
<p id="avertissement2">Base de donnée inacessible!</p>
<?php 
}
?>
</body>
</html>