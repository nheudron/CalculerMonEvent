<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/png" href="/images/favicon.png" />
	<script src="https://kit.fontawesome.com/10a40eb87c.js" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<title>Calculer mon Evenement</title>
	<script LANGUAGE="JavaScript">
	history.forward()
	</script>
</head>
<body>
	<?php
	include( "db_connexion.php" );
	include( "functions.php" );
	session_start();

	#recallPackage();

	if ( isset( $_SESSION[ "email" ] ) ) {
		if ( isset( $_SESSION[ "event_id" ] ) ) {

			$night = duration();
			$people = people();

			if ( $night == 0 ) {
				$night = 1;
			}
		?>

	<header>
		<h1>calculermonevenement.fr</h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>

	<form id="formOptionPackage" class="formUp" method="post" action="form4Process.php">
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
				<div> <i class="fas fa-circle"></i>
					<p style="right: 6px;">options</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-circle"></i>
					<p>fin</p>
				</div>
				<input id="button" type="submit" value="Suivant" onClick="unhook()" for="formOptionPackage"/>
			</div>
		</section>
		
		<h2>Vous avez choisi</h2>

		<div class='recall'>
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
					<input type="number" name="journee_detude" id="journee_detude" value=0 disabled>
				</span>
			</div>
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
					<input type="number" name="demijournee_detude" id="demijournee_detude" min=0 value=0 disabled>
				</span> 
			</div>
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
					<input type="number" name="seminaire_residentiel" id="seminaire_residentiel" min=0 value=0 disabled>
				</span> 
			</div>
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
					<input type="number" name="seminaire_semiresidentiel" id="seminaire_semiresidentiel" min=0 value=0 disabled>
				</span> 
			</div>
		</div>
		
		<div id="scrollUp" class="add">
			<h3>Ajouter une option <br>
			<a href="#formOptionPackage"><i class="fas fa-arrow-down"></i></h3></a>
		</div>
		
		<div class="formType">
			<main> <span>
				<div>
					<header>
						<h3>Animation</h3>
						<p class="note">Spécifiez le nombre d'animateurs.</p>
					</header>
					<main> <span>
						<input type="number" name="conferencier" id="conferencier">
						<label for="conferencier"> &nbsp;Conférencier</label>
						</span> <span>
						<input type="number" name="gala" id="gala">
						<label for="gala"> &nbsp;gala</label>
						</span> <span>
						<input type="number" name="team_building" id="team_building">
						<label for="team_building"> &nbsp;team_building</label>
						</span> </main>
					<br>
				</div>
				<div>
					<header>
						<h3>Besoins techniques</h3>
					</header>
					<main> <span>
						<input type="checkbox" name="video" id="video">
						<label for="video"> &nbsp;Vidéo projection</label>
						</span> <span>
						<input type="checkbox" name="sound" id="sound">
						<label for="sound"> &nbsp;Sonorisation/Micro</label>
						</span> <span>
						<input type="checkbox" name="light" id="light">
						<label for="light"> &nbsp;Lumières</label>
						</span> </main>
					<br>
				</div>
				</span> <span>
				<div>
					<header>
						<h3>Logistique</h3>
					</header>
					<main> <span>
						<input type="checkbox" name="home_agents" id="home_agents">
						<label for="home_agents"> &nbsp;Agents d'accueil</label>
						</span> <span>
						<input type="checkbox" name="security_agents" id="security_agents">
						<label for="security_agents"> &nbsp;Agents de sécurité</label>
						</span> <span>
						<input type="checkbox" name="badges" id="badges">
						<label for="badges"> &nbsp;badges</label>
						</span> <span>
						<input type="checkbox" name="covid" id="covid">
						<label for="covid"> &nbsp;Procédure covid</label>
						</span> </main>
					<br>
				</div>
				<div>
					<header>
						<h3>Transport</h3>
					</header>
					<p class="note">Définissez le nombre d'allers-retours pour <?php echo $people ?> personnes.</p>
					<main> 
						<span>
						<input type="number" name="taxi" id="taxi" value="taxi">
						<label for="taxi"> &nbsp;Taxi</label>
						</span> <span>
						<input type="number" name="bus" id="bus" value="bus">
						<label for="bus"> &nbsp;Bus</label>
						</span> <span>
						<input type="number" name="train" id="train" value="train">
						<label for="train"> &nbsp;Train</label>
						</span> <span>
						<input type="number" name="plane" id="plane" value="plane">
						<label for="plane"> &nbsp;Avion</label>
						</span> <span>
						<input type="number" name="covoit" id="covoit" value="covoit">
						<label for="covoit"> &nbsp;Co-voiturage</label>
						</span> <span>
						<input type="number" name="perso" id="perso" value="perso">
						<label for="perso"> &nbsp;Moyen personnel</label>
						</span> 
					</main>
				</div>
				</span>
				<div>
					<header>
						<h3>Hébergement</h3>
					</header>
					<p class="note"> Indiquer le nombre de personnes à héberger pour <?php echo $night ?> nuit(s) en<br>
						chambre d'hôtel B&B</p>
					<main> <span>
						<input type="number" id="single2" name="single2">
						<label for="single2"> &nbsp;Single (2<i class="fas fa-star"></i>)</label>
						</span> <span>
						<input type="number" id="single3" name="single3">
						<label for="single3"> &nbsp;Single (3<i class="fas fa-star"></i>)</label>
						</span> <span>
						<input type="number" id="single4" name="single4">
						<label for="single4"> &nbsp;Single (4<i class="fas fa-star"></i>)</label>
						</span> <span>
						<input type="number" id="double2" name="double2">
						<label for="double2"> &nbsp;Double (2<i class="fas fa-star"></i>)</label>
						</span> <span>
						<input type="number" id="double3" name="double3">
						<label for="double3"> &nbsp;Single (3<i class="fas fa-star"></i>)</label>
						</span> <span>
						<input type="number" id="double4" name="double4">
						<label for="double4"> &nbsp;Single (4<i class="fas fa-star"></i>)</label>
						</span> <span>
						<input type="number" id="none" value=null>
						<label for="none"> &nbsp;Aucun</label>
						</span> </main>
					<p class="note"> Le total doit être égal à <?php echo $people ?>, sinon, vous ne prévoyez pas de logement pour certaines personnes. </p>
				</div>
			</main>
		</div>
	</form>
	<div class="submitBackgroundBackground"></div>
	
<?php
} else {
	header( "Location: form2.php" );
}
} else {
	header( "Location: form.php" );
}
?>
<script type="text/javascript">
  var hook=true;
  window.onbeforeunload = function() {
    if (hook) { 
      return "Did you save your stuff?" 
    }
  }
  function unhook() {
     hook=false;
  }
</script> 
</body>
</html>