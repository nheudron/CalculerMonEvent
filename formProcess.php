<?php

	include("db_connexion.php");
	include("functions.php");

	if (isset($_POST["email"])) {
		$result1 = $db->prepare('SELECT * FROM user WHERE email = ?');
		$result1->execute(array($_POST["email"]));
		if ($result1->rowCount() == 1) { //check if there is one entry in the database
			session_start();
			$_SESSION["email"] = $_POST["email"];
			header("Location: updateProfile.php");
				#createSession(); //create a session with this user
		}else{
			createUser();//create a user with the form entries
			header("Location: form2.php");
		}
		$result1->closeCursor();
		
	}else{
		header("Location: form.php");
	}
?>