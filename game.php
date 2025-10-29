<!DOCTYPE html>
<html>

<head>
<title>Yahtzee</title>
<link rel="stylesheet" type="text/css" href="score.css">
<link rel="shortcut icon" href="/images/rbf.png"/>
  
  
  
</head>

<body>

<header>
<a href="../index.html"><img src="/images/newrbfwht.png" width="150" height="111"></a>

</header>

<main>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')


require ('yahtzee_connect.php');  // Connect to the db. 

$table = $_POST['table'];  


$player1name = $_POST['p1'];
$player2name = $_POST['p2'];
$player3name = $_POST['p3'];

$player1id = $_POST['idp1'];
$player2id = $_POST['idp2'];
$player3id = $_POST['idp3'];



$onesp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1ones']));
$onesp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2ones']));
$onesp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3ones']));

if($onesp1 == 0) {}
elseif($onesp1 == 1){}
elseif($onesp1 == 2){}
elseif($onesp1 == 3){}
elseif($onesp1 == 4){}
elseif($onesp1 == 5){}
else{echo "PLAYER 1 score WRONG at ones"; exit();}

if($onesp2 == 0) {}
elseif($onesp2 == 1){}
elseif($onesp2 == 2){}
elseif($onesp2 == 3){}
elseif($onesp2 == 4){}
elseif($onesp2 == 5){}
else{echo "PLAYER 2 score WRONG at ones"; exit();}

if($onesp3 == 0) {}
elseif($onesp3 == 1){}
elseif($onesp3 == 2){}
elseif($onesp3 == 3){}
elseif($onesp3 == 4){}
elseif($onesp3 == 5){}
else{echo "PLAYER 3 score WRONG at ones"; exit();}



$twosp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1twos']));
$twosp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2twos']));
$twosp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3twos']));

if($twosp1 == 0) {}
elseif($twosp1 == 2){}
elseif($twosp1 == 4){}
elseif($twosp1 == 6){}
elseif($twosp1 == 8){}
elseif($twosp1 == 10){}
else{echo "PLAYER 1 score WRONG at twos"; exit();}

if($twosp2 == 0) {}
elseif($twosp2 == 2){}
elseif($twosp2 == 4){}
elseif($twosp2 == 6){}
elseif($twosp2 == 8){}
elseif($twosp2 == 10){}
else{echo "PLAYER 2 score WRONG at twos"; exit();}

if($twosp3 == 0) {}
elseif($twosp3 == 2){}
elseif($twosp3 == 4){}
elseif($twosp3 == 6){}
elseif($twosp3 == 8){}
elseif($twosp3 == 10){}
else{echo "PLAYER 3 score WRONG at twos"; exit();}


$threesp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1threes']));
$threesp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2threes']));
$threesp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3threes']));

if($threesp1 == 0) {}
elseif($threesp1 == 3){}
elseif($threesp1 == 6){}
elseif($threesp1 == 9){}
elseif($threesp1 == 12){}
elseif($threesp1 == 15){}
else{echo "PLAYER 1 score WRONG at threes"; exit();}

if($threesp2 == 0) {}
elseif($threesp2 == 3){}
elseif($threesp2 == 6){}
elseif($threesp2 == 9){}
elseif($threesp2 == 12){}
elseif($threesp2 == 15){}
else{echo "PLAYER 2 score WRONG at threes"; exit();}

if($threesp3 == 0) {}
elseif($threesp3 == 3){}
elseif($threesp3 == 6){}
elseif($threesp3 == 9){}
elseif($threesp3 == 12){}
elseif($threesp3 == 15){}
else{echo "PLAYER 3 score WRONG at threes"; exit();}


$foursp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1fours']));
$foursp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2fours']));
$foursp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3fours']));


if($foursp1 == 0) {}
elseif($foursp1 == 4){}
elseif($foursp1 == 8){}
elseif($foursp1 == 12){}
elseif($foursp1 == 16){}
elseif($foursp1 == 20){}
else{echo "PLAYER 1 score WRONG at fours"; exit();}

if($foursp2 == 0) {}
elseif($foursp2 == 4){}
elseif($foursp2 == 8){}
elseif($foursp2 == 12){}
elseif($foursp2 == 16){}
elseif($foursp2 == 20){}
else{echo "PLAYER 2 score WRONG at fours"; exit();}

