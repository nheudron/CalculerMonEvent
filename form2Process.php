<?php include("db_connexion.php");
	session_start();
	$_SESSION["email"] = $_POST["email"];
	
	createEvent();

	function createEvent(){
		global $db;

		if(isset($_POST["email"])){
			$Requestok = 1;
		}else{
			header("Location: form.php");
		}

		if ($Requestok == 1) {
			$result = $db->prepare('INSERT INTO event(adults, children, start, end, date, place) VALUES (:adults, :children, :start, :end, :date, :place)');
			$result->execute(array(
				'adults'=>htmlspecialchars($_POST["name"]),
				'children'=>htmlspecialchars($_POST["surname"]),
				'start'=>htmlspecialchars($_POST["company"]),
				'end'=>$_POST["email"],
				'date'=>htmlspecialchars($_POST["phone"]),
				'place'=>$_POST["phone"]
			));
			echo 'Les données ont été ajoutées.';

			header("Location: form3.php");
		}else{
			header("Location: form.php");
		}
	}
?>