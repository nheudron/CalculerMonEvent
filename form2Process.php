<?php 
	include("db_connexion.php");

	session_start();
		$_SESSION["email"];
		$_SESSION["user_id"];

	if (isset($_POST["email"])) {
		createEvent();//create the event
		header("Location: form3.php");
	}else{
		header("Location: form.php");
	}

		
	
	function createEvent(){
		global $db;
		
			$result2 = $db->prepare('INSERT INTO event(adults, children, start, end, date, place) VALUES (:adults, :children, :start, :end, :date, :place)');
			$result2->execute(array(
				'adults'=>htmlspecialchars($_POST["name"]),
				'children'=>htmlspecialchars($_POST["surname"]),
				'start'=>htmlspecialchars($_POST["company"]),
				'end'=>$_POST["email"],
				'date'=>htmlspecialchars($_POST["phone"]),
				'place'=>$_POST["phone"]
			));
			echo 'Les données ont été ajoutées.';
			createSession();
			$result2->closeCursor();
	}

	function addEventIDtoSESSION(){
		session_start();
		global $db;
		$result3 = $db->prepare('SELECT * FROM user WHERE email = ? AND company = ?');
		$result3->execute(array($_POST["email"], $_POST["company"]));
		$data = $result3->fetch();
		$_SESSION["event_id"] = $data["id"];
		$result3->closeCursor();
	}
?>