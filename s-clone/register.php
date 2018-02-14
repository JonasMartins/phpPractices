<?php
	
	function sanitizeFormPassword($inputText) 
	{
		$inputText = strip_tags($inputText);
		return $inputText;
	}

	function sanitizeFormUsername($inputText) 
	{
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		return $inputText;
	}

	function sanitizeFormString($inputText) 
	{
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		$inputText = ucfirst(strtolower($inputText));
		return $inputText;
	}


	if (isset($_POST['loginButton'])) {
		# code...
	}

	if (isset($_POST['registerButton'])) {
		$username = sanitizeFormUsername($_POST['username']);
		$firstName = sanitizeFormString($_POST['firstName']);
		$lastName = sanitizeFormString($_POST['lastName']);
		$email = sanitizeFormString($_POST['email']);
		$confirmEmail = sanitizeFormString($_POST['confirmEmail']);
		$password = sanitizeFormPassword($_POST['password']);
		$confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);
	}

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