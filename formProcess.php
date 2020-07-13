<?php 
	include("db_connexion.php");
	if (isset($_POST["email"])) {
		$result1 = $db->prepare('SELECT * FROM user WHERE email = ? AND company = ?');
		$result1->execute(array($_POST["email"], $_POST["company"]));
		if ($result1->rowCount() == 1) { //check if there is one entry in the database
			createSession(); //create a session with this user
		}else{
			createUser();//create a user with the form entries
		}
		$result1->closeCursor();
		header("Location: form2.php");
	}else{
		header("Location: form.php");
	}
	
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