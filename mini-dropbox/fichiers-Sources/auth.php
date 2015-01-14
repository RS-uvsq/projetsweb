<?php
$dbconn = pg_connect("dbname=db1");
// connexion à une base de données nommée "marie"

$dbconn2 = pg_connect("host=localhost port=5432 dbname=db1");
// connexion à une base de données nommée "marie" sur l'hôte "localhost" sur le port "5432"


$valid_passwords = array ("mario" => "carbonell");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];
?>