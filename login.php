<?php



	
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('yahtzee_connect.php');


if(!empty($_POST['email'])) {

	$e = mysqli_real_escape_string($dbcyah, trim($_POST['email']));
	
		} else {
		
			$e = FALSE;
		
				echo 'You forgot to enter your email address';
		
		}
	
if(!empty($_POST['pass'])) {

	$p = mysqli_real_escape_string($dbcyah, trim($_POST['pass']));
	
		} else {
	
			$p = FALSE;
		
				echo 'You forgot to enter your password!';
		
		}
		

if ($e && $p) {

	$q = "SELECT gamer_id, first_name, user_level, username FROM gamerprofiles WHERE (email = '$e' AND pass = SHA1('$p')) AND active is NULL";
	
	$r = mysqli_query ($dbcyah, $q);
	
	if(@mysqli_num_rows($r) == 1) {
	
	$_SESSION = mysqli_fetch_array($r, MYSQLI_ASSOC);
	
	mysqli_free_result($r);
	
	mysqli_close($dbcyah);
	
	ob_end_clean();
	
	header("Location: http://www.realblackfacts.com/yahtzee/checkstats.php");
	
	exit();
	
	} else {
	
		echo 'The email and address do not match those on file or your account has not been activated';
		
		}
		
		} else { echo 'Please try again';
		
		}
	mysqli_close($dbcyah);
	
	}
	
include('loginpage.php');


?>