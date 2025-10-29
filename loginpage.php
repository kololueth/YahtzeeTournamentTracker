<!DOCTYPE html>
<html>

<head>
<title>Yahtzee</title>
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
		<a href="/index.html"><li> <span style="color:#FFFFFF">Home</span>	</li></a>
	</ul>
	<ul>
		<li> <a href="/content.html"><span style="color:#FFFFFF">Content</span></a>	</li>
	</ul>
	<ul>
		<li> <a href="/test/forum.php"><span style="color:#66FF00 ">Forum</span></a>	</li>
	</ul>
	<ul>
		<li> <a href="checkstats.php"><span style="color:#FFFF00">Yahtzee</span></a>	</li>
	</ul>
	<ul>
		<li> <a href="/aboutus.html"><span style="color:#FFFFFF">About Us</span></a>	</li>
	</ul>
</nav>	
</header>

<div class="warn">	
<?php 

	if(isset($nocookie)) { echo '<br /><br /><br /><center><span style="font-size:30px">' . $nocookie . '</span></center>';}





if(isset($errors) && !empty($errors)) {  // Redo Errors//

echo '<br /><center><span style="font-size:30px">Oops!</span></center>';

	foreach($errors as $msg) {
		echo "<p><center> - $msg</center></p>\n";
		}

		}
		
if(isset($bye)) {

	echo '<br /><br /><center><span style="font-size:30px">' . $bye . '</span></center>';
} 
		
if(!isset($errors) && !isset($nocookie) && !isset($bye)) { 

echo '<br /><br /><br /><center><span style="font-size:30px">Welcome, Please Log in!</span></center>';

}
?>

</div>

<main>


<center>
<form method="POST" action="login.php">


	<p>	EMAIL </p> <p><input type="text" name="email"></p>



	<p>	PASSWORD</p> <p><input type="password" name="pass">	</p>	 

		
		
	<br />	<?php if(isset($bye)){echo '<input type="submit" id="submitbutton" value="Login Again!">';    } else {echo '<input type="submit" id="submitbutton" value="Login!">';} ?>   

</form>

<?php if(isset($bye)){} else {echo '<p><a href="register.php"> Not Registered? Click here to Register!</a></p>';} ?>
</center>

</main>


<footer>

Homepage:&nbsp <a href="index.html"> <span class="redtext">Real</span> <span class="yellowtext">Black</span> <span class="greentext"> Facts </span></a>

</footer>

</body>

</html>