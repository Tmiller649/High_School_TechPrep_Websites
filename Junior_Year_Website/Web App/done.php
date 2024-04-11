<?php

	
	require 'dataBaseHandler.php';
	session_start();

	$amountRow = $_SESSION['amountRow'];
	$amountRowStart = $_SESSION['amountRowStart'];
	
	for($counter=$amountRowStart; $counter<=$amountRow; $counter++){
		if ($_POST[$counter] = $counter){
			$id = $counter;
			$sql = "DELETE FROM " . $_SESSION['username'] . " WHERE id = " . $id;
			mysqli_query($connect, $sql);
		}
	}
	header("Location: index.php");

