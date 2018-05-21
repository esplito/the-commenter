<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Register Page</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Oswald:300,400" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="../temp/styles/styles.css">
	<script src="../assets/scripts/jquery.js" type="text/javascript"></script>
</head>
<body>
	<div class="wrapper">
		<div class="col__large-4 auth auth--image">
			<div class="side-image side-image--register">
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
					<p class="auth-alt__desc">Already have an account?</p><a href="../login/"><button class="btn btn--smaller btn--alt">SIGN IN</button></a>
				</div>
			</header>
		</div>
		<div class="col__large-8 col__medium-12 auth">
			<div class="auth-form">
				<div class="auth-form__inner">
					<div class="auth-form__form">
						<h3 class="auth-form__title">Start commenting</h3>
						<h4 class="auth-form__subtitle">Enter your details to get started</h4>
						<form id="register-form">
							<div class="auth-form__row">
								<label>EMAIL</label>
								<input type="email" name="email" id="register-email" required>
							</div>
							<div class="auth-form__row">
								<label>USERNAME</label>
								<input type="text" name="username" id="username" required>
							</div>
							<div class="auth-form__row auth-form__row--last">
								<label>PASSWORD</label>
								<input type="password" name="password" required>
							</div>
							<div class="auth-form__row auth-form__row--btn">
								<button class="btn btn--default" type="submit">REGISTER</button>
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