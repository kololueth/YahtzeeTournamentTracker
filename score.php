<?php

	session_start();
	
	if (!isset($_SESSION['gamer_id'])) {
	
	$nocookie = 'You must login to access Yahtzee Score Sheet!';
	
	include('loginpage.php');
	
	exit();
	}
	
	?><!DOCTYPE html>
<html>
	

<head>
<title>Yahtzee</title>
<link rel="stylesheet" type="text/css" href="scoregame.css">
<link rel="shortcut icon" href="/images/rbf.png"/>


  
</head>

<body>

<header>
	
	<div class="shadow">
		<a href="/index.html"><img src="/images/newrbfwht.png" width="150" height="111"></a>
	</div>
<nav>
	<ul>
		<li> <a href="/index.html"><span style="color:#FFFFFF">Home </span></a></li>
	</ul>
	<ul>
		<li> <a href="checkstats.php"><span style="color:#FFFFFF">Stats</span></a>	</li>
	</ul>
</nav>	
	
		<div class="logout">	
			
				<?php echo "<span style='color: #ffff00'>You are logged in, {$_SESSION['first_name']}!</span>";?>
					<a href="logout.php"> <span style="font-size: 16px">&nbsp&nbspLogout!</span><a/>
					
		</div>
	
	
	


</header>

<?php 

