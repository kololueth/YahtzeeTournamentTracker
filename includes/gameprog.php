<?php

echo '<center><table>';

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
		
		$WINS = '<img src="images/wins.png" height="40" width="40">';
		$BLUESAYAN = '<img src="images/sayanblue.png" height="75" width="50">';
		$SUPERSAYAN = '<img src="images/sayan.png" height="75" width="50">';
		$HEARTBREAK = '<img src="images/hb.png" height="50" width="75">';
		$GOOGLY = '<img src="images/googly.png" height="25" width="30">';
		$LION = '<img src="images/lion.png" height="40" width="30">';
		$FORCE = '<img src="images/force.png" height="60" width="40">';
		$KEEPER = '<img src="images/keeper.png" height="25" width="25">'; 
		$INJURY = '<img src="images/injury.jpg" height="30" width="50">';
		
//FIRSTPLAYER========11111111FIRSTPLAYER========11111111FIRSTPLAYER========11111111FIRSTPLAYER========11111111// 	
		 
if(($total2 > $total3) && ($total2 > $total4)) { 
		
		if($n == 2 || $n == 4 || $n == 6 || $n == 8 || $n == 10 || $n == 12 || $n == 14 || $n == 16 || $n == 18 || $n == 20 || $n == 22 || $n == 24 || $n == 26){echo '<tr> <th bgcolor="#0000ff" width="400px">Game ' . $n . '</th> </tr>';} 
		
			else {
		
		echo '<tr> <th bgcolor="grey" width="400px">Game ' . $n . '</th> </tr>';}
		
			$champ[] = $win2[0];
			
			echo '<tr><td>';
				
		
	if($total2 == $win2[1]) {  
				echo $WINS; 
				
				echo "$win2[0] <b>$total2</b>";}
				
//Sayan Rules-----------------------//
					
	if($total2 > 500) {
	
	echo $SUPERSAYAN;  
	$sayan[] = $win2[0];
	}
		
		elseif($total2 > 400) {
		echo $BLUESAYAN; 
		$sayan2[] = $win2[0];
		}
					
	if($total3 > 500) {
	
	echo $SUPERSAYAN;
	echo "$win3[0] $win3[1]"; 
	$sayan[] = $win3[0];
	}
		
		elseif($total3 > 400) {
		echo $BLUESAYAN; 
		echo "$win3[0] $win3[1]"; 
		$sayan2[] = $win3[0];
		}
					
	if($total4 > 500) {
	
	echo $SUPERSAYAN;
	echo "$win4[0] $win4[1]";
	$sayan[] = $win4[0];
	}
			
		elseif($total4 > 400) {
		
		echo $BLUESAYAN;
		echo "$win4[0] $win4[1]";
		$sayan2[] = $win4[0];
		}
					
//Sayan Rules-----------------------//
					
//Heartbreak Bonus-----------------------//
					
		
	if($total2 == $total3 + 1) { 
	
	echo $HEARTBREAK; 
										
	echo "$win3[0] : <b>$total3</b>";
	}
						
	if($total2 == $total4 + 1) { 
	
	echo $HEARTBREAK; 
											
	echo "$win4[0] : <b>$total4</b>";
	}
										
//Heartbreak Bonus-----------------------//
					
//Googly Eyes-----------------------//
					
	if($total2 < 400){
							
		if($total2 - 10 <= $total3 && $total2 != $total3 + 1) {
		
		echo $GOOGLY;
		$googly[] = $win2[0];
		}
						
								
		if($total2 - 10 <= $total4 && $total2 != $total4 + 1) {
		
		echo $GOOGLY;
		$googly[] = $win2[0];
		}							
	}
//Googly Eyes-----------------------//					
					
										
//Shield-----------------------//
				
				
	if($total2 <= 350) {
				
		if(($total2 > $total3 + 60) && ($total2 > $total4 + 60)){
		
		echo $LION;
						
			$shield[] = $win2[0];
			
			}
			}
//Shield-----------------------//

//Force Field-----------------------//
						
	if($total4 > 400) {
				
		if(($total4 > $total2 + 200) && ($total4 > $total2 + 200)){
		
		echo $FORCE;
						
			$force[] = $win2[0];
			}
			}
				
//Force Field------------------------//
				
//Keeper-----------------------//
				
	if($total3 > $total4) {
	
	echo $KEEPER; 
	echo "$win4[0]"; 
	$keeper[] = $win4[0];
	
	} else {
		echo $KEEPER; 
		echo "$win3[0]"; 
		$keeper[] = $win3[0];}
				
//Keeper-----------------------//
				
//Stretcher-----------------------//
				
	if($total2 <= 150) {
	echo $INJURY; 
	echo "$win2[0]"; 
	$injury[] = $win2[0];
	}	
				
	if($total3 <= 150) {
	echo $INJURY; 
	echo "$win3[0]"; 
	$injury[] = $win3[0];
	}
				
	if($total4 <= 150) {
	echo $INJURY; 
	echo "$win4[0]"; 
	$injury[] = $win4[0];
	}
				
//Stretcher-----------------------//
	
	echo '</td></tr>';	}  
		
		
