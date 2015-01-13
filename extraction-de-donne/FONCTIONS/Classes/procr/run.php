<?php
require_once("Classes/connexion.class.php");
require_once("Classes/sh.class.php");
require_once("Classes/trace.php");
 
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 
<link rel="stylesheet" href="her.css" type="text/css" />
<title>ACCUEIL</title>
</head>
<body>
<h1 style="color:red;text-decoration:underline;"> tous mes fichiers se trouvent dans le dossier <em style="color:blue">Classes </em> </h1>
<?php
//$monfichier= fopen("Classes/fac.txt", 'r');
$monfichier="Jàà<à<  N° 4748 Récapitulatif de votre démarche en ligne ALLOCATIONS FAMILIALES Aujourd'hui le 21/01/2014 a 19:53:27, vous 

venez de faire une demande d'aide au logement. Vous allez devenir allocataire de la Caf des Yvelines située : 1 Rue DE LA 

FONTAINE 78201 MANTES LA JOLIE CEDEX > Vous-même (allocataire et responsable du dossier) Déclaration d'état civil de 

TSHOMOKONGO TARCISSE MR TSHOMOKONGO TARCISSE Nom d'usage : EDDY Ne(e) le: 15/08/1991 a KINSHASA CONGO Nationalité : Autre 

Nom et prénom du père 
: EDIMAHAMBA 
TSHEFU Nom et 
prénom de la mere : MBU                         PAULINE Prestations TARCISSE TSHOMOKONGO ne perçoit pas ou n'a pas perçu de prestations familiales 

d'un autre organisme que la Caf Les parents                                            de TARCISSE TSHOMOKONGO ne perçoivent pas de prestations pour lui/elle. > Votre 

adresse 18 B Rue HARAS 78530 BUC France Date d'entrée dans le logement : 01/11/2013 > Vos coordonnées de contact Mél : 

tarcisseeddy@gmail.com Portable : 0752552824 > Votre compte bancaire Titulaire du compte : EDDY TARCISSE IBAN : FR76 3000 

4008 5900 0004 1551 863 BIC : BNPAFRPPXXX Domiciliation de l'agence bancaire :BNPPARBVERSAILLES ET GX > Votre situation 

familiale Vous avez déclaré être célibataire depuis le 15/08/1991. La loi punit quiconque se rend coupable de fraudes ou de 

fausses déclarations (L.262-46 du Code de l'action sociale et des familles - Article 441.1 du code Pénal). La Caf vérifie 

l'exactitude des déclarations. La loi nÂ° 78-17 du à´janvier 1978 modifiée, relative à  l'informatique et aux libertés, 

s'applique aux réponses faites sur ce formulaire. Elle garantit un droit d'accès et de rectifications pour les donnéà¦ vous 

concernant auprès de l'organisme qui a traité votre demande. Emplacement réservé a la Caf PAGE 1/4 Déclarant MR TSHOMOKONGO 

TARCISSE 15/08/1991 21/01/2014 IDX T6093101 P";
 $f=myfu($monfichier);

//echo $f[0];
echo $er." ";

 /* foreach ($f as $op => $value)
   {
    
     
	echo "<pre> $op => $value </pre>";
	}*/
  
?>

<h2 style="color:green;">  OPERATION TERMINEE!!!" </h2>



</body>
</html>