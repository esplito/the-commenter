<?php
session_start();
if(isset($_POST['login'])){
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
	$select_user=mysql_query("SELECT email, password from users where email='$email' and password='$pass'");

	if($row=mysql_fetch_array($select_data)){
	 	$_SESSION['email']=$row['email'];
	  	echo "success";
	}
	else{
		echo "fail";
	}

	$conn->close();
}

?>
