<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<title>Calculer mon Evenement</title>
</head>
	
<?php include("db_connexion.php")?>
	
	<header>
		<h1>calculermonevenement.com</h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" class="imghead" alt="budget evenement">
	</header>
	
	<main>
		<form method="post" action="form2.php">
			<label for="nom">Nom</label><input type="text" name="nom" id="nom">
			<label for="prenom">Prénom</label><input type="text" name="prenom" id="prenom">
			<label for="entreprise">Société</label><input type="text" name="entreprise" id="entreprise">
			<label for="entreprise">email</label><input type="email" name="email" id="email">
			<label for="telephone">Téléphone</label><input type="tel" name="phone" id="telephone">
			<button><input type="submit" value="Suivant"/></button>
		</form>
	</main>
	
<body>
</body>
</html>