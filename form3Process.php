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
		$no_package = 1;
			$resultPackage = $db->prepare('INSERT INTO package(journee_detude, demijournee_detude, seminaire_residentiel, seminaire_semiresidentiel, event_id, no_package) VALUES (:journee_detude, :demijournee_detude, :seminaire_residentiel, :seminaire_semiresidentiel, :event_id, :no_package)');
			$resultPackage->execute(array(
				'journee_detude'=>$_POST["journee_detude"],
				'demijournee_detude'=>$_POST["demijournee_detude"],
				'seminaire_residentiel'=>$_POST["seminaire_residentiel"],
				'seminaire_semiresidentiel'=>$_POST["seminaire_semiresidentiel"],
				'event_id'=>$_SESSION["event_id"],
				'no_package'=>$no_package
			));
			$resultPackage->closeCursor();
	}
?>