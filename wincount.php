<!DOC TYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="wincount.css">
</head>
<body> 

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

require('yahtzee_connect.php');

	
	$table = $_POST['tab'];	$champ = array();  $sayan = array(); $sayan2[] = array(); $force[] = array(); $shield[] = array(); $googly[] = array(); $keeper[] = array(); $injury = array();

	
	$q = "SELECT MAX(`game_id`) AS high FROM `$table`";
	

$run = @mysqli_query($dbcyah, $q);

	if($run) {
	
		while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {
		
		
			$f = $row['high'];	$e = $f - 1;		$d = $f-2;
			
			
			
			
			$z = ($f/3);			//Number of games//
			
			$y = ($z - 1);			//Array count//
			
	
			
		}
	} echo "<h1><center>$table</h1></center>";
	
	echo '<div class="game">';  echo "<center><h3>GAME PROGRESSION</h3></center>";
	
	
	//---------Extract player names and associated totals-----------//  //array needs improvement, not scalable//	


	for($a = 1, $b = 2, $c = 3; $a <= $d, $b <= $e, $c <= $f; $a += 3, $b += 3, $c += 3) {
	
		$q2 = "SELECT `total` AS total2, `player_name` AS name2 FROM `$table` WHERE game_id = $a"; 
		$q3 = "SELECT `total` AS total3, `player_name` AS name3 FROM `$table` WHERE game_id = $b"; 
		$q4 = "SELECT `total` AS total4, `player_name` AS name4 FROM `$table` WHERE game_id = $c";
		
		$run2 = @mysqli_query($dbcyah, $q2);
		while($row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC)) {
			$total2 = $row2['total2'];
			$name2  = $row2['name2'];
			$win2	= array($name2, $total2);
			}
		
		$run3 = @mysqli_query($dbcyah, $q3);
		while($row3 = mysqli_fetch_array($run3, MYSQLI_ASSOC)) {
			$total3 = $row3['total3'];
			$name3  = $row3['name3'];
			$win3	= array($name3, $total3);
			}
			
		$run4 = @mysqli_query($dbcyah, $q4);
		while($row4 = mysqli_fetch_array($run4, MYSQLI_ASSOC)) {
			$total4 = $row4['total4'];
			$name4  = $row4['name4'];
			$win4	= array($name4, $total4);
			}
			
		
		//--------Bank the name of the winner of each particular game---------//
		
		$n += 1;
		
