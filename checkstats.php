<?php 
	
	session_start();
	
	if (!isset($_SESSION['gamer_id'])) {
	
	$nocookie = 'You must login to access your stats!';
	
	include('loginpage.php');
	
	exit();
	
	}
	
?>
<!DOCTYPE html>
<html>
	

<head>

<title>Yahtzee</title>
<link rel="stylesheet" type="text/css" href="checkstats.css">
<link rel="shortcut icon" href="/images/rbf.png"/>

</head>

<body>

<header>
	<div class="shadow">
		<a href="/index.html"><img src="/images/newrbfwht.png" width="150" height="111"></a>
	</div>
<nav>
	<ul>
		<li> <a href="/index.html"><span style="color:#FFFFFF">Home</span></a>		</li>
	</ul>
	<ul>
		<li> <a href="score.php"><span style="color:#66FF00 ">GAME</span></a>	</li>
	</ul>
	<ul>
		<li> <a href="score.php"><span style="color:#FFFF00 ">CHAMP</span></a></li>
	</ul>
	<ul>
		<li> <a href="/content.html"><span style="color:#FFFFFF">Content</span></a>	</li>
	</ul>
	<ul>
		<li> <a href="/aboutus.html"><span style="color:#FFFFFF">About Us</span></a>	</li>
	</ul>
</nav>		

		
		
		
	<div class="logout">
			<?php echo "<span style='color: #FFFF00'>You are logged in, {$_SESSION['first_name']}!</span>";?>
				<a href="logout.php"> <span style="font-size: 16px">&nbsp&nbspLogout!</span><a/>
	</div>
</header>

<?php 

					require('yahtzee_connect.php');

	$q1 = "SELECT COUNT(*) AS a FROM information_schema.tables WHERE table_schema = 'realblac_yahtzee'";

	$r1 = @mysqli_query($dbcyah, $q1);

		if($r1) {

			while($roop = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
		
				$b = $roop['a'] - 2;
	}
	
	}

	
	$q2 = "SELECT table_name AS name FROM information_schema.tables WHERE table_schema = 'realblac_yahtzee'";

	$r2 = @mysqli_query($dbcyah, $q2);

			if($r2) { 
	
			while($loop = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
	
				$loo[] = $loop['name'];
			

	}

	}
	
					    mysqli_close($dbcyah);
?>

<div class="player">

<?php

