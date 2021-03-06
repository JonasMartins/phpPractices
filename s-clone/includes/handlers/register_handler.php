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

	if (isset($_POST['registerButton'])) {
		$username = sanitizeFormUsername($_POST['username']);
		$firstName = sanitizeFormString($_POST['firstName']);
		$lastName = sanitizeFormString($_POST['lastName']);
		$email = sanitizeFormString($_POST['email']);
		$confirmEmail = sanitizeFormString($_POST['confirmEmail']);
		$password = sanitizeFormPassword($_POST['password']);
		$confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);

		$data = ['username'=>$username,'firstName'=>$firstName,'lastName'=>$lastName,'email'=>$email,
		'confirmEmail'=>$confirmEmail,'password'=>$password,'confirmPassword'=>$confirmPassword];

		if($account->register($data) == true){
			$_SESSION['userLoggedIn'] = $username; // melhor o id ...... 
			header("Location: index.php");
		}
			
	}

?>
