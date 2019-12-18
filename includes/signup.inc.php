<?php

require("../signup.php");
$sql = "";
if((isset($_REQUEST['first'])) && isset($_REQUEST['last']) && (isset($_REQUEST['email'])) && isset($_REQUEST['uid']) && isset($_REQUEST['pwd'])){
	
	include_once 'dbh.inc.php';
	
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	 

	$sql = "SELECT * FROM user WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
		
	if($resultcheck > 0){

		if(1) { ?>
		<script>
          alert('Sorry, username unavailable');		  
		</script>
		<?php }
		exit();
	} 
	else {
	//hashing the password
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	//insert user into database
	$sql = "INSERT INTO user (first, last, email, uid, pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
	mysqli_query($conn, $sql); //just run the query would be enough
	if(1) { ?>
    <script>
        alert('Signup complete!');  
    </script>
	<?php }
	//header("Location: ../signup.php");
	exit();	
	}
	
} 
else {
	header("Location: ../signup.php");
	exit();	
}



?>