<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/png" href="/images/favicon.png" />
		<script src="https://kit.fontawesome.com/10a40eb87c.js" crossorigin="anonymous"></script>
	<title>Calculer mon Evenement</title>
	<script LANGUAGE="JavaScript">
	history.forward()
	</script>
</head>
<body>		
	<?php 
	session_start();
	include("db_connexion.php");
	include("functions.php");
	$people = people();
	$duration = duration() + 1;
	addNoPackageToNull();
	if (isset($_SESSION["email"])){
		if(isset($_SESSION["event_id"])) {
			if(isset($_SESSION["package_id"])) {
	
				$duree  = duration();
				$people = people();
	?>

	<header>
		<h1>calculermonevenement.fr</h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>
	
	<form id="formNoPackage" class=" formUp" method="post" action="form5Process.php">
		
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
		<main>
			<div>
				<header><h3>Location de salle</h3></header>
				<p class="note">sur <?php echo $duration ?> jour(s)</p>
				<main>
					<span><label for="rooms">Nombre de salles &nbsp;</label><input type="number" name="rooms" id="rooms"></span>
				</main>
				<br>
			</div>
			<div>
				<header>
					<h3>Restauration</h3>
					<p class="note">Nombre de personnes qui prendront un repas (x <?php echo $duration ?> jour(s)) (<?php echo $people ?> personnes) </p>
				</header>
				<main>
					<span><input type="number" name="lunch" id="lunch"><label for="lunch"> &nbsp;Déjeuner/jour</label></span><br>
					<span><input type="number" name="diner" id="diner"><label for="diner"> &nbsp;Dîner/jour</label></span><br>
					<span><input type="number" name="break" id="break"><label for="break"> &nbsp;Pause/jour</label></span><br>
				</main>
				<br>
			</div>
		</main>
		<div class="formType">
			<main>
				<span class="wrapperBoxOptions">
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
				</span>
				<span class="wrapperBoxOptions">
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
				<span class="wrapperBoxOptions">
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
				</span>
			</main>
		</div>
	</form>
	<div class="submitBackgroundBackground"></div>
	
	<?php 
					}else{
					header("Location: form3.php");
				}	
			}else{
				header("Location: form2.php");
			}	
	}else{
		header("Location: form.php");
	}?>
	
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