<?php
	if(isset($_POST['signup']))
	{
		$screenName = $_POST['screenName'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$error = '';
		$password = md5($password);
		if(empty($screenName) or empty($password) or empty($email))
		{
			$error = 'All fields are required';
		} else {
			$email = $getFromUser->checkInput($email);
			$password = $getFromUser->checkInput($password);
			$screenName = $getFromUser->checkInput($screenName);
			if(!filter_var($email))
			{
				$error = 'Invalid email format';
			} else if(strlen($screenName)>20)
			{
				$error = 'Name must have length between 6 and 20 characters';	
			} else if (strlen($password)<5)
			{
				$error = 'Password length should be longer than 5 characters';
			} else {
				if($getFromUser->checkEmail($email) === true)
				{	
					$error = 'Email already in use';
				} else { 
					$getFromUser->create('users',array('email'=>$email,
						'password'=>$password,
						'screenName'=>$screenName,
						'profileImage'=>'assets/images/defaultProfileImage.png',
						'profileCover'=>'assets/images/defaultCoverImage.png'
					));
					header('Location: includes/signup.php?step=1');
				}
			}
		}
	}
?>
<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Twitter">
		</li>
	</ul>
	<?php 
		if(isset($error))
		{ 
			echo '<li class="error-li">
	  					<div class="span-fp-error">'.$error.'</div>
	 				</li>';
		}
	?>		
</div>
</form>