<?php

function unique_salt(){
	return substr(md5(mt_rand()), 0, 22);
}

function hash_pw($password, $salt){
	return crypt($password, '$2a$07$'.$salt);
}

$errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(0 === preg_match("/[a-zA-Z0-9._-]+[@][a-zA-Z]+\.[a-zA-Z]+/", $_POST['email'])){
		$errors['email'] = "Please enter a valid email address";
	}

	if(0 === preg_match("/.{5,}/", $_POST['password'])){
		$errors['password'] = "Please enter a valid password with atleast 5 characters.";
		echo "pw short";
	}

	if(count($errors) === 0){
		if(isset($_POST['email'], $_POST['username'], $_POST['password'])){
			
			require 'connect.php'; 

			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$email = mysqli_real_escape_string($conn,$_POST['email']);

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
				$hashed_pw = hash_pw($_POST['password'], unique_salt());
				$sql_createacc = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_pw')";

				if ($conn->query($sql_createacc) === TRUE) {
				    echo "success";
				} else {
				    echo "Error: " . $sql_createacc . "<br>" . $conn->error;
				}
				
			}

			

			$conn->close();
		}
	}
}

?>