<?php
$dbconn = pg_connect("dbname=db1");
// connexion � une base de donn�es nomm�e "marie"

$dbconn2 = pg_connect("host=localhost port=5432 dbname=db1");
// connexion � une base de donn�es nomm�e "marie" sur l'h�te "localhost" sur le port "5432"


$valid_passwords = array ("mario" => "carbonell");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];
?>