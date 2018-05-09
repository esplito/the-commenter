<? php 
function redirect() {
    header('location: /login/');
}

session_start();

if(!isset($_SESSION['username'])){
   redirect();
  }

exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>The Commenter</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Oswald:300,400" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="temp/styles/styles.css">
	<script src="assets/scripts/jquery.js" type="text/javascript"></script>
</head>
<body>
	<div class="wrapper">
		Commenting feed to be implemented
	</div>
    <script src="assets/scripts/App.js" type="text/javascript"></script>
</body>
</html>