<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>Calculer mon Evenement</title>
</head>
	
	
	<header>
		<h1><a href="index.php">calculermonevenement.fr</a></h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" class="imghead" alt="budget evenement">
	</header>
	
	<main>
		<?php 
		include("db_connexion.php");
		
		
		
		$result = $db->prepare('SELECT * FROM user WHERE email = ?');
		$result->execute(array($_POST["email"]));
		if ($result->rowCount() > 0) { //check database
			$email = $_POST['email'];
		$db->exec('DELETE FROM user WHERE email="'.$email.'"');?>
			<center><p>Vos données ont été supprimées avec succès. </p></center>
		<?php
		}else{?>
			<center><p>Adresse email introuvable dans la base de données. <br><br>
			Vérifiez votre adresse email et réessayez <br><br> <button><a href="delAccount.php">Supprimer mes données</a></button></p></center>
		<?php
		}
		$result->closeCursor();?>

	</main>
	
<body>
</body>
</html>