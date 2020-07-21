<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="icon" type="image/png" href="/images/favicon.png" />
<title>Calculer mon Evenement</title>
<script LANGUAGE="JavaScript">
history.forward()
</script>
</head>
	
	<?php 
	include("db_connexion.php");
	include("functions.php");
	session_start();
	$duration = duration() + 1;
	
	if (isset($_SESSION["email"])){
		if(isset($_SESSION["event_id"])) {
	?>
<body>	
	<header>
		<h1>calculermonevenement.fr</h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>
	
	<main class="form3">

		<form id="formPackage" class="formType" method="post" action="form3Process.php">
			<h2>Forfaits les plus courants</h2>
			<p class="note">Durée de l'événement : <?php echo $duration ?> jour(s)</p>
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
					<br><br>
					<span><label for="journee_detude">Quantité &nbsp;</label><input type="number" name="journee_detude" id="journee_detude"></span>
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
					<br><br>
					<span><label for="demijournee_detude">Quantité &nbsp;</label><input type="number" name="demijournee_detude" id="demijournee_detude"></span>
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
					<span><label for="seminaire_residentiel">Quantité &nbsp;</label><input type="number" name="seminaire_residentiel" id="seminaire_residentiel"></span>
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
					<span><label for="seminaire_semiresidentiel">Quantité &nbsp;</label><input type="number" name="seminaire_semiresidentiel" id="seminaire_semiresidentiel"></span>
				</div>
			</main>
			<input type="submit" value="Suivant" onClick="unhook()"/>
			
			
		</form>
		<div class="without">
			<p>Pas de forfait</p>
			<a href="form5.php" onClick="unhook()"><button>Suivant</button></a>
		</div>
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
<script type="text/javascript">
  var hook=true;
  window.onbeforeunload = function() {
    if(hook){ 
      return "Did you save your stuff?" 
    }
  }
  function unhook() {
     hook=false;
  }
</script>
</body>
</html>