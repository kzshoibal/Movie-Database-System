<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<header>
	<nav>
		<div class = "main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li> <br>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_id'])){
						echo '<form action="includes/logout.inc.php" method="POST">
								<button type="submit" name="submit">Logout</button>
								</form>';
					} else{
						echo '<form name="loginform" action="includes/login.inc.php" method="POST" onSubmit="return validateLogin()">
					<input type="text" name="uid" placeholder="Username/Email">
					<input type="password" name="pwd" placeholder="Password">
					<button type="submit" name="submit">Login</button> <br> 
					<!-- <input type="submit" name="submit" value="Submit"> -->
					</form>	
					<a href="signup.php">Sign up</a>
					<p class="ue" id = "invalid_ue"></p>
					<p class="psw" id = "invalid_psw"></p>
					
					<script type="text/javascript">
				
					var invalid=0;
					
					function validateLogin(){
						invalid=0;
						
						var ue = document.forms["loginform"]["uid"].value;
						
						if(ue==""){
							document.getElementById("invalid_ue").innerHTML="Please insert username or email";
							invalid += 1;
						} 

						else{
							document.getElementById("invalid_ue").innerHTML="";
						}
						
						var psw = document.forms["loginform"]["pwd"].value;
						
						if(psw==""){
							document.getElementById("invalid_psw").innerHTML="Please insert your password";
							invalid += 1;
						} 

						else{
							document.getElementById("invalid_psw").innerHTML="";
						}
						
						
						if(invalid != 0){
							return false;
						}
						else{
							return true;
						}
					}
					
					</script>';
					}	 			
				?>
				
			</div>
		</div>
	</nav>
</header>


		