//----------------------------------------------------------------------// 	
		 
		if(($total2 > $total3) && ($total2 > $total4)) { echo "<br /> Game $n ----------------------------------------------------------------------";
			
			$champ[] = $win2[0];
				
				if($total2 == $win2[1]) {  echo '<br />&nbsp&nbsp&nbsp&nbsp&nbsp<img src="wins.png" height="40" width="40">'; echo "&nbsp&nbsp&nbsp$win2[0] <b>$total2</b>";}
				
					//Sayan Rules-----------------------//
					
					if($total2 > 500) {echo '&nbsp&nbsp<img src="sayan.png" height="75" width="50">';  $sayan[] = $win2[0];}
					elseif($total2 > 400) {echo '&nbsp&nbsp<img src="sayan2.png" height="75" width="50">'; $sayan2[] = $win2[0];}
					
					if($total3 > 500) {echo '&nbsp&nbsp<img src="sayan.png" height="75" width="50">';echo "$win3[0] $win3[1]"; $sayan[] = $win3[0];}
					elseif($total3 > 400) {echo '&nbsp&nbsp<img src="sayan2.png" height="75" width="50">'; echo "$win3[0] $win3[1]"; $sayan2[] = $win3[0];}
					
					if($total4 > 500) {echo '&nbsp&nbsp<img src="sayan.png" height="75" width="50">';echo "$win4[0] $win4[1]";$sayan[] = $win4[0];}
					elseif($total4 > 400) {echo '&nbsp&nbsp<img src="sayan2.png" height="75" width="50">'; echo "$win4[0] $win4[1]";$sayan2[] = $win4[0];}
					
					//Sayan Rules-----------------------//
					
					//Heartbreak Bonus-----------------------//
					
		
					if($total2 == $total3 + 1) { echo '<br /><img src="hb.png" height="50" width="75">'; 
										
										echo "  Heartbreak Bonus!  $win3[0] had <b>$total3</b>";}
						
						if($total2 == $total4 + 1) { echo '<br /><img src="hb.jpeg" height="50" width="75">'; 
										
		
										echo "  Heartbreak Bonus!  $win4[0] had <b>$total4</b>";}
										
					//Heartbreak Bonus-----------------------//
					
					//Googly Eyes-----------------------//
					
						if($total2 < 400){
							
							if($total2 - 10 <= $total3 && $total2 != $total3 + 1) {echo '&nbsp&nbsp<img src="googly.jpeg" height="25" width="30">';$googly[] = $win2[0];}
						
								
							if($total2 - 10 <= $total4 && $total2 != $total4 + 1) {echo '&nbsp&nbsp<img src="googly.jpeg" height="25" width="30">';$googly[] = $win2[0];}
							
					
					
					}
					
					//Googly Eyes-----------------------//
					
					//Defense-----------------------//
				
				
				if($total2 <= 300) {
				
					if(($total2 > $total3 + 60) && ($total2 > $total4 + 60)){echo '&nbsp&nbsp<img src="lion.jpg" height="40" width="30">';
						$shield[] = $win2[0];}
						}
						
				if($total4 > 400) {
				
					if(($total4 > $total2 + 200) && ($total4 > $total2 + 200)){echo '&nbsp&nbsp<img src="force.png" height="60" width="40">';
						$force[] = $win2[0];}
						}
				
					//Defense-----------------------//
				
				//Keeper-----------------------//
				
				if($total3 > $total4) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="keeper.jpg" height="25" width="25">'; echo " $win4[0]"; $keeper[] = $win4[0];} else {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="keeper.jpg" height="25" width="25">'; echo "$win3[0]"; $keeper[] = $win3[0];}
				
				//Keeper-----------------------//
				
				//Stretcher-----------------------//
				
					if($total2 <= 150) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="injury.jpg" height="30" width="50">'; echo "$win2[0]"; $injury[] = $win2[0];}	
				if($total3 <= 150) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="injury.jpg" height="30" width="50">'; echo "$win3[0]"; $injury[] = $win3[0];}
				if($total4 <= 150) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="injury.jpg" height="30" width="50">'; echo "$win4[0]"; $injury[] = $win4[0];}
				
				//Stretcher-----------------------//
		} 
		
		
