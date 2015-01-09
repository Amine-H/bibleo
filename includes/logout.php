<?php

if(isset($_SESSION['username']))
{
	User::disconnect();
}
header('Location: index.php?action=index');

?>