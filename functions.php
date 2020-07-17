<?php 

	function createUser(){
		global $db;
		
			$result2 = $db->prepare('INSERT INTO user(name, surname, company, email, phone) VALUES (:name, :surname, :company, :email, :phone)');
			$result2->execute(array(
				'name'=>htmlspecialchars($_POST["name"]),
				'surname'=>htmlspecialchars($_POST["surname"]),
				'company'=>htmlspecialchars($_POST["company"]),
				'email'=>$_POST["email"],
				'phone'=>htmlspecialchars($_POST["phone"])
			));
			echo 'Les données ont été ajoutées.';
			createSession();
			$result2->closeCursor();
	}

	function createSession(){
		session_start();
		global $db;
		$result3 = $db->prepare('SELECT * FROM user WHERE email = ? AND company = ?');
		$result3->execute(array($_POST["email"], $_POST["company"]));
		$data = $result3->fetch();
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["user_id"] = $data["id"];
		$result3->closeCursor();
	}
	function addOption(){
		
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
		if(empty($_POST["accomodation"]) || $_POST["accomodation"]="null"){
			$accomodation = null;
		}else{
			$accomodation = $_POST["accomodation"];
		}
		if(empty($_POST["transport"])  || $_POST["transport"]="null"){
			$transport = null;
		}else{
			$transport = $_POST["transport"];
		}

		$resultOptionPackage = $db->prepare('INSERT INTO logistics(event_id, home_agents, security_agents, badges, covid, accomodation, transport) VALUES (:event_id, :home_agents, :security_agents, :badges, :covid, :accomodation, :transport)');
		$resultOptionPackage->execute(array(
			'event_id'=>$_SESSION["event_id"],
			'home_agents'=>$home_agents,
			'security_agents'=>$security_agents,
			'badges'=>$badges,
			'covid'=>$covid,
			'accomodation'=>$accomodation,
			'transport'=>$transport
		));
		$resultOptionPackage->closeCursor();
	}
	
	function duration(){
		include("db_connexion.php");
		$result4 = $db->prepare('SELECT * FROM event WHERE id = ?');
		$result4->execute(array($_SESSION["event_id"]));
		$dataEvent = $result4->fetch(); 
		$start = strtotime($dataEvent["start"]);
		$end = strtotime($dataEvent["end"]);
		$duree  = abs($end - $start)/60/60/24;
		return $duree;
	}
	
	function people(){
		include("db_connexion.php");
		$result4 = $db->prepare('SELECT * FROM event WHERE id = ?');
		$result4->execute(array($_SESSION["event_id"]));
		$dataEvent = $result4->fetch(); 
		$adults = $dataEvent["adults"];
		$children = $dataEvent["children"];
		$people = $adults + $children;
		return $people;
	}
		
?>