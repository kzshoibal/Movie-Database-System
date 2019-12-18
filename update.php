<center>
<h1> Update info </h1>
</center>
<pre>
<form name="update1" method="POST" style="position:absolute; top:70px; left:350px;" >
	
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


		function getJSONFromDB($sql){
			include 'dbh.php';
			//echo $sql;
			$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
			$arr=array();
			while($row = mysqli_fetch_assoc($result)) {
				$arr[]=$row;
			}
			return json_encode($arr);
		}
		
		
		$name = mysqli_real_escape_string($conn, $_POST['m_name']);

		$jsonData= getJSONFromDB("SELECT * FROM movies WHERE Name='$name'");
		
		//echo $jsonData;
		
		$jsn=json_decode($jsonData); //$jsn has every data 
		
		for($i=0;$i<sizeof($jsn);$i++){
		if($jsn[$i]->Name==$name){
		$nm = $jsn[$i]->Name;
		$y = $jsn[$i]->Year;
		$g = $jsn[$i]->Genre;
		echo "<br>";}
	}
		if(isset($_POST["submit_u1"])){
			
			
			echo '<form name="update2" action="updatedb.php" method="POST" style="position:absolute; top:100px; left:750px;">';
					echo 'Present Name: <input type="text" name="p_name" value="' . htmlspecialchars($nm) . '"readonly><br><br>';
					echo 'Name: <input type="text" name="m_name" value="' . htmlspecialchars($nm) . '"><br><br>';
					echo 'Year:	&nbsp <input type="text" name="year" value="' . htmlspecialchars($y) . '"><br><br>';
					echo 'Genre:  <input type="text" name="genre" value="' . htmlspecialchars($g) . '"><br><br>';
					echo '<button type="submit" name="submit_u2">Update</button>  
					</form>';		
				
		}  
}
		
?>


