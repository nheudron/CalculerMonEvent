<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<title>Calculer mon Evenement</title>
</head>
	<body>
	<header>
		<h1><a href="index.php">calculermonevenement.com</a></h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" class="imghead" alt="budget evenement">
	</header>
	
	<main>
		<form id="formUser" style="formColumn" method="post" action="formProcess.php">
			<label for="nom">Nom</label><br><input type="text" name="name" id="nom"><br>
			<label for="prenom">Prénom</label><br><input type="text" name="surname" id="prenom"><br>
			<label for="entreprise">Société *</label><br><input type="text" name="company" id="entreprise"><br>
			<label for="entreprise">email *</label><br><input type="email" name="email" id="email"><br>
			<label for="telephone">Téléphone</label><br><input type="tel" name="phone" id="telephone"><br>
			<p>* champs obligatoires</p>
			<input type="submit" value="Suivant"/>
		</form>
	</main>
	
<script>

	
var check = {};
	
check['nom'] = function(id) {

    var name = document.getElementById(id);

    if (name.value.length >= 1) {
        name.className = 'correct';
        return true;
    }
	if (name.value.length == 0) {
        name.className = 'input';
        return true;
    }

};

check['prenom'] = function(id) {

    var name = document.getElementById(id);

    if (name.value.length >= 1) {
        name.className = 'correct';
        return true;
    }
	if (name.value.length == 0) {
        name.className = 'input';
        return true;
    }

};
	
check['entreprise'] = function(id) {

    var name = document.getElementById(id);

    if (name.value.length >= 1) {
        name.className = 'correct';
        return true;
    } else {
        name.className = 'incorrect';
        return false;
    }

};
	
check['email'] = function(id) {

    var name = document.getElementById(id);

    if (/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(name.value)) {
        name.className = 'correct';
        return true;
    } else {
        name.className = 'incorrect';
        return false;
    }

};
	check['telephone'] = function(id) {

    var name = document.getElementById(id);

    if (/^[0-9]{10}$/.test(name.value)) {
        name.className = 'correct';
        return true;
    }
	if (name.value.length == 0) {
        name.className = 'input';
        return true;
    }
	if (0 < name.value.length < 10) {
        name.className = 'incorrect';
        return false;
    }

};
	
	
// Mise en place des événements

(function() { 

    var myForm = document.getElementById('formUser'),
        inputs = document.querySelectorAll('input[type=text], input[type=email], input[type=tel]'),
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