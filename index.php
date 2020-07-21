<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="icon" type="image/png" href="/images/favicon.png" />
<title>Calculer mon Evenement</title>
<script src="https://kit.fontawesome.com/10a40eb87c.js" crossorigin="anonymous"></script>
</head>
	
<?php include("db_connexion.php")?>
<body>	
	<header>
		<h1>calculermonevenement.fr</h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="400px" class="imghead" alt="budget evenement">
	</header>
	
	<main>
		<div class="home">
			<h1>CALCULERMONEVENEMENT.FR vous permet de définir votre budget pour votre événement.</h1>
			<a href="form.php" onClick="unhook()"><button>calculer mon budget</button></a>
		</div>
	</main>
	
	<footer>
		<div><a href="cgu.php">Conditions générales d'utilisation</a></div>
		<div><a href="https://www.coach-evenements.com/">Coach-événements</a></div>
		<div></div>
	</footer>
</body>
</html>