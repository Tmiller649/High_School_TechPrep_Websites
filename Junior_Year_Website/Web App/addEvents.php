<?php
	require "header.php";
	require 'dataBaseHandler.php';
?>
	<h1>Add an event</h1>
	<form action="eventsToDB.php" method="post">
		<input type="text" name="type" placeholder="Type Of Event (Tour, Contest, Workshop)"><br><br>
		<input type="text" name="description" placeholder="Description"><br><br>
		<input type="text" name="eventDate" placeholder="Date"><br><br>
		<input type="text" name="eventTime" placeholder="Time"><br><br>
		<p>Select the people for this event!</p>
	<?php
		$getUserInfo = "SELECT * FROM users;";
		$result = mysqli_query($connect, $getUserInfo);
		$resultCheck = mysqli_num_rows($result);
		$counter = 0;
		$plannedFor;
		
		if ($resultCheck > 0) {
			while ($row = mysqli_fetch_assoc($result)){
				if ($_SESSION['username'] == $row['advisor']){
					echo '<input type="checkbox" name="'.$row['username'].'" value="'.$counter.'">'.$row['username'].'<br><br>';
					$plannedFor[$counter] = $row['username'];
					$counter++;
				}
			}
			echo '<input type="checkbox" name="'.$_SESSION['username'].'" value="'.$counter.'">You<br><br>';
			if($counter != 0){
			$_SESSION['plannedFor'] = $plannedFor;
			}
			$_SESSION['counter'] = $counter;
		}else{
				echo '';
		}
	?>
	<button type="submit" name="add-Event">Add Event</button>
	</form>

<?php
	require "footer.php";
?>