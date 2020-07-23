<?php 
session_start();
include("functions.php");

$duration = duration() + 1;
$night = duration();
$people = people();

if($night == 0){
	$night = 1;
}

/* -------------------------------- DONNEES  ------------------------------------------------------------------------------------------------- */
/* -- Forfait ------------------------------------------------------------------------------------------------ */
$resultEvent = $db->prepare('SELECT * FROM package WHERE event_id = ?');
$resultEvent->execute(array($_SESSION["event_id"]));
$dataEvent = $resultEvent->fetch();

$journee_detude = array('low' => '55','high' => '90');
$demijournee_detude = array('low' => '40','high' => '65');
$seminaire_residentiel = array('low' => '90','high' => '180');
$seminaire_semiresidentiel = array('low' => '65','high' => '135');
/* -- Sans forfait ------------------------------------------------------------------------------------------------ */
$resultNo_package = $db->prepare('SELECT * FROM no_package WHERE event_id = ?');
$resultNo_package->execute(array($_SESSION["event_id"]));
$dataNo_package = $resultNo_package->fetch();

$lunchPrice = array('low' => '32','high' => '58');
$dinerPrice = array('low' => '48','high' => '95');
$breakPrice = array('low' => '6','high' => '12');

$roomPrice = array('low' => '1','high' => '2.4');
$techPrice = array('low' => '6','high' => '27');
/* -- Animation ------------------------------------------------------------------------------------------------ */
$resultAnimation = $db->prepare('SELECT * FROM animation WHERE event_id = ?');
$resultAnimation->execute(array($_SESSION["event_id"]));
$dataAnimation = $resultAnimation->fetch();

$galaPrice = array('low' => '1500','high' => '5000');
$conferencierPrice = array('low' => '1500','high' => '6000');
$team_buildingPrice = array('low' => '1500','high' => '4000');
/* -- Technique ------------------------------------------------------------------------------------------------ */
$resultTechnical = $db->prepare('SELECT * FROM technical WHERE event_id = ?');
$resultTechnical->execute(array($_SESSION["event_id"]));
$dataTechnical = $resultTechnical->fetch();

$video = array('low' => '0','high' => '0');
$son = array('low' => '0','high' => '0');
$lumiere = array('low' => '0','high' => '0');
/* -- Logistique ------------------------------------------------------------------------------------------------ */
$resultLogistics = $db->prepare('SELECT * FROM logistics WHERE event_id = ?');
$resultLogistics->execute(array($_SESSION["event_id"]));
$dataLogistics = $resultLogistics->fetch();

$agents = array('low' => '0','high' => '0');
$security = array('low' => '0','high' => '0');
$badges = array('low' => '0','high' => '0');
$covid = array('low' => '0','high' => '0');
/* -- transport ------------------------------------------------------------------------------------------------ */
$resultTransport = $db->prepare('SELECT * FROM transport WHERE event_id = ?');
$resultTransport->execute(array($_SESSION["event_id"]));
$dataTransport = $resultTransport->fetch();

$trainPrice = array('low' => '110','high' => '240');
$busPrice = array('low' => '10','high' => '50');
$plainPrice = array('low' => '200','high' => '600');
$taxiPrice = array('low' => '10','high' => '100');
$covoitPrice = array('low' => '22','high' => '48');

/* -- hébergement ------------------------------------------------------------------------------------------------ */
$resultAccomodation = $db->prepare('SELECT * FROM accomodation WHERE event_id = ?');
$resultAccomodation->execute(array($_SESSION["event_id"]));
$dataAccomodation = $resultAccomodation->fetch();

$single2Price = array('low' => '60','high' => '90');
$single3Price = array('low' => '128','high' => '190');
$single4Price = array('low' => '220','high' => '320');
$double2Price = array('low' => '80','high' => '100');
$double3Price = array('low' => '135','high' => '195');
$double4Price = array('low' => '250','high' => '350');

