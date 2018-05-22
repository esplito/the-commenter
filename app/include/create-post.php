<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	session_start();
	if(preg_match("/.{5,}/", $_POST['post']) === 0){
		echo "post short";
	}
	else if(strlen($_POST['post']) > 220){
		echo "post long";
	}
	else{
		if(isset($_POST['post'], $_SESSION['username'])){
			$timestamp = date("Y-m-d h:i");
			$username = $_SESSION['username'];

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

			$post= mysqli_real_escape_string($conn, $_POST['post']);

			$sql_createpost = "INSERT INTO posts (post, user, p_date) VALUES ('$post', '$username', '$timestamp')";

			if ($conn->query($sql_createpost) === TRUE) {
			    echo "success";
			} else {
			    echo "Error: " . $sql_createpost . "<br>" . $conn->error;
			}
			

			$conn->close();
		}
	}
}


?>