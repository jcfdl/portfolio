<?php
	$servername = "";
	$username = "";
	$pass = "!";
	$db ="";
	
	// Create connection
	$conn = new mysqli($servername, $username, $pass, $db);
	
	// Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	if($_SESSION['start'] != 1){
	session_start();
	$_SESSION['start'] = 1;
	}
	
	// Code to delete post in database, after set date interval
	$sql = "SELECT * FROM ads WHERE date = DATE_ADD(CURDATE(), INTERVAL 1 DAY)";
	$res = $conn->query($sql);
	while ($row = $res->fetch_array()) {
		$id = $row['id'];
		$sql = "DELETE FROM ads WHERE id=$id";
	}	
?>