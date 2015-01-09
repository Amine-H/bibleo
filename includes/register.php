<?php

if(isset($_SESSION['username']))
{
	header('Location: index.php?action=member');
}

?>

<div class = "register">
	<form action = "includes\register_controller.php" method = "POST">
		<table>
			<tr>
				<td><label for = "user">Utilisateur</label></td>
				<td><input id = "user" type = "text" name = "utilisateur"></td>
			</tr>
			<tr>
				<td><label for = "pass">Mot de passe</label></td>
				<td><input id = "pass" type = "password" name = "motdepasse"></td>
			</tr>
			<tr>
				<td><label for = "pass2">Confirmation du Mot de passe</label></td>
				<td><input id = "pass2" type = "password" name = "motdepasse2"></td>
			</tr>
			<tr>
				<td><label for = "CIN">CIN</label></td>
				<td><input id = "CIN" type = "text" name = "CIN"></td>
			</tr>
			<tr>
				<td><input type = "submit" value = "S'enregistrer"></td>
				<td><input type = "reset" value = "Effacer"></td>
			</tr>
		</table>
	</form>
</div>