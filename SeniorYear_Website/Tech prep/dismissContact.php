<?php
	require 'adminVerify.php';	
	require 'dataBaseHandler.php';
		
			$sql = "SELECT * FROM contact";
			$query = mysqli_query($connect, $sql);
			// This will be able to dismiss review
			while ($row = mysqli_fetch_array($query))
			{
				$id = $row['id'];
				// This checks the database for the amount of contacts and checks which button was clicked
				if (isset($_POST[$id])) {
					// The sql code for the database
					$sql = "DELETE FROM contact WHERE id=".$id;
					// This if statement checks to see if the statement worked and there directs the admin back to the adminpage
					if (mysqli_query($connect, $sql)) {
					header("Location: adminpage.php?addition=success");
					exit();
					} else{
						header("Location: adminpage.php?error=sqlerror");
						exit();
					}
				}
			}