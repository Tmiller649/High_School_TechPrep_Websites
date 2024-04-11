<?php
if (isset($_POST['signup-submit']) || isset($_POST['advisorSignup-submit'])){
	
	require 'dataBaseHandler.php';

	$username = $_POST['username'];
	
	$last = $_POST['last'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST['password-repeat'];
	
	if (isset($_POST['signup-submit'])){
		$first = $_POST['first'];
		$advisor = $_POST['advisor'];
		if ($advisor == "yes"){
			$advisor = "";
		}
	}
	
	if (isset($_POST['advisorSignup-submit'])){
		$first = "";
		$advisor = "yes";
	}
	
	if (empty($username) || empty($password) || empty($passwordRepeat)) {
		header("Location: signup.php?error=emptyfields");
		exit();
	}else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		exit();
	}else if ($password !== $passwordRepeat) {
		header("Location: signup.php?error=mismatchingpasswords&username=".$username);
	}else {
			$sql = "SELECT username FROM users WHERE username=?";
			$stmt = mysqli_stmt_init($connect);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: signup.php?error=sqlerror");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if ($resultCheck > 0) {
					header("Location: signup.php?error=usertaken");
					exit();
				}
				else {
					$sql = "INSERT INTO users (username, passwd, email, firstName, lastName, advisor) VALUES (?, ?, ?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($connect);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: signup.php?error=sqlerror");
					exit();
					} else{
						$hashPassword = password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "ssssss", $username, $hashPassword, $email, $first, $last, $advisor);
						mysqli_stmt_execute($stmt);
							$table = "CREATE TABLE ".$username." (
							id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
							type TINYTEXT NOT NULL,
							description LONGTEXT NOT NULL,
							eventDate TINYTEXT NOT NULL,
							eventTime TINYTEXT NOT NULL
							)";
							mysqli_query($connect, $table);
						header("Location: signup.php?signup=success");
						exit();
					}
				}
			}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($connect);
	
}
else {
	header("Location: signup.php");
	exit();

}