/* ----------------------------- CONDITION ------------------------------------------------------------------------------------------------ */
if($dataEvent["no_package"] == 1){

	/* --------------------------forfait ----------------------------------------------- */
	if($dataEvent["journee_detude"] > 0){
		$lowPrice_journee_detude = $dataEvent["journee_detude"] * $journee_detude['low'] * $people;
		$highPrice_journee_detude = $dataEvent["journee_detude"] * $journee_detude['high'] * $people;
	}
	if($dataEvent["demijournee_detude"] > 0){
		$lowPrice_demijournee_detude = $dataEvent["demijournee_detude"] * $demijournee_detude['low'] * $people;
		$highPrice_demijournee_detude = $dataEvent["demijournee_detude"] * $demijournee_detude['high'] * $people;
	}
	if($dataEvent["seminaire_residentiel"] > 0){
		$lowPrice_seminaire_residentiel = $dataEvent["seminaire_residentiel"] * $seminaire_residentiel['low'] * $people;
		$highPrice_seminaire_residentiel = $dataEvent["seminaire_residentiel"] * $seminaire_residentiel['high'] * $people;
	}
	if($dataEvent["seminaire_semiresidentiel"] > 0){
		$lowPrice_seminaire_semiresidentiel = $dataEvent["seminaire_semiresidentiel"] * $seminaire_semiresidentiel['low'] * $people;
		$highPrice_seminaire_semiresidentiel = $dataEvent["seminaire_semiresidentiel"] * $seminaire_semiresidentiel['high'] * $people;
	}
	/* --------------------------sans forfait  ----------------------------------------------- */
	
	/* --------------------------animation ----------------------------------------------- */
	$animationPriceLow = $dataAnimation['gala']*$galaPrice['low'] + $dataAnimation['conferencier']*$conferencierPrice['low'] + $dataAnimation['team_building']*$team_buildingPrice['low'];
	$animationPriceHigh = $dataAnimation['gala']*$galaPrice['high'] + $dataAnimation['conferencier']*$conferencierPrice['high'] + $dataAnimation['team_building']*$team_buildingPrice['high'];
	/* --------------------------technique ----------------------------------------------- */
	$technicPriceLow = 0;
	
	$technicPriceHigh = 0;
	/* --------------------------logistique ----------------------------------------------- */
	$logisticLow = $dataLogistics['home_agents']*$duration*$agents['low'] + $dataLogistics['security_agents']*$duration*$security['low'] + $dataLogistics['badges']*$badges['low']*$people + $dataLogistics['covid']*$duration*$covid['low'];
	
	$logisticHigh = $dataLogistics['home_agents']*$duration*$agents['high'] + $dataLogistics['security_agents']*$duration*$security['high'] + $dataLogistics['badges']*$badges['low']*$people + $dataLogistics['covid']*$duration*$covid['high'];
	/* --------------------------transport ----------------------------------------------- */	
	$transportPriceLow =  $trainPrice['low'] * $people * $dataTransport['train'] + $busPrice['low'] * $people * $dataTransport['bus'] + $taxiPrice['low'] * $people * $dataTransport['taxi'] + $plainPrice['low'] * $people * $dataTransport['plane'] + $covoitPrice['low'] * $people * $dataTransport['covoit'];
	$transportPriceHigh = $trainPrice['high'] * $people * $dataTransport['train'] + $busPrice['high'] * $people * $dataTransport['bus'] + $taxiPrice['high'] * $people * $dataTransport['taxi'] + $plainPrice['high'] * $people * $dataTransport['plane'] + $covoitPrice['high'] * $people * $dataTransport['covoit'];;
	/* --------------------------hébergement ----------------------------------------------- */
	$accomodationPriceLow = $single2Price['low']*$dataAccomodation['single2'] + $single3Price['low']*$dataAccomodation['single3'] + $single4Price['low']*$dataAccomodation['single4'] + $double2Price['low']*$dataAccomodation['double2']/2 + $double3Price['low']*$dataAccomodation['double3']/2 + $double4Price['low']*$dataAccomodation['double4']/2;
	$accomodationPriceHigh = $single2Price['high']*$dataAccomodation['single2'] + $single3Price['high']*$dataAccomodation['single3'] + $single4Price['high']*$dataAccomodation['single4'] + $double2Price['high']*$dataAccomodation['double2'] + $double3Price['high']*$dataAccomodation['double3'] + $double4Price['high']*$dataAccomodation['double4'];
	
	$accomodationPriceLow = $accomodationPriceLow * $night;
	$accomodationPricehigh = $accomodationPricehigh * $night;

	/* --------------------------somme finale ----------------------------------------------- */
	$finalPriceLow = $lowPrice_journee_detude + $lowPrice_demijournee_detude + $lowPrice_seminaire_residentiel + $lowPrice_seminaire_semiresidentiel + $transportPriceLow + $accomodationPriceLow + $logisticLow + $animationPriceLow + $technicPriceLow;
	
	$finalPriceHigh = $highPrice_journee_detude + $highPrice_demijournee_detude + $highPrice_seminaire_residentiel + $highPrice_seminaire_semiresidentiel + $transportPriceHigh + $accomodationPriceHigh + $logisticHigh + $animationPriceHigh + $technicPriceHigh;
	
}else{ //if no_package == 0 -----------------------------------------------------------------------------------------------------------
	$finalPriceLow = 1;
	$finalPriceHigh = 2;
}
?>