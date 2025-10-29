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
					    
	for($x = 0; $x <= $b; $x++){ echo '<input type="radio" name="table" value="' . $loo[$x] . '"> '; echo $loo[$x];}
?>	