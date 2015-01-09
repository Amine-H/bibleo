<?php

include_once('functions.php');

if(isset($_GET['query']))
{
	$query = clean_string($_GET['query']);
}
else
{
	$query = "";
}

?>
<script type="text/javascript">
	function envoyer()
	{
		var query = document.getElementById("query");
		if(query.value.length > 0)
		{
			window.location.replace("index.php?action=findBook&query=" + query.value);
		}
	}
</script>

<input id = "query" type = "text" name = "query" value = "<?php echo $query;?>">
<input type = "button" value = "Rechercher" onclick = "envoyer();"><br>

<div id = "resultat">
<?php

if(!empty($query))
{
	$query = mysql_query("select * from livres where nom like '%$query%' OR tags = '%$query%'",$connect);
	$row_count = mysql_num_rows($query);

	if($row_count > 0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			echo "<div class = 'livre'>";
			echo "<u><a href = 'index.php?action=book&id=".$row['id']."'>".$row['nom']."</a></u>";
			echo "<p>".$row['desc']."<br>";
			echo "Status : ";
			if($row['available'])
			{
				echo "<b style = 'color:green;'>disponible</b></p>";
			}
			else
			{
				echo "<b style = 'color:red;'>non disponible pour le moment</b></p>";
			}
			echo "</div>";
		}
	}
	else
	{
		echo "Aucun Livre Trouvé!";
	}
}

?>
</div>