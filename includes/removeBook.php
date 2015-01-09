<?php

if(!User::isAdmin($connect))
{
	header("Location: index.php?action=index");
}

?>
<form action = "includes\removeBook_controller.php" method = "POST">
	<table>
		<tr>
			<td><label for = "book">Livre</label></td>
			<td>
				<select id = "book" name = "book_id">
					<?php
						$query = mysql_query("select id,nom from livres",$connect);
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
			<td><input type = "submit" value = "Supprimer"></td>
			<td><input type = "reset" value = "Effacer"></td>
		</tr>
	</table>
</form>