//----------------------------------------------------------------------//	
		
		if(($total3 > $total2) && ($total3 > $total4)) {  echo "<br /> Game $n ----------------------------------------------------------------------";
			
			$champ[] = $win3[0];
				
				if($total3 == $win3[1]) { echo '<br />&nbsp&nbsp&nbsp&nbsp&nbsp<img src="wins.png" height="40" width="40">'; echo "&nbsp&nbsp&nbsp$win3[0] <b>$total3</b>";}
				
				
				//Sayan Rules-----------------------//
				
				
				if($total3 > 500) {echo '&nbsp&nbsp<img src="sayan.png" height="75" width="50">'; $sayan[] = $win3[0];} 
				elseif($total3 > 400) {echo '&nbsp&nbsp<img src="sayan2.jpg" height="75" width="50">'; $sayan2[] = $win3[0];}
				
				if($total2 > 500) {echo '&nbsp&nbsp<img src="sayan.png" height="75" width="50">';echo "$win2[0] $win2[1]";$sayan[] = $win2[0];}
				elseif($total2 > 400) {echo '&nbsp&nbsp<img src="sayan2.jpg" height="75" width="50">'; echo "$win2[0] $win2[1]";$sayan2[] = $win2[0];}
					
				if($total4 > 500) {echo '&nbsp&nbsp<img src="sayan.png" height="75" width="50">';echo "$win4[0] $win4[1]";$sayan[] = $win4[0];}
				elseif($total4 > 400) {echo '&nbsp&nbsp<img src="sayan2.jpg" height="75" width="50">'; echo "$win4[0] $win4[1]";$sayan2[] = $win4[0];}
				
				
				//Sayan Rules-----------------------//
				
				//Heart Break Bonus-----------------------//
		
					if($total3 == $total2 + 1) { echo '<br /><img src="hb.jpeg" height="50" width="75">';
										
										echo "  Heartbreak Bonus!  $win2[0] had <b>$total2</b>";}
					
						if($total3 == $total4 + 1) { echo '<br /><img src="hb.jpeg" height="50" width="75">';
										
										echo "  Heartbreak Bonus!  $win4[0] had <b>$total4</b>";}
										
				//Heart Break Bonus-----------------------//
				
				//Googly Eyes-----------------------//
					
						if($total3 < 400){
							
							if($total3 - 10 <= $total2 && $total3 != $total2 + 1) {echo '&nbsp&nbsp<img src="googly.jpeg" height="25" width="30">';$googly[] = $win3[0];}
				
					
							if($total3 - 10 <= $total4 && $total3 != $total4 + 1) {echo '&nbsp&nbsp<img src="googly.jpeg" height="25" width="30">';$googly[] = $win3[0];}
								
							}
					
				//Googly Eyes-----------------------//
				
				//Shield-----------------------//					
				
				
				if($total3 <= 300) {
				
					if(($total3 > $total2 + 60) && ($total3 > $total4 + 60)){echo '&nbsp&nbsp<img src="lion.jpg" height="40" width="30">';
						$shield[] = $win3[0];}
						}
						
				//Shield-----------------------//
				
				//Force Field-----------------------//		
						
				if($total3 > 300) {
				
					if(($total3 > $total2 + 200) && ($total3 > $total4 + 200)){echo '&nbsp&nbsp<img src="force.png" height="60" width="40">';
						$force[] = $win3[0];}
						}
						
				//Force Field-----------------------//	
				
				//Keeper-----------------------//
			
				
			if($total2 > $total4) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="keeper.jpg" height="25" width="25">'; echo "$win4[0]"; $keeper[] = $win4[0];} else {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="keeper.jpg" height="25" width="25">'; echo "$win2[0]";$keeper[] = $win2[0];}
			
				//Keeper-----------------------//
				
				//Strecher-----------------------//
			
			if($total2 <= 150) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="injury.jpg" height="30" width="50">'; echo "$win2[0]"; $injury[] = $win2[0];}	
				if($total3 <= 150) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="injury.jpg" height="30" width="50">'; echo "$win3[0]"; $injury[] = $win3[0];}
				if($total4 <= 150) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="injury.jpg" height="30" width="50">'; echo "$win4[0]"; $injury[] = $win4[0];}
				
				//Strecher-----------------------//
								
		} 
		  
		  
