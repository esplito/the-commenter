<?php
	
	$servername = "localhost";
	$user = "root";
	$pw = "";
	$dbname = "the_commenter";


	// Create connection
	$conn = new mysqli($servername, $user, $pw, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

?>