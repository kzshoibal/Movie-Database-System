<?php

if(isset($_POST["submit_u2"])){
			
			$dbServername = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbName = "loginsystem";

			$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
			
			$nm2 = mysqli_real_escape_string($conn, $_POST['p_name']);
			$name = mysqli_real_escape_string($conn, $_POST['m_name']);
			$year = mysqli_real_escape_string($conn, $_POST['year']);
			$genre = mysqli_real_escape_string($conn, $_POST['genre']);
			
				
			$sql = "UPDATE movies SET Name='$name', Year='$year', Genre='$genre' WHERE Name = '$nm2'";
			mysqli_query($conn, $sql);
				
			if(1) { ?>
			<script>
				  alert('Updated successfully');		  
			</script>
			<?php }
			else {
				header("Location: update.php");
			}
			
		}

?>