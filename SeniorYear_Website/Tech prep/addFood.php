<?php
	if (isset($_POST['addFood'])) {
		require 'dataBaseHandler.php';
		require 'adminVerify.php';
		
		// This get the food information from the user through the POST method
		$food = $_POST['food'];
		$cost = $_POST['cost'];
		$description = $_POST['description'];
		$type;
		// This gives value to add to the database from the check box
				if (isset($_POST['type']) && $_POST['type'] == 'Pizza') {
					$type = "pizza";
				}else{
					$type = "not";
				}
		// This is the sql statement for the database
		$sql = "INSERT INTO menu (food, cost, description, sections) VALUES (?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($connect);
					// Checks to make sure the statement then sends users back to the admin page
					if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: adminpage.php?error=sqlerror");
					exit();
					} else{
						mysqli_stmt_bind_param($stmt, "ssss", $food, $cost, $description, $type);
						mysqli_stmt_execute($stmt);
						header("Location: adminpage.php?addition=success");
						exit();
					}
		
	}else {
	header("Location: adminlogin.php");
	exit();
}
		