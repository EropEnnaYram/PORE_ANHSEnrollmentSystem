<?php
	
	session_start();

	if(isset($_SESSION['username_entered'])){
	
		session_unset();
		session_destroy();
		header('Location: home.php');
	
	}
?>