if($foursp3  == 0) {}
elseif($foursp3  == 4){}
elseif($foursp3  == 8){}
elseif($foursp3  == 12){}
elseif($foursp3  == 16){}
elseif($foursp3  == 20){}
else{echo "PLAYER 3 score WRONG at fours"; exit();}



$fivesp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1fives']));
$fivesp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2fives']));
$fivesp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3fives']));

if($fivesp1 == 0) {}
elseif($fivesp1 == 5){}
elseif($fivesp1 == 10){}
elseif($fivesp1 == 15){}
elseif($fivesp1 == 20){}
elseif($fivesp1 == 25){}
else{echo "PLAYER 1 score WRONG at fives"; exit();}

if($fivesp2 == 0) {}
elseif($fivesp2 == 5){}
elseif($fivesp2 == 10){}
elseif($fivesp2 == 15){}
elseif($fivesp2 == 20){}
elseif($fivesp2 == 25){}
else{echo "PLAYER 2 score WRONG at fives"; exit();}

if($fivesp3 == 0) {}
elseif($fivesp3 == 5){}
elseif($fivesp3 == 10){}
elseif($fivesp3 == 15){}
elseif($fivesp3 == 20){}
elseif($fivesp3 == 25){}
else{echo "PLAYER 3 score WRONG at fives"; exit();}



$sixesp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1sixes']));
$sixesp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2sixes']));
$sixesp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3sixes']));


if($sixesp1 == 0) {}
elseif($sixesp1 == 6){}
elseif($sixesp1 == 12){}
elseif($sixesp1 == 18){}
elseif($sixesp1 == 24){}
elseif($sixesp1 == 30){}
else{echo "Player 1 score WRONG at sixes"; exit();}

if($sixesp2 == 0) {}
elseif($sixesp2 == 6){}
elseif($sixesp2 == 12){}
elseif($sixesp2 == 18){}
elseif($sixesp2 == 24){}
elseif($sixesp2 == 30){}
else{echo "Player 2 score WRONG at sixes"; exit();}

if($sixesp3 == 0) {}
elseif($sixesp3 == 6){}
elseif($sixesp3 == 12){}
elseif($sixesp3 == 18){}
elseif($sixesp3 == 24){}
elseif($sixesp3 == 30){}
else{echo "PLAYER 3 score WRONG at sixes"; exit();}


$threekp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1threekind']));
$threekp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2threekind']));
$threekp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3threekind']));

if(($threekp1 >= 0) && ($threekp1 <= 30)) {}
elseif($threekp1 > 30) {echo "PLAYER 1 SCORE CANNOT BE GREATER THAN 30 for THREE OF A KIND"; exit();}
else {echo "PLAYER 1 SCORE CANNOT BE LESS THAN 0 for THREE OF A KIND"; exit();}

if(($threekp2 >= 0) && ($threekp2 <= 30)) {}
elseif($threekp2 > 30) {echo "PLAYER 2 SCORE CANNOT BE GREATER THAN 30 for THREE OF A KIND"; exit();}
else {echo "PLAYER 2 SCORE CANNOT BE LESS THAN 0 for THREE OF A KIND"; exit();}

if(($threekp3 >= 0) && ($threekp3 <= 30)) {}
elseif($threekp3 > 30) {echo "PLAYER 3 SCORE CANNOT BE GREATER THAN 30 for THREE OF A KIND"; exit();}
else {echo "PLAYER 3 SCORE CANNOT BE LESS THAN 0 for THREE OF A KIND"; exit();}


$fourkp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1fourkind']));
$fourkp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2fourkind']));
$fourkp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3fourkind']));

if(($fourkp1 >= 0) && ($fourkp1 <= 30)) {}
elseif($fourkp1 > 30) {echo "PLAYER 1 SCORE CANNOT BE GREATER THAN 30 for FOUR OF A KIND"; exit();}
else {echo "PLAYER 1 SCORE CANNOT BE LESS THAN 0 for FOUR OF A KIND"; exit();}

if(($fourkp2 >= 0) && ($fourkp2 <= 30)) {}
elseif($fourkp2 > 30) {echo "PLAYER 2 SCORE CANNOT BE GREATER THAN 30 for FOUR OF A KIND"; exit();}
else {echo "PLAYER 2 SCORE CANNOT BE LESS THAN 0 for FOUR OF A KIND"; exit();}

