<?php 
	include("db_connexion.php");

	session_start();

	if (isset($_SESSION["email"])) {
		createEvent();//create the event
		header("Location: form3.php");
	}else{
		header("Location: form.php");
	}

	function createEvent(){
		global $db;
		
			$result2 = $db->prepare('INSERT INTO event(adults, children, start, end, type, place, user_id) VALUES (:adults, :children, :start, :end, :type, :place, :user_id)');
			$result2->execute(array(
				'adults'=>$_POST["adults"],
				'children'=>$_POST["children"],
				'start'=>$_POST["from"],
				'end'=>$_POST["to"],
				'type'=>$_POST["type"],
				'place'=>$_POST["place"],
				'user_id'=>$_SESSION["user_id"]
			));
			addEvent_idToSESSION();
			$result2->closeCursor();
	}

	function addEvent_idToSESSION(){
		global $db;
		$result1 = $db->prepare('SELECT * FROM event WHERE adults = ? AND children = ? AND start = ? AND end = ? AND type = ? AND place = ? AND user_id = ?');
		$result1->execute(array($_POST["adults"], $_POST["children"], $_POST["from"], $_POST["to"], $_POST["type"], $_POST["place"], $_SESSION["user_id"]));
		$data = $result1->fetch();
		$_SESSION["event_id"] = $data["id"];
		$result1->closeCursor();
	}
?>