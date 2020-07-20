<?php 
session_start();
include("functions.php");

$duration = duration() + 1;
$people = people();

$resultEvent = $db->prepare('SELECT * FROM package WHERE event_id = ?');
$resultEvent->execute(array($_SESSION["event_id"]));
$dataEvent = $resultEvent->fetch();

$journee_detude = array('low' => '55','high' => '90');
$demijournee_detude = array('low' => '40','high' => '65');
$seminaire_residentiel = array('low' => '90','high' => '180');
$seminaire_semiresidentiel = array('low' => '65','high' => '135');

if($dataEvent["no_package"] == 1){
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
	
	$finalPriceLow = $lowPrice_journee_detude + $lowPrice_demijournee_detude + $lowPrice_seminaire_residentiel + $lowPrice_seminaire_semiresidentiel;
	$finalPriceHigh = $highPrice_journee_detude + $highPrice_demijournee_detude + $highPrice_seminaire_residentiel + $highPrice_seminaire_semiresidentiel;
}else{ //if no_package == 0
	
}
?>