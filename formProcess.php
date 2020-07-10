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
				'name'=>$_POST["name"],
				'surname'=>$_POST["surname"],
				'company'=>$_POST["company"],
				'email'=>$_POST["email"],
				'phone'=>$_POST["phone"]
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
		$_SESSION["email"] = $_POST["email"];
	}
?>