if(isset($_SESSION['first_name'])) {

echo '<div class="shadow2"><center><img src="/images/MARK.png" width="150" height="111"></center></div>';
echo "<center>{$_SESSION['username']}</center>";


	require('yahtzee_connect.php');

	
	$scheme = "SELECT COUNT(*) AS a FROM information_schema.tables WHERE table_schema = 'realblac_yahtzee'";

	$run1 = @mysqli_query($dbcyah, $scheme);

		if($run1) {

			while($zoop = mysqli_fetch_array($run1, MYSQLI_ASSOC)) {
		
				$ze = $zoop['a'] - 1;  //tables besides gamerprofile
				$we = $ze - 1;  //array extraction
				}
				}
	$forcez = array();
	$shieldz = array();			
	$sayanz = array();
	$sayan2z = array();
	$final = array();
	$bank = array();
	$bank2 = array();
	$name = $_SESSION['username'];
	$champz = array();
	
	for($line = 1; $line <= $ze; $line++) {
	
	$pow = $line - 1;
	
	$k = GameC;
	$table = $k.=$line;
	
	
	include('includes/allwins.php');
	
	
	$u = "SELECT COUNT(*) AS LG FROM `$table` WHERE `yahtzee` != 0 AND player_name = '$name'";
	
	$fuzz = @mysqli_query($dbcyah, $u);
	
		if($fuzz) {
				while($row5 = mysqli_fetch_array($fuzz, MYSQLI_ASSOC))
					$bank[] = $row5['LG'];}
								
	$ee = "SELECT COUNT(*) AS LG FROM `$table` WHERE `yahtzee_bonus` != 0 AND player_name = '$name'";	
	
	$full = @mysqli_query($dbcyah, $ee);
		
		if($full) {	
				while($row6 = mysqli_fetch_array($full, MYSQLI_ASSOC))
					$bank2[] = $row6['LG'];}
					
					
	
}  // End of table for loop //
		
	
	$yz = $final[0] + $final[1] + $final[2] + $final[3] + $final[4] + $final[5] + $final[6] + $final[7];
	
	for($xz = 0; $xz <= $yz; $xz++){
		
		if($champz[$xz] == $_SESSION['username']) {$num2z = 1;} else {$num2z = 0;}
		
			$count2z = ($count2z + $num2z);
			
		if($sayanz[$xz] == $_SESSION['username']) {$num3z = 1;} else {$num3z = 0;}
		
			$count3z = ($count3z + $num3z);
			
		if($sayan2z[$xz] == $_SESSION['username']) {$num4z = 1;} else {$num4z = 0;}
		
			$count4z = ($count4z + $num4z);
			
		if($forcez[$xz] == $_SESSION['username']) {$num5z = 1;} else {$num5z = 0;}
		
			$count5z = ($count5z + $num5z);
			
		if($shieldz[$xz] == $_SESSION['username']) {$num6z = 1;} else {$num6z = 0;}
		
			$count6z = ($count6z + $num6z);
			
		}

		
		
		
	echo '<center><img src="images/wins.png" height="60" width="60">';   echo '<span style="color:#66FF00">' . $count2z . '</span></center>';
	
	echo '<p><center><img src="images/sayan.png" height="75" width="50">';   echo '<span style="color:#66FF00">' . $count3z . '</span>';
	
	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/force.png" height="60" width="40">';   echo '<span style="color:#66FF00">' . $count5z . '</span></center></p>';
	
	echo '<p><center><img src="images/sayanblue.png" height="75" width="50">';   echo '<span style="color:#66FF00">' . $count4z . '</span>';
	
	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/lion.png" height="40" width="30">';   echo '<span style="color:#66FF00">' . $count6z . '</span></center></p>';
				
				 for($nZ = 0; $nZ <= $we; $nZ++) { $full = $full + $bank[$nZ];}
				 for($nZ = 0; $nZ <= $we; $nZ++) { $fuzz = $fuzz + $bank2[$nZ];}
				
						
						
						
						echo '
						
						<table><tr>
						
						
						<th>   </th>
						<th>   </th></tr>
						
						<tr>
						
						<td> yahtzee </td>
			 			<td><span style="color:#66FF00">'. $full . '</span></td> 
			 			</tr>
			 			
			 			</table>';
						
						echo '
						
						<table>
						
						<tr>
						
						
						<th>  </th>
						<th>  </th>
						
						</tr>
						
						<tr>
						
						
						<td> yahtzee bonus</td>
			 			<td><span style="color:#66FF00">'. $fuzz . '</span></td> 
			 			
			 			</tr>
			 			
			 			</table>';
						
					
				mysqli_close($dbcyah);				

}// End of isset Session//

?>

</div>	

<main>

<br />
<div class="formone">
<div class="shadow2"><span style="color:#FFFFFF"><h2>CHAMPIONSHIP SCORECARD</h2></span></div>
<form action="checkstats.php" method="POST">

<div class="radiogroup"><div class="shadow2">

<?php for($x = 0; $x <= $b; $x++){ echo '<input type="radio" id="option' . $x . '" name="tab" value="' . $loo[$x] . '">'; echo '<label for="option' . $x . '">' . $loo[$x] . '</label>'; } ?></div>

<p><input type="submit" id="submit1" name="scorecard" value="Scorecard"></p>

</div>

</form>
</div>
<br />	
<br />
	

<div class="formtwo">
<form action="checkstats.php" method="POST"><div class="shadow2"><span style="color:#FFFFFF"> <h2>CHECK OUT YOUR STATS</h2></span> <sub>choose 3 variables</sub></div>

<div class="column">
	<div class="shadow2">
<h3><span style="color:#00FFFF">Championship</span></h3>

<?php for($x = 0; $x <= $b; $x++){ echo '<p><input type="radio" id="c' . $x . '" name="table" value="' . $loo[$x] . '"><label for="c' . $x . '">' . $loo[$x] . '</label>'; } ?>

<input type="radio" id="all" name="table" value="all"><label for="all">All</label>
</div>
</div>


<div class="column">
	<div class="shadow2">
<h3><span style="color:#00FFFF">Player</span></h3>

