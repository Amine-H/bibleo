<?php
include_once('database.php');
include_once('functions.php');

if(isset($_POST['return_id']))
{
	$return_id = $_POST['return_id'];
	$query = mysql_query("update reservations set book_back = '1' where id ='".$return_id."'",$connect);

	header('Location: ./../index.php?action=member');
}
else
{
	header("Location: ./../index.php?action=returnBook");
}

?>