<?php
include_once('database.php');
include_once('functions.php');

if(isset($_POST['book_id']))
{
	$book_id = clean_string($_POST['book_id']);
	$query = mysql_query("delete from livres where id =".$book_id,$connect);
	header("Location: ./../index.php?action=member");
}
else
{
	header("Location: ./../index.php?action=removeBook");
}

?>