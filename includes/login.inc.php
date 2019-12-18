<?php

session_start();

if (isset($_REQUEST['uid']) && isset($_REQUEST['pwd'])) {
	
	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		if(1) { ?>
			<script>
				alert('Invalid Username');		  
			</script>
		<?php }
		//header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM user WHERE uid='$uid' OR email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				/*
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../index.php?login=success");
					exit();
				}
				*/
				
				if ($pwd != $row['pwd']) {
					if(1) { ?>
						<script>
							alert('Wrong Password');		  
						</script>
					<?php }					
					//header("Location: ../index.php?login=Wrong password");
					exit();
				} elseif ($pwd == $row['pwd']) {
					//Log in the user here
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_first'] = $row['first'];
					$_SESSION['u_last'] = $row['last'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_uid'] = $row['uid'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	exit();
}

?>