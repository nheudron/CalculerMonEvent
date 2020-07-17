<?php 

	include("form4Process.php");

	if(isset($_SESSION["email"])) {
		if(isset($_SESSION["event_id"])) {
			addNoPackage();
			header("Location: sendEmail.php");
		}else{
			header("Location: form2.php");
		}	
	}else{
		header("Location: form.php");
	}

	function addNoPackage(){
		
	}
?>