<?php
	session_start();//demarrage de la session
	///////////////importation//////////
	include_once('includes/functions.php');
	include_once('includes/database.php');
	///////////////////////////////////
?>

<html>
	<!-- head -->
	<head>
		<title>Bibleo <?php if(User::isConnected()){echo " | ".$_SESSION['username'];} ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>

	<!-- body -->
	<body>
		<div id = "conteneur">
		<?php

		if(!isset($_GET['action']))
			$action = "index";
		else
			$action = $_GET['action'];

		//////////////header
		include_once('includes/header.php');


		//////////////body

		$action = clean_string($action);

		//un simple mini filtre
		switch ($action)
		{
			case 'index':
			case 'login':
			case 'logout':
			case 'register':
			case 'member':
			case 'control':
			case 'book':
			case 'findBook':
				include_once('includes/'.$action.'.php');
				break;
			default:
				include_once('includes/pageNotFound.php');
				break;
		}

		//////////////footer
		include_once('includes/footer.php');

		?>
		</div>
	</body>
</html>