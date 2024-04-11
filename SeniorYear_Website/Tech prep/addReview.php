<?php
	if (isset($_POST['addReview'])) {
		require 'dataBaseHandler.php';
		
		// This gets the user information through the POST method and stores it in a variable
		$name = $_POST['name'];
		$email = $_POST['email'];
		$date = $_POST['date'];
		$review = $_POST['review'];
		$rating = $_POST['rating'];
		$display = "no";
		
		// This the sql statement for the database
		$sql = "INSERT INTO review (name, email, date, review, rating, display) VALUES (?, ?, ?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($connect);
					// Checks to make sure the statement then sends users back to the review page
					if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: Review.php?error=sqlerror");
					exit();
					} else{
						mysqli_stmt_bind_param($stmt, "ssssis", $name, $email, $date, $review, $rating, $display);
						mysqli_stmt_execute($stmt);
						header("Location: Review.php?addition=success");
						exit();
					}
		
	}else {
	header("Location: Review.php");
	exit();
}