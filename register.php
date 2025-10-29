<DOCTYPE html>
<head>

<title>Yahtzee Register</title>
<link rel="stylesheet" type="text/css" href="score.css">
<link rel="shortcut icon" href="/images/rbf.png"/>



</head>
<body>
<header>

	<div class="shadow">
		<a href="/index.html"><img src="/images/newrbfwht.png" width="150" height="111"></a>
	</div>
	
<nav>
	<ul>
		<li> <a href="/index.html"><span style="color:#FFFFFF">Home</span></a>	</li>
		<li> <a href="/content.html"><span style="color:#FFFFFF">Content</span></a>	</li>
		<li> <a href="/test/forum.php"><span style="color:#66FF00 ">Forum</span></a>	</li>
		<li> <a href="checkstats.php"><span style="color:#FFFF00">Yahtzee</span></a>	</li>
		<li> <a href="/aboutus.html"><span style="color:#FFFFFF">About Us</span></a>	</li>
	</ul>
</nav>	
</header>
<div class="warn"><center><span style="font-size: 30px">Register</span>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	require ('yahtzee_connect.php');
	
	
	$trimmed = array_map('trim', $_POST);
	
	$fn = $ln = $e = $p = FALSE;
	
	if(preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['first_name'])) {
	
		$fn = mysqli_real_escape_string($dbcyah, $trimmed['first_name']);
	
	} else {
	
		echo '<p class="error"> Please enter your first name!</p>';
		
	}
	
	if(preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['last_name']))  {
	
		$ln = mysqli_real_escape_string($dbcyah, $trimmed['last_name']);
		
	} else {
	
		echo '<p class="error"> Please enter your last name!</p>';
			
	}
	
	if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
	
		$e = mysqli_real_escape_string($dbcyah, $trimmed['email']);
		
	} else {
	
		echo '<p class="error"> Please enter a valid email address!</p>';
		
	}
	
	if (preg_match ('/^\w{4,20}$/', $trimmed['password1'])) {
	
		if ($trimmed['password1'] == $trimmed['password2']) {
		
			$p = mysqli_real_escape_string($dbcyah, $trimmed['password1']);
			
			} else {
			
				echo '<p class="error"> Your password did not match the confirmed password</p>';
			}
				
			} else {	
				echo '<p class="error"> Please enter a valid Password!</p>';
				
		}
		
		
		
	if ($fn && $ln && $e && $p) {
	
		$zone = 'America/Chicago'; //Take this out when ready
	
		$q = "SELECT gamer_id FROM gamerprofiles WHERE email = '$e'";
		
		$r = mysqli_query($dbcyah, $q);
		
		
			if(mysqli_num_rows($r) == 0) {
			
				$a = md5(uniqid(rand(), true));
				
			
		$q = "INSERT INTO gamerprofiles (gamer_id, lang_id, time_zone, first_name, last_name, email, pass, user_level, active, registration_date, username) VALUES (NULL, '1', '$zone', '$fn', '$ln', '$e', SHA1('$p'), '1', '$a', NOW(), '$fn $ln')";
		
		$r = mysqli_query($dbcyah, $q);
		
		
		
		
	if (mysqli_affected_rows($dbcyah) == 1) {
	
	$body = "Thank you for registering at Real Black Yahtzee!  Please click on the following link to activate your account:\n\n";
	
	$body .= 'http://www.realblackfacts.com/yahtzee/activate.php?x=' . urlencode($e) . "&y=$a";
	mail($trimmed['email'], 'Activate Account', $body, 'From: contact@realblackfacts.com');
	
	
	echo 'Thank you for Registering.  A confirmation email has been sent to your email address. Please click on the link to activate your account.';
	
	

	exit();
	
	} else {
	
	echo '<p class="error"> You could not be resitered due to a system error.</p>';
	
	}
	
	} else {
	
	echo '<p class="error"> This email address has already been registered.  If you forgot your password, please use the change password link.</p>';
	
	}
	
	} else {
	
		echo '<p class="error">Please try again.</p>';}
		
		
mysqli_close($dbcyah);	
	
	}
?>

<center>
<form action="register.php" method="POST">

	
<p>First Name</p>

	<input type="text" name="first_name" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>">

<p>Last Name</p>

	<input type="text" name="last_name" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>">
	
<p>Email</p>

	<input type="text" name="email" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>">

<p>Password</p>

	<input type="password" name="password1" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>">
	
<p>Confirm Password</p>	
	
	
	<input type="password" name="password2" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>"> <br> </br>
	
	<p><input type="submit" name="submit" id="submitbutton" value="Register"></p>
	
</form>

</center>		
</main>


</body>
</html>
