<?php 

	if (isset($_POST['loginButton'])) {
		# code...
		$username = $_POST['loginUsername'];
		$password = $_POST['loginPassword'];
		
		$result = $account->login($username,$password);
		if($result == true){
			$_SESSION['userLoggedIn'] = $username; // melhor o id ...... 
			header("Location: index.php");
		}
	}
	
?>