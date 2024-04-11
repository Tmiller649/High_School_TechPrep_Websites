<?php
	require 'adminVerify.php';	
	require 'dataBaseHandler.php';
		
		$sql = "SELECT * FROM menu";
			$query = mysqli_query($connect, $sql);
			while ($row = mysqli_fetch_array($query))
			{
				$id = $row['id'];
				if (isset($_POST[$id])) {
					$sql = "DELETE FROM menu WHERE id=".$id;
					if (mysqli_query($connect, $sql)) {
						header("Location: adminpage.php?addition=success");
						exit();
					} else{
						header("Location: adminpage.php?error=sqlerror");
						exit();
					}
				}
			}
			
			$sql = "SELECT * FROM menu";
			$query = mysqli_query($connect, $sql);
			while ($row = mysqli_fetch_array($query))
			{
				$idChange = $row['id'];
				if (isset($_POST["change".$idChange])) {
						echo'<!DOCTYPE html>
								<html>
									<head>
										<title>Admin Page</title>
										<link rel="stylesheet" type="text/css" href="back.css">
									</head>
									<body>
										<form action="changeFood.php" method="post" enctype="multipart/form-data">
											<p>What is the menu food you would like to add:</p>
												<input type="text" name="food" value="'.$row['food'].'" />
											<p>What is the cost of the menu food you would like to add (0.00):</p>
												<input type="text" name="cost" value="'.$row['cost'].'" />
											<p>A description of the menu food:</p>
												<input type="text" name="description" value="'.$row['description'].'" /><br><br>
												<input type="checkbox" name="type" value="Pizza">
												<label for="pizza">Pizza</label>
											<p><button type="submit" name="'.$row['id'].'">Change Food</button></p>
										</form>
									</body>
									</html>';
				}
			}