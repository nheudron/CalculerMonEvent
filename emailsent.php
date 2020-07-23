<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/png" href="/images/favicon.png" />
	<script src="https://kit.fontawesome.com/10a40eb87c.js" crossorigin="anonymous"></script>
	<title>Calculer mon Evenement</title>
</head>
<body>
	<?php 
		session_start();
		include("db_connexion.php");
		include("definePrices.php");

		$resultType = $db->prepare('SELECT * FROM event WHERE id = ?');
		$resultType->execute(array($_SESSION["event_id"]));
		$dataType = $resultType->fetch();
		$typeEvent = enleveaccents($dataType['type']);

		if($finalPriceLow ==  null){
			$warningMessage = enleveaccents('Veuillez cliquer sur le lien suivant pour recevoir une estimation budgétaire : <br /><a href="http://coach-evenements.alwaysdata.net/form3.php">Définir les besoins de son événements</a>');
		}else{
			$warningMessage = 'Estimation budg&eacute;taire pour votre '. $typeEvent.' accueillant '.$people.' personnes sur une dur&eacute;e de '.$duration.' jours.';
		}

		include("emailsendingProcess.php");

		if (isset($_SESSION["email"])){
	?>
	
	
	<header>
		<h1><a href="index.php">calculermonevenement.fr</a></h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement">
	</header>
	
	<div class="formUp">
		<section class="sticky">
			<div class="submitBackground">
				<div><i class="far fa-check-circle"></i>
					<p>vous</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-check-circle"></i>
					<p style="right: 21px;">événement</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-check-circle"></i>
					<p>forfait</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-check-circle"></i>
					<p style="right: 6px;">options</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-check-circle"></i>
					<p>fin</p>
				</div>
				<a href="emailsent.php" onClick="unhook()"><button>Renvoyer l'email</button></a>
			</div>
		</section>

		<main>
			<div class="home">
				<?php 
				$email = $_SESSION["email"];
				$name = $_SESSION["email"];

				echo 'animation bas : '.$animationPriceLow .' et haut : '.$animationPriceHigh.'<br>';
				echo 'technique bas : '.$technicPriceLow .' et haut : '.$technicPriceHigh.'<br>';
				echo 'logistique bas : '.$logisticLow .' et haut : '.$logisticHigh.'<br>';
				echo 'transport bas : '.$transportPriceLow .' et haut : '.$transportPriceHigh.'<br>';
				echo 'Hébergement bas : '.$accomodationPriceLow .' et haut : '.$accomodationPriceHigh.'<br>';
				echo 'final bas : '.$finalPriceLow .' et haut : '.$finalPriceHigh.'<br>';
	
				#sendingEmail($email, $name); ?>
				<h1>adresse de réception :<br><br>
				<?php echo $_SESSION["email"]; ?></h1>
			</div>
			<div class="submitBackgroundBackground"></div>
		</main>
	</div>
	<?php 
	}else{
		header("Location: form.php");
	}?>
</body>
</html>