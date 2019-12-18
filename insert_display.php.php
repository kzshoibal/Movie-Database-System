<?php


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "testJScript";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


function getJSONFromDB($sql){
	include_once 'dbh.php';
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}

//echo getJSONFromDB("select * from user");

echo "<br>";

$jsonData= getJSONFromDB("select * from movies");

/*$jsonData='[{"id":"10","name":"test","cgpa":"9.99"},
{"id":"123","name":"xyz","cgpa":"3.90"},
{"id":"1256","name":"test2","cgpa":"2.30"}]';*/

//echo $jsonData;
$jsn=json_decode($jsonData);

//echo "<pre>";print_r($jsn);echo "</pre>";
/*for($i=0;$i<sizeof($jsn);$i++){
		echo $jsn[$i]["name"]." earned ".$jsn[$i]["cgpa"];
		echo "<br>";
}*/
//for($i=0;$i<sizeof($jsn);$i++){
	//if($jsn[$i]->name=="abc")
		//echo $jsn[$i]->name." earned ".$jsn[$i]->cgpa;
		//echo "<br>";

/*foreach($jsn as $v){
	if($v->id=="123")
		echo $v->name."";
}*/
//print_r($_SERVER);

//echo $jsn[0]->Name . " was released in " . $jsn[0]->Year . "<br> <br>";

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

	  <a href="update.php">Update</a>     <a href="delete.php">Delete</a>

</pre> 
				
<form name="display" method="POST"> <button type="submit" name="submit_d">Display</button> </form>

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
	header("Location: crud.php");
}

?>











