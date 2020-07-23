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
	session_start();
	include("db_connexion.php");
	
	if (isset($_SESSION["email"])){
	?>
	
	<header>
		<h1>calculermonevenement.fr</h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>
	
	<form id="formEvent" class="formUp" method="post" action="form2Process.php">
		<section class="sticky">
			<div class="submitBackground">
				<div><i class="far fa-check-circle"></i><p>vous</p></div>
					<i class="fas fa-long-arrow-alt-right"></i>
					<div> <i class="fas fa-circle"></i><p style="right: 21px;">événement</p></div>
					<i class="fas fa-long-arrow-alt-right"></i>
					<div> <i class="far fa-circle"></i><p>forfait</p></div>
					<i class="fas fa-long-arrow-alt-right"></i>
					<div> <i class="far fa-circle"></i><p style="right: 6px;">options</p></div>
					<i class="fas fa-long-arrow-alt-right"></i>
					<div> <i class="far fa-circle"></i><p>fin</p></div>
				<input id="button" type="submit" value="Suivant" onClick="unhook()"/>
			</div>
		</section>
		
		<h3>Dates</h3>
		<label for="du" >du &nbsp;&nbsp;</label><input type="date" name="from" id="du" required class="compulsory" >
		<script> $.datepicker.setDefaults($.datepicker.regional['fr']);</script>
		<label for="au">&nbsp;&nbsp;au&nbsp;&nbsp;</label><input type="date" name="to" id="au" required class="compulsory"><br>
		<h3>Nombre de personnes</h3>
		<label for="adultes">Adultes &nbsp;&nbsp;</label><input type="number" name="adults" id="adultes" required class="compulsory">
		<label for="enfants">&nbsp;&nbsp;Enfants&nbsp;&nbsp;</label><input type="number" name="children" id="enfants"><br><br>
		<label for="lieu">Lieu</label><br>
		<select name="place" id="lieu" required class="compulsory">
			<option value="" disabled selected="selected">Sélectionnez une option</option>
			<option value="Ile de France">Ile de France</option>
			<option value="Grandes Villes">Grandes Villes</option>
			<option value="Province">Province</option>
		</select><br><br>
		<label for="type">Type d'événement</label><br>
		<select name="type" id="type" required class="compulsory">
			<option value="" disabled selected="selected" >Sélectionnez une option</option>
			<option value="Séminaire">Séminaire</option>
			<option value="Gala">Gala</option>
			<option value="Gala">Conférence</option>
			<option value="Convention">Convention</option>
		</select><br><br>
	</form>
	
	<div class="submitBackgroundBackground"></div>
	
	<?php 
	}else{
		header("Location: form.php");
	}?>
	
<script>
var check = {};
	
check['du'] = function(id) {
    var name = document.getElementById(id);
    if (/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/){
		name.className = 'correct';
        return true;
    }else{
		name.className = 'incorrect';
        return false;
	}
};

check['au'] = function(id) {
    var name = document.getElementById(id);
    if (name.value != "0000-00-00") {
        name.className = 'correct';
        return true;
    }
};
	
check['adultes'] = function(id) {

    var name = document.getElementById(id);

    if (name.value >= 1) {
        name.className = 'correct';
        return true;
    } else {
        name.className = 'incorrect';
        return false;
    }
};
	
check['enfants'] = function(id) {
	var name = document.getElementById(id);

    if (name.value >= 1) {
        name.className = 'correct';
        return true;
    } else {
        name.className = 'input';
        return true;
    }
};

check['lieu'] = function(id) {
	var name = document.getElementById(id);

    if (isset(name.value)) {
        name.className = 'correct';
        return true;
    } else {
        name.className = 'input';
        return true;
    }
};
check['type'] = function(id) {
	var name = document.getElementById(id);

    if (isset(name.value)) {
        name.className = 'correct';
        return true;
    } else {
        name.className = 'input';
        return true;
    }
};

(function() { 

    var myForm = document.getElementById('formEvent'),
        inputs = document.querySelectorAll('input[type=date], input[type=number], select'),
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