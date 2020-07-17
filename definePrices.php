<?php 

$duration = duration();
$people = people();

$result1 = $db->prepare('SELECT * FROM package WHERE event_id = ?');
$result1->execute(array($_POST["event_id"]));
$result1->rowCount();

#si la donnée est = 0, on passe au suivant. 
#si la donnée est > 0, on récupère le nombre et on passe au suivant. 

$result1->closeCursor();
?>