if(!isset($_POST['start'])) { echo '<div class="start1">

<form action="score.php" method="POST">
<span style="color: #FFFFFF">START NEW CHAMPIONSHIP?<p></span>
<input type="radio" id="begin" name="champ" value="no"> <label for="begin"> NO </label>
<input type="radio" id="begin2" name="champ" value="yes"> <label for="begin2"> YES </label>
<input type="submit" name="start" value="Start"></p>
</form></div>';}



if(isset($_POST['start']) && ($_SESSION['user_level'] == 2)) {
	 
	 	if($_POST['champ'] == 'no') { echo header('Location: http://www.realblackfacts.com/yahtzee/score.php'); exit();}

		if($_POST['champ'] == 'yes') { 
		
		
		echo  '<div class="start1">
		
		
		<form action="tablecreate.php" method="POST">

			<span style="color: #FFFFFF">Name your championship:</span>
				<p><input type="text" id="tabletime" name="champname"></p>
				<p><input type="submit" value="BEGIN"></p>
				</form></div>';}}

?>

<main>
<?php echo $gamename1; ?>

<!-------------------------Form to accept names and create entry space into scorecard--------------------------------------->


<form method="GET" action="score.php">

		
<?php 
	require ('yahtzee_connect.php'); 
	
	$theplayers = array();
	
	$queryplayers = "SELECT username as players FROM gamerprofiles";
	
	$runplayers = @mysqli_query($dbcyah, $queryplayers);
	
	if ($runplayers) {
	
		while($rowplayers = mysqli_fetch_array($runplayers, MYSQLI_ASSOC)) {
		
		$theplayers[] = $rowplayers['players'];
		
		$player1 = $theplayers[0];
		$player2 = $theplayers[1];
		$player3 = $theplayers[2];
		
		}
		}
		
		
		  echo 'PLAYER 1
		  <select name="player1name">
		  <option value="' . $player1 . '">' . $player1 . '</option>
		  <option value="' . $player2 . '">' . $player2 . '</option>
		  <option value="' . $player3 . '">' . $player3 . '</option>
		</select>
		
		&nbsp&nbsp&nbspPLAYER 2

		<select name="player2name">
		<option value="' . $player2 . '">' . $player2 . '</option>
		<option value="' . $player1 . '">' . $player1 . '</option>
		<option value="' . $player3 . '">' . $player3 . '</option>
		 
		</select>

		&nbsp&nbsp&nbspPLAYER 3
		<select name="player3name">
		<option value="' . $player3 . '">' . $player3 . '</option>
		<option value="' . $player2 . '">' . $player2 . '</option>
		<option value="' . $player1 . '">' . $player1 . '</option>
		</select>';
		
		
		mysqli_close($dbcyah);
?>
		
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="submit" value="start game"><p>

<select name="table">

<?php include('includes/games&countlist.php'); ?>
</select>
</p>
</form>

<br /><p><br /></p><br /><p></p><br /><br />
<?php


if($_SERVER['REQUEST_METHOD'] == 'GET') 

	if(isset($_GET['submit']) && ($_SESSION['user_level'] == 2)) {
	
		require ('yahtzee_connect.php'); 

	if(empty($_GET['player1name'])){echo 'PLAYER 1 NAME EMPTY!'; exit();} else {
	$p1 = mysqli_real_escape_string($dbcyah,trim($_GET['player1name']));}  
	
	if(empty($_GET['player2name'])){echo 'PLAYER 2 NAME EMPTY!'; exit();} else {
	$p2 = mysqli_real_escape_string($dbcyah,trim($_GET['player2name']));}  
	
	if(empty($_GET['player3name'])){echo 'PLAYER 3 NAME EMPTY!'; exit();} else {
	$p3 = mysqli_real_escape_string($dbcyah,trim($_GET['player3name']));} 


if($p1 && $p2 && $p3) {

  
$table = $_GET['table'];

if($table == 'closed') { echo 'This championship is closed'; exit();}

$q10 = "SELECT MAX(game_id) AS gamenumber FROM `$table`";

$r10 = @mysqli_query ($dbcyah, $q10); //Run the query.

if ($r10){

while($row10 = mysqli_fetch_array($r10, MYSQLI_ASSOC)) {



$idp1 = $row10['gamenumber'] + 1;
$idp2 = $idp1 + 1;
$idp3 = $idp1 + 2;


}
}


$q20 = "INSERT INTO `$table`(`game_id`, `player_name`, `ones`, `twos`, `threes`, `fours`, `fives`, `sixes`, `bonus`, `three_of_kind`, `four_of_kind`, `fullhouse`, `small_straight`, `large_straight`, `yahtzee`, `chance`, `yahtzee_bonus`, `penalty`, `total`, `date`) VALUES ('$idp1', '$p1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NOW());

INSERT INTO `$table`(`game_id`, `player_name`, `ones`, `twos`, `threes`, `fours`, `fives`, `sixes`, `bonus`, `three_of_kind`, `four_of_kind`, `fullhouse`, `small_straight`, `large_straight`, `yahtzee`, `chance`, `yahtzee_bonus`, `penalty`, `total`, `date`) VALUES ('$idp2', '$p2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NOW());

INSERT INTO `$table`(`game_id`, `player_name`, `ones`, `twos`, `threes`, `fours`, `fives`, `sixes`, `bonus`, `three_of_kind`, `four_of_kind`, `fullhouse`, `small_straight`, `large_straight`, `yahtzee`, `chance`, `yahtzee_bonus`, `penalty`, `total`, `date`) VALUES ('$idp3', '$p3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NOW())";

$r20 = @mysqli_multi_query ($dbcyah, $q20); //Run the query.

if ($r20) { // If it ran OK.   
				echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$table";
		
			// Print a message:
			echo "<h1>Your game has started!</h1>"; 
			
			} else { // If it did not run OK.
			
				// Public message;
				echo'<h1> System Error</h1>
				<p class="error">Your game could not be registerd due to a system error.  We apologize for any inconvenience.</p>';
				
				// Debugging message:
				echo '<p>' . mysqli_error($dbcyah) . '<br />Query: ' . $q . '</p>';
				
			} // End of if ($r) IF.
			
mysqli_close($dbcyah); // Close the database connection.

echo

"<h3>&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $p1 &nbsp $p2 &nbsp&nbsp $p3 </h3>";

 
echo '<p> 

<form action="game.php" method="post"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
  <input type="text" name="player1ones">
  <input type="text" name="player2ones">
  <input type="text" name="player3ones">
  <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1twos">
  <input type="text" name="player2twos">
  <input type="text" name="player3twos">
  
  <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1threes">
  <input type="text" name="player2threes">
  <input type="text" name="player3threes">
  
  <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1fours">
  <input type="text" name="player2fours">
  <input type="text" name="player3fours">
  
  <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1fives">
  <input type="text" name="player2fives">
  <input type="text" name="player3fives">
  
  <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1sixes">
  <input type="text" name="player2sixes">
  <input type="text" name="player3sixes">
 
  <p></p><br /><p></p><br /><p></p><br /><br /><br /><p></p>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1threekind">
  <input type="text" name="player2threekind">
  <input type="text" name="player3threekind">
  
<br /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1fourkind">
  <input type="text" name="player2fourkind">
  <input type="text" name="player3fourkind">
 <br />
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1fullhouse">
  <input type="text" name="player2fullhouse">
  <input type="text" name="player3fullhouse">
<br />  
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1smallstraight">
  <input type="text" name="player2smallstraight">
  <input type="text" name="player3smallstraight">
<br />   
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1largestraight">
  <input type="text" name="player2largestraight">
  <input type="text" name="player3largestraight">
  
<br />  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1yahtzee">
  <input type="text" name="player2yahtzee">
  <input type="text" name="player3yahtzee">
  
  <br />  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1chance">
  <input type="text" name="player2chance">
  <input type="text" name="player3chance">
  
 <br /><p></p><br />
  <p> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1yahtzeebonus">
  <input type="text" name="player2yahtzeebonus">
  <input type="text" name="player3yahtzeebonus">
  </p>
   
   <input type="hidden" name="p1" id="hiddenField" value="' . $p1 . '">
   <input type="hidden" name="p2" id="hiddenField" value="' . $p2 . '">
   <input type="hidden" name="p3" id="hiddenField" value="' . $p3 . '"> 
   <input type="hidden" name="idp1" id="hiddenField" value="' . $idp1 . '">
   <input type="hidden" name="idp2" id="hiddenField" value="' . $idp2 . '">
   <input type="hidden" name="idp3" id="hiddenField" value="' . $idp3 . '">
   <input type="hidden" name="table" id="hiddenField" value="' . $table . '">
   <p><br /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="text" name="player1penalty">
  <input type="text" name="player2penalty">
  <input type="text" name="player3penalty">
  
  
  <p><br /><input type="submit" value="Update!"></p>

</form></p>';}} elseif(!isset($_GET['submit'])) {echo '<h2>Enter Player names to start game!</h2>';}

 else {echo 'You are not authorized to play a game!';} 



?>


</main>

<footer>

Homepage:&nbsp <a href="index.html"> <span class="redtext">Real</span> <span class="yellowtext">Black</span> <span class="greentext"> Facts </span></a>

</footer>

</body>

</html>