<?php

function unique_salt(){
	return substr(md5(mt_rand()), 0, 22);
}

function hash_pw($password, $salt){
	return crypt($password, '$2a$07$'.$salt);
}


if(isset($_POST['email'], $_POST['username'], $_POST['password'])){
	$servername = "localhost";
	$dbuser = "";
	$dbpw = "";
	$dbname = "test";


	// Create connection
	$conn = new mysqli($servername, $dbuser, $dbpw, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$username = $_POST['username'];
	$email = $_POST['email'];

	$sql_email = "SELECT email, username FROM users WHERE  email = '$email' OR username = '$username'";
	$result=$conn->query($sql_email);

	if(mysqli_num_rows($result) > 0){
		$row = $result->fetch_assoc();
		
		if($email==$row['email']){
			echo "email exists";
		}
		elseif($username==$row['username']){
			echo "username exists";
		}
	}
	else{
		echo "success";
	}

	$hashed_pw = hash_pw($_POST['password'], unique_salt());

	$conn->close();
}


?>