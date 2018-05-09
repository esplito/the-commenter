<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Login Page</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Oswald:300,400" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="../temp/styles/styles.css">
	<script src="../assets/scripts/jquery.js" type="text/javascript"></script>
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
		<div class="col__large-8 col__medium-12 auth-header">
			<header>
				<div class="auth-alt">
					<p class="auth-alt__desc">Don't have an account?</p><a href="../register/"><button class="btn btn--smaller btn--alt">GET STARTED</button></a>
				</div>
			</header>
		</div>
		<div class="col__large-8 col__medium-12 auth">
			<div class="auth-form">
				<div class="auth-form__inner">
					<div class="auth-form__form">
						<h3 class="auth-form__title">Sign in to Commenter</h3>
						<h4 class="auth-form__subtitle">Enter your details below</h4>
						<form id="login-form">
							<div class="auth-form__row">
							<label>EMAIL</label>
							<input type="email" name="email" id="login-email" required>
						</div>
						<div class="auth-form__row auth-form__row--last">
							<label>PASSWORD</label>
							<input type="password" name="password" required>
						</div>
						<div class="auth-form__row auth-form__row--btn">
							<button class="btn btn--default" type="submit">SIGN IN</button>
						</div>
						</form>
					 </div>
					<h3 class="auth-form__message auth-form__message--error"></h3>
				</div>
			</div>
		</div>
	</div>
    <script src="../assets/scripts/App.js" type="text/javascript"></script>
</body>
</html>