<?php 

	include("db_connexion.php");
	session_start();

	if(isset($_SESSION["email"])) {
		if(isset($_SESSION["event_id"])) {
			addOptionPackage();
			header("Location: sendEmail.php");
			header("Location: form5.php");
		}else{
			header("Location: form2.php");
		}	
	}else{
		header("Location: form.php");
	}

	function addOptionPackage(){
			
	}
?>