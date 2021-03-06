<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/png" href="/images/favicon.png" />
	<script src="https://kit.fontawesome.com/10a40eb87c.js" crossorigin="anonymous"></script>
	<title>Calculer mon Evenement</title>
</head>
<body>
	<header>
		<h1><a href="index.php">calculermonevenement.fr</a></h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement">
	</header>
	
	<form id="formUser" class="formUp" method="post" action="formProcess.php">
		<section class="sticky">
			<div class="submitBackground">
				<div><i class="fas fa-circle"></i>
					<p>vous</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-circle"></i>
					<p style="right: 21px;">événement</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="far fa-circle"></i>
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
		
		<label for="entreprise">Société *</label>
		<br>
		<input type="text" name="company" id="entreprise" required class="compulsory">
		<br>
		<label for="email">email *</label>
		<br>
		<input type="email" name="email" id="email" required class="compulsory">
		<br>
		<label for="nom">Nom</label>
		<br>
		<input type="text" name="name" id="nom">
		<br>
		<label for="prenom">Prénom</label>
		<br>
		<input type="text" name="surname" id="prenom">
		<br>
		<label for="telephone">Téléphone</label>
		<br>
		<input type="tel" name="phone" id="telephone">
		<br>
		<p class="note">* champs obligatoires</p>
	</form>
	
	<div class="submitBackgroundBackground"></div>
	
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