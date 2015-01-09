<script type="text/javascript">
	function envoyer()
	{
		var user = document.getElementById("user");
		window.location.replace("index.php?action=aff_reservations&id=" + user.value);
	}
</script>
<?php

if(User::isAdmin($connect))
{
	echo "
		<table>
			<tr>
				<td><label for = 'user'>Reservations de</label></td>
				<td>
					<select id = 'user' name = 'id'>
		";
					$query = mysql_query("select id,CIN from utilisateurs order by CIN",$connect);
					$row_count = mysql_num_rows($query);
					for($i = 0;$i < $row_count;$i++)
					{
						$row = mysql_fetch_assoc($query);
						echo "
							<option value = '".$row['id']."'>".$row['CIN']."</option>
							";
					}
	echo "
					</select>
				</td>
			</tr>
			<tr>
				<td><input type = 'button' onclick = 'envoyer();' value = 'Afficher Reservations'></td>
			</tr>
		</table>
		";
}
else
{
	if($_SESSION['username'])
	{
		$query = mysql_query("select id from utilisateurs where user=".$_SESSION['username']);
		$row = mysql_fetch_assoc($query);
		header("Location: index.php?action=aff_reservations&id=".$row['user']);
	}
	else
	{
		header('Location: index.php?action=login');
	}
}


?>