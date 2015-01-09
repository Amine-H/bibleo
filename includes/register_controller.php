<?php
include_once('database.php');
include_once('functions.php');

$utilisateur = $_POST['utilisateur'];
$motdepasse = $_POST['motdepasse'];
$motdepasse2 = $_POST['motdepasse2'];
$CIN = $_POST['CIN'];

session_start();

if(isset($_SESSION['username']))
{
	header('Location: ./../index.php?action=member');
}
else
{
	if((isset($utilisateur) && isset($motdepasse) && isset($motdepasse2) && isset($CIN)) &&
		(!empty($utilisateur) && empty($motdepasse) && !empty($motdepasse2) && !empty($CIN)))
	{
		$utilisateur = clean_string($utilisateur);
		$motdepasse = clean_string($motdepasse);
		$motdepasse2 = clean_string($motdepasse2);
		$CIN = clean_string($CIN);
	}
	else
	{
		header('Location: ./../index.php?action=register');
	}

	if($motdepasse == $motdepasse2)
	{
		if(User::connect($utilisateur,$motdepasse,$connect))
		{
			header('Location: ./../index.php?action=member');
		}
		else
		{
			$query = mysql_query("select * from utilisateurs where user = '$utilisateur'",$connect);
			$row_count = mysql_num_rows($query);
			if($row_count != 0)
			{
				header('Location: ./../index.php?action=register');
			}
			else
			{
				$query = mysql_query("select * from utilisateurs",$connect);
				$id = mysql_num_rows($query) + 1;
				User::register($id,$utilisateur,$motdepasse,$CIN,$connect);
				User::connect($utilisateur,$motdepasse,$connect);
				header('Location: ./../index.php?action=member');
			}
		}
	}
}

?>