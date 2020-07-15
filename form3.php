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
<body>	
	<header>
		<h1><a href="index.php">calculermonevenement.com</a></h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>
	
	<main class="form3">
		<h2>Forfaits les plus courants</h2>
		<form id="formForfait" method="post" action="form3Process.php">
			<main>
				<div>
					<header><h3>Journée d'étude</h3></header>
					<main>
						<ul>
							<li>1 salle</li>
							<li>1 déjeuner</li>
							<li>2 pauses</li>
						</ul>
					</main>
					<br>
					<span><label for="q1">Quantité &nbsp;</label><input type="number" name="q1" id="q1"></span>
				</div>
				<div>
					<header><h3>Demi-journée d'étude</h3></header>
					<main>
						<ul>
							<li>1 salle</li>
							<li>1 déjeuner</li>
							<li>2 pauses</li>
						</ul>
					</main>
					<span><label for="q2">Quantité &nbsp;</label><input type="number" name="q2" id="q2"></span>
				</div>
				<div>
					<header><h3>Séminaire résidentiel</h3></header>
					<main>
						<ul>
							<li>1 salle</li>
							<li>1 repas</li>
							<li>2 pauses</li>
							<li>1 chambre B&B</li>
						</ul>
					</main>
					<span><label for="q3">Quantité &nbsp;</label><input type="number" name="q3" id="q3"></span>
				</div>
				<div>
					<header><h3>Séminaire semi-résidentiel</h3></header>
					<main>
						<ul>
							<li>1 salle</li>
							<li>1 déjeuner</li>
							<li>1 diner</li>
							<li>2 pauses</li>
							<li>1 chambre B&B</li>
						</ul>
					</main>
					<span><label for="q4">Quantité &nbsp;</label><input type="number" name="q4" id="q4"></span>
				</div>
			</main>
			<input type="submit" value="Suivant"/>
		</form>
		
		<div class="without">
			<p>Pas de forfait</p>
			<a href=""><button>Suivant</button></a>
		</div>
		
	</main>
	
	<?php 
	}else{
		header("Location: form.php");
	}?>

</body>
</html>