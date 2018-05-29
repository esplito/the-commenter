<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if( isset($_POST['getposts'])){

		require 'connect.php';

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