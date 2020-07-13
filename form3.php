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
		<h1><a href="index.php">calculermonevenement.com</a></h1>
		<h2>En moins de 5 minutes</h2>
		<img src="images/Comment-est-calculé-le-rendement-des-livrets-réglementés copie.jpg" height="300px" class="imghead" alt="budget evenement" >
	</header>
	
	<main>
		<form id="formForfait" method="post" action="form3Process.php">
			
			<input type="submit" value="Suivant"/>
		</form>
	</main>
	<?php 
	}else{
		header("Location: form.php");
	}?>

</body>
</html>