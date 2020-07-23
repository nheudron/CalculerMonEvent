<?php 

	include("db_connexion.php");
	include("functions.php");
	session_start();

	if(isset($_SESSION["email"])) {
		if(isset($_SESSION["event_id"])) {
			addOption();
			addNoPackage();
			header("Location: sendEmail.php");
		}else{
			header("Location: form2.php");
		}	
	}else{
		header("Location: form.php");
	}

	function addNoPackage(){
		global $db;
			$resultNoPackage = $db->prepare('INSERT INTO no_package(event_id, rooms, lunch, diner, break) VALUES (:event_id, :rooms, :lunch, :diner, :break)');
		$resultNoPackage->execute(array(
			'event_id'=>$_SESSION["event_id"],
			'rooms'=>$_POST["rooms"],
			'lunch'=>$_POST["lunch"],
			'diner'=>$_POST["diner"],
			'break'=>$_POST["break"]
		));
		$resultNoPackage->closeCursor();
	}
?>