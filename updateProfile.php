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
			
			$result4 = $db->prepare('SELECT * FROM user WHERE email = ?');
			$result4->execute(array($_SESSION["email"]));
			$dataProfile = $result4->fetch(); 
			?>
			<header>
				<h1>calculermonevenement.fr</h1>
				<h2>En moins de 5 minutes </h2>
				<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement">
			</header>
		
		<form id="formUser" class="formUp" method="post" action="updateProfileProcess.php">
			<section class="sticky">
				<div class="submitBackground">
					<div><i class="fas fa-circle"></i><p>vous</p></div>
						<i class="fas fa-long-arrow-alt-right"></i>
						<div> <i class="far fa-circle"></i><p style="right: 21px;">événement</p></div>
						<i class="fas fa-long-arrow-alt-right"></i>
						<div> <i class="far fa-circle"></i><p>forfait</p></div>
						<i class="fas fa-long-arrow-alt-right"></i>
						<div> <i class="far fa-circle"></i><p style="right: 6px;">options</p></div>
						<i class="fas fa-long-arrow-alt-right"></i>
						<div> <i class="far fa-circle"></i><p>fin</p></div>
					<input type="submit" value="Suivant" onClick="unhook()"/>
				</div>
			</section>
	
			<center><p> Vous disposez déjà d'un profile pour cette adresse email<br> 
				avec les informations ci-dessous : </p>
			<p class="note">Vous pouvez mettre à jour vos informations et cliquer sur suivant.</p></center>

			<label for="nom">Nom</label><br><input type="text" name="name" id="nom" value="<?php echo $dataProfile["name"];?>"><br>
			<label for="prenom">Prénom</label><br><input type="text" name="surname" id="prenom" value="<?php echo $dataProfile["surname"];?>"><br>
			<label for="entreprise">Société *</label><br><input type="text" name="company" id="entreprise" required value="<?php echo $dataProfile["company"];?>"><br>
			<label for="email">email *</label><br><input type="email" name="email" id="email" required value="<?php echo $dataProfile["email"];?>"><br>
			<label for="telephone">Téléphone</label><br><input type="tel" name="phone" id="telephone" value="<?php echo $dataProfile["phone"];?>"><br>
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $dataProfile[id]; ?>">
			<p class="note">* champs obligatoires</p>

		</form>

		<div class="submitBackgroundBackground"></div>
	<?php 
			session_destroy();
		}else{
		header("Location: form.php");
		}
	?>
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