<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if( isset($_POST['getposts'])){

		$servername = "localhost";
		$user = "";
		$pw = "";
		$dbname = "test";


		// Create connection
		$conn = new mysqli($servername, $user, $pw, $dbname);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql_posts = "SELECT user, post, p_date FROM posts";
		$all_posts=$conn->query($sql_posts);

		$posts = array();
		while($row = $all_posts->fetch_assoc()){
			$posts[] = $row;
		}

		echo json_encode($posts);


		$conn->close();
	
	}
}

?>