//----------------------------------------------------------------------//	
		
		if(($total4 > $total2) && ($total4 > $total3)) { echo "<br /> Game $n ----------------------------------------------------------------------";
			
			$champ[] = $win4[0];
				
				if($total4 == $win4[1]) { echo '<br />&nbsp&nbsp&nbsp&nbsp&nbsp<img src="wins.png" height="40" width="40">'; echo "&nbsp&nbsp&nbsp$win4[0] <b>$total4</b>";}
				
				//Sayan Rules-----------------------//
				
				if($total4 > 500) {echo '&nbsp&nbsp<img src="sayan.png" height="75" width="50">'; $sayan[] = $win4[0];}
				elseif($total4 > 400) {echo '&nbsp&nbsp<img src="sayan2.jpg" height="75" width="50">'; $sayan2[] = $win4[0];}
				
				if($total2 > 500) {echo '&nbsp&nbsp<img src="sayan.png" height="75" width="50">';echo "$win2[0] $win2[1]";$sayan[] = $win2[0];}
				elseif($total2 > 400) {echo '&nbsp&nbsp<img src="sayan2.jpg" height="75" width="50">'; echo "$win2[0] $win2[1]";$sayan2[] = $win2[0];}
					
				if($total3 > 500) {echo '&nbsp&nbsp<img src="sayan.png" height="75" width="50">';echo "$win3[0] $win3[1]"; $sayan[] = $win3[0];}
				elseif($total3 > 400) {echo '&nbsp&nbsp<img src="sayan2.jpg" height="75" width="50">'; echo "$win3[0] $win3[1]"; $sayan2[] = $win3[0];}
				
				//Sayan Rules-----------------------//
				
				//Heartbreak Bonus-----------------------//
		
					if($total4 == $total2 + 1) { echo '<br /><img src="hb.jpeg" height="50" width="75">';
										
										echo "  Heartbreak Bonus! $win2[0] had <b>$total2</b>";}
					
						if($total4 == $total3 + 1) { echo '<br /><img src="hb.jpeg" height="50" width="75">';
										
										echo "  Heartbreak Bonus! $win3[0] had <b>$total3</b>";}
										
				//Heartbreak Bonus-----------------------//
				
				//Googly Eyes-----------------------//
										
						if($total4 < 400){
										
							if($total4 - 10 <= $total2 && $total4 != $total2 + 1) {echo '&nbsp&nbsp<img src="googly.jpeg" height="25" width="30">';$googly[] = $win4[0];}
								
							
							if($total4 - 10 <= $total3 && $total4 != $total3 + 1) {echo '&nbsp&nbsp<img src="googly.jpeg" height="25" width="30">';$googly[] = $win4[0];}
								
							}	
					
					
				//Googly Eyes-----------------------//
				
				//Defense-----------------------//
					
					if($total4 <= 300) {
				
					if(($total4 > $total2 + 60) && ($total4 > $total2 + 60)){echo '&nbsp&nbsp<img src="lion.jpg" height="40" width="30">';
						$shield[] = $win4[0];}
						}
					
					if($total4 > 300) {
				
					if(($total4 > $total2 + 200) && ($total4 > $total3 + 200)){echo '&nbsp&nbsp<img src="force.png" height="60" width="40">';
						$force[] = $win4[0];}
						}
						
				//Defense-----------------------//
				
				//Keeper-----------------------//
	
				
			if($total2 > $total3) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="keeper.jpg" height="25" width="25">'; echo " $win3[0]";$keeper[] = $win3[0];} else {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="keeper.jpg" height="25" width="25">'; echo "$win2[0]"; $keeper[] = $win2[0];}
			
				//Keeper-----------------------//
				
				//Strecher-----------------------//
			
			if($total2 <= 150) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="injury.jpg" height="30" width="50">'; echo "$win2[0]"; $injury[] = $win2[0];}	
				if($total3 <= 150) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="injury.jpg" height="30" width="50">'; echo "$win3[0]"; $injury[] = $win3[0];}
				if($total4 <= 150) {echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="injury.jpg" height="30" width="50">'; echo "$win4[0]"; $injury[] = $win4[0];}		
							
				//Strecher-----------------------//
		} 
	
	} // end of for loop //

echo '</div>';
			
