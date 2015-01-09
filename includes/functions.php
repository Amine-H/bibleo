<?php


function clean_string($str)
{
	$cleanedStr = mysql_real_escape_string($str);
	return $cleanedStr;
}

class User
{
	static function connect($user,$pass,$connect)
	{
		$query = mysql_query("select * from utilisateurs where user = '".$user."' and pass = '".$pass."'",$connect);
		$row_count = mysql_num_rows($query);
		if($query)
		{
			if($row_count == 1)
			{
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $pass;
				return 1;
			}
			else
			{
				return 0;
			}
		}
		mysql_close($connect);
	}
	static function register($id,$user,$pass,$CIN,$connect)
	{
		mysql_query("insert into utilisateurs values ('".$id."','".$user."','".
			$pass."','".$CIN."','".date('Y-m-d')."','0')",$connect);
	}
	static function disconnect()
	{
		session_destroy();
	}
	static function isConnected()
	{
		return isset($_SESSION['username']);
	}
	static function isAdmin($connect)
	{
		if($_SESSION['username'])
		{
			$query = mysql_query("select isAdmin from utilisateurs where user = '".$_SESSION['username']."'",$connect);
			$row = mysql_fetch_assoc($query);
			return $row['isAdmin'];
		}
		else
		{
			return 0;
		}
	}
}

function generateRands($num)
{
	$array = array();
	for($i = 0;$i < $num;$i++)
	{
		$generated = rand(1,$num);
		if(in_array($generated,$array))
		{
			$i--;
		}
		else
		{
			$array[$i] = $generated;
		}
	}
	return $array;
}

function echoRandomBooks($connect)
{
	$query = mysql_query("select id from livres",$connect);
	$row_count = mysql_num_rows($query);
	for($i = 1;$i <= 3;$i++)
	{
		$rands = generateRands($row_count);
		if($row_count == 0 || !isset($rands[$i-1]))
		{
			echo "<div id='column$i'>";
			echo "<h2>nom</h2>";
			echo "<p><img src='images/nobook.jpg' width='300' height='150' alt=''></p>";
			echo "<p>description.</p>";
			echo "<p class='button'><a href='#'>Lire..</a></p>";
			echo "</div>";
		}
		else
		{
			$query = mysql_query("select * from livres where id ='".$rands[$i-1]."'",$connect);
			$row = mysql_fetch_assoc($query);
			echo "<div id='column$i'>";
			echo "<h2><a href ='index.php?action=book&id=".$row['id']."'>".$row['nom']."</a></h2>";
			echo "<p><img src='images/".$row['img']."' width='300' height='150' alt=''></p>";
			echo "<p>".$row['desc']."..</p>";
			echo "<p class='button'><a href='index.php?action=book&id=".$row['id']."'>Lire..</a></p>";
			echo "</div>";
		}
	}
}

function echoTopBooks($connect)
{
	$query = mysql_query("select id,nom from livres order by nombre_visiteurs desc LIMIT 0,5");
	$row_count = mysql_num_rows($query);
	for($i = 0;$i < $row_count;$i++)
	{
		$row = mysql_fetch_assoc($query);
		if($i == 0)
		{
			echo "<li class='first'><a href='index.php?action=book&id=".$row['id']."'>".$row['nom']."</a></li>";
		}
		else
		{
			echo "<li><a href='index.php?action=book&id=".$row['id']."'>".$row['nom']."</a></li>";
		}
	}
}

function echoNewestBooks($connect)
{
	$query = mysql_query("select id,nom from livres order by id desc LIMIT 0,5");
	$row_count = mysql_num_rows($query);
	for($i = 0;$i < $row_count;$i++)
	{
		$row = mysql_fetch_assoc($query);
		if($i == 0)
		{
			echo "<li class='first'><a href='index.php?action=book&id=".$row['id']."'>".$row['nom']."</a></li>";
		}
		else
		{
			echo "<li><a href='index.php?action=book&id=".$row['id']."'>".$row['nom']."</a></li>";
		}
	}
}

function generateRandomName()
{
	$rand = rand();//genere un nombre
	$randMD5 = md5($rand);//on fait le MD5 de ce nombre
	$shuffled = str_shuffle($randMD5);//shuffle(dmes)
	$final = substr($shuffled,0,10);//on prend que les 10 premiers chars
	return $final;
}

?>