<input type="radio" id="ben" name="name" value="BEN"> <label for="ben">BEN</label>
<input type="radio" id="mat" name="name" value="MAT"><label for="mat"> MAT</label>
<input type="radio" id="mike" name="name" value="MIKE"><label for="mike"> MIKE</label>

</div>
</div>

<div class="column"> 
	<div class="shadow2">

 <h3><span style="color:#00FFFF">Category</span></h3> 
<input type="radio" id="bonus" name="category" value="bonus"><label for="bonus">BONUS</label>
<input type="radio" id="bonus2" name="category" value="three_of_kind"> <label for="bonus2">THREE OF A KIND</label>
<input type="radio" id="bonus3" name="category" value="four_of_kind"><label for="bonus3"> FOUR OF A KIND</label>
<input type="radio" id="bonus4" name="category" value="fullhouse"> <label for="bonus4">FULLHOUSE</label>
<input type="radio" id="bonus5" name="category" value="small_straight"> <label for="bonus5">SMALL STRAIGHT</label>
<input type="radio" id="bonus6" name="category" value="large_straight"><label for="bonus6">LARGE STRAIGHT</label>
<input type="radio" id="bonus7" name="category" value="yahtzee"> <label for="bonus7">YAHTZEE</label>
<input type="radio" id="bonus8" name="category" value="yahtzee_bonus"> <label for="bonus8">YAHTZEE BONUS</label>

</div>
</div>

<p>
<input type="submit" id="submit2" name="stats" value="Check Stats">
</p>
</form>
</div>

</main>


