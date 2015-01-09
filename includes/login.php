<?php

if(isset($_SESSION['username']))
{
	header('Location: index.php?action=member');
}

?>

<div class = "login">
	<form action = "includes\login_controller.php" method = "POST">
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
				<td><input type = "submit" value = "Login"></td>
				<td><input type = "reset" value = "Effacer"></td>
			</tr>
		</table>
	</form>
</div>