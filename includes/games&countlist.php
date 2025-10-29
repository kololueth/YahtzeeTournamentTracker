<?php 

					require('yahtzee_connect.php');
					
					
					

	$q1 = "SELECT COUNT(*) AS a FROM information_schema.tables WHERE table_schema = 'realblac_yahtzee'";

	$r1 = @mysqli_query($dbcyah, $q1);

		if($r1) {

			while($roop = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
		
				$b = $roop['a'] - 2; //Number of tables for array//
	}
	
	}

	
	$q2 = "SELECT table_name AS name FROM information_schema.tables WHERE table_schema = 'realblac_yahtzee'";

	$r2 = @mysqli_query($dbcyah, $q2);

			if($r2) { 
	
			while($loop = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
	
				$loo[] = $loop['name'];  // Database Table Names //
			

	}

	}
	
					
					    
	for($x = 0; $x <= $b; $x++){ 
	
		$champz = array();
		
		$table = $loo[$x];
		
		$qz = "SELECT MAX(`game_id`) AS high FROM `$table`";
		
		$runz = @mysqli_query($dbcyah, $qz);
		
		
		if($runz) {
	
		while($rowz = mysqli_fetch_array($runz, MYSQLI_ASSOC)) {
		
		
			$fz = $rowz['high'];	$ez = $fz - 1;		$dz = $fz-2;
			
			
			
			
			$zz = ($fz/3);	//Number of games//
			
			$yz = ($zz - 1);	// for array name count //
			}
			} 
			
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
			} //End of interior for loop//
			
			
			for($xz = 0; $xz <= $yz; $xz++){
		
		if($champz[$xz] == 'MAT') {$num2z = 1;} else {$num2z = 0;}
		
			$count2z = ($count2z + $num2z);
			
		if($champz[$xz] == 'BEN') {$num3z = 1;} else {$num3z = 0;}
		
			$count3z = ($count3z + $num3z);
			
		if($champz[$xz] == 'MIKE') {$num4z = 1;} else {$num4z = 0;}
		
			$count4z = ($count4z + $num4z);
			
			
			}
			
			
			
			
			if($count2z >= 10 || $count3z >= 10 || $count4z >= 10) { echo '<option value="closed"><span style="color: #ffff00">' . $loo[$x] . '-closed</span></option>'; }
			

			 
			else {echo '<option value="' . $loo[$x] . '">' . $loo[$x] . '</option>';}
			
			unset($count2z);
			unset($count3z);
			unset($count4z);
			unset($champz);
			
			
			} //End of main for $count2z = 0;
			
			
			    mysqli_close($dbcyah);
	
?>	