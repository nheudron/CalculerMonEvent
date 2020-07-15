<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="icon" type="image/png" href="/images/favicon.png" />
<title>Calculer mon Evenement</title>
</head>
	
<?php 
	include("db_connexion.php");
	session_start();
	?>
	
	<header>
		<h1>calculermonevenement.com</h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement">
	</header>
	
	<main>
		<div class="home">
			<h1>L'estimation budgétaire sera envoyée à l'adresse : <br><br>
			<?php echo $_SESSION["email"]; ?></h1>
			<a href="form.php"><button>Envoyer l'email</button></a>
		</div>
	</main>

<body>
</body>
</html>