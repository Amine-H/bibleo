<?php

if(isset($_SESSION['username']))
{
	echo "Bienvenu ".$_SESSION['username']."!<br>";

	if(User::isAdmin($connect))
	{
		echo "
				Vous voulez :
				<ul>
					<li><a href = 'index.php?action=addBook'>Ajouter livre</a></li>
					<li><a href = 'index.php?action=removeBook'>Supprimer livre</a></li>
					<li><a href = 'index.php?action=reserveBook'>Reserver livre</a></li>
					<li><a href = 'index.php?action=returnBook'>Retourner livre</a></li>
					<li><a href = 'index.php?action=reservations'>Afficher Reservations</a></li>
				</ul>
			";
	}
	else
	{
		echo "
				Vous voulez :
				<ul>
					<li><a href = 'index.php?action=reservations'>Afficher Reservations</a></li>
				</ul>
			";
	}
}
else
{
	header('Location: index.php?action=login');
}

?>