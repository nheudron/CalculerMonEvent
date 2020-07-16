<?php 

	include("db_connexion.php");
	session_start();

	if(isset($_SESSION["email"])) {
		if(isset($_SESSION["event_id"])) {
			addOptionPackage();
			header("Location: sendEmail.php");
		}else{
			header("Location: form2.php");
		}	
	}else{
		header("Location: form.php");
	}

	function addOptionPackage(){
		
		if(empty($_POST["conferencier"])){
			$conferencier = 0;
		}else{
			$conferencier = 1;
		}
		if(empty($_POST["gala"])){
			$gala = 0;
		}else{
			$gala = 1;
		}
		if(empty($_POST["team_building"])){
			$team_building = 0;
		}else{
			$team_building = 1;
		}
		
		global $db;
		
		$resultOptionPackage = $db->prepare('INSERT INTO animation(event_id, conferencier, gala, team_building) VALUES (:event_id, :conferencier, :gala, :team_building)');
		$resultOptionPackage->execute(array(
			'event_id'=>$_SESSION["event_id"],
			'conferencier'=>$conferencier,
			'gala'=>$gala,
			'team_building'=>$team_building
		));
		$resultOptionPackage->closeCursor();
		
		if(empty($_POST["video"])){
			$video = 0;
		}else{
			$video = 1;
		}
		if(empty($_POST["sound"])){
			$sound = 0;
		}else{
			$sound = 1;
		}
		if(empty($_POST["light"])){
			$light = 0;
		}else{
			$light = 1;
		}
		
		$resultOptionPackage = $db->prepare('INSERT INTO technical(event_id, video, sound, light) VALUES (:event_id, :video, :sound, :light)');
		$resultOptionPackage->execute(array(
			'event_id'=>$_SESSION["event_id"],
			'video'=>$video,
			'sound'=>$sound,
			'light'=>$light
		));
		$resultOptionPackage->closeCursor();
		
		if(empty($_POST["home_agents"])){
			$home_agents = 0;
		}else{
			$home_agents = 1;
		}
		if(empty($_POST["security_agents"])){
			$security_agents = 0;
		}else{
			$security_agents = 1;
		}
		if(empty($_POST["badges"])){
			$badges = 0;
		}else{
			$badges = 1;
		}
		if(empty($_POST["covid"])){
			$covid = 0;
		}else{
			$covid = 1;
		}
		
		$resultOptionPackage = $db->prepare('INSERT INTO logistics(event_id, home_agents, security_agents, badges, covid, accomodation, transport) VALUES (:event_id, :home_agents, :security_agents, :badges, :covid, :accomodation, :transport)');
		$resultOptionPackage->execute(array(
			'event_id'=>$_SESSION["event_id"],
			'home_agents'=>$home_agents,
			'security_agents'=>$security_agents,
			'badges'=>$badges,
			'covid'=>$covid,
			'accomodation'=>$_POST["accomodation"],
			'transport'=>$_POST["transport"],
		));
		$resultOptionPackage->closeCursor();
	}
?>