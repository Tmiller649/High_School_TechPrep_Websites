<?php
	if (isset($_POST['addMessage'])) {
		require 'dataBaseHandler.php';
		
		// This gets the user information through the POST method and stores it in a variable
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		// This the sql statement for the database
		$sql = "INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($connect);
					// Checks to make sure the statement then sends users back to the contact page
					if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: Contact.php?error=sqlerror");
					exit();
					} else{
						mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);
						mysqli_stmt_execute($stmt);
						header("Location: Contact.php?addition=success");
						exit();
					}
		
	}else {
	header("Location: Contact.php");
	exit();
}