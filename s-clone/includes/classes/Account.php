<?php 
	include("Constants.php");

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

			echo 'Error array: ' . json_encode($this->errorArray);

			if(empty($this->errorArray) == true)
				return $this->insertUser($data);
			else
				return false;
		}

		private function insertUser($data)
		{
			$password = md5($data['password']);
			$profilePic = "assets/images/profile-pics/head_emerald.png";
			$date = date("Y-m-d");

			$sql = "INSERT INTO users ";
			$sql .= "(username, first_name, last_name, email, password, signup_date, profile_pic) ";
			$sql .= "VALUES (";
			$sql .= "'" . $data['username'] . "',";
	    $sql .= "'" . $data['firstName'] . "',";
	    $sql .= "'" . $data['lastName'] . "',";
	    $sql .= "'" . $data['email'] . "',";
	    $sql .= "'" . $password . "',";
	    $sql .= "'" . $date . "',";
	    $sql .= "'" . $profilePic . "'";
	    $sql .= ")";

	    $result = pg_query($this->connection, $sql);
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
			if((strlen($value) > $max) or (strlen($value) < $min) )
				$flag = false;
			return $flag;
		}

		public function login($username, $pwd)
		{
			$password = md5($pwd);
			$sql = "SELECT * FROM users ";
    	$sql .= "WHERE username='" . $username . "' ";
    	$sql .= "AND password='" . $password . "'";

	    $result = pg_query($this->connection, $sql);
	    if(pg_num_rows($result) == 1)
	    	return true;
	    else{
	    	$this->errorArray['loginFailed']=Constants::$loginFailed;
	    	return false;
	    }
		}


		private function validateUsername($username)
		{
			if(!$this->isInBetween($username,5,25)){
				$this->errorArray['username']=Constants::$usernameErrorMessage;
				return;
			}
			// UGLY
			$checkUsernameQuery = pg_query($this->connection, "SELECT username FROM users WHERE username='$username'");
			if(pg_num_rows($checkUsernameQuery) != 0) {
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
			// UGLY
			$checkEmailQuery = pg_query($this->connection, "SELECT username FROM users WHERE email='$email'");
			if(pg_num_rows($checkEmailQuery) != 0) {
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




	}

?>