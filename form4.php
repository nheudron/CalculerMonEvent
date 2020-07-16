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
	
	<?php include("db_connexion.php");
	session_start();
	if (isset($_SESSION["email"])){
		if(isset($_SESSION["event_id"])) {
	?>
<body>	
	<header>
		<h1><a href="index.php">calculermonevenement.fr</a></h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>
		<main class="form3">
			<center><h2>Vous avez choisi le forfait</h2></center>
			<div class='recall'>
				<header><h3>Demi-journée d'étude</h3></header>
				<main>
					<ul>
						<li>1 salle</li>
						<li>1 déjeuner</li>
						<li>2 pauses</li>
					</ul>
				</main>
				<span><label for="demijournee_detude">Quantité &nbsp;</label>3</span>
			</div>
			<div class="add"><h3>Ajouter une option <br><i class="fas fa-arrow-down"></i></h3></div>
			<form id="formOptionPackage" class="formType" method="post" action="form4Process.php">
				<main>
					<div>
						<header><h3>Animation</h3></header>
						<main>
							<span><input type="checkbox" name="conferencier" id="conferencier"><label for="conferencier"> &nbsp;Conférencier</label></span>
							<span><input type="checkbox" name="gala" id="gala"><label for="gala"> &nbsp;gala</label></span>
							<span><input type="checkbox" name="team_building" id="team_building"><label for="team_building"> &nbsp;gala</label></span>
						</main>
						<br>
					</div>
					<div>
						<header><h3>Besoins techniques</h3></header>
						<main>
							<span><input type="checkbox" name="video" id="video"><label for="video"> &nbsp;Vidéo projection</label></span>
							<span><input type="checkbox" name="sound" id="sound"><label for="sound"> &nbsp;Sonorisation/microphone</label></span>
							<span><input type="checkbox" name="light" id="light"><label for="light"> &nbsp;Lumières</label></span>
						</main>
						<br>
					</div>
					<div>
						<header><h3>Logistique</h3></header>
						<main>
							<span><input type="checkbox" name="home_agents" id="home_agents"><label for="home_agents"> &nbsp;Agents d'accueil</label></span>
							<span><input type="checkbox" name="security_agents" id="security_agents"><label for="security_agents"> &nbsp;Agents de sécurité</label></span>
							<span><input type="checkbox" name="light" id="light"><label for="light"> &nbsp;gala</label></span>
						</main>
						<br>
					</div>
					<div>
						<header><h3>Hébergement</h3></header>
						<p class="note">x nuit pour x personnes</p>
						<main>
							<span><input type="checkbox" name="single2" id="single2"><label for="single2"> &nbsp;Single(2)</label></span>
							<span><input type="checkbox" name="single3" id="single3"><label for="single3"> &nbsp;Single(3)</label></span>
							<span><input type="checkbox" name="single4" id="single4"><label for="single4"> &nbsp;Single(4)</label></span>
							<span><input type="checkbox" name="double2" id="double2"><label for="double2"> &nbsp;Double(2)</label></span>
							<span><input type="checkbox" name="double3" id="double3"><label for="double3"> &nbsp;Single(3)</label></span>
							<span><input type="checkbox" name="double4" id="double4"><label for="double4"> &nbsp;Single(4)</label></span>
						</main>
						<br>
					</div>
					<div>
						<header><h3>Transport</h3></header>
						<p class="note">pour x personnes</p>
						<main>
							<span><input type="checkbox" name="taxi" id="taxi"><label for="taxi"> &nbsp;Taxi</label></span>
							<span><input type="checkbox" name="bus" id="bus"><label for="bus"> &nbsp;Bus</label></span>
							<span><input type="checkbox" name="train" id="train"><label for="train"> &nbsp;Train</label></span>
							<span><input type="checkbox" name="plane" id="plane"><label for="plane"> &nbsp;Avion</label></span>
						</main>
						<br>
					</div>
				</main>
				<input type="submit" value="Suivant"/>
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
    window.addEventListener('beforeunload', function(e){ 
        e.preventDefault(); 
        e.returnValue = '';
    }); 
</script>
</body>
</html>