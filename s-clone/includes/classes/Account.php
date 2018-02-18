<?php 
	include("Constants.php");

	class Account 
	{

		const FIELDS = ['username','firstName','lastName','email','confirmEmail','password','confirmPassword'];
		private $errorArray;

		public function __construct()
		{
			$this->errorArray = array();
		}

		public function register($data)
		{
			// $keys = array_keys($data);
			// if(!$this->compareArrays($data,Account::FIELDS)){
			// 	exit("Error in values from register form!");
			// 	// redirect ...
			// }

			$this->validateUsername($data['username']);
			$this->validateFirstName($data['firstName']);
			$this->validateLastName($data['lastName']);
			$this->validateEmails($data['email'],$data['confirmEmail']);
			$this->validatePasswords($data['password'],$data['confirmPassword']);

			if(empty($this->errorArray) == true){
				return true;
			} else {
				return false;
			}
		}

		public function getError($error)
		{
			if(!isset($this->errorArray[$error])){
				$error = "";
			} else {
				$error = $this->errorArray[$error];
			}
			return "<p><span class='error-message'>".$error."</span></p>";
		}

		// True if two arrays are equal false otherwise
		// private function compareArrays($a1=array(),$a2=array())
		// {
		// 	$flag = true;
		// 	if (count($a1) != count($a2)){ $flag = false; }
		// 	else {
		// 		for($i=0; $i<count($a1); ++$i){
		// 			if(strcmp($a1[$i], $a2[$i]) != 0){
		// 				$flag = false;
		// 			}
		// 		}
		// 	}
		// 	return $flag;
		// }

		// Tests if a string is between a min and a max, true if it is, false if not 
		private function isInBetween($value,$min,$max)
		{
			$flag = true;
			if((strlen($value) > $max) or (strlen($value) < $min) ){
				$flag = false;
			}
			return $flag;
		}


		private function validateUsername($username)
		{
			if(!$this->isInBetween($username,5,25)){
				$this->errorArray['username']=Constants::$usernameErrorMessage;
				return;
			}
			// check if username exists
		}

		private function validateFirstName($firstName)
		{
			if(!$this->isInBetween($firstName,2,25)){
				$this->errorArray['firstName']=Constants::$firstNameErrorMessage;
				return;
			}
		}

		private function validateLastName($lastName)
		{
			if(!$this->isInBetween($lastName,5,25)){
				$this->errorArray['lastName']=Constants::$lastNameErrorMessage; 
				return;
			}	
		}

		private function validateEmails($email, $confirmEmail)
		{
			if($email != $confirmEmail){
				$this->errorArray['email']=Constants::$emailConfirmationErrorMessage;
				return;
			}

			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$this->errorArray['emailInvalid']=Constants::$emailInvalidErrorMessage; 
				return;	
			}
		}

		private function validatePasswords($password, $confirmPassword)
		{
			if($password != $confirmPassword){
				$this->errorArray['password']=Constants::$passwordConfirmationErrorMessage; 
				return;
			}
			if(preg_match('/[^A-Za-z0-9]/', $password)){
				$this->errorArray['PasswordInvalid']=Constants::$passwordInvalidErrorMessage;
				return;
			}

			if(!$this->isInBetween($password,5,30)){
				$this->errorArray['passwordLength']=Constants::$passwordLengthErrorMessage;
				return;
			}	
		}




	}

?>