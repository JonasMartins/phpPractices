<?php 

	class Account 
	{

		const FIELDS = ['username','firstName','lastName','email','confirmEmail','password','confirmPassword'];
		private $errorArray;

		public function __construct()
		{
			$this->$errorArray = array();
		}

		public function register($data)
		{
			$keys = array_keys($data);
			if(!compareArrays($data,Account::FIELDS)){
				exit("Error in values from register form!");
				// redirect ...
			}

			$this->validateUsername($data['username']);
			$this->validateFirstName($data['firstName']);
			$this->validateLastName($data['lastName']);
			$this->validateEmails($data['email'],$data['confirmEmail']);
			$this->validatePasswords($data['password'],$data['confirmPassword']);
		}

		// True if two arrays are equal false otherwise
		private function compareArrays($a1=array(),$a2=array())
		{
			bool $flag = true;
			if (count($a1) != count($a2)){ $flag = false; }
			else {
				for($i=0; $i<count($a1); ++$i){
					if(strcmp($a1[$i], $a2[$i]) != 0){
						$flag = false;
					}
				}
			}
			return $flag;
		}

		// Tests if a string is between a min and a max, true if it is, false if not 
		private function isInBetween($value,$min,$max)
		{
			bool $flag = true;
			if((strlen($value) > $max) or (strlen($value) < $min) ){
				$flag = false;
			}
			return $flag;
		}


		private function validateUsername($username)
		{
			if(!isInBetween($username,5,25)){
				array_push($this->errorArray, "Your Username must be between 5 and 25 characters.");
				return;
			}
			// check if username exists
		}

		private function validateFirstName($firstName)
		{
			
		}

		private function validateLastName($lastName)
		{
			
		}

		private function validateEmails($email, $confirEmail)
		{
			
		}

		private function validatePasswords($password, $confirmPassword)
		{
			
		}

	}

?>