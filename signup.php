<?php
include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2 style="color:black; font-size:30px;">Signup</h2>
		
		<form class="signup-form" name="signupform" action="includes/signup.inc.php" method="POST" onSubmit="return validation()">
			<input type="text" name="first" placeholder="Firstname">
			<input type="text" name="last" placeholder="Lastname">
			<input type="text" name="email" placeholder="E-mail">
			<input type="text" name="uid" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">Sign up</button>
		</form>
		
		<p class="fn" id = "invalid_f"></p>
		<p class="ln" id = "invalid_l"></p>
		<p class="em" id = "invalid_e"></p>
		<p class="uid" id = "invalid_u"></p>
		<p class="ps" id = "invalid_ps"></p>
		
		<script type="text/javascript">
	
		var invalid=0;
		
		function validation(){
			invalid=0;
			
			var fn = document.forms["signupform"]["first"].value;
			var fn_regex = /^[A-Za-z]+(\s[A-Za-z]+)*$/;
			
			if(fn==""){
				document.getElementById("invalid_f").innerHTML="Please enter your first name";
				invalid += 1;
			} 
			else if(!fn_regex.test(fn)){
				document.getElementById("invalid_f").innerHTML="No Special Characters are allowed";
				invalid += 1;
			}
			else{
				document.getElementById("invalid_f").innerHTML='<p style="color:green;">✔</p>';
			}
			
			var ln = document.forms["signupform"]["last"].value;
			var ln_regex = /^[A-Za-z]+(\s[A-Za-z]+)*$/;
			
			if(ln==""){
				document.getElementById("invalid_l").innerHTML="Please enter your last name";
				invalid += 1;
			} 
			else if(!ln_regex.test(ln)){
				document.getElementById("invalid_l").innerHTML="No Special Characters are allowed";
				invalid += 1;
			}
			else{
				document.getElementById("invalid_l").innerHTML='<p style="color:green;">✔</p>';
			}
			
			var em = document.forms["signupform"]["email"].value;
			var em_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			
			if(em==""){
				document.getElementById("invalid_e").innerHTML="Please enter your email";
				invalid += 1;
			} 
			else if(!em_regex.test(em)){
				document.getElementById("invalid_e").innerHTML="Please enter a valid email";
				invalid += 1;
			}
			else{
				document.getElementById("invalid_e").innerHTML='<p style="color:green;">✔</p>';
			}
			
			var uid = document.forms["signupform"]["uid"].value;
			
			if(uid==""){
				document.getElementById("invalid_u").innerHTML="Please enter a username";
				invalid += 1;
			} 
		
			else{
				document.getElementById("invalid_u").innerHTML='<p style="color:green;">✔</p>';
			}
			
						
			var ps = document.forms["signupform"]["pwd"].value;
			
			if(ps==""){
				document.getElementById("invalid_ps").innerHTML="Please enter a password";
				invalid += 1;
			} 
			else if(ps.length < 3){
				document.getElementById("invalid_ps").innerHTML="Password should contain at least 3 charachter";
				invalid += 1;
			}
			else{
				document.getElementById("invalid_ps").innerHTML='<p style="color:green;">✔</p>';
			}
			
			
			if(invalid != 0){
				return false;
			}
			else{
				return true;
			}
		}
		
		</script>
		
	</div>
</section>

<?php
include_once 'footer.php';
?>