if(($fourkp3 >= 0) && ($fourkp3 <= 30)) {}
elseif($fourkp3 > 30) {echo "PLAYER 3 SCORE CANNOT BE GREATER THAN 30 for FOUR OF A KIND"; exit();}
else {echo "PLAYER 3 SCORE CANNOT BE LESS THAN 0 for FOUR OF A KIND"; exit();}


$fullp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1fullhouse']));
$fullp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2fullhouse']));
$fullp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3fullhouse']));

if($fullp1 == 25) {}
elseif($fullp1 == 0) {}
else{echo "PLAYER 1 FULLHOUSE MUST EQUAL 25 OR 0!"; exit();}

if($fullp2 == 25) {}
elseif($fullp2 == 0) {}
else{echo "PLAYER 2 FULLHOUSE MUST EQUAL 25 OR 0!"; exit();}

if($fullp3 == 25) {}
elseif($fullp3 == 0) {}
else{echo "PLAYER 3 FULLHOUSE MUST EQUAL 25 OR 0!"; exit();}



$ssp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1smallstraight']));
$ssp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2smallstraight']));
$ssp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3smallstraight']));

if($ssp1 == 30) {}
elseif($ssp1 == 0) {}
else{echo "PLAYER 1 SMALL STRAIGHT MUST EQUAL 30 OR 0!"; exit();}

if($ssp2 == 30) {}
elseif($ssp2 == 0) {}
else{echo "PLAYER 2 SMALL STRAIGHT MUST EQUAL 30 OR 0!"; exit();}

if($ssp3 == 30) {}
elseif($ssp3 == 0) {}
else{echo "PLAYER 3 SMALL STRAIGHT MUST EQUAL 30 OR 0!"; exit();}


$lsp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1largestraight']));
$lsp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2largestraight']));
$lsp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3largestraight']));

if($lsp1 == 40) {}
elseif($lsp1 == 0) {}
else{echo "PLAYER 1 LARGE STRAIGHT MUST EQUAL 40 OR 0!"; exit();}

if($lsp2 == 40) {}
elseif($lsp2 == 0) {}
else{echo "PLAYER 2 LARGE STRAIGHT MUST EQUAL 40 OR 0!"; exit();}

if($lsp3 == 40) {}
elseif($lsp3 == 0) {}
else{echo "PLAYER 3 LARGE STRAIGHT MUST EQUAL 40 OR 0!"; exit();}



$yahtp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1yahtzee']));
$yahtp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2yahtzee']));
$yahtp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3yahtzee']));

if($yahtp1 == 50) {}
elseif($yahtp1 == 0) {}
else{echo "PLAYER 1 YAHTZEE MUST EQUAL 50 OR 0!"; exit();}

if($yahtp2 == 50) {}
elseif($yahtp2 == 0) {}
else{echo "PLAYER 2 YAHTZEE MUST EQUAL 50 OR 0!"; exit();}

if($yahtp3 == 50) {}
elseif($yahtp3 == 0) {}
else{echo "PLAYER 3 YAHTZEE MUST EQUAL 50 OR 0!"; exit();}



$chancep1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1chance']));
$chancep2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2chance']));
$chancep3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3chance']));

if(($chancep1 >= 5) && ($chancep1 <= 30)) {}
elseif($chancep1 > 30) {echo "PLAYER 1 SCORE CANNOT BE GREATER THAN 30 for CHANCE"; exit();}
else {echo "PLAYER 1 SCORE CANNOT BE LESS THAN 5 for CHANCE"; exit();}

if(($chancep2 >= 5) && ($chancep2 <= 30)) {}
elseif($chancep2 > 30) {echo "PLAYER 2 SCORE CANNOT BE GREATER THAN 30 for CHANCE"; exit();}
else {echo "PLAYER 2 SCORE CANNOT BE LESS THAN 5 for CHANCE"; exit();}

if(($chancep3 >= 5) && ($chancep3 <= 30)) {}
elseif($chancep3 > 30) {echo "PLAYER 3 SCORE CANNOT BE GREATER THAN 30 for CHANCE"; exit();}
else {echo "PLAYER 3 SCORE CANNOT BE LESS THAN 5 for CHANCE"; exit();}



