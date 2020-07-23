<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/png" href="/images/favicon.png" />
	<title>Calculer mon Evenement</title>
	<script src="https://kit.fontawesome.com/10a40eb87c.js" crossorigin="anonymous"></script>
	<script LANGUAGE="JavaScript">
	history.forward()
	</script>
</head>
<body>
	<?php
	include( "db_connexion.php" );
	include( "functions.php" );
	session_start();
	$duration = duration() + 1;

	if ( isset( $_SESSION[ "email" ] ) ) {
		if ( isset( $_SESSION[ "event_id" ] ) ) {
			?>

	<header>
		<h1>calculermonevenement.fr</h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" > 
	</header>
	
	<form id="formPackage" class="formUp" method="post" action="form3Process.php">
		<section class="sticky">
			<div class="submitBackground">
				<div><i class="far fa-check-circle"></i><p>vous</p></div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-check-circle"></i>
					<p style="right: 21px;">événement</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="fas fa-circle"></i>
					<p>forfait</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-circle"></i>
					<p style="right: 6px;">options</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-circle"></i>
					<p>fin</p>
				</div>
				<input type="submit" value="Suivant" onClick="unhook()"/>
			</div>
		</section>
		
		<div class="formType">
			<h2>Forfaits les plus courants</h2>

			<p class="note">Durée de l'événement : <?php echo $duration ?> jour(s)</p>
			<p id="textAlert" style="color:red"></p>
			<main>
				<div>
					<header>
						<h3>1 Journée d'étude</h3>
					</header>
					<main>
						<ul>
							<li>1 salle</li>
							<li>1 déjeuner</li>
							<li>2 pauses</li>
						</ul>
					</main>
					<br>
					<br>
					<span>
					<label for="journee_detude">Quantité &nbsp;</label>
					<input type="number" name="journee_detude" id="journee_detude" value=0>
					</span> </div>
				<div>
					<header>
						<h3> 1/2 journée d'étude</h3>
					</header>
					<main>
						<ul>
							<li>1 salle</li>
							<li>1 déjeuner</li>
							<li>2 pauses</li>
						</ul>
					</main>
					<br>
					<br>
					<span>
					<label for="demijournee_detude">Quantité &nbsp;</label>
					<input type="number" name="demijournee_detude" id="demijournee_detude" min=0 value=0>
					</span> </div>
				<div>
					<header>
						<h3>Séminaire résidentiel</h3>
					</header>
					<main>
						<ul>
							<li>1 journée</li>
							<li>1 nuit</li>
							<li>1 salle</li>
							<li>1 repas</li>
							<li>2 pauses</li>
							<li>1 chambre B&B</li>
						</ul>
					</main>
					<span>
					<label for="seminaire_residentiel">Quantité &nbsp;</label>
					<input type="number" name="seminaire_residentiel" id="seminaire_residentiel" min=0 value=0>
					</span> </div>
				<div>
					<header>
						<h3>Séminaire semi-résidentiel</h3>
					</header>
					<main>
						<ul>
							<li>1 journée</li>
							<li>1 salle</li>
							<li>1 déjeuner + 1 diner</li>
							<li>2 pauses</li>
							<li>1 chambre B&B</li>
						</ul>
					</main>
					<span>
					<label for="seminaire_semiresidentiel">Quantité &nbsp;</label>
					<input type="number" name="seminaire_semiresidentiel" id="seminaire_semiresidentiel" min=0 value=0>
					</span> </div>
			</main>
		</div><p class="note">Les forfaits ne vous conviennent pas ?<br>Sélectionnez : </p>
	</form>
		
		<div class="without">
			<p>Pas de forfait</p>
			<a href="form5.php" onClick="unhook()">
			<button>Suivant</button>
			</a> </div>
	
	<div class="submitBackgroundBackground"></div>
	
	<?php
	} else {
		header( "Location: form2.php" );
	}
	} else {
		header( "Location: form.php" );
	}
	?>
<script>
(function() {
	
    var myForm = document.getElementById('formPackage'),
		textAlert = document.getElementById('textAlert');
	
    
	
    myForm.addEventListener('submit', function(e) {
			var sum = incrementer();
			var result = true;
			console.log(sum);
			if(sum == <?php echo $duration; ?>){
				var result = true;
			 }else{
			   var result = false;
			   textAlert.innerHTML = "Vous devez entrer des valeurs correspondant à la durée de votre événement. <br> Sinon, sélectionnez 'Pas de forfait'";
			   }

			if (result) {
					
			}else{
				e.preventDefault();
			}
    });
})();
	
	
	function incrementer(){
			demijournee_detudeJS = document.getElementById('demijournee_detude'),
		journee_detudeJS = document.getElementById('journee_detude'),
		seminaire_residentielJS = document.getElementById('seminaire_residentiel'),
		seminaire_semiresidentielJS = document.getElementById('seminaire_semiresidentiel');
		
			if(typeof(demijournee_detudeJS) != 0){
				var demijournee_detudeJS = parseInt(demijournee_detudeJS.value)/2;
			}
			if(typeof(journee_detudeJS) != 0){
				var journee_detudeJS = parseInt(journee_detudeJS.value);
			}
			if(typeof(seminaire_residentielJS) != 0){
				var seminaire_residentielJS = parseInt(seminaire_residentielJS.value);
			}
			if(typeof(seminaire_semiresidentielJS) != 0){
				var seminaire_semiresidentielJS = parseInt(seminaire_semiresidentielJS.value)/2;
			}
		
			var sum = demijournee_detudeJS + journee_detudeJS + seminaire_residentielJS + seminaire_semiresidentielJS;
     
     		setTimeout(incrementer,200);
		
			return sum;
	}
</script> 
</body>
</html>