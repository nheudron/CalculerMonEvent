<?php 

	function createUser(){
		global $db;
		
			$result2 = $db->prepare('INSERT INTO user(name, surname, company, email, phone) VALUES (:name, :surname, :company, :email, :phone)');
			$result2->execute(array(
				'name'=>htmlspecialchars($_POST["name"]),
				'surname'=>htmlspecialchars($_POST["surname"]),
				'company'=>htmlspecialchars($_POST["company"]),
				'email'=>$_POST["email"],
				'phone'=>htmlspecialchars($_POST["phone"])
			));
			echo 'Les données ont été ajoutées.';
			createSession();
			$result2->closeCursor();
	}

	function createSession(){
		session_start();
		global $db;
		$result3 = $db->prepare('SELECT * FROM user WHERE email = ? AND company = ?');
		$result3->execute(array($_POST["email"], $_POST["company"]));
		$data = $result3->fetch();
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["user_id"] = $data["id"];
		$result3->closeCursor();
	}
	
	function duration(){
		include("db_connexion.php");
		$result4 = $db->prepare('SELECT * FROM event WHERE id = ?');
		$result4->execute(array($_SESSION["event_id"]));
		$dataEvent = $result4->fetch(); 
		$start = strtotime($dataEvent["start"]);
		$end = strtotime($dataEvent["end"]);
		$duree  = abs($end - $start)/60/60/24;
		return $duree;
	}
	
	function people(){
		include("db_connexion.php");
		$result4 = $db->prepare('SELECT * FROM event WHERE id = ?');
		$result4->execute(array($_SESSION["event_id"]));
		$dataEvent = $result4->fetch(); 
		$adults = $dataEvent["adults"];
		$children = $dataEvent["children"];
		$people = $adults + $children;
		return $people;
	}
		
?>