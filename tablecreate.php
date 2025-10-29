<?php

session_start();
	
	if (!isset($_SESSION['gamer_id'])) {
	
	$nocookie = 'You must login to create a championship!';
	
	include('loginpage.php');
	
	exit();
	
	}



require('yahtzee_connect.php');
require('loginfunctions.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {

$gamename = mysqli_real_escape_string($dbcyah,trim($_POST['champname']));

$champ = "CREATE TABLE `$gamename` (
    `game_id` MEDIUMINT UNSIGNED NOT NULL, 
    `player_name` VARCHAR(20) NOT NULL, 
    `ones` TINYINT NOT NULL, 
    `twos` TINYINT NOT NULL, 
    `threes` TINYINT NOT NULL, 
    `fours` TINYINT NOT NULL, 
    `fives` TINYINT NOT NULL, 
    `sixes` TINYINT NOT NULL, 
    `bonus` TINYINT NOT NULL, 
    `three_of_kind` TINYINT NOT NULL, 
    `four_of_kind` TINYINT NOT NULL, 
    `fullhouse` TINYINT NOT NULL, 
    `small_straight` TINYINT NOT NULL, 
    `large_straight` TINYINT NOT NULL, 
    `yahtzee` TINYINT NOT NULL, 
    `chance` TINYINT NOT NULL, 
    `yahtzee_bonus` MEDIUMINT, 
    `penalty` TINYINT NOT NULL, 
    `total` MEDIUMINT NOT NULL, 
    `date` DATETIME NOT NULL,
    PRIMARY KEY (game_id))";
    

$run = @mysqli_query($dbcyah, $champ);


if($run) { $gamename1 = "$gamename has been created!"; include('score.php');} else { echo "$gamename could not be created!";}}

mysqli_close($dbcyah);
?>