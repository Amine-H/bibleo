<?php
include_once('database.php');
include_once('functions.php');

session_start();

if(isset($_SESSION['username']))
{
	header('Location: ./../index.php?action=member');
}

$utilisateur = $_POST['utilisateur'];
$motdepasse = $_POST['motdepasse'];

$utilisateur = clean_string($utilisateur);
$motdepasse = clean_string($motdepasse);

if(isset($utilisateur) && isset($motdepasse))
{
	if(session_start() && User::connect($utilisateur,$motdepasse,$connect))
	{
		header('Location: ./../index.php?action=member');
	}
	else
	{
		header('Location: ./../index.php?action=login');
	}
}
else
	{
		header('Location: ./../index.php?action=login');
	}

?>