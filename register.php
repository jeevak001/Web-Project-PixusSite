<?php

	
	$webstitchers = 0;
	$scoobinggoof = 0;
	$papyromania = 0;
	$qwertywarriors = 0;
	
	
	if (isset($_GET['name']) && isset($_GET['college']) && isset($_GET['department'])){
		
		echo $_GET['name'] . "<br/>";
		echo $_GET['college']. "<br/>";
		echo $_GET['department']. "<br/>";
		echo $_GET['email']. "<br/>";
		echo $_GET['contact']. "<br/>";
		
		$name = $_GET['name'];
		$college = $_GET['college'];
		$department = $_GET['department'];
		$email = $_GET['email'];
		$contact = $_GET['contact'];
		
		if(isset($_GET['web_stitchers'])){
			echo "Web Stitchers <br/>";
			$webstitchers = 1;
		}
		
		if(isset($_GET['scoobing_goof'])){
			echo "Scoobing <br/>";
			$scoobinggoof = 1;
		}
		
		if(isset($_GET['papyromania'])){
			echo "Papyromania <br/>";
			$papyromania = 1;
		}
		
		if(isset($_GET['qwerty_warriors'])){
			echo "QWERTY <br/>";
			$qwertywarriors = 1;
		}
		
		
		
		echo "Form Submit received ! <br/>"; 
		
		$user = "jeeva";
		$password = "simple";
		$host = "localhost";
		$db = "test";
		$connection = mysqli_connect($host,$user,$password,$db);
		
		if(mysqli_connect_error()){
			echo "Problem connecting ! <br/>";
		}else{
			echo "Successful !<br/>";
			
			$is_present = check_name($email);
			
			if($is_present){
				echo "Email Present already. Try another mail for registration ! <br/>";
			}else{
				
				$query_string = "INSERT INTO participants (name,college,department,webstitchers,scoobinggoof,papyromania,qwertywarriors,email,contact) VALUES ('{$name}','{$college}','{$department}',{$webstitchers},{$scoobinggoof},{$papyromania},{$qwertywarriors},'{$email}',{$contact});";
				
				$insert_status = mysqli_query($connection,$query_string);
				
				if(!$insert_status){
					echo "Problem Inserting Inner ! <br/>";
				}else{
					echo "Registered successfully ! <br/>";
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
				echo "Result: ".mysqli_num_rows($result);
				if(mysqli_num_rows($result) == 0){
					return false;
				}else{
					return true;
				}
			
		}
		
		
		
		
		
		
	}
	
	
	?>
