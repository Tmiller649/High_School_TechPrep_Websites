<?php
if (isset($_POST['add-Event'])){
	
	require 'dataBaseHandler.php';
	session_start();
	$plannedFor = $_SESSION['plannedFor'];
	$counter = $_SESSION['counter'];
	
	$plannedFor[$counter] = $_SESSION['username'];
	
	$type = $_POST['type'];
	$type = strtoupper($type);
	$description = $_POST['description'];
	$eventDate = $_POST['eventDate'];
	$eventTime = $_POST['eventTime'];

	for ($i=0; $i<=$counter; $i++){
		if ($_POST[$plannedFor[$i]] == strval($i)){
			$sql = 'INSERT INTO '.$plannedFor[$i].' (type, description, eventDate, eventTime) VALUES ("'.$type.'", "'.$description.'", "'.$eventDate.'", "'.$eventTime.'")';
			mysqli_query($connect, $sql);
		}
		header("Location: addEvents.php?event=success");
		}
	}
	
else {
	header("Location: addEvents.php");
	exit();

}