//SECONDPLAYER========222222222SECONDPLAYER========222222222SECONDPLAYER========222222222SECONDPLAYER========22//
		
if(($total3 > $total2) && ($total3 > $total4)) {  

	if($n == 2 || $n == 4 || $n == 6 || $n == 8 || $n == 10 || $n == 12 || $n == 14 || $n == 16 || $n == 18 || $n == 20 || $n == 22 || $n == 24 || $n == 26){echo '<tr> <th bgcolor="#0000ff" width="400px">Game ' . $n . '</th> </tr>';} 
		
			else {
		
		echo '<tr> <th bgcolor="grey" width="400px">Game ' . $n . '</th> </tr>';}
		-
		$champ[] = $win3[0];
			
		echo '<tr><td>';	
				
	if($total3 == $win3[1]) { 
	echo $WINS; 
	echo "$win3[0] <b>$total3</b>";
	}
				
				
//Sayan Rules-----------------------//
				
				
	if($total3 > 500) {
	echo $SUPERSAYAN; 
	$sayan[] = $win3[0];
	} 
		elseif($total3 > 400) {
		echo $BLUESAYAN;
	        $sayan2[] = $win3[0];
	        }
				
	if($total2 > 500) {
	echo $SUPERSAYAN;
	echo "$win2[0] $win2[1]";
	$sayan[] = $win2[0];
	}
		elseif($total2 > 400) {
		echo $BLUESAYAN; 
		echo "$win2[0] $win2[1]";
		$sayan2[] = $win2[0];
		}
					
	if($total4 > 500) {
	echo $SUPERSAYAN;
	echo "$win4[0] $win4[1]";
	$sayan[] = $win4[0];
	}
		elseif($total4 > 400) {
		echo $BLUESAYAN;
		 echo "$win4[0] $win4[1]";
		 $sayan2[] = $win4[0];
		 }
						
//Sayan Rules-----------------------//
				
//Heart Break Bonus-----------------------//
		
	if($total3 == $total2 + 1) { 
	
	echo $HEARTBREAK;
										
	echo "$win2[0] : <b>$total2</b>";
	}
					
	if($total3 == $total4 + 1) { 
	echo $HEARTBREAK;
										
	echo "$win4[0] : <b>$total4</b>";
	}
										
//Heart Break Bonus-----------------------//
				
//Googly Eyes-----------------------//
					
	if($total3 < 400){
							
		if($total3 - 10 <= $total2 && $total3 != $total2 + 1) {
		echo $GOOGLY;
		$googly[] = $win3[0];
		}
				
					
		if($total3 - 10 <= $total4 && $total3 != $total4 + 1) {
		echo $GOOGLY;
		$googly[] = $win3[0];
		}
	}						
//Googly Eyes-----------------------//
				
//Shield-----------------------//					
				
				
	if($total3 <= 350) {
				
		if(($total3 > $total2 + 60) && ($total3 > $total4 + 60)){
		
		echo $LION;
		
		$shield[] = $win3[0];
		
		}
		}
						
//Shield-----------------------//
				
//Force Field-----------------------//		
						
	if($total3 > 300) {
				
		if(($total3 > $total2 + 200) && ($total3 > $total4 + 200)){
		
		echo $FORCE;
						
		$force[] = $win3[0];
		
		}
		}
						
//Force Field-----------------------//	
				
//Keeper-----------------------//
			
				
	if($total2 > $total4) {
	
	echo $KEEPER; 
	
	echo "$win4[0]"; 
	
	$keeper[] = $win4[0];
	
		} else {
		echo $KEEPER;
	 	echo "$win2[0]";
	 	$keeper[] = $win2[0];}
			
//Keeper-----------------------//
				
//Strecher-----------------------//
			
	if($total2 <= 150) {
	echo $INJURY;
	 echo "$win2[0]"; 
	 $injury[] = $win2[0];
	 }
	 	
	if($total3 <= 150) {
	echo $INJURY;
	 echo "$win3[0]"; 
	 $injury[] = $win3[0];
	 }
	 
	if($total4 <= 150) {
	echo $INJURY; 
	echo "$win4[0]"; 
	$injury[] = $win4[0];
	}
				
//Strecher-----------------------//
								
	echo '</td></tr>';		} 
		  
		  
