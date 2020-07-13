<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="icon" type="image/png" href="/images/favicon.png" />
<title>Calculer mon Evenement</title>
</head>
	
	<?php include("db_connexion.php");
	session_start();
	if (isset($_SESSION["email"])){
	?>
	
	<header>
		<h1><a href="index.php">calculermonevenement.com</a></h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" class="imghead" alt="budget evenement">
	</header>
	
	<main>
		<form style="formColumn" method="post" action="form2Process.php">
			<h3>Dates</h3>
			<label for="du">du &nbsp;&nbsp;</label><input type="date" name="from" id="du"><label for="au">&nbsp;&nbsp;au&nbsp;&nbsp;</label><input type="date" name="to" id="au"><br>
			<h3>Nombre de personnes</h3>
			<label for="adultes">Adultes &nbsp;&nbsp;</label><input type="int" name="adults" id="adultes"><label for="enfants">&nbsp;&nbsp;Enfants&nbsp;&nbsp;</label><input type="int" name="children" id="enfants"><br><br>
			<label for="lieu">Lieu</label><br>
			<select name="place" id="lieu">
				<option value="choix1">Ile de France</option>
				<option value="choix2">Grandes Villes</option>
				<option value="choix3">Province</option>
			</select><br><br>
			<label for="type">Type d'événement</label><br>
			<select name="place" id="type">
				<option value="choix1">Séminaire</option>
				<option value="choix2">Gala</option>
				<option value="choix3">Conférence</option>
				<option value="choix3">Convention</option>
			</select><br><br>
			<input type="submit" value="Suivant"/>
		</form>
	</main>
	<?php 
	}else{
		header("Location: form.php");
	}?>
<body>
</body>
</html>