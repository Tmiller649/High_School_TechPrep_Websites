<?php
	require "header.php";
?>

	<?php
		if (isset($_SESSION['username'])){
			echo '<h1>See what workshops you have planned</h1>';
				$getUserInfo = "SELECT * FROM ".$_SESSION['username'].";";
				$result = mysqli_query($connect, $getUserInfo);
				$resultCheck = mysqli_num_rows($result);
		
		if ($resultCheck > 0) {
			while ($row = mysqli_fetch_assoc($result)){
			if($row['type'] == "WORKSHOP"){
			echo "<form action='done.php' method='post'><hr>" . $row['eventDate'] . " at " . $row['eventTime'] . "<br><br>";
			echo 'Description: ' . $row['description'];
			echo '<button type="submit" name="' . $row["id"] . '">Done</button></form>';
				if ($counter = 1){
					$counter = $row['id'];
					$_SESSION['amountRowStart'] = $row['id'];
				}else{
					$counter++;
				}
			}
			}
			$_SESSION['amountRow'] = $counter;
			echo '<hr>';
			}
		}else {
			echo '<h1>You must log in to view!</h1>
					<form action="login.php" method="post">
						<input type="text" name="username" placeholder="Username"><br><br>
						<input type="password" name="password" placeholder="Password"><br><br>
						<button type="submit" name="login-submit">Login</button><br>
					</form>';
		}
	?>
	

<?php
	require "footer.php";
?>