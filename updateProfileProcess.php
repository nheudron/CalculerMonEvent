<?php

session_start();
include('db_connexion.php');
include('functions.php');
			$result5 = $db->prepare('UPDATE user SET name = :name, surname = :surname, company = :company, email = :email, phone = :phone WHERE id = :id');
			$result5->execute(array(
				'name'=>htmlspecialchars($_POST["name"]),
				'surname'=>htmlspecialchars($_POST["surname"]),
				'company'=>htmlspecialchars($_POST["company"]),
				'email'=>$_POST["email"],
				'phone'=>htmlspecialchars($_POST["phone"]),
				'id'=>$_SESSION["id"]
			));
			echo 'Les données ont été mises à jour.';

			createSession();
			header("Location: form2.php");
			$result5->closeCursor();

?>