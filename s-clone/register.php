<?php 
	include("includes/config.php");
	include("includes/classes/Account.php");

	$connection = db_connect();
		
	$account = new Account($connection);

	include("includes/handlers/register_handler.php");
	include("includes/handlers/login_handler.php");

	function getSetedValue($input)
	{
		if(isset($_POST[$input]))
			echo $_POST[$input];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Slotify</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>
</head>
<body>
	<?php
	if(isset($_POST['registerButton']))
		echo $account->getRegisterShowJS();
	else 
		echo $account->getLoginShowJS();
	?>
	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to yout Account</h2>
					<p>
						<?php echo $account->getError('loginFailed'); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="username" required />
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" required />				
					</p>
					<button type="submit" name="loginButton">Login</button>
					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Signup here.</span>
					</div>
				</form>

				<form id="registerForm" action="register.php" method="POST">
					<h2>Create an Account</h2>
					<p>
						<?php echo $account->getError('username'); ?>
						<?php echo $account->getError('usernameTaken'); ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" value="<?php getSetedValue('username');?>" placeholder="username" required />
					</p>

					<p>
						<?php echo $account->getError('firstName'); ?>
						<label for="firstName">First Name</label>
						<input id="firstName" name="firstName" type="text" value="<?php getSetedValue('firstName');?>" required />
					</p>

					<p>
						<?php echo $account->getError('lastName'); ?>
						<label for="lastName">Last Name</label>
						<input id="lastName" name="lastName" type="text" value="<?php getSetedValue('lastName');?>" placeholder="username" required />
					</p>

					<p>
						<?php echo $account->getError('emailInvalid'); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" value="<?php getSetedValue('email');?>" placeholder="user@email.com" required />
					</p>

					<p>
						<?php echo $account->getError('email'); ?>
						<?php echo $account->getError('emailTaken'); ?>
						<label for="confirmEmail">Confirm Email</label>
						<input id="confirmEmail" name="confirmEmail" type="email" value="<?php getSetedValue('confirmEmail');?>" required />
					</p>


					<p>
						<?php echo $account->getError('PasswordInvalid'); ?>
						<?php echo $account->getError('passwordLength'); ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" value="<?php getSetedValue('password');?>" required />				
					</p>

					<p>
						<?php echo $account->getError('password'); ?>
						<label for="confirmPassword">Confirm Password</label>
						<input id="confirmPassword" name="confirmPassword" value="<?php getSetedValue('confirmPassword');?>" type="password" required />				
					</p>

					<button type="submit" name="registerButton">Sign Up</button>
					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>