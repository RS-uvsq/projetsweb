
<!DOCTYPE html PUBLIC >
<html>
<head>

<meta  charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="her.css" />
<title> Modification sous-Menu</title>
</head>
<body>
<?php
require_once("Classes/DB.php");
include_once("Classes/menu.class.php");
 

if (isset($_POST["id4"]) AND empty($_POST["id4"])==0)
{
if(SOUSMENU::SverifID($_POST["id4"]))
{
?>

<?php header('Location: ' . $_SERVER['HTTP_REFERER'] ); ?>

<?php 
}
}
?>
<?php 

	            if(empty($_POST["texte1"])==0)
				{
	    if(SOUSMENU::ModifSmenu($_GET["id4"],$_POST["texte1"]))
		{
		$te="afficherSousMenu.php?sm=" .@$_GET["il"]. "";
	  header("location:$te");
	   }
	   }
	   else 
	   {
	   ?>
	   <p style="color:red;">Veuillez saisir le nom de votre Sous-menu!</p>
	   <form method="post" action="modifiersousMenu.php?id4=<?php echo @$_GET["id4"];?>&il=<?php echo @$_GET["il"];?>">  

<fieldset>
<legend> Crée Votre Sous Menu </legend>
<p  ><label id="">Nom du Sous Menu: </label> <input type="text"  name="texte1" id="texte1"/> </p>
<p align="right"><input type="submit"  value="Envoyer"/> </p>
</fieldset>

</form>
	   <?php
	   
	  
	  }
	  
	  

 ?>
 </body>
 </html>