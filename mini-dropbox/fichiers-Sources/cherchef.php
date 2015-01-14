<?php

$nomf = $_GET['nomf'];
$moclef = $_GET['motclef'];
$nomaut =$_GET['nomaut'];
$datef = $_GET['datef'];

$con = new PDO('mysql:host=localhost;dbname=pcloud','root','root24');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}


$sql="SELECT * FROM fichiers WHERE nom like '%".$nomf."%' AND auteur like '%".$nomaut."%' AND description like '%".$moclef."%' AND date like '%".$datef."%'";
$sth = $con->prepare($sql);
   $sth->execute();
   $c = $sth->fetchAll();
  
    
		    
	//}
	//else if(empty($nomf) AND empty($moclef)  AND empty($nomaut)  AND empty($date)){
//$sql="SELECT * FROM fichiers ";
//}


		echo "<table border=\"2\" id=\"tabuserfil\">
		<tr>
		<th>id</th>
		<th>nom fichier</th>
		<th>auteur</th>
		<th>motcle</th>
		<th>Date</th>
		<th>voir</th>
		</tr>";

		 foreach($c as $row) {
		  echo "<tr>";
		  echo "<td>" . $row['id'] . "</td>";
		  echo "<td>" . $row['nom'] . "</td>";
		  echo "<td>" . $row['auteur'] . "</td>";
		  echo "<td>" . $row['description'] . "</td>";
		  echo "<td>" . $row['date'] . "</td>";
		  echo "<td><a href=\"./web/dnld.png\"  download=" . $row['nom'] . " ><img src=\"web/dnld.png\"  style=\" margin-left: auto;margin-right: auto;\" ></a></td>";
		  echo "</tr>";
		}
	
	echo "</table>";


?> 