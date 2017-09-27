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
<link rel="stylesheet" href="list.css" />
</head>


<body> 


<?php

		$event = $_GET['q'];

		$user = "jeeva";
		$password = "simple";
		$host = "localhost";
		$db = "test";
		$connection = mysqli_connect($host,$user,$password,$db);
		if(mysqli_connect_error()){
			echo "Problem connecting ! <br/>";
		}else{
			$query = "SELECT id,name,college,department,email,contact FROM participants WHERE {$event} = 1;";
			$result = mysqli_query($connection,$query);
			if(mysqli_num_rows($result) == 0){

				echo "No one registered yet !";
				
			}else{
				
				echo "<h1 class='header'> Paticipants in " . ucwords($event)." </h1><br/><br/>";
				
				echo "<table>";
				echo "<tr><th>ID</th><th>Name</th><th>College</th><th>Department</th><th>Email</th><th>Contact</th><th>Delete</th></tr>";
				
				
				while($row = mysqli_fetch_row($result)){
					echo "<tr>";
					for( $i = 0;$i < mysqli_num_fields($result) ; $i++){
						echo "<td>";
						echo "{$row[$i]}";
						echo "</td>";
					}
					echo "<td>";
						echo "<a href='?{$row[0]}'>Remove</a>";
						echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			
		}
?>
</body>
</html> 
