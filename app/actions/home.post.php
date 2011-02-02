<?php
function calculateNewScores($winnerA, $loserB){
	$Qa = pow(10, ($winnerA / 400));
	$Qb = pow(10, ($loserB / 400));
	$expectedA = $Qa / ($Qa + $Qb);
	$expectedB = 1 - $expectedA;
	$newWinner = (int) ($winnerA + (30 * (1 - $expectedA)));
	$newLoser = (int) ($loserB + (30 * (0 - $expectedB)));
	if($newLoser < 150)
		$newLoser = 150;
	return array($newWinner, $newLoser);
}



$winnerscore = 0;
$loserscore = 0;
$scoreboard = A('db:select carid, score from car');
while($row = $scoreboard->fetch()){
	if($row['carid'] == $_POST['winner']){
		$winnerscore = $row['score'];
	}
	if($row['carid'] == $_POST['loser']){
		$loserscore = $row['score'];
	}
}
$newscores = calculateNewScores($winnerscore, $loserscore);
Atomik_DB::update('car', array('score' => $newscores[0]), array('carid' => $_POST['winner']));
Atomik_DB::update('car', array('score' => $newscores[1]), array('carid' => $_POST['loser']));
Atomik::redirect('home');
