<?php

if(!User::isAdmin($connect))
{
	header("Location: index.php?action=index");
}

?>

<form action = "includes\returnBook_controller.php" method = "POST">
	<table>
		<tr>
			<td><label for = "reservation">Reservation</label></td>
			<td>
				<select id = "reservation" name = "return_id">
					<?php
						$query = mysql_query("select reservations.id as id,CIN,nom from livres,utilisateurs,reservations where utilisateur = utilisateurs.id and livre = livres.id and book_back = '0'",$connect);
						$row_count = mysql_num_rows($query);
						for($i = 0;$i < $row_count;$i++)
						{
							$row = mysql_fetch_assoc($query);
							echo "
								<option value = '".$row['id']."'>".$row['CIN']." | ".$row['nom']."</option>
								";
						}
					?>
				</select>
			</td>
		</tr>
	</table>
	
	</select>
	<input type = "submit" value = "Marquer comme retourné">
</form>