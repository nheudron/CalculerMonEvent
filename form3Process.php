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
			$resultPackage = $db->prepare('INSERT INTO package(journee_detude, demijournee_detude, seminaire_residentiel, seminaire_semiresidentiel, event_id, no_package) VALUES (:journee_detude, :demijournee_detude, :seminaire_residentiel, :seminaire_semiresidentiel, :event_id, :no_package)');
			$resultPackage->execute(array(
				'journee_detude'=>$_POST["journee_detude"],
				'demijournee_detude'=>$_POST["demijournee_detude"],
				'seminaire_residentiel'=>$_POST["seminaire_residentiel"],
				'seminaire_semiresidentiel'=>$_POST["seminaire_semiresidentiel"],
				'event_id'=>$_SESSION["event_id"],
				'no_package'=>1
			));
			addPackage_idToSESSION();
			$resultPackage->closeCursor();
	}

	function addPackage_idToSESSION(){
		global $db;
		$addPackage_idToSESSION = $db->prepare('SELECT * FROM package WHERE journee_detude = ? AND demijournee_detude = ? AND seminaire_residentiel = ? AND seminaire_semiresidentiel = ? AND event_id = ? AND no_package = 1');
		$addPackage_idToSESSION->execute(array($_POST["journee_detude"], $_POST["demijournee_detude"], $_POST["seminaire_residentiel"], $_POST["seminaire_semiresidentiel"],$_SESSION["event_id"]));
		$dataAddPackage_idToSESSION = $addPackage_idToSESSION->fetch();
		$_SESSION["package_id"] = $dataAddPackage_idToSESSION["id"];
		$addPackage_idToSESSION->closeCursor();
	}
?>