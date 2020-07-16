<?php 

	include("db_connexion.php");
	session_start();

	if(isset($_SESSION["email"])) {
		if(isset($_SESSION["event_id"])) {
			choosePackage();
			header("Location: form4.php");
		}else{
			header("Location: form2.php");
		}	
	}else{
		header("Location: form.php");
	}

	function choosePackage(){
		global $db;
			$resultPackage = $db->prepare('INSERT INTO package(journee_detude, demijournee_detude, seminaire_residentiel, seminaire_semiresidentiel, event_id) VALUES (:journee_detude, :demijournee_detude, :seminaire_residentiel, :seminaire_semiresidentiel, :event_id)');
			$resultPackage->execute(array(
				'journee_detude'=>$_POST["journee_detude"],
				'demijournee_detude'=>$_POST["demijournee_detude"],
				'seminaire_residentiel'=>$_POST["seminaire_residentiel"],
				'seminaire_semiresidentiel'=>$_POST["seminaire_semiresidentiel"],
				'event_id'=>$_SESSION["event_id"]
			));
			$resultPackage->closeCursor();
	}
?>