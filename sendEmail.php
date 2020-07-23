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
<?php 
	include("db_connexion.php");
	session_start();
	if (isset($_SESSION["email"])){
	?>
	
	<header>
		<h1>calculermonevenement.fr</h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement">
	</header>
	
	<div class="formUp">
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
				<div> <i class="far fa-check-circle"></i>
					<p style="right: 6px;">options</p>
				</div>
				<i class="fas fa-long-arrow-alt-right"></i>
				<div> <i class="fas fa-circle"></i>
					<p>fin</p>
				</div>
			</div>
		</section>

		<main>
			<div class="home">
				<h1>L'estimation budgétaire sera envoyée à l'adresse : <br><br>
				<?php echo $_SESSION["email"]; ?></h1>
				<a href="emailsent.php" onClick="unhook()"><button>Envoyer l'email</button></a>
			</div>
		</main>
		</div>
	<?php 
	}else{
		header("Location: form.php");
	}?>
</body>
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
</html>