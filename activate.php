<?php

	
	
	
	
	
	
	
	if(isset($_GET['x'], $_GET['y']) && filter_var($_GET['x'], FILTER_VALIDATE_EMAIL) && (strlen($_GET['y']) == 32 )) {
	
	require('yahtzee_connect.php');
	
	$e = $_GET['x'];
		
		
		$q = "SELECT active AS PIN FROM gamerprofiles WHERE email = '$e' LIMIT 1";
		
		$r = mysqli_query ($dbcyah, $q);
		
		if($r) { 
	
			while($loop = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	
				$pin = $loop['PIN'];
				
				
				
				}
				
				
		if($pin == NULL) { echo 'This account is already active';} 
		
		}
				
				
	
	if($pin != 'NULL') {
	
	$q = "UPDATE gamerprofiles SET active = NULL WHERE (email='" . mysqli_real_escape_string($dbcyah, $_GET['x']) . "' AND active='" . mysqli_real_escape_string($dbcyah, $_GET['y']) . "') LIMIT 1";
	
	$r = mysqli_query ($dbcyah, $q);
	
	if(mysqli_affected_rows($dbcyah) == 1) { 
	
		echo 'Your account is now active.';
		
					    } elseif($pin == NULL) {
					    
					    } else {
		
		echo 'Your account could not be activated';
		
		}
		}
		
mysqli_close($dbcyah);

	} else {
	
	$url = BASE_URL . 'index.html';
	
	
	header("Location: $url");
	
	exit();
	
	}
	
	
?>