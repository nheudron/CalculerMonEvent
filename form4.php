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
		if(isset($_SESSION["event_id"])) {
	?>
<body>	
	<header>
		<h1><a href="index.php">calculermonevenement.fr</a></h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>
	
	<main class="form3">
		<h2>Vous avez choisi le forfait</h2>
		
		<div>
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
		
		<form id="formOptionPackage" method="post" action="form4Process.php">
				<div>
					<header><h3>Animation</h3></header>
					<main>
						<input type="checkbox" name="conferencier" id="conferencier"><label for="conferencier"> &nbsp;Conférencier</label>
						<input type="checkbox" name="gala" id="gala"><label for="gala"> &nbsp;gala</label>
						<input type="checkbox" name="team_building" id="team_building"><label for="team_building"> &nbsp;gala</label>
					</main>
					<br>
				</div>
				<div>
					<header><h3>Besoins techniques</h3></header>
					<main>
						<input type="checkbox" name="video" id="video"><label for="video"> &nbsp;Vidéo projection</label>
						<input type="checkbox" name="sound" id="sound"><label for="sound"> &nbsp;Sonorisation/microphone</label>
						<input type="checkbox" name="light" id="light"><label for="light"> &nbsp;Lumières</label>
					</main>
					<br>
				</div>
				<div>
					<header><h3>Logistique</h3></header>
					<main>
						<input type="checkbox" name="home_agents" id="home_agents"><label for="home_agents"> &nbsp;Agents d'accueil</label>
						<input type="checkbox" name="security_agents" id="security_agents"><label for="security_agents"> &nbsp;Agents de sécurité</label>
						<input type="checkbox" name="light" id="light"><label for="light"> &nbsp;gala</label>
					</main>
					<br>
				</div>
				<div>
					<header><h3>Hébergement</h3></header>
					<p class="note">x nuit pour x personnes</p>
					<main>
						<input type="checkbox" name="single2" id="single2"><label for="single2"> &nbsp;Single(2)</label>
						<input type="checkbox" name="single3" id="single3"><label for="single3"> &nbsp;Single(3)</label>
						<input type="checkbox" name="single4" id="single4"><label for="single4"> &nbsp;Single(4)</label>
						<input type="checkbox" name="double2" id="double2"><label for="double2"> &nbsp;Double(2)</label>
						<input type="checkbox" name="double3" id="double3"><label for="double3"> &nbsp;Single(3)</label>
						<input type="checkbox" name="double4" id="double4"><label for="double4"> &nbsp;Single(4)</label>
					</main>
					<br>
				</div>
				<div>
					<header><h3>Transport</h3></header>
					<p class="note">pour x personnes</p>
					<main>
						<input type="checkbox" name="taxi" id="taxi"><label for="taxi"> &nbsp;Taxi</label>
						<input type="checkbox" name="bus" id="bus"><label for="bus"> &nbsp;Bus</label>
						<input type="checkbox" name="train" id="train"><label for="train"> &nbsp;Train</label>
						<input type="checkbox" name="plane" id="plane"><label for="plane"> &nbsp;Avion</label>
					</main>
					<br>
				</div>
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
<script>
var check = {};
	
check['journee_detude'] = function(id) {
    var name = document.getElementById(id);
	if (name.value%2 == 0) {
        name.className = 'correct';
        return true;
    }else{
        name.className = 'incorrect';
        return false;
    }
};

check['demijournee_detude'] = function(id) {
    var name = document.getElementById(id);
	if (name.value%2 == 0) {
        name.className = 'correct';
        return true;
    }else{
        name.className = 'incorrect';
        return false;
    }
};
	
check['seminaire_residentiel'] = function(id) {

    var name = document.getElementById(id);
	if (name.value%2 == 0) {
        name.className = 'correct';
        return true;
    }else{
        name.className = 'incorrect';
        return false;
};
	
check['seminaire_semiresidentiel'] = function(id) {
	var name = document.getElementById(id);
	if (name.value%2 == 0) {
        name.className = 'correct';
        return true;
    }else{
        name.className = 'incorrect';
        return false;
};

(function() { 

    var myForm = document.getElementById('formPackage'),
        inputs = document.querySelectorAll('input[type=number]'),
        inputsLength = inputs.length;

    for (var i = 0; i < inputsLength; i++) {
        inputs[i].addEventListener('keyup', function(e) {
            check[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
        });
    }

    myForm.addEventListener('submit', function(e) {

        var result = true;

        for (var i in check) {
            result = check[i](i) && result;
        }

        if (result) {
            
        }else{
			e.preventDefault();
		}
    });
})();
	
</script>
</body>
</html>