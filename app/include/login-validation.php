<?php
session_start();

function unique_salt(){
	return substr(md5(mt_rand()), 0, 22);
}

function hash_pw($password, $salt){
	return crypt($password, '$2a$07$'.$salt);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['reqType'])){

		if(preg_match("/[a-zA-Z0-9._-]+[@][a-zA-Z]+\.[a-zA-Z]+/", $_POST['email']) > 0){
			
			require 'connect.php';

			$email= mysqli_real_escape_string($conn, $_POST['email']);
			$pass= mysqli_real_escape_string($conn, $_POST['password']);

			$sql_user= "SELECT email, password, username FROM users WHERE email='$email'";
			$selected_user=$conn->query($sql_user);


			if($row = $selected_user->fetch_assoc()){
				$full_salt = substr($row['password'], 0, 29);
				if (hash_equals($row['password'], crypt($pass, $full_salt))) {
				    $_SESSION['email']=$row['email'];
				 	$_SESSION['username']=$row['username'];
				  	echo "success";
				}
			}
			else{
				echo "fail";
			}

			$conn->close();
		}
	
	}
}


?>