//THIRD PLAYER=======3333333THIRD PLAYER=======3333333THIRD PLAYER=======3333333THIRD PLAYER=======3333333THIRD PLAYER=======3333333//	
		
if(($total4 > $total2) && ($total4 > $total3)) { 

	if($n == 2 || $n == 4 || $n == 6 || $n == 8 || $n == 10 || $n == 12 || $n == 14 || $n == 16 || $n == 18 || $n == 20 || $n == 22 || $n == 24 || $n == 26){echo '<tr> <th bgcolor="#0000ff" width="400px">Game ' . $n . '</th> </tr>';} 
		
			else {
		
		echo '<tr> <th bgcolor="grey" width="400px">Game ' . $n . '</th> </tr>';}
		-
			$champ[] = $win4[0];
			
			echo '<tr><td>';
				
	if($total4 == $win4[1]) { 
	
	echo $WINS;  
	
	echo "$win4[0] <b>$total4</b>";
	
	}
				
//Sayan Rules-----------------------//
				
	if($total4 > 500) {
	echo $SUPERSAYAN; 
	$sayan[] = $win4[0];
	}
		elseif($total4 > 400) {
		echo $BLUESAYAN; 
		$sayan2[] = $win4[0];
		}
				
	if($total2 > 500) {
	echo $SUPERSAYAN;
	echo "$win2[0] $win2[1]";
	$sayan[] = $win2[0];
	}
		
		elseif($total2 > 400) {
		echo $BLUESAYAN; 
		echo "$win2[0] $win2[1]";
		$sayan2[] = $win2[0];
		}
					
	if($total3 > 500) {
	echo $SUPERSAYAN;
	echo "$win3[0] $win3[1]"; 
	$sayan[] = $win3[0];
	}
		elseif($total3 > 400) {
		echo $BLUESAYAN; 
		echo "$win3[0] $win3[1]"; 
		$sayan2[] = $win3[0];
		}
				
//Sayan Rules-----------------------//
				
//Heartbreak Bonus-----------------------//
		
	if($total4 == $total2 + 1) { 
	
	echo $HEARTBREAK;
										
	echo "$win2[0] : <b>$total2</b>";
	
	}
					
	if($total4 == $total3 + 1) { 
	
	echo $HEARTBREAK;
										
	echo "$win3[0] : <b>$total3</b>";
	
	}
								
										
//Heartbreak Bonus-----------------------//
				
//Googly Eyes-----------------------//
										
	if($total4 < 400){
										
		if($total4 - 10 <= $total2 && $total4 != $total2 + 1) {
		
		echo $GOOGLY;
		
		$googly[] = $win4[0];
		
		}
								
							
		if($total4 - 10 <= $total3 && $total4 != $total3 + 1) {
		
		echo $GOOGLY;
		$googly[] = $win4[0];
		}
	}				
//Googly Eyes-----------------------//
				
//Shield-----------------------//
					
	if($total4 <= 350) {
				
		if(($total4 > $total2 + 60) && ($total4 > $total3 + 60)){
		
		echo $LION;
		
		$shield[] = $win4[0];
		}
		}
//Shield-----------------------//

//Force Field-----------------------//			
		if($total4 > 300) {
				
		if(($total4 > $total2 + 200) && ($total4 > $total3 + 200)){
		
		echo $FORCE;
						
		$force[] = $win4[0];
		
		}
		}
						
//Force Field-----------------------//
				
//Keeper-----------------------//
	
				
	if($total2 > $total3) {
	
	echo $KEEPER; 
	
	echo "$win3[0]";
	
	$keeper[] = $win3[0];
	
	} else {
	
	echo $KEEPER;
	
	echo "$win2[0]"; 
	 
	$keeper[] = $win2[0];
	
	}
			
//Keeper-----------------------//
				
//Strecher-----------------------//
			
	if($total2 <= 150) {
	
	echo $INJURY; 
	
	echo "$win2[0]"; 
	
	$injury[] = $win2[0];
	
	}	
	
	if($total3 <= 150) {
	
	echo $INJURY;
	
	echo "$win3[0]"; 
	
	$injury[] = $win3[0];
	
	}
	
	if($total4 <= 150) {
	
	echo $INJURY; 
	
	echo "$win4[0]"; 
	
	$injury[] = $win4[0];
	
	}		
										
//Strecher-----------------------//
				
echo '</td></tr>';
				}
	
} //End of for loop
	
	echo '<tr><th bgcolor="FF0000"> Game End </th></tr></table></center>';
?>
