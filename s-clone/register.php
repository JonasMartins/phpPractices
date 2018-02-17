<?php 
	include("includes/classes/Account.php");

	$account = new Account();
	$account->register();

	
	include("includes/handlers/register_handler.php");
	include("includes/handlers/login_handler.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Slotify</title>
</head>
<body>
	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to yout Account</h2>
			<p>
				<label for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="username" required />
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" required />				
			</p>
			<button type="submit" name="loginButton">Login</button>
		</form>

		<form id="resgisterForm" action="register.php" method="POST">
			<h2>Create an Account</h2>
			<p>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="username" required />
			</p>

			<p>
				<label for="firstName">First Name</label>
				<input id="firstName" name="firstName" type="text" required />
			</p>

			<p>
				<label for="lastName">Last Name</label>
				<input id="lastName" name="lastName" type="text" placeholder="username" required />
			</p>

			<p>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="user@email.com" required />
			</p>

			<p>
				<label for="confirmEmail">Confirm Email</label>
				<input id="confirmEmail" name="confirmEmail" type="email" required />
			</p>


			<p>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" required />				
			</p>

			<p>
				<label for="confirmPassword">Confirm Password</label>
				<input id="confirmPassword" name="confirmPassword" type="password" required />				
			</p>

			<button type="submit" name="registerButton">Sign Up</button>
		</form>

	</div>
</body>
</html>