<?php # Script yahtzee_connect.php

	// This file contains the database access information.
	// This file also establishes a connection to MySQL,
	// selects the database, and sets the encoding.
	
	// Set the database access information as constants:
	
	DEFINE ('DB_USER', 'realblac_kolo');
	DEFINE ('DB_PASSWORD', 'L1on#sch@rge');
	DEFINE ('DB_HOST', 'www.realblackfacts.com');
	DEFINE ('DB_NAME', 'realblac_audio');
	
	// Make the connection:
	$dbcaudi = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
	
	// Set the encoding..
	mysqli_set_charset($dbcaudi, 'utf8'); 

