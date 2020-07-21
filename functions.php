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
	
		if(empty($_POST["transport"])  || $_POST["transport"]=="null"){
			$transport = null;
		}else{
			$transport = $_POST["transport"];
		}

		$resultOptionPackage = $db->prepare('INSERT INTO logistics(event_id, home_agents, security_agents, badges, covid, transport) VALUES (:event_id, :home_agents, :security_agents, :badges, :covid, :transport)');
		$resultOptionPackage->execute(array(
			'event_id'=>$_SESSION["event_id"],
			'home_agents'=>$home_agents,
			'security_agents'=>$security_agents,
			'badges'=>$badges,
			'covid'=>$covid,
			'transport'=>$transport
		));
		$resultOptionPackage->closeCursor();
		
		if(empty($_POST["single2"])){
			$single2 = 0;
		}else{
			$single2 = $_POST["single2"];
		}
		if(empty($_POST["single3"])){
			$single3 = 0;
		}else{
			$single3 = $_POST["single3"];
		}
		if(empty($_POST["single24"])){
			$single4 = 0;
		}else{
			$single24 = $_POST["single24"];
		}
		if(empty($_POST["double2"])){
			$double2 = 0;
		}else{
			$double2 = $_POST["double2"];
		}
		if(empty($_POST["double3"])){
			$double3 = 0;
		}else{
			$double3 = $_POST["double3"];
		}
		if(empty($_POST["double4"])){
			$double4 = 0;
		}else{
			$double4 = $_POST["double4"];
		}
		
		$resultAccomodation = $db->prepare('INSERT INTO accomodation(event_id, double4, double3, double2, single4, single3, single2) VALUES (:event_id, :double4, :double3, :double2, :single4, :single3, :single2)');
		$resultAccomodation->execute(array(
			'event_id'=>$_SESSION["event_id"],
			'double4'=>$double4,
			'double3'=>$double3,
			'double2'=>$double2,
			'single4'=>$single4,
			'single3'=>$single3,
			'single2'=>$single2
			
		));
		$resultAccomodation->closeCursor();
		
	}
	
	function duration(){
		include("db_connexion.php");
		$resultDuration = $db->prepare('SELECT * FROM event WHERE id = ?');
		$resultDuration->execute(array($_SESSION["event_id"]));
		$dataEventDuration = $resultDuration->fetch(); 
		$start = strtotime($dataEventDuration["start"]);
		$end = strtotime($dataEventDuration["end"]);
		$Duration  = abs($end - $start)/60/60/24;
		return $Duration;
	}
	
	function people(){
		include("db_connexion.php");
		$resultPeople = $db->prepare('SELECT * FROM event WHERE id = ?');
		$resultPeople->execute(array($_SESSION["event_id"]));
		$dataEventPeople = $resultPeople->fetch(); 
		$adults = $dataEventPeople["adults"];
		$children = $dataEventPeople["children"];
		$people = $adults + $children;
		return $people;
	}

	function addNoPckageToNull(){
		global $db;
			$addNoPckageToNull = $db->prepare('INSERT INTO package(journee_detude, demijournee_detude, seminaire_residentiel, seminaire_semiresidentiel, event_id, no_package) VALUES (:journee_detude, :demijournee_detude, :seminaire_residentiel, :seminaire_semiresidentiel, :event_id, :no_package)');
			$addNoPckageToNull->execute(array(
				'journee_detude'=>0,
				'demijournee_detude'=>0,
				'seminaire_residentiel'=>0,
				'seminaire_semiresidentiel'=>0,
				'event_id'=>$_SESSION["event_id"],
				'no_package'=>0
			));
			$addNoPckageToNull->closeCursor();
	}

	function enleveaccents($chaine){
		
			$string = strtr($chaine, $arr = array(
			"é" => "&#233;",
			"è" => "&#232;",
			"à" => "&#224;",
			"ù" => "&#249;")
						  );

		
         return $string;
    }

;
		
?>