<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link href="back.css" rel="stylesheet" />
	<!-- This will ask the user for their credentials then check then with the login.php page-->
</head>
<body>
	<form action="login.php" method="post">
	<header>
		<h1>Admin Login</h1>
		</header>
		<br>
			<input type="text" name="username" placeholder="username" /><br><br>
			<input type="password" name="password" placeholder="password" /><br><br>
			<button type="submit" name="login">Submit</button>
	</form>
</body>
</html>