<?php
	session_start();
	// This ensures the admin is logged in
		if (isset($_SESSION['username'])) {
		}else {
			header("Location: adminlogin.php");
			exit();
		}