<?php include("db_connexion.php");

	createUser();

	function createUser(){
		global $db;

		if(isset($_POST["email"])){
			$Requestok = 1;
		}else{
			header("Location: form.php");
		}

		if ($Requestok == 1) {
			$result = $db->prepare('INSERT INTO user(name, surname, company, email, phone) VALUES (:name, :surname, :company, :email, :phone)');
			$result->execute(array(
				'name'=>htmlspecialchars($_POST["name"]),
				'surname'=>htmlspecialchars($_POST["surname"]),
				'company'=>htmlspecialchars($_POST["company"]),
				'email'=>$_POST["email"],
				'phone'=>htmlspecialchars($_POST["phone"])
			));
			echo 'Les données ont été ajoutées.';
			createSession();
			header("Location: form2.php");
		}else{
			header("Location: form.php");
		}
	}

	function createSession(){ //start session
		session_start();
		$result = $db->prepare('SELECT * FROM user WHERE Email_address = ? AND company = ?');
		$result->execute(array($_POST["email"], $_POST["company"]));
		$data = $result->fetch();
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["user_id"] = $data["id"];
		$result->closeCursor();
		
	}
?>