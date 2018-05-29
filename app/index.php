<?php include 'include/redirect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Post Page</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Oswald:300,400" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="temp/styles/styles.css">
	<script src="assets/scripts/jquery.js" type="text/javascript"></script>
</head>
<body>
	<div class="wrapper wrapper--posts">
		<header class="col__medium-12 header-container">
			<div class="col__small-10 col__medium-8 feed-header">
				<div class="col__small-3 col__medium-4 col--t-padding-small feed-header__block feed-header__block--left">
					<span class="user user--active"><?php echo $_SESSION['username']?></span>
				</div>
				<div class="col__small-6 col__medium-4 feed-header__block">
					<h1 class="feed-header__logo">Commenter</h1>
				</div>
				<div class="col__small-3 col__medium-4 col--t-padding-small feed-header__block feed-header__block--right">
					<span class="user__logout" id="logout">Logout</span>
				</div>
			</div>
		</header>
		<div class="container container--t-margin container--padding col__medium-6 col__medium-6--no-f">
			<div class="post post__add">
				<form class="post__form" id="post-form">
					<textarea maxlength="220" name="post" placeholder="What's on your mind? Type it here..."></textarea>
					<div class="post__btn-holder">
						<button class="btn btn--medium">COMMENT</button>
					</div>
				</form>
			</div>
			<div class="post post__feed">
			</div>
		</div>
	</div>
    <script src="assets/scripts/App.js" type="text/javascript"></script>
</body>
</html>