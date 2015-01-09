<?php

if(!User::isAdmin($connect))
{
	header("Location: index.php?action=index");
}

?>
<form action = "includes\addBook_controller.php" method = "POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td><label for = "nom">Nom</label></td>
			<td><input id = "nom" type = "text" name = "nom" required></td>
		</tr>
		<tr>
			<td><label for = "desc">description</label></td>
			<td><textarea id = "desc" cols = "35" rows = "6" name = "desc" required></textarea></td>
		</tr>
		<tr>
			<td><label for = "tags">tags</label></td>
			<td><input id = "tags" type = "text" name = "tags" required></td>
		</tr>
		<tr>
			<td><label for = "img">Image</label></td>
			<td><input id = "img" type = "file" name = "img" required></td>
		</tr>
		<tr>
			<td><input type = "submit" value = "Enregistrer"></td>
			<td><input type = "reset" value = "Effacer"></td>
		</tr>
	</table>
</form>