$ybp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1yahtzeebonus']));
$ybp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2yahtzeebonus']));
$ybp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3yahtzeebonus']));

if($ybp1 == 0) {}
elseif($ybp1 == 100) {}
elseif($ybp1 == 200) {}
elseif($ybp1 == 300) {}
elseif($ybp1 == 400) {}
elseif($ybp1 == 500) {}
elseif($ybp1 == 600) {}
elseif($ybp1 == 700) {}
else{echo "PLAYER 1 YAHTZEE BONUS MUST BE A MULTIPLE OF 100 OR 0!"; exit();}

if($ybp2 == 0) {}
elseif($ybp2 == 100) {}
elseif($ybp2 == 200) {}
elseif($ybp2 == 300) {}
elseif($ybp2 == 400) {}
elseif($ybp2 == 500) {}
elseif($ybp2 == 600) {}
elseif($ybp2 == 700) {}
else{echo "PLAYER 2 YAHTZEE BONUS MUST BE A MULTIPLE OF 100 OR 0!"; exit();}

if($ybp3 == 0) {}
elseif($ybp3 == 100) {}
elseif($ybp3 == 200) {}
elseif($ybp3 == 300) {}
elseif($ybp3 == 400) {}
elseif($ybp3 == 500) {}
elseif($ybp3 == 600) {}
elseif($ybp3 == 700) {}
else{echo "PLAYER 3 YAHTZEE BONUS MUST BE A MULTIPLE OF 100 OR 0!"; exit();}


$penaltyp1 = mysqli_real_escape_string($dbcyah, trim($_POST['player1penalty']));
$penaltyp2 = mysqli_real_escape_string($dbcyah, trim($_POST['player2penalty']));
$penaltyp3 = mysqli_real_escape_string($dbcyah, trim($_POST['player3penalty']));


if(($penaltyp1 >= 0) && ($penaltyp1 <= 20)) {}
elseif($penaltyp1 > 20) {echo "PLAYER 1 PENALTY CANNOT BE GREATER THAN 20"; exit();}
else {echo "PLAYER 1 PENALTY CANNOT BE LESS THAN 0"; exit();}

if(($penaltyp2 >= 0) && ($penaltyp2 <= 20)) {}
elseif($penaltyp2 > 20) {echo "PLAYER 2 PENALTY CANNOT BE GREATER THAN 20"; exit();}
else {echo "PLAYER 2 PENALTY CANNOT BE LESS THAN 0"; exit();}

if(($penaltyp3 >= 0) && ($penaltyp3 <= 20)) {}
elseif($penaltyp3 > 20) {echo "PLAYER 3 PENALTY CANNOT BE GREATER THAN 20"; exit();}
else {echo "PLAYER 3 PENALTY CANNOT BE LESS THAN 0"; exit();}




if($onesp1 + $twosp1 + $threesp1 + $foursp1 + $fivesp1 + $sixesp1 >= 63) {

	$bonusp1 = 35;}
else { 
	$bonusp1 = 0;}



if($onesp2 + $twosp2 + $threesp2 + $foursp2 + $fivesp2 + $sixesp2 >= 63) {

	$bonusp2 = 35;}
else { 
	$bonusp2 = 0;}




if($onesp3 + $twosp3 + $threesp3 + $foursp3 + $fivesp3 + $sixesp3 >= 63) {

	$bonusp3 = 35;}
else { 
	$bonusp3 = 0;}



$totalp1 = (($onesp1 + $twosp1 + $threesp1 + $foursp1 + $fivesp1 + $sixesp1 + $bonusp1 + $threekp1 + $fourkp1 + $fullp1 + $ssp1 + $lsp1 + $yahtp1 + $chancep1 + $ybp1) - $penaltyp1);

$totalp2 = (($onesp2 + $twosp2 + $threesp2 + $foursp2 + $fivesp2 + $sixesp2 + $bonusp2 + $threekp2 + $fourkp2 + $fullp2 + $ssp2 + $lsp2 + $yahtp2 + $chancep2 + $ybp2) - $penaltyp2);

