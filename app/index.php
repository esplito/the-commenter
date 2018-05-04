<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Login Page</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Oswald:300,400" rel="stylesheet">
	<!-- build:css assets/styles/styles.css -->
	 <link rel="stylesheet" type="text/css" href="temp/styles/styles.css">
	<!-- endbuild -->

	<!-- build:js assets/scripts/Vendor.js -->
	<script src="temp/scripts/Vendor.js" type="text/javascript"></script>
	<!-- endbuild -->
</head>
<body>
	<div class="wrapper">
		<div class="col__large-4 auth auth--image">
			<div class="side-image">
				<div class="overlay"></div>
				<div class="side-image__container">
					<h1 class="side-image__title">Commenter</h1>
					<h2 class="side-image__subtitle">The place where you can comment on anything</h2>
				</div>
			</div>
		</div>
		<div class="col__large-8 col__medium-12 auth">
			<header>
				<div class="auth-alt">
					<p class="auth-alt__desc">Don't have an account?</p><button class="btn btn--smaller btn--alt">GET STARTED</button>
				</div>
			</header>
			<div class="auth-form">
				<div class="auth-form__inner">
					<h3 class="auth-form__title">Sign in to Commenter</h3>
					<h4 class="auth-form__subtitle">Enter your details to get started</h4>
					<form>
						<div class="auth-form__row">
						<label>EMAIL</label>
						<input type="text" name="email">
					</div>
					<div class="auth-form__row auth-form__row--last">
						<label>PASSWORD</label>
						<input type="text" name="password">
					</div>
					<div class="auth-form__row auth-form__row--btn">
						<button class="btn btn--default">SIGN IN</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- build:js assets/scripts/App.js -->
    <script src="temp/scripts/App.js" type="text/javascript"></script>
  	<!-- endbuild -->
</body>
</html>