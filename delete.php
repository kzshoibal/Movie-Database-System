	<center>
	<h1> Delete info </h1>
	</center>
	<pre>
	<form name="delete" method="POST" style="position:absolute; top:70px; left:350px;" >
		
		Name:	<input type="text" name="m_name" >
		
			  <button type="submit" name="submit_u1">Select</button>  

	</form>

		<a href = "insert_display.php"> Go Back </a>

	</pre> 

<?php 

	if(isset($_POST["submit_u1"])){
			
		$dbServername = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "loginsystem";

		$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
		
		$name = mysqli_real_escape_string($conn, $_POST['m_name']);
		
		
		$sql = "DELETE FROM movies WHERE Name ='$name'";
		mysqli_query($conn, $sql);
		
		
		if(1) { ?>
			<script>
				  alert('Deleted successfully');		  
			</script>	<?php }
			else {
				header("Location: delete.php");
			}
			
		}

?>
			
