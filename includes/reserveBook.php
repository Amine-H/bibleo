<?php

if(!User::isAdmin($connect))
{
	header("Location: index.php?action=index");
}

?>

<form action = "includes\reserveBook_controller.php" method = "POST">
	<table>
		<tr>
			<td><label for = "book">Reserver</label></td>
			<td>
				<select id = "book"  name = "book_id">
					<?php
						$query = mysql_query("select id,nom from livres where available = '1'",$connect);
						$row_count = mysql_num_rows($query);
						for($i = 0;$i < $row_count;$i++)
						{
							$row = mysql_fetch_assoc($query);
							echo "
								<option value = '".$row['id']."'>".$row['nom']."</option>
								";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for = "cin">Pour (CIN)</label></td>
			<td><input id = "cin" type = "text" name = "CIN"></td>
		</tr>
		<tr>
			<td><label for = "book_back">jusqu'a</label></td>
			<td><input id = "book_back" type = "date" name = "book_back"></td>
		</tr>
		<tr>
			<td><input type = "submit" value = "Reserver"></td>
			<td><input type = "reset" value = "Effacer"></td>
		</tr>
	</table>
</form>