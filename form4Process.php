<?php 

	include("db_connexion.php");
	include("functions.php");
	session_start();

	if(isset($_SESSION["email"])) {
		if(isset($_SESSION["event_id"])) {
			addOption();
			header("Location: sendEmail.php");
		}else{
			header("Location: form2.php");
		}	
	}else{
		header("Location: form.php");
	}
?>