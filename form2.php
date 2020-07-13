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
		<h1><a href="#" id="title">calculermonevenement.com</a></h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>
	
	<main>
		<form id="formEvent" style="formColumn" method="post" action="form2Process.php">
			<h3>Dates</h3>
			<label for="du">du &nbsp;&nbsp;</label><input type="date" name="from" id="du" required>
			<label for="au">&nbsp;&nbsp;au&nbsp;&nbsp;</label><input type="date" name="to" id="au" required><br>
			<h3>Nombre de personnes</h3>
			<label for="adultes">Adultes &nbsp;&nbsp;</label><input type="number" name="adults" id="adultes" required>
			<label for="enfants">&nbsp;&nbsp;Enfants&nbsp;&nbsp;</label><input type="number" name="children" id="enfants"><br><br>
			<label for="lieu">Lieu</label><br>
			<select name="place" id="lieu">
				<option value="" disabled>Sélectionnez une option</option>
				<option value="Ile de France">Ile de France</option>
				<option value="Grandes Villes">Grandes Villes</option>
				<option value="Province">Province</option>
			</select><br><br>
			<label for="type">Type d'événement</label><br>
			<select name="type" id="type">
				<option value="" disabled>Sélectionnez une option</option>
				<option value="Séminaire">Séminaire</option>
				<option value="Gala">Gala</option>
				<option value="Gala">Conférence</option>
				<option value="Convention">Convention</option>
			</select><br><br>
			<input type="submit" value="Suivant"/>
		</form>
	</main>
	<?php 
	}else{
		header("Location: form.php");
	}?>
	
<script>
var check = {};
	
check['du'] = function(id) {
    var name = document.getElementById(id);
    if (/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}/) {
        name.className = 'correct';
        return true;
    }else{
        name.className = 'incorrect';
        return false;
    }
};

check['au'] = function(id) {
    var name = document.getElementById(id);
	if (/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}/) {
        name.className = 'correct';
        return true;
    }else{
        name.className = 'incorrect';
        return false;
    }
};
	
check['adultes'] = function(id) {

    var name = document.getElementById(id);

    if (name.value > 1) {
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

(function() { 

    var myForm = document.getElementById('formEvent'),
        inputs = document.querySelectorAll('input[type=date], input[type=number]'),
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
	
	/*var title = document.getElementById('title');
	
	title.addEventListener('click', function(e){
								if(confirm('Vous etes sur le point d\'abandonner l\'estimation budgétaire de votre événement')){
									e.preventDefault;
								}else{
									function RedirectionJavascript(){
  										document.location.href="index.php"; 
									}
								}
						   });*/
	
</script>
</body>
</html>