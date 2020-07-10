<?php
	$servername = "mysql-coach-evenements.alwaysdata.net";
	$username = "209980";
	$password = "Est25enz";
	$dbname = "coach-evenements_calculermonevenement";



	try {
		$db = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8',$username,$password);
	} catch (PDOException $e) {
		die('Error : '.$e->getMessage());
	}
?>