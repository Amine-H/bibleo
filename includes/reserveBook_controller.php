<?php
include_once('database.php');
include_once('functions.php');

if(isset($_POST['book_id']) && isset($_POST['CIN']) && isset($_POST['book_back']))
{
	$book_id = clean_string($_POST['book_id']);
	$CIN = clean_string($_POST['CIN']);
	$book_back = clean_string($_POST['book_back']);

	$query = mysql_query("select id from utilisateurs where CIN =".$CIN,$connect);
	$row_count = mysql_num_rows($query);

	if($row_count == 0)
	{
		$query2 = mysql_query("select * from utilisateurs",$connect);
		$user_id = mysql_num_rows($query2) + 1;
		User::register($user_id,"user_".$CIN,"pass_".$CIN,$CIN,$connect);
	}
	else
	{
		$row = mysql_fetch_assoc($query);
		$user_id = $row['id'];
	}

	$query = mysql_query("select id from reservations");
	$row_count = mysql_num_rows($query) + 1;

	mysql_query("insert into reservations values('".$row_count."','".$user_id."','".$book_id."','".date('Y-m-d')."','".$book_back."','0')");

	header("Location: ./../index.php?action=reservations");
}

?>