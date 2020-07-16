<?php 

	include("db_connexion.php");
	session_start();

	if(isset($_SESSION["email"])) {
		if(isset($_SESSION["event_id"])) {
			#8code
			header("Location: form5.php");
		}else{
			header("Location: form2.php");
		}	
	}else{
		header("Location: form.php");
	}
?>