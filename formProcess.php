<?php

	include("db_connexion.php");
	include("functions.php");

	if (isset($_POST["email"])) {
		$result1 = $db->prepare('SELECT * FROM user WHERE email = ? AND company = ?');
		$result1->execute(array($_POST["email"], $_POST["company"]));
		if ($result1->rowCount() == 1) { //check if there is one entry in the database
			header("Location: update.php");
			#afficher les infos
			#mettre à jour la BDD
			#continuer 
				createSession(); //create a session with this user
		}else{
			createUser();//create a user with the form entries
		}
		$result1->closeCursor();
		header("Location: form2.php");
	}else{
		header("Location: form.php");
	}
?>