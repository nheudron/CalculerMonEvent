<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="icon" type="image/png" href="/images/favicon.png" />
	<script src="https://kit.fontawesome.com/10a40eb87c.js" crossorigin="anonymous"></script>
<title>Calculer mon Evenement</title>
<script LANGUAGE="JavaScript">
history.forward()
</script>
</head>
	
	<?php 
	include("db_connexion.php");
	include("functions.php");
	$people = people();
	$duration = duration() + 1;
	session_start();
	if (isset($_SESSION["email"])){
		if(isset($_SESSION["event_id"])) {
	
			$duree  = duration();
			$people = people();
	?>
<body>	
	<header>
		<h1>calculermonevenement.fr</h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>
		<main class="form5">
			
			<form id="formNoPackage" class="formType" method="post" action="form5Process.php">
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
							<p class="note">Nombre de personnes qui prendront un repas</p>
						</header>
						<main>
							<span><input type="number" name="lunch" id="lunch"><label for="lunch"> &nbsp;Déjeuner/jour</label></span>
							<span><input type="number" name="diner" id="diner"><label for="diner"> &nbsp;Dîner/jour</label></span>
							<span><input type="number" name="break" id="break"><label for="break"> &nbsp;Pause/jour</label></span>
						</main>
						<br>
					</div>
				</main>
				<section class="add"><h3>Ajouter une option <br><i class="fas fa-arrow-down"></i></h3></section>
				<main>
					<div>
						<header><h3>Animation</h3></header>
						<main>
							<span><input type="checkbox" name="conferencier" id="conferencier"><label for="conferencier"> &nbsp;Conférencier</label></span>
							<span><input type="checkbox" name="gala" id="gala"><label for="gala"> &nbsp;gala</label></span>
							<span><input type="checkbox" name="team_building" id="team_building"><label for="team_building"> &nbsp;team_building</label></span>
						</main>
						<br>
					</div>
					<div>
						<header><h3>Besoins techniques</h3></header>
						<main>
							<span><input type="checkbox" name="video" id="video"><label for="video"> &nbsp;Vidéo projection</label></span>
							<span><input type="checkbox" name="sound" id="sound"><label for="sound"> &nbsp;Sonorisation/Micro</label></span>
							<span><input type="checkbox" name="light" id="light"><label for="light"> &nbsp;Lumières</label></span>
						</main>
						<br>
					</div>
					<div>
						<header><h3>Logistique</h3></header>
						<main>
							<span><input type="checkbox" name="home_agents" id="home_agents"><label for="home_agents"> &nbsp;Agents d'accueil</label></span>
							<span><input type="checkbox" name="security_agents" id="security_agents"><label for="security_agents"> &nbsp;Agents de sécurité</label></span>
							<span><input type="checkbox" name="badges" id="badges"><label for="badges"> &nbsp;badges</label></span>
							<span><input type="checkbox" name="covid" id="covid"><label for="covid"> &nbsp;Procédure covid</label></span>
						</main>
						<br>
					</div>
					<div>
						<header><h3>Hébergement</h3></header>
						<p class="note"> <?php echo $duree ?> nuit pour <?php echo $people ?> personnes en<br>chambre d'hôtel B&B</p>
						<main>
							<span><input type="radio" name="accomodation" id="single2" value="single2"><label for="single2"> &nbsp;Single(2<i class="fas fa-star"></i>)</label></span>
							<span><input type="radio" name="accomodation" id="single3" value="single3"><label for="single3"> &nbsp;Single(3<i class="fas fa-star"></i>)</label></span>
							<span><input type="radio" name="accomodation" id="single4" value="single4"><label for="single4"> &nbsp;Single(4<i class="fas fa-star"></i>)</label></span>
							<span><input type="radio" name="accomodation" id="double2" value="double2"><label for="double2"> &nbsp;Double(2<i class="fas fa-star"></i>)</label></span>
							<span><input type="radio" name="accomodation" id="double3" value="double3"><label for="double3"> &nbsp;Single(3<i class="fas fa-star"></i>)</label></span>
							<span><input type="radio" name="accomodation" id="double4" value="double4"><label for="double4"> &nbsp;Single(4<i class="fas fa-star"></i>)</label></span>
						</main>
						<br>
					</div>
					<div>
						<header><h3>Transport</h3></header>
						<p class="note">pour <?php echo $people ?> personnes</p>
						<main>
							<span><input type="radio" name="transport" id="taxi" value="taxi"><label for="taxi"> &nbsp;Taxi</label></span>
							<span><input type="radio" name="transport" id="bus" value="bus"><label for="bus"> &nbsp;Bus</label></span>
							<span><input type="radio" name="transport" id="train" value="train"><label for="train"> &nbsp;Train</label></span>
							<span><input type="radio" name="transport" id="plane" value="plane"><label for="plane"> &nbsp;Avion</label></span>
						</main>
						<br>
					</div>
				</main>
				<input type="submit" value="Suivant" onClick="unhook()"/>
			</form>

	</main>
	
	<?php 
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