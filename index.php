<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<center>
		<h2>Welcome to CinePotato!</h2>
		<?php
			if (isset($_SESSION['u_id'])){
				echo "Hello " . $_SESSION['u_first'] . " " . $_SESSION['u_last'] . ", You are logged in!";
				echo '<br> <br>';
				echo '<a href="insert_display.php">Access Movie Database</a>';
				echo '<br> <br> <br>';
				echo '<img src="movies.png" width ="800px" height = "555px" >';	
			}
		?>		
		</center>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
