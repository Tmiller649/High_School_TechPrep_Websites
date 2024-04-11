<?php

	require 'adminVerify.php';	
	require 'dataBaseHandler.php';
		$type;
				// This gives value to add to the database from the check box
				if (isset($_POST['type']) && $_POST['type'] == 'Pizza') {
					$type = "pizza";
				}else{
					$type = "not";
				}
		
		$sql = "SELECT * FROM menu";
			$query = mysqli_query($connect, $sql);
			// This will loop through and find the idea that is needed to edit
			while ($row = mysqli_fetch_array($query))
			{
				$id = $row['id'];
				if (isset($_POST[$id])) {
					// sql statements using the POST method directly instead of giving a variable
					$sql = "UPDATE menu SET food='".$_POST['food']."',cost='".$_POST['cost']."',description='".$_POST['description']."',sections='".$type."' WHERE id='".$row['id']."'";
					echo $sql;
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