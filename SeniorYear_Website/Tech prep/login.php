<?php

if (isset($_POST['login'])) {
	
	require 'dataBaseHandler.php';
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($username) || empty($password)) {
			header("Location: adminlogin?error=emptyfields");
			exit();
	}else{
		$sql = "SELECT * FROM admin WHERE username=?; ";
		$stmt = mysqli_stmt_init($connect);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: adminlogin?error=sqlerror");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$passwordCheck = password_verify($password, $row['passwd']);
				if($passwordCheck == false) {
					header("Location: adminlogin?error=wrongpassword");
					exit();
				}else if($passwordCheck == true){
					session_start();
					$_SESSION['username'] =  $row['username'];
					header("Location: adminpage?login=success");
					exit();
					
				}else{
					header("Location: adminlogin?error=wrongpassword");
					exit();
				}
			}else{
			header("Location: adminlogin?error=nouser");
			exit();
			}
		}
	}
}else {
	header("Location: adminlogin.php");
	exit();
}