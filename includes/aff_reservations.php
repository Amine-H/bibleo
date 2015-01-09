<?php

if(isset($_GET['id']) && !empty($_GET['id']))
{
	$id = clean_string($_GET['id']);
}
else
{
	header('Location: index.php?action=reservations');
}

if($_SESSION['username'])
{
	$query = mysql_query("select id from utilisateurs where user='".$_SESSION['username']."' and id = '".$id."'",$connect);
	$row_count = mysql_num_rows($query);
	if($row_count == 1 || User::isAdmin($connect))
	{
		echo "
			<table border = '1'>
				<tr>
					<th>Nom du livre</th>
					<th>Date de Reservation</th>
					<th>Date de Remise</th>
				</tr>
			";
		$query = mysql_query("select livres.nom as l_nom,date_reservation,date_remise,book_back from livres,reservations where livres.id=livre and utilisateur='".$id."'",$connect);
		$row_count = mysql_num_rows($query);
		for($i=0;$i < $row_count;$i++)
		{ 
			$row = mysql_fetch_assoc($query);
			echo "
				<tr>
					<td>".$row['l_nom']."</td>
					<td>".$row['date_reservation']."</td>
				";
			if($row['book_back'])
			{
				$color = 'green';
			}
			else
			{
				$color = 'red';
			}
			echo "
					<td style = 'color:".$color."'>".$row['date_remise']."</td>
				</tr>
				";
		}
		echo "
			</table>
			";
	}
	else
	{
		$query = mysql_query("select id from utilisateurs where user ='".$_SESSION['username']."'");
		$row = mysql_fetch_assoc($query);
		header('Location: index.php?action=aff_reservations&id='.$row['id']);
	}
}
else
{
	header('Location: index.php?action=login');
}

?>