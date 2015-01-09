<?php

$server = '127.0.0.1';
$database = 'bibleo';
$user = 'root';
$pass = '';

@$connect = mysql_connect($server,$user,$pass);
@mysql_set_charset("utf8");

if(!$connect)
{
	die("Erreur ! [connection impossible avec les données '"
		.$server."', '".$user."', '".$pass."']");
}

if(!mysql_select_db($database))
{
	die('Erreur ! [selection de la base de données '.$database.' impossible]');
}

?>