<?php 
	session_start();
	if (isset($_POST["email"])) {
	
	}else{
		header("Location: form.php");
	}
?>