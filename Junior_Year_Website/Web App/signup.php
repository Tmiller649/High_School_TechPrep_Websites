<?php
	require "header.php";
?>
	<h1>Signup</h1>
	<form action="signupCheck.php" method="post">
		<input type="text" name="username" placeholder="Username"><br><br>
		<input type="text" name="first" placeholder="First name"><br><br>
		<input type="text" name="last" placeholder="Last name"><br><br>
		<input type="text" name="email" placeholder="Email"><br><br>
		<input type="text" name="advisor" placeholder="Advisor username"><br><br>
		<input type="password" name="password" placeholder="Password"><br><br>
		<input type="password" name="password-repeat" placeholder="Repeat password"><br><br>
		<p><a href="advisorSignup.php">Advisor Signup</a></p>
		<button type="submit" name="signup-submit">Signup</button>
	</form>
	<?php
		$baseURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if (strpos($baseURL, "signup=success") == true){
			echo '<script type="text/javascript">alert("Signup successful!");</script>';
			exit();
		}elseif(strpos($baseURL, "error=emptyfields") == true){
			echo '<script type="text/javascript">alert("There was an empty form!");</script>';
			exit();
		}elseif(strpos($baseURL, "error=sqlerror") == true){
			echo '<script type="text/javascript">alert("There was an sql error!");</script>';
			exit();
		}elseif(strpos($baseURL, "error=usertaken") == true){
			echo '<script type="text/javascript">alert("That username is already taken!");</script>';
			exit();
		}
		
	?>
<?php
	require "footer.php";
?>