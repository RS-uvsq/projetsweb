<?php
require_once("Classes/DB.php");
 include_once("Classes/menu.class.php");
static  $test=0;
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta  charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="her.css" />
<title> Accueil Sous-Menu</title>
</head>
<body>
  
  <?php 
  
  if($test==1)
  {
  ?>
  <p>Veuillez saisir le nom de votre Sous-menu.</p>
  <?php
  
  }
  
  static  $bol=0;
   
   if($bol==1)
   {
   ?>
   <p id="avertissement4">Ce nom existe déjà!<p>
   <?php
   }
    if($bol==-2)
	{
   ?>
   <p id="avertissement3">Veuillez saisir le nom de votre  Sous Menu s'il vous plait!<p>
   <?php
   }
  $Menu= new SOUSMENU();
  $Menu1=new MENU();
  $db=DB::connect();
  $b=0;
  
  /*if( isset($_POST["texte1"]) AND empty($_POST["texte1"])==0)
  {*/
  
  //on vérifie si l'id  a été envoyé sur l'url!
         if(isset($_GET["pate"]) AND empty($_GET["pate"])==0 AND empty($_POST["texte1"])==0)
		        {

				
				
	      //vérifie si l'id envoyé existe dans la base de donné Menu! 
	      if( $Menu->verifID ($_GET["pate"])  )
		  {
		  ?>
		  
          
          <?php           	  
	 $n=$Menu->AjoutSmenu($_POST["texte1"],$_GET["pate"]);
	 if($n==0)
	 $b=-2;
     if($n==-1)
	
	 
	{
	 $rest=$db->query("SELECT nom_menu FROM menu WHERE id_menu=$_GET[pate]");
		$val=$rest->fetch();
		?>
			<form>
				<h1>Votre Sous Menu a été ajouté dans le Menu  <em><?php echo $val["nom_menu"]; ?></em> </h1>
				<h3><a href="afficherMenu.php">Afficher la liste des Menus</a></h3>
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
	  else
	     {
		 ?>
		 <form>
				  <p> Une Erreur s'est Produite7</p>
				</form>
		 <?php
	   }
	}
	/*else
	{
	echo "une erreur s'est produite8";
	}*/
	/*}**/
	
	if((empty($_GET["pate1"])==0) OR ( empty($_GET["pate3"])==0) )
	{
	    if(empty($_GET["pate3"])==0  )
		{
		
	 ?>
	 <p style="color:red;">Veuillez saisir le nom de votre Sous-menu!</p>
	 <form method="post" action="Cree_Sous_Menu.php?pate=<?php echo  @$_GET["pate3"];?> ">
	 <?php 
	 }
	 else
	 {
	 ?> 
<form method="post" action="Cree_Sous_Menu.php?pate=<?php echo  @$_GET["pate1"];?> ">	 
<?php 
	 }
	 ?>  
<?php
}
else
{
?>
<form method="post" action="modifiersousMenu.php?id4=<?php echo @$_GET["id3"];?>&il=<?php echo @$_GET["myid"];?>">  
<?php
}
?>
<fieldset>
<legend> Crée Votre Sous Menu </legend>
<p  ><label id="">Nom du Sous Menu: </label> <input type="text"  name="texte1" id="texte1"/> </p>
<p align="right"><input type="submit"  value="Envoyer"/> </p>
</fieldset>

</form>



<?php 
if(empty($_GET["pate"])==1 )
$test=1;
if (isset($_POST["texte1"]) AND empty($_POST["texte1"])==1 )
{
$bol=-2;
$test=1;
$tet='cree_Sous_Menu.php?pate3='.@$_GET["pate"]. "";
header("Location: $tet");


}
else
{
 
if( $b==1)
{
$bol++;
?>

<?php //header('Location: ' . $_SERVER['HTTP_REFERER'] ); ?>

<?php 

?>

<?php 
}


}
?>
<?php 

if( $b==-2)
{
?>
<p id="avertissement5">Base de donnée inacessible!</p>
<?php 
}
?>
</body>
</html>