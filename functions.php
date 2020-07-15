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

?>