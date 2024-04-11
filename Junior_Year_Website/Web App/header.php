<?php
	session_start();
	require 'dataBaseHandler.php';
?>


<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name=viewport content="width=device-width, intitial-scale=1">
			<link rel="stylesheet" type="text/css" href="styleMain.css">
			<title></title>
		</head>
		<body>
			<header>
				<nav>
					<ul>
					<a href="links"><img src="images\BPAlogo.png">
					<br>
					</a>
						<a class="links" href="index.php"><img class="btns" src="images\Indexbutton.png"></a>  
						<a class="links" href="contest.php"><img class="btns" src="images\Contestbutton.png"></a>  
						<a class="links" href="workshops.php"><img class="btns" src="images\Workshopbutton.png"></a>  
						<a class="links" href="tours.php"><img class="btns" src="images\Tourbutton.png"></a> 
						<?php 
						if (isset($_SESSION['advisor'])){
							if ($_SESSION['advisor'] == "yes"){
								echo '<a class="links" href="addEvents.php"><img class="btns" src="images\Eventbutton.png"></a>';
							}
						}
							?>
						<a class="links" href="signup.php"><img class="btns" src="images\Signupbutton.png"></a>
					</ul>
					<?php
						if (isset($_SESSION['username'])){
							echo '<p><b>Welcome '.$_SESSION['username'].'</b></p>
								<form action="logout.php" method="post">
								<button type="submit" name="logout-submit">Logout</button>
								</form><br>';
						}else {
							echo '';
						}
					?>
						

						
				</nav>
			</header>
			<main>