$totalp3 = (($onesp3 + $twosp3 + $threesp3 + $foursp3 + $fivesp3 + $sixesp3 + $bonusp3 + $threekp3 + $fourkp3 + $fullp3 + $ssp3 + $lsp3 + $yahtp3 + $chancep3 + $ybp3) - $penaltyp3);





	
	
// Make the query:
		$q = "UPDATE `$table` SET
		 
						`player_name` = '$player1name', 
						`ones` = '$onesp1', 
						`twos` = '$twosp1', 
						`threes` = '$threesp1', 
						`fours` = '$foursp1', 
						`fives` = '$fivesp1', 
						`sixes` = '$sixesp1', 
						`bonus` = '$bonusp1', 
						`three_of_kind` = '$threekp1', 
						`four_of_kind` = '$fourkp1', 
						`fullhouse` = '$fullp1', 
						`small_straight` = '$ssp1', 
						`large_straight` = '$lsp1', 
						`yahtzee` = '$yahtp1', 
						`chance` = '$chancep1', 
						`yahtzee_bonus` = '$ybp1', 
						`penalty` = '$penaltyp1',
						`total` = '$totalp1' 			 WHERE `game_id` = $player1id;
			
			UPDATE `$table` SET
						`player_name` = '$player2name', 
						`ones` = '$onesp2', 
						`twos` = '$twosp2', 
						`threes` = '$threesp2', 
						`fours` = '$foursp2', 
						`fives` = '$fivesp2', 
						`sixes` = '$sixesp2', 
						`bonus` = '$bonusp2', 
						`three_of_kind` = '$threekp2', 
						`four_of_kind` = '$fourkp2', 
						`fullhouse` = '$fullp2', 
						`small_straight` = '$ssp2', 
						`large_straight` = '$lsp2', 
						`yahtzee` = '$yahtp2', 
						`chance` = '$chancep2', 
						`yahtzee_bonus` = '$ybp2', 
						`penalty` = '$penaltyp2', 
						`total` = '$totalp2' 			WHERE `game_id` = $player2id;
			
			UPDATE `$table` SET	
						`player_name` = '$player3name', 
						`ones` = '$onesp3', 
						`twos` = '$twosp3', 
						`threes` = '$threesp3', 
						`fours` = '$foursp3', 
						`fives` = '$fivesp3', 
						`sixes` = '$sixesp3', 
						`bonus` = '$bonusp3', 
						`three_of_kind` = '$threekp3', 
						`four_of_kind` = '$fourkp3', 
						`fullhouse` = '$fullp3', 
						`small_straight` = '$ssp3', 
						`large_straight` = '$lsp3', 
						`yahtzee` = '$yahtp3', 
						`chance` = '$chancep3', 
						`yahtzee_bonus` = '$ybp3', 
						`penalty` = '$penaltyp3',  
						`total` = '$totalp3'       	        WHERE `game_id` = $player3id";
						
					
						
		
		$r = @mysqli_multi_query ($dbcyah, $q); //Run the query.
		
		
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<center><h1> Thank You! </h1>
			<p> <h2>Your game has been accepted.</h2></p><p><br /></p>';
			
			} else { // If it did not run OK.
			
				// Public message;
				echo'<h1> System Error</h1>
				<p class="error">Your game could not be registerd due to a system error.  We apologize for any inconvenience.</p>';
				
				// Debugging message:
				echo '<p>' . mysqli_error($dbcyah) . '<br />Query: ' . $q . '</p>';
				
			} // End of if ($r) IF.
			
			

	mysqli_close($dbcyah);
	



?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')


require ('yahtzee_connect.php');  // Connect to the db. 

//Make the query

//Player 1 data..............................................................................................................

$card = "SELECT `ones` + `twos` + `threes` + `fours` + `fives` + `sixes` + `bonus` + `three_of_kind` + `four_of_kind` + `fullhouse` + `small_straight` + `large_straight` + `yahtzee` + `chance` + `yahtzee_bonus` - `penalty` AS total, bonus AS bonus FROM `$table` WHERE game_id = $player1id";

$check = @mysqli_query($dbcyah, $card); //Run the query



if($check) {


	echo "<center><h3>$player1name stats </h3><p><small>player1</small></p></h3></center>";

	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	
	<tr><td align="center"><b>Total</b></td><td align="center"><b>Bonus</b></td></tr>';
	
	

	while($row = mysqli_fetch_array($check, MYSQLI_ASSOC)) {
	
	echo '<tr><td align="center">' . $row['total'] . '</td><td align="center">' . $row['bonus'] . '</td></tr>';}
	


echo '</table>'; mysqli_free_result ($check);}




