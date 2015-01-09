<?php
include_once('database.php');
include_once('functions.php');

if(isset($_POST['nom']) && isset($_POST['desc']) &&
 isset($_POST['tags']) && isset($_FILES['img']['tmp_name']))
{
	$nom = clean_string($_POST['nom']);
	$desc = clean_string($_POST['desc']);
	$tags = clean_string($_POST['tags']);
	$img = $_FILES['img'];
	$img_db = generateRandomName();

	if (($img["type"] == "image/gif")
		|| ($img["type"] == "image/jpeg")
		|| ($img["type"] == "image/png")
		|| ($img["type"] == "image/pjpeg"))
	{
		move_uploaded_file($img['tmp_name'],"./../images/".$img_db);

		$query = mysql_query("select id from livres");
		$row_count = mysql_num_rows($query) + 1;

		$query = mysql_query("insert into livres values('".$row_count."','".$nom."','".$desc."','".$tags."','".$img_db."','0','".date('Y-m-d')."','1')");
		header('Location: ./../index.php?action=book&id='.$row_count);
	}
	else
	{
		header("Location: ./../index.php?action=addBook");
	}

}
else
{
	header("Location: ./../index.php?action=member");
}

?>