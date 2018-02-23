<?php 

	if (isset($_POST['loginButton'])) {
		# code...
		$username = $_POST['loginUsername'];
		$password = $_POST['loginPassword'];
		
		$result = $account->login($username,$password);
		if($result == true)
			header("Location: index.php");
	}
	
?>