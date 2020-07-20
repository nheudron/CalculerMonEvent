<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="icon" type="image/png" href="/images/favicon.png" />
<title>Calculer mon Evenement</title>
</head>
	
<?php 
	session_start();
	include("db_connexion.php");
	include("definePrices.php");
	
	if($finalPriceLow ==  null){
		$finalPriceLow = 'Veuillez cliquer sur le lien suivant : <a href="http://coach-evenements.alwaysdata.net/form3.php">lien</a>';
	}
	
	include("emailsendingProcess.php");
	
	if (isset($_SESSION["email"])){
	?>
<body>	
	<header>
		<h1><a href="index.php">calculermonevenement.fr</a></h1>
		<h2>En moins de 5 minutes </h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement">
	</header>
	
	<main>
		<div class="home">
			<?php 
			$email = $_SESSION["email"];
			$name = $_SESSION["email"];
			
			sendingEmail($email, $name); ?>
			<h1>Un email vient de vous être envoyé à l'adresse<br><br>
			<?php echo $_SESSION["email"]; ?></h1>
			<a href="emailsent.php" onClick="unhook()"><button>Renvoyer l'email</button></a>
		</div>
	</main>
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