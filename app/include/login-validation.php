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

	$email= mysqli_real_escape_string($conn, $_POST['email']);
	//if (hash_equals($hashed_pw, crypt($password, $hashed_pw))) {
	   //echo "Verified!";
	//}
	$pass= mysqli_real_escape_string($conn, $_POST['password']);

	$sql_user= "SELECT email, password, username FROM users WHERE email='$email' AND password='$pass'";
	$selected_user=$conn->query($sql_user);


	if($row = $selected_user->fetch_assoc()){
	 	$_SESSION['email']=$row['email'];
	 	$_SESSION['username']=$row['username'];
	  	echo "success";
	}
	else{
		echo "fail";
	}

	$conn->close();
}

?>
