<?php 
	include("Constants.php");
	include("Queries.php");

	class Account 
	{

		private $errorArray;
		private $connection;
		public function __construct($con)
		{
			$this->connection = $con;
			$this->errorArray = array();
		}

		public function register($data)
		{

			$this->validateUsername($data['username']);
			$this->validateFirstName($data['firstName']);
			$this->validateLastName($data['lastName']);
			$this->validateEmails($data['email'],$data['confirmEmail']);
			$this->validatePasswords($data['password'],$data['confirmPassword']);

			// echo 'Error array: ' . json_encode($this->errorArray);

			if(empty($this->errorArray) == true)
				return $this->insertUser($data);
			else
				return false;
		}

		private function insertUser($data)
		{	
	    $result = pg_query($this->connection, Queries::insertUserSQL($data));
	    echo $sql;
	    return $result;
		}

		public function getError($error)
		{
			if(!isset($this->errorArray[$error]))
				$error = "";
			else
				$error = $this->errorArray[$error];
			return "<p><span class='error-message'>".$error."</span></p>";
		}

		// Tests if a string is between a min and a max, true if it is, false if not 
		private function isInBetween($value,$min,$max)
		{
			$flag = true;
			if((strlen($value) > $max) or (strlen($value) < $min) )
				$flag = false;
			return $flag;
		}

		public function login($username, $pwd)
		{
	    $result = pg_query($this->connection, Queries::loginSQL($username,$pwd));
	    if(pg_num_rows($result) == 1)
	    	return true;
	    else{
	    	$this->errorArray['loginFailed']=Constants::$loginFailed;
	    	return false;
	    }
		}
		// true if username is unique, false otherwise
		public function checkUsername($username)
		{
	    $result = pg_query($this->connection, Queries::checkUsernameSQL($username));
	    if(pg_num_rows($result) == 0)
				return true;
			else 
				return false;
		}

		// true if email is unique, false otherwise
		public function checkEmail($email)
		{
	    $result = pg_query($this->connection, Queries::checkEmailSQL($email));
	    if(pg_num_rows($result) == 0)
				return true;
			else 
				return false;
		}


		private function validateUsername($username)
		{
			if(!$this->isInBetween($username,5,25)){
				$this->errorArray['username']=Constants::$usernameErrorMessage;
				return;
			}

			if(!$this->checkUsername($username)){
				$this->errorArray['usernameTaken']=Constants::$usernameTaken;
				return;
			}

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
			
			if(!$this->checkEmail($email)){
				$this->errorArray['emailTaken']=Constants::$emailTaken;
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

		public function getRegisterShowJS()
		{
			return '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
		}

		public function getLoginShowJS()
		{
			return '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
		}


	}

?>