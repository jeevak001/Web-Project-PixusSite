<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta property="og:title" content="Pixus 2015 | By Prathyusha Institute of Technology and Management"/>
	<meta property="og:site_name" content="Pixus 2015"/>
	<meta property="og:description" content="Pixus is a technical symposium organised by Computer Science & Engineering department of Prathyusha Institute of Technology"/>
    <meta property="og:url" content="http://www.pixus2015.com/" />
	<meta property="og:locale" content="en_IN" />
	<meta property="og:type" content="website" />
	<title> PIXUS 2015 | By Prathyusha Institute of Technology and Management</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/animate.css">
	
</head>

<body style="background-image:none;text-align:center;">
		<nav class="full-nav wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
				<a href="index.html" class="color-blue"> Home </a>
		</nav>
		
		<div class="pattern"></div>






<?php

	
	$webstitchers = 0;
	$scoobinggoof = 0;
	$papyromania = 0;
	$qwertywarriors = 0;
	
	
	if (isset($_POST['name']) && isset($_POST['college']) && isset($_POST['department'])){
		
		
		$name = $_POST['name'];
		$college = $_POST['college'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		
		if(isset($_POST['web_stitchers'])){
			$webstitchers = 1;
		}
		
		if(isset($_POST['scoobing_goof'])){
			$scoobinggoof = 1;
		}
		
		if(isset($_POST['papyromania'])){
			$papyromania = 1;
		}
		
		if(isset($_POST['qwerty_warriors'])){
			$qwertywarriors = 1;
		}
		
		
		
		$user = "jeeva";
		$password = "simple";
		$host = "localhost";
		$db = "test";
		$connection = mysqli_connect($host,$user,$password,$db);
		
		if(mysqli_connect_error()){
			echo "<p class='failure'>Registration failed. Please try after a while! </p><br/>";
		}else{
			
			$is_present = check_name($email);
			
			if($is_present){
				echo "<p class='failure'>Email Present already. Try another mail for registration !</p> <br/>";
			}else{
				
				$query_string = "INSERT INTO participants (name,college,department,webstitchers,scoobinggoof,papyromania,qwertywarriors,email,contact) VALUES ('{$name}','{$college}','{$department}',{$webstitchers},{$scoobinggoof},{$papyromania},{$qwertywarriors},'{$email}',{$contact});";
				
				$insert_status = mysqli_query($connection,$query_string);
				
				if(!$insert_status){
					echo "Registration failed. Please try after a while! <br/>";
				}else{
					echo "<p class='success'>You have been registered successfully !</p>";
					echo "<div class='details'>";
					
					echo "<span class='bold'>Name</span>";
					echo "<p class='data'>{$name}</p>";
					
					echo "<span class='bold'>College</span>";
					echo "<p class='data'>{$college}</p>";
					
					echo "<span class='bold'>Department</span>";
					echo "<p class='data'>{$department}</p>";
					
					echo "<span class='bold'>Events</span>" ;
					
					if($webstitchers == 1){
						echo "<p class='data'>Web Stitchers</p>";
					}
					if($scoobinggoof == 1){
						echo "<p class='data'>Scoobing Goof</p>";
					}
					if($papyromania == 1){
						echo "<p class='data'>Papyromania</p>";
					}
					if($qwertywarriors == 1){
						echo "<p class='data'>QWERTY Warriors</p>";
					}
					
					echo "<br/>";
					
					echo "<span class='bold'>Email</span>";
					echo "<p class='data'>{$email}</p>";
					
					echo "<span class='bold'>Contact</span>";
					echo "<p class='data'>{$contact}</p>";
					
					echo "</div>";
				}
			}
		}
		
		
	
		
	}
	
	function check_name($email){
			
			$user = "jeeva";
			$password = "simple";
			$host = "localhost";
			$db = "test";
			$connection = mysqli_connect($host,$user,$password,$db);
			
			if(mysqli_connect_error()){
				echo "Problem connecting ! <br/>";
			}else{
				$name_query = "SELECT email FROM participants WHERE email = '{$email}'";
				$result = mysqli_query($connection,$name_query);
				if(mysqli_num_rows($result) == 0){
					return false;
				}else{
					return true;
				}
			
		}
		
		
		
		
		
		
	}
	
	
	?>
</body>
</html>