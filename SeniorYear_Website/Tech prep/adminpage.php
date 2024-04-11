<?php
	require 'adminVerify.php';
	require 'dataBaseHandler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="back.css">
</head>
<body>
<link href="Back.css" rel="stylesheet" />
<header>
<h1>Admin Page</h1>
</header>
	<!-- This is for the admin to add food to the menu -->
	<form action="addFood.php" method="post" enctype="multipart/form-data">
		<p>What is the menu food you would like to add:</p>
			<input type="text" name="food" placeholder="Food" />
		<p>What is the cost of the menu food you would like to add (0.00):</p>
			<input type="text" name="cost" placeholder="0.00" />
		<p>A description of the menu food:</p>
			<input type="text" name="description" placeholder="Enter a description" /><br><br>
			<input type="checkbox" name="type" value="Pizza">
		<label for="pizza">Pizza</label>
		<p><button type="submit" name="addFood">Add Food</button></p>
	</form>
	<hr>
	<!-- This is for the admin to delete/change food to the menu -->
	<form action="editFood.php" method="post">
		<h3>Select the food you would like to change or delete</h3>
		<table width="75%">
		<tr class="first">
			<th>Food</th>
			<th>Cost</th>
			<th>Description</th>
			<th></th>
			</tr>
			<?php
			$sql = "SELECT * FROM menu";
			$query = mysqli_query($connect, $sql);
			while ($row = mysqli_fetch_array($query))
			{
				// Will be dynamic to the amount of ideas in the menu
				echo ' <tr>
				<td>'.$row['food'].'</td>
				<td>$'.$row['cost'].'</td>
				<td>'.$row['description'].'</td>
				<td><button class="button" name="change'.$row['id'].'">Change</button>
				<button class="button" name="'.$row['id'].'">Delete Food</button></td>
				</tr>';
			}
			?>
		</table>
	</form>
	<br>
	
	<!-- This will give the admin ablity to change the review from display to hide and dismiss reviews -->
	<form action="reviewDisplay.php" method="post">
		<table width="75%">
			<h3>Select the review you would like to display, hide, or delete</h3>
			<tr class="first">
			<th>Name</th>
			<th>Email</th>
			<th>Date</th>
			<th>Description</th>
			<th>Rating</th>
			<th></th>
			</tr>
			<?php
			$sql = "SELECT * FROM review";
			$query = mysqli_query($connect, $sql);
			while ($row = mysqli_fetch_array($query))
			{
				// This is also dynamic to the amount of reviews in the database
				$rating = $row['rating'];
				echo ' <tr>
				<td>'.$row['name'].'</td>
				<td><a href="mailto:'.$row['email'].'">'.$row['email'].'</td>
				<td>'.$row['date'].'</td>
				<td>'.$row['review'].'</td>
				<td>'.$rating.'</td>';
				if($row['display']=="no"){
				echo '<td><button name="'.$row['id'].'">Display</button>';
				}else if($row['display']=="yes"){
				echo '<td><button name="'.$row['id'].'">Hide</button>';
				}
				echo ' <button name="dismiss'.$row['id'].'">Dismiss</button>
				</td></tr>';
			}
			?>
		</table>
	</form>
	<br>
	
		<!-- This is for the admin to view and dismiss reviews -->
	<form action="dismissContact.php" method="post">
		<table width="75%">
			<h3>See the people who wanted to contact you</h3>
			<tr class="first">
			<th>Name</th>
			<th>Email</th>
			<th>Subject</th>
			<th>Description</th>
			<th></th>
			</tr>
			<?php
			$sql = "SELECT * FROM contact";
			$query = mysqli_query($connect, $sql);
			while ($row = mysqli_fetch_array($query))
			{
				// This is also dynamic to the amount of contacts in the database
				echo ' <tr>
				<td>'.$row['name'].'</td>
				<td><a href="mailto:'.$row['email'].'">'.$row['email'].'</td>
				<td>'.$row['subject'].'</td>
				<td>'.$row['message'].'</td>
				<td><button name="'.$row['id'].'">Dismiss</button></td>
				</tr>';
			}
			?>
		</table>
	</form>
	<br>
	<form action="logout.php" method="post">
		<button type="submit" name="logout-submit">Logout</button>
	</form>

</body>
</html>