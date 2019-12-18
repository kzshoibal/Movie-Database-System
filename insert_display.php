<center>
<?php

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

$jsonData= getJSONFromDB("select * from movies");

$jsn=json_decode($jsonData);

echo '<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: center;
}
td {
	text-align: center;
}
</style>
</head>
<body>

<table style="width:30%">
  <tr>
    <th>Movie</th>
    <th>Year</th> 
    <th>Genre</th>
  </tr>
  ';

$size = sizeof($jsn);

for($i=0; $i<$size; $i++){
	echo "<tr>";
	echo "<td>"; echo $jsn[$i]->Name; echo "</td>";
	echo "<td>"; echo $jsn[$i]->Year; echo "</td>";
	echo "<td>"; echo $jsn[$i]->Genre; echo "</td>";
	echo "</tr>";
}


echo  '</table>

</body>
</html>' ;



?>
<pre>
<form name="movieform" action="" method="POST">
	
	Name:	<input type="text" name="m_name" required >
	
	Year:	<input type="text" name="year" required >
	
	Genre:  <input type="text" name="genre" required >
	
		  <button type="submit" name="submit_a">Add</button>  

</form> 

	  <a href="update.php">Update</a>     <a href="delete.php">Delete</a>	<a href = "index.php"> Go Back </a>		
			<form name="display" method="POST" style="position:absolute; top:10px; left:390px;">  <button type="submit" name="submit_d">Display</button>   </form>

</pre> 

<?php

if(isset($_POST["submit_a"])){
	
	$name = mysqli_real_escape_string($conn, $_POST['m_name']);
	$year = mysqli_real_escape_string($conn, $_POST['year']);
	$genre = mysqli_real_escape_string($conn, $_POST['genre']);
	
	$sql = "INSERT INTO movies (Name, Year, Genre) VALUES ('$name', '$year', '$genre')";
	mysqli_query($conn, $sql);
	
	if(1) { ?>
    <script>
          alert('Movie added successfully');		  
    </script>
	<?php }
}

if(isset($_POST["submit_d"])){
	header("Location: insert_display.php");
}

?>


</center>
















