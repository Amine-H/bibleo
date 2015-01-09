<?php
	session_start();//demarrage de la session
	///////////////importation//////////
	include_once('includes/functions.php');
	include_once('includes/database.php');
	///////////////////////////////////
	if(!isset($_GET['action']))
		$action = "index";
	else
		$action = $_GET['action'];

	$action = clean_string($action);
?>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Bibleo <?php if(User::isConnected()){echo " | ".$_SESSION['username'];} ?></title>
		<link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="index.php">bibleo</a></h1>
			</div>
			<div id="menu">
				<ul>
					<li <?php if($action == 'index'){echo "class='current_page_item'";} ?>><a href="index.php?action=index">Accueil</a></li>
					<li <?php if($action == 'findBook'){echo "class='current_page_item'";} ?>><a href="index.php?action=findBook">Livres</a></li>
					<?php
					if(User::isConnected())
					{
						echo "<li ";
						if($action == 'member'){echo "class='current_page_item'";}
						echo "><a href='index.php?action=member'>Membre</a></li>";
						echo "<li ";
						if($action == 'logout'){echo "class='current_page_item'";}
						echo "><a href='index.php?action=logout'>Logout</a></li>";
					}
					else
					{
						echo "<li ";
						if($action == 'register'){echo "class='current_page_item'";}
						echo "><a href='index.php?action=register'>S'enregistrer</a></li>";
						echo "<li ";
						if($action == 'login'){echo "class='current_page_item'";}
						echo "><a href='index.php?action=login'>Se Connecter</a></li>";
					}
					?>
				</ul>
			</div>
		</div>
		<div id="banner">
			<div class="content">
				<div><img src="images/bibleo.jpg" width="1000" height="200" alt="" /></div>
			</div>
		</div>
	</div>
	<!-- fin #header -->
	<div id="page">
		<div class="post">
			<h3 class="title"><a href="#"><?php echo $action?></a></h3>
			<div class="entry">
			<?php

			//un simple mini filtre
			switch ($action)
			{
				case 'index':
				case 'login':
				case 'logout':
				case 'register':
				case 'member':
				case 'addBook':
				case 'removeBook':
				case 'reserveBook':
				case 'returnBook':
				case 'reservations':
				case 'aff_reservations':
				case 'book':
				case 'findBook':
					include_once('includes/'.$action.'.php');
					break;
				default:
					include_once('includes/pageNotFound.php');
					break;
			}
			?>
			</div>
		</div>
	</div>
	<!-- fin #page --> 
	<div id="featured-content">
		<?php
			echoRandomBooks($connect);
		?>
	</div>
</div>
<div id="footer-content-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<h2>Top Livres</h2>
			<ul class="style1">
				<?php
					echoTopBooks($connect);
				?>
			</ul>
		</div>
		<div id="fbox2">
			<h2>nouveau Livres</h2>
			<ul class="style1">
				<?php
					echoNewestBooks($connect);
				?>
			</ul>
		</div>
	</div>
</div>
<div id="footer">
	<p>Copyright (c) 2013 Bibleo. All rights reserved.</p>
	<p>By Amine Hakkou.</p>
</div>
<!-- fin #footer -->
</body>
</html>