else {

echo '<p class="error"> The data could not be received.</p>';

echo'<p>' . mysqli_error($dbcyah) . '<br /><br />Query: ' . $card . '</p>';}


//Player 2 data..............................................................................................................


$card2 = "SELECT `ones` + `twos` + `threes` + `fours` + `fives` + `sixes` + `bonus` + `three_of_kind` + `four_of_kind` + `fullhouse` + `small_straight` + `large_straight` + `yahtzee` + `chance` + `yahtzee_bonus` - `penalty` AS total, bonus AS bonus FROM `$table` WHERE game_id = $player2id";

$check2 = @mysqli_query($dbcyah, $card2); //Run the query



if($check2) {


	echo "<center><h3>$player2name stats</h3><p><small>player2</small></p></center>";

	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	
	<tr><td align="center"><b>Total</b></td><td align="center"><b>Bonus</b></td></tr>';
	
	

	while($row2 = mysqli_fetch_array($check2, MYSQLI_ASSOC)) {
	
	echo '<tr><td align="center">' . $row2['total'] . '</td><td align="center">' . $row2['bonus'] . '</td></tr>';}
	


echo '</table>'; mysqli_free_result ($check2);}




else {

echo '<p class="error"> The data could not be received.</p>';

echo'<p>' . mysqli_error($dbcyah) . '<br /><br />Query: ' . $card2 . '</p>';}




//Player 3 data..............................................................................................................


$card3 = "SELECT `ones` + `twos` + `threes` + `fours` + `fives` + `sixes` + `bonus` + `three_of_kind` + `four_of_kind` + `fullhouse` + `small_straight` + `large_straight` + `yahtzee` + `chance` + `yahtzee_bonus` - `penalty` AS total, bonus AS bonus FROM `$table` WHERE game_id = $player3id";

$check3 = @mysqli_query($dbcyah, $card3); //Run the query



if($check3) {


	echo "<center><h3>$player3name stats</h3><p><small>player3</small></p></center>";

	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	
	<tr><td align="center"><b>Total</b></td><td align="center"><b>Bonus</b></td></tr>';
	
	

	while($row3 = mysqli_fetch_array($check3, MYSQLI_ASSOC)) {
	
	echo '<tr><td align="center">' . $row3['total'] . '</td><td align="center">' . $row3['bonus'] . '</td></tr>';}
	


echo '</table>'; mysqli_free_result ($check3);}




else {

echo '<p class="error"> The data could not be received.</p>';

echo'<p>' . mysqli_error($dbcyah) . '<br /><br />Query: ' . $card3 . '</p>';}




//Winner Score......................................................................................................................


$winnerscore = "SELECT MAX(`total`) AS WINNER FROM `$table` WHERE game_id = $player1id OR game_id = $player2id OR game_id = $player3id";

$winnerscoreq = @mysqli_query($dbcyah, $winnerscore);

if($winnerscoreq) {

while($rowwinnerscore = mysqli_fetch_array($winnerscoreq, MYSQLI_ASSOC)) {

$WINNER = $rowwinnerscore['WINNER'];



echo "<p><center><br /><br /><br /><br /><br />With a score of<h1> <p>$WINNER</p></h1></center></p>";


}
}


//Winnner   Name.....................................................................................................................


$winnername = "SELECT `player_name` AS INFO FROM `$table` WHERE total = $WINNER";

$winnernameq = @mysqli_query($dbcyah, $winnername);

if($winnernameq) {

while($rowwinnername = mysqli_fetch_array($winnernameq, MYSQLI_ASSOC)) {


$NAME = $rowwinnername['INFO'];

echo "<center><p><h1>$NAME </h1></p>

<p><h3> WINS!!! </h3></p></center>";

echo '<a href="score.php"> START NEW GAME! </a>';
}

}


	

mysqli_close($dbcyah);


?>


</main>

<footer>

Homepage:&nbsp <a href="index.html"> <span class="redtext">Real</span> <span class="yellowtext">Black</span> <span class="greentext"> Facts </span></a>

</footer>

</body>

</html>