<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){   

require('yahtzee_connect.php');

		if(isset($_POST['scorecard'])){


			
	echo '<div class="box">';
	
	$table = $_POST['tab'];	
	$champ = array();  
	$sayan = array(); 
	$sayan2[] = array(); 
	$force[] = array(); 
	$shield[] = array(); 
	$googly[] = array(); 
	$keeper[] = array(); 
	$injury = array();

	
	$q = "SELECT MAX(`game_id`) AS high FROM `$table`";
	

$run = @mysqli_query($dbcyah, $q);

	if($run) {
	
		while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {
		
		
			$f = $row['high'];	$e = $f - 1;		$d = $f-2;
			
			
			
			
			$z = ($f/3);			//Number of games//
			
			$y = ($z - 1);			//Array count//
			
	
			
		}
	} 
	
	//---------Extract player names and associated totals-----------//  //array needs improvement, not scalable//
	
	echo '<div class="game">';  		
	
	
	echo '<center><h3><span style="color: #FFFF00">GAME PROGRESSION</span></h3></center>';
	
	
	include('includes/gameprog.php');
		

	echo '<br /></div>';
	
		
		//-------Associate specific player names with the according win count--------//
		
			
	for($x = 0; $x <= $y; $x++){
		
		if($champ[$x] == $name2) {$num2 = 1;} else {$num2 = 0;}
		
		if($champ[$x] == $name3) {$num3 = 1;} else {$num3 = 0;}
		
		if($champ[$x] == $name4) {$num4 = 1;} else {$num4 = 0;}
		
		$count2 = ($count2 + $num2);
		$count3 = ($count3 + $num3);
		$count4 = ($count4 + $num4);
		
		if($sayan[$x] == $name2) {$say5 = 1;} else {$say5 = 0;}
		
		if($sayan[$x] == $name3) {$say6 = 1;} else {$say6 = 0;}
		
		if($sayan[$x] == $name4) {$say7 = 1;} else {$say7 = 0;}
		
		$count5 = ($count5 + $say5);
		$count6 = ($count6 + $say6);
		$count7 = ($count7 + $say7);

		if($sayan2[$x] == $name2) {$say8 = 1;} else {$say8 = 0;}
		
		if($sayan2[$x] == $name3) {$say9 = 1;} else {$say9 = 0;}
		
		if($sayan2[$x] == $name4) {$say10 = 1;} else {$say10 = 0;}
		
		$count8 = ($count8 + $say8);
		$count9 = ($count9 + $say9);
		$count10 = ($count10 + $say10);
		
		if($force[$x] == $name2) {$say11 = 1;} else {$say11 = 0;}
		
		if($force[$x] == $name3) {$say12 = 1;} else {$say12 = 0;}
		
		if($force[$x] == $name4) {$say13 = 1;} else {$say13 = 0;}
		
		$count11 = ($count11 + $say11);
		$count12 = ($count12 + $say12);
		$count13 = ($count13 + $say13);
		
		if($shield[$x] == $name2) {$say14 = 1;} else {$say14 = 0;}
		
		if($shield[$x] == $name3) {$say15 = 1;} else {$say15 = 0;}
		
		if($shield[$x] == $name4) {$say16 = 1;} else {$say16 = 0;}
		
		$count14 = ($count14 + $say14);
		$count15 = ($count15 + $say15);
		$count16 = ($count16 + $say16);
		
		if($googly[$x] == $name2) {$say17 = 1;} else {$say17 = 0;}
		
		if($googly[$x] == $name3) {$say18 = 1;} else {$say18 = 0;}
		
		if($googly[$x] == $name4) {$say19 = 1;} else {$say19 = 0;}
		
		$count17 = ($count17 + $say17);
		$count18 = ($count18 + $say18);
		$count19 = ($count19 + $say19);
		
		if($keeper[$x] == $name2) {$say20 = 1;} else {$say20 = 0;}
		
		if($keeper[$x] == $name3) {$say21 = 1;} else {$say21 = 0;}
		
		if($keeper[$x] == $name4) {$say22 = 1;} else {$say22 = 0;}
		
		$count20 = ($count20 + $say20);
		$count21 = ($count21 + $say21);
		$count22 = ($count22 + $say22);
		
		if($injury[$x] == $name2) {$say23 = 1;} else {$say23 = 0;}
		
		if($injury[$x] == $name3) {$say24 = 1;} else {$say24 = 0;}
		
		if($injury[$x] == $name4) {$say25 = 1;} else {$say25 = 0;}
		
		$count23 = ($count23 + $say23);
		$count24 = ($count24 + $say24);
		$count25 = ($count25 + $say25);
		
		

		
	}
		
		//-------Show player name and associated win count----------//
			

	$BLUESAYAN = '<img src="images/sayanblue.png" height="75" width="50">';
	$SUPERSAYAN = '<img src="images/sayan.png" height="75" width="50">';
	$FORCEFIELD = '<img src="images/force.png" height="60" width="40">';
	$LION = '<img src="images/lion.png" height="40" width="30">';
	$TROPHY = '<img src="images/trophy.png" height="20" width="10">';
		
	
	echo '<div class="wins">';
	
	echo "<h1><center>$table</h1></center>";
	
	if($count2 == 10) {echo '<center><img src="images/trophy.png" height="50" width="30">: <b><span style="color: #66FF00">' . $name2 . '</span></b></center>';}
	if($count3 == 10) {echo '<center><img src="images/trophy.png" height="50" width="30">: <b><span style="color: #66FF00">' . $name3 . '</span></b></center>';}
	if($count4 == 10) {echo '<center><img src="images/trophy.png" height="50" width="30">: <b><span style="color: #66FF00">' . $name4 . '</span></b></center>';}
	
	
	echo '<center><h2><span style="color: #FF0000">STATS</span></h2></center>';
	
	echo 
	
		'<center><table>
		
		<tr align="center">
			<th> Player   	</th> 
			<th> Wins 	</th>';
			
	if($count23 OR $count24 OR $count25 > 0) { 
	
	echo '	<th> Injuries </th>';}
			
			 
	echo 	'<th> Keeper </th>    
		</tr>
		<tr align="center">';
		
		if($count2 >= 10) {echo'<td>' . $TROPHY . '<span style="color: #66FF00"> ' . $name2 . '</span> </td>';} 
		elseif($count3 >= 10){echo'<td><span style="color: #FF0000"> ' . $name2 . '</span> </td>';}
		elseif($count4 >= 10){echo'<td><span style="color: #FF0000"> ' . $name2 . '</span> </td>';}
		else {echo '<td> ' . $name2 . ' </td>';}
		
		
		echo		'<td> ' . $WINS . '' . $count2 . '</td>';
	
	
	if($count23 > 0) { echo 
	
			'<td> ' . $INJURY . '' . $count23 . '</td>';} 
			elseif ($count23 && $count24 && $count25 = 0) {}
			else { 
			echo '<td> </td>';
			}
			
			
			
			
	echo 
			'<td> ' . $KEEPER . '' . $count20 . '</td>
		
		</tr>
		<tr align="center">';
		
		if($count3 >= 10) {echo'<td>' . $TROPHY . '<span style="color: #66FF00"> ' . $name3 . '</span> </td>';} 
		elseif($count2 >= 10){echo'<td><span style="color: #FF0000"> ' . $name3 . '</span> </td>';}
		elseif($count4 >= 10){echo'<td><span style="color: #FF0000"> ' . $name3 . '</span> </td>';}
		else {echo '<td> ' . $name3 . ' </td>';}
		
		
		echo		'<td> ' . $WINS . '' . $count3 . '</td>';
	
	if($count24 > 0) { 
	
		echo '<td> ' . $INJURY . '' . $count24 . '</td>';} 
			
			elseif ($count23 && $count24 && $count25 = 0) {}
			
			else { 
			
			echo '<td> </td>';
			
			}
			
			
			
			
	echo 

			'<td> ' . $KEEPER . '' . $count21 . '</td>
		
		</tr>
		<tr align="center">';
		
		if($count4 >= 10) {echo'<td>' . $TROPHY . '<span style="color: #66FF00"> ' . $name4 . '</span> </td>';} 
		elseif($count2 >= 10){echo'<td><span style="color: #FF0000"> ' . $name4 . '</span> </td>';}
		elseif($count3 >= 10){echo'<td><span style="color: #FF0000"> ' . $name4 . '</span> </td>';}
		else {echo '<td> ' . $name4 . ' </td>';}
		
		
		echo		'<td> ' . $WINS . '' . $count4 . '</td>';
	
	if($count25 > 0) { echo '
			<td> ' . $INJURY . '' . $count25 . '</td>';} 
			
			elseif ($count23 && $count24 && $count25 = 0) {}
			
			else { 
			echo '<td> </td>';
			}
			
			
			
			
	echo 
			'<td> ' . $KEEPER . '' . $count22 . '</td>
		
		</tr>
		</table></center></div>';
			
		
		echo '<div class="wins2"><center><h3><span style="color: #00FFFF">ATTRIBUTES</span></h3></center><center><table>
	
		<tr align="center">
			<th> Player   </th>
			 
			<th> SuperSayan </th> 
		
			<th> Sayan </th> 
			
			<th> Force </th> 
			
			<th> Shield </th> 
			  
		</tr>
		<tr align="center">
			<td> ' . $name2 . ' </td>';
			
			
		if($count5 > 0){ echo '<td> ' . $SUPERSAYAN . '' . $count5 . '	</td>';} else {echo '<td></td>';}	
		if($count8 > 0){ echo '	<td> ' . $BLUESAYAN . ' ' . $count8 . '	</td>';} else {echo '<td></td>';}
		if($count11 > 0){ echo '<td> ' . $FORCEFIELD . '' . $count11 . '</td>';} else {echo '<td></td>';}
		if($count14 > 0){ echo '<td> ' . $LION . '' . $count14 . '</td>';} else {echo '<td></td>';}
		
		echo '</tr>
		<tr align="center">
			<td> ' . $name3 . '	</td>';
			
			
		if($count6 > 0){ echo '<td> ' . $SUPERSAYAN . ' ' . $count6 . '</td>';} else {echo '<td></td>';}
		if($count9 > 0){ echo '<td> ' . $BLUESAYAN . ' ' . $count9 . '</td>';} else {echo '<td></td>';}
		if($count12 > 0){ echo '<td> ' . $FORCEFIELD . '' . $count12 . '</td>';} else {echo '<td></td>';}
		if($count15> 0){ echo '<td> ' . $LION . '' . $count15 . '</td>';} else {echo '<td></td>';}
		
		echo '</tr>
		<tr align="center">
			<td> ' . $name4 . '	</td>';
			
		if($count7 > 0){ echo '<td> ' . $SUPERSAYAN . ' ' . $count7 . '</td>';} else {echo '<td></td>';}
		if($count10 > 0){ echo '<td> ' . $BLUESAYAN . '	' . $count10 . '</td>';} else {echo '<td></td>';}
		if($count13 > 0){ echo '<td> ' . $FORCEFIELD . '' . $count13 . '</td>';} else {echo '<td></td>';}
		if($count16 > 0){ echo '<td> ' . $LION . '' . $count16 . '</td>';} else {echo '<td></td>';}
		
		echo '</tr>
		</table></center></div>';
		
		}
		
		
	 echo '</div>';	
	 
	 }// End of scorecard input	
	 
	 
	 if(isset($_POST['stats'])) {	echo '<div class="box">';
	 
	$name = mysqli_real_escape_string($dbcyah, trim($_POST['name']));
	$table = mysqli_real_escape_string($dbcyah, trim($_POST['table']));
	$cat = mysqli_real_escape_string($dbcyah, trim($_POST['category']));
	$all = mysqli_real_escape_string($dbcyah, trim($_POST['all']));

	if($table !== 1) {

	$a = "SELECT COUNT(*) AS LG FROM `$table` WHERE $cat != 0 AND player_name = '$name'";
	$rb = @mysqli_query($dbcyah, $a);
		if($rb) {
				while($row1 = mysqli_fetch_array($rb, MYSQLI_ASSOC))
					echo '<center>
						
						<table><tr>
						
						<th>   Player </th>
						<th>  Category </th>
						<th>  Count  </th></tr>
						
						<tr>
						<td>' . $name . ' </td>
						<td>' . $cat . ' </td>
			 			<td>'. $row1['LG'] . '</td> 
			 			</tr>
			 			
			 			</table></center>';}
								
	$c = "SELECT COUNT(*) AS LG FROM `$table` WHERE $cat = 0 AND player_name = '$name'";	
	$r3k = @mysqli_query($dbcyah, $c);
		if($r3k) {	
				while($row2 = mysqli_fetch_array($r3k, MYSQLI_ASSOC))
					echo '<p><center>
						
						<table><tr>
						
						<th>   Player </th>
						<th>  Category </th>
						<th>  Zeros  </th></tr>
						
						<tr>
						<td>' . $name . ' </td>
						<td>' . $cat . ' </td>
			 			<td>'. $row2['LG'] . '</td> 
			 			</tr>
			 			
			 			</table></center></p>';}							
}
	if($table == all) {
	
	$q1 = "SELECT COUNT(*) AS a FROM information_schema.tables WHERE table_schema = 'realblac_yahtzee'";

	$r1 = @mysqli_query($dbcyah, $q1);

		if($r1) {

			while($roop = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
		
				$z = $roop['a'] - 1;  //tables besides gamerprofile
				$w = $z - 1;  //array extraction
				}}
	
	
	$bank3 = array();
	$bank4 = array();
	
	for($b = 1; $b <= $z; $b++) {
	
	$k = GameC;
	$table = $k.=$b;
	
	$d = "SELECT COUNT(*) AS LG FROM `$table` WHERE $cat != 0 AND player_name = '$name'";
	$fuzz = mysqli_query($dbcyah, $d);
		if($fuzz) {
				while($row3 = mysqli_fetch_array($fuzz, MYSQLI_ASSOC))
					$bank3[] = $row3['LG'];}
								
	$e = "SELECT COUNT(*) AS LG FROM `$table` WHERE $cat = 0 AND player_name = '$name'";	
	$full = mysqli_query($dbcyah, $e);
		if($full) {	
				while($row4 = mysqli_fetch_array($full, MYSQLI_ASSOC))
					$bank4[] = $row4['LG'];}
	
	
	}
				
				 for($n = 0; $n <= $w; $n++) { $full = $full + $bank3[$n];}
				 for($n = 0; $n <= $w; $n++) { $fuzz = $fuzz + $bank4[$n];}
				
						
						echo '<center>
						
						<table><tr>
						
						<th>   Player </th>
						<th>  Category </th>
						<th>  Count  </th></tr>
						
						<tr>
						<td>' . $name . ' </td>
						<td>' . $cat . ' </td>
			 			<td>'. $full . '</td> 
			 			</tr>
			 			
			 			</table></center>';
						
						echo '<p><center>
						
						<table>
						
						<tr>
						
						<th>   Player </th>
						<th>  Category </th>
						<th>  Zeros  </th>
						
						</tr>
						
						<tr>
						
						<td>' . $name . ' </td>
						<td>' . $cat . ' </td>
			 			<td>'. $fuzz . '</td> 
			 			
			 			</tr>
			 			
			 			</table></center></p>';
						
				}	
				
			mysqli_close($dbcyah);	

	 	echo '</div>';
	 	
	 } // End of stats input
	 	 
	 
	 
		
?>




</body>
</html>