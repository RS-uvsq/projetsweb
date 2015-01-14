<?php 
 


$db = new PDO('mysql:host=localhost;dbname=pcloud;charset=UTF-8', "root",""); 
if (!$db) {

echo "imposssible de se connecter à la base de donner"; 
	 
} 

?> 