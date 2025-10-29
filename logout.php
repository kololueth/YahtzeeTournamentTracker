<?php 

ob_start();

session_start();

if(!isset($_SESSION['gamer_id'])) {

	require ('loginfunctions.php');
	
	ob_end_clean();
	
	redirect_user();
	
	} else {
	
	$name = $_SESSION['first_name'];
	
	$_SESSION = array();
	
	session_destroy();
	
	setcookie (session_name(), '', time()-3600);
	
	 $bye = "Thanks, $name!  <p>You have been Logged Out!</p>";
	}
	
	include('loginpage.php');
	
	
?>