mysqli_close($dbcyah);
			
		
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
		
	if($count2 == 10) {echo "<center>THE CHAMP!<h3>$name2</h3></center>";}
	if($count3 == 10) {echo "<center>THE CHAMP!<h3>$name3</h3></center>";}
	if($count4 == 10) {echo "<center>THE CHAMP!<h3>$name4</h3></center>";}
		

	$bluesayan = '<img src="sayan2.jpg" height="75" width="50">';
	$supersayan = '<img src="sayan.png" height="75" width="50">';
	$forcefield = '<img src="force.png" height="60" width="40">';

		echo $bluesayan; echo "$count2 $count3 $count4";
	
	echo '<div class="wins"><center><h2>STATS</h2></center><table>';
	
	echo 
	
		'<tr>
			<th> Player   	</th> 
			<th> Wins 	</th> 
			<th> Total 	</th>';
			
	if($count23 OR $count24 OR $count25 > 0) { echo '	
			<th> Injuries </th> 
			<th> Total 	</th>';}
			
			 
	echo 		'<th> Keeper </th> 
			<th> Total </th>   
		</tr>
		<tr>
			<td> ' . $name2 . ' 	</td>
			<td> <img src="wins.png" height="40" width="40"> 	</td>
			<td> ' . $count2 . '</td>';
	
	
	if($count23 > 0) { echo 
	
			'<td> <img src="injury.jpg" height="30" width="50"></td>
			<td> ' . $count23 . '</td>';} elseif ($count23 && $count24 && $count25 = 0) {}
			else { echo '
			<td> </td>
			<td> </td>';
			}
			
			
			
			
	echo 
			'<td> <img src="keeper.jpg" height="25" width="25"></td>
			<td> ' . $count20 . '</td>
		
		</tr>
		<tr>
			<td> ' . $name3 . '	</td>
			<td> <img src="wins.png" height="40" width="40">  	</td>
			<td> ' . $count3 . '</td>';
	
	if($count24 > 0) { echo '
			<td> <img src="injury.jpg" height="30" width="50"></td>
			<td> ' . $count24 . '</td>';} elseif ($count23 && $count24 && $count25 = 0) {}
			else { echo '
			<td> </td>
			<td> </td>';
			}
			
			
			
			
	echo 

			'<td> <img src="keeper.jpg" height="25" width="25"></td>
			<td> ' . $count21 . '</td>
		
		</tr>
		<tr>
			<td> ' . $name4 . '	</td>
			<td> <img src="wins.png" height="40" width="40">  	</td>
			<td> ' . $count4 . '</td>';
	
	if($count25 > 0) { echo '
			<td> <img src="injury.jpg" height="30" width="50"></td>
			<td> ' . $count25 . '</td>';} elseif ($count23 && $count24 && $count25 = 0) {}
			
			else { echo '
			<td> </td>
			<td> </td>';
			}
			
			
			
			
	echo 
			'<td> <img src="keeper.jpg" height="25" width="25"></td>
			<td> ' . $count22 . '</td>
		
		</tr>
		</table></div>';
		
		
		
	
		
		
		
		
		echo '<div class="wins"><center><h3>ATTRIBUTES</h3></center><table>
	
		<tr>
			<th> Player   	</th> 
			<th> Sayan (Super)	</th> 
			<th> Total 	</th>
			<th> Sayan </th> 
			<th> Total 	</th>
			<th> Force </th> 
			<th> Total 	</th>  
			<th> Shield </th> 
			<th> Total 	</th>    
		</tr>
		<tr>
			<td> ' . $name2 . ' 		</td>
			<td> ' . $supersayan . '	</td>
			<td> ' . $count5 . '		</td>
			<td> ' . $bluesayan . ' 	</td>
			<td> ' . $count8 . '		</td>
			<td> <img src="force.png" height="60" width="40">	</td>
			<td> ' . $count11 . '</td>
			<td> <img src="lion.jpg" height="40" width="30">	</td>
			<td> ' . $count14 . '</td>
		
		</tr>
		<tr>
			<td> ' . $name3 . '	</td>
			<td> ' . $supersayan . ' 	</td>
			<td> ' . $count6 . '	 </td>
			<td> ' . $bluesayan . '	</td>
			<td> ' . $count9 . '</td>
			<td> <img src="force.png" height="60" width="40">	</td>
			<td> ' . $count12 . '</td>
			<td> <img src="lion.jpg" height="40" width="30">	</td>
			<td> ' . $count15 . '</td>
		
		</tr>
		<tr>
			<td> ' . $name4 . '	</td>
			<td> ' . $supersayan . ' 	</td>
			<td> ' . $count7 . '</td>
			<td> ' . $bluesayan . '	</td>
			<td> ' . $count10 . '</td>
			<td> <img src="force.png" height="60" width="40">	</td>
			<td> ' . $count13 . '</td>
			<td> <img src="lion.jpg" height="40" width="30">	</td>
			<td> ' . $count16 . '</td>
		
		</tr>
		</table></div>';
		
		}
		
		
			
		
?>

</div>
</body>
</html>