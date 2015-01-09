<?php
	if(isset($_GET['id']))
	{
		$book_id = clean_string($_GET['id']);
		$query = mysql_query("select * from livres where id = '$book_id'");
		if(mysql_num_rows($query) == 1)
		{
			$row = mysql_fetch_assoc($query);
			if($row['available'])
			{
				$availability = "<b style = 'color:green'>diponible</b>";
			}
			else
			{
				$availability = "<b style = 'color:red'>non diponible pour le moment</b>";
			}
			echo "
					<table>
					<tr>
						<td>
							<div class = 'cont1'>
								<div id = 'image'><img src = 'images/".$row['img']."'></div>
								<div id = 'tags'><u>Tags:</u> ".$row['tags']."</div>
								<div id = 'views'><u>Nombre de vues:</u> ".$row['nombre_visiteurs']."</div>
								<div id = 'availability'>$availability</div>
							</div>
						</td>
						<td  style = 'vertical-align:top;padding-left:15px;padding-top:15px'>
							<div class = 'cont2'>
								<div id = 'nom'>".$row['nom']."</div>
								<div id = 'description'>".$row['desc']."</div>
							</div>
						</td>
					</tr>
					</table>
				";
			mysql_query("update livres set nombre_visiteurs = nombre_visiteurs + 1 where id =".$row['id']);
		}
		else
		{
			header("Location: index.php?action=findBook");
		}
	}
	else
	{
		header("Location: index.php?action=index");
	}
?>