<?php

	$username = "jeeva";
	$password = "simple";

	if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER']) != $username || ($_SERVER['PHP_AUTH_PW']) != $password){
		
		header('HTTP/1.1 401 Unauthorized');
		header("WWW-Authenticate: Basic realm='MyApplication'");
		exit('<p> Problem authenticating!');
	}
?>

<!DOCTYPE html>
<head>
<title> Participants </title>
<link rel="stylesheet" href="main.css" />
</head>


<body> 

<h1> Select the Event </h1>
<br/>
<br/>
<br/>

<a href="list.php?q=webstitchers" class="link1"> Web Stitchers </a> <br/> <br/> <br/>
<a href="list.php?q=scoobinggoof" class="link2"> Scoobing Goof </a><br/> <br/> <br/>
<a href="list.php?q=papyromania" class="link3"> Papyromania </a><br/> <br/> <br/>
<a href="list.php?q=qwertywarriors" class="link4"> QWERTY warriors </a><br/> <br/> <br/>

</body>
</html> 
