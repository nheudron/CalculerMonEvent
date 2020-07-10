<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<title>Calculer mon Evenement</title>
</head>
	
<?php include("db_connexion.php");
	session_start();
	?>
	
	<header>
		<h1>calculermonevenement.com</h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" class="imghead" alt="budget evenement">
	</header>
	
	<main>
		<form style="formColumn" method="post" action="form2Process.php">
			<label for="nom">Type d'événement</label><br><input type="text" name="name" id="nom"><br>
			<label for="prenom">Prénom</label><br><input type="text" name="surname" id="prenom"><br>
			<label for="entreprise">Société</label><br><input type="text" name="entreprise" id="entreprise"><br>
			<label for="entreprise">email</label><br><input type="email" name="email" id="email"><br>
			<label for="telephone">Téléphone</label><br><input type="tel" name="phone" id="telephone"><br>
			<input type="submit" value="Suivant"/>
		</form>
	</main>
	
<body>
</body>
</html>