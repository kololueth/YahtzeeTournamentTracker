<?php



$qz = "SELECT MAX(`game_id`) AS high FROM `$table`";

$runz = @mysqli_query($dbcyah, $qz);



if($runz) {
	
		while($rowz = mysqli_fetch_array($runz, MYSQLI_ASSOC)) {
		
		
			$fz = $rowz['high'];	$ez = $fz - 1;		$dz = $fz-2;
			
			
			
			
			$zz = ($fz/3);	//Number of games//
			
			$yz = ($zz - 1);	// for array name count //
			}
			} else { exit();}


	for($az = 1, $bz = 2, $cz = 3; $az <= $dz, $bz <= $ez, $cz <= $fz; $az += 3, $bz += 3, $cz += 3) {
	
		$query2 = "SELECT `total` AS total2, `player_name` AS name2 FROM `$table` WHERE game_id = $az"; 
		$query3 = "SELECT `total` AS total3, `player_name` AS name3 FROM `$table` WHERE game_id = $bz"; 
		$query4 = "SELECT `total` AS total4, `player_name` AS name4 FROM `$table` WHERE game_id = $cz";
		
		$run2z = @mysqli_query($dbcyah, $query2);
		while($row2z = mysqli_fetch_array($run2z, MYSQLI_ASSOC)) {
			$total2z = $row2z['total2'];
			$name2z  = $row2z['name2'];
			$win2z	= array($name2z, $total2z);
			}
		
		$run3z = @mysqli_query($dbcyah, $query3);
		while($row3z = mysqli_fetch_array($run3z, MYSQLI_ASSOC)) {
			$total3z = $row3z['total3'];
			$name3z  = $row3z['name3'];
			$win3z	= array($name3z, $total3z);
			}
			
		$run4z = @mysqli_query($dbcyah, $query4);
		while($row4z = mysqli_fetch_array($run4z, MYSQLI_ASSOC)) {
			$total4z = $row4z['total4'];
			$name4z  = $row4z['name4'];
			$win4z	= array($name4z, $total4z);
			}
			
		
		//--------Bank the name of the winner of each particular game---------//
		
		
		
//----------------------------------------------------------------------// 	
		 
			if(($total2z > $total3z) && ($total2z > $total4z)) { 
		
				$champz[] = $win2z[0];
			}
			
			
			
			if(($total3z > $total2z) && ($total3z > $total4z)) {  
			
			$champz[] = $win3z[0];
			
			}
			
			
			
			if(($total4z > $total2z) && ($total4z > $total3z)) { 
			
			$champz[] = $win4z[0];
			}
			
			
//SuperSayan----------------------------------------------------------------------// 	
			
	if($total3z > 500) {
	
		$sayanz[] = $win3z[0];
			
			} elseif($total3z > 400) {
		
	        		$sayan2z[] = $win3z[0];
	        }
				
	if($total2z > 500) {
	
		$sayanz[] = $win2z[0];
	
			}elseif($total2z > 400) {
		
				$sayan2z[] = $win2z[0];
		}
					
	if($total4z > 500) {
	
		$sayanz[] = $win4z[0];
	
			}elseif($total4z > 400) {
		
				 $sayan2z[] = $win4z[0];
		 }
		 
//SuperSayan----------------------------------------------------------------------// 	

//Shield-----------------------//
				
				
	if($total2z <= 350) {
				
		if(($total2z > $total3z + 60) && ($total2z > $total4z + 60)){
		
						$shieldz[] = $win2z[0];
			
			}
			}
			
	if($total3z <= 350) {
				
		if(($total3z > $total2z + 60) && ($total3z > $total4z + 60)){
		
						$shieldz[] = $win3z[0];
			
			}
			}
			
	if($total4z <= 350) {
				
		if(($total4z > $total3z + 60) && ($total4z > $total2z + 60)){
		
						$shieldz[] = $win4z[0];
			
			}
			}
//Shield-----------------------//

//Force Field-----------------------//
						
	if($total2z > 400) {
				
		if(($total2z > $total3z + 200) && ($total2z > $total4z + 200)){
					
			$forcez[] = $win2z[0];
			}
			}
			
	if($total3z > 400) {
				
		if(($total3z > $total4z + 200) && ($total3z > $total4z + 200)){
					
			$forcez[] = $win3z[0];
			}
			}
	
	if($total4z > 400) {
				
		if(($total4z > $total2z + 200) && ($total4z > $total3z + 200)){
				
			$forcez[] = $win4z[0];
			}
			}
				
//Force Field------------------------//
			
			
			
			
			
			
			
			}// End of per championship for loop //
			
			$final[] = $zz; // bank for game count // 
			
			
		




?>