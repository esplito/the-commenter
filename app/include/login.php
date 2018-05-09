<?php
session_start();
if(isset($_POST['reqType'])){
	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$email=$_POST['email'];
	$pass=$_POST['password'];

	$sql_user= "SELECT email, password FROM users WHERE email='$email' AND password='$pass'";
	$selected_user=$conn->query($sql_user);


	if($row = $selected_user->fetch_assoc()){
	 	$_SESSION['email']=$row['email'];
	  	echo "success";
	}
	else{
		echo "fail";
	}

	$conn->close();
}

?>
