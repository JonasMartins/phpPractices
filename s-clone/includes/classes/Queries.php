<?php 

class Queries {
	
	/**
	 *  Class with queries needed for all classes
	 */


	// ======================= USERS TABLE =============================

	public static function insertUserSQL($data)
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

    return $sql;
	}

	public static function checkUsernameSQL($username)
	{
		$sql = "SELECT username FROM users ";
    $sql .= "WHERE username='" . $username . "' ";
		return $sql;
	}

	public static function checkEmailSQL($email)
	{
		$sql = "SELECT email FROM users ";
    $sql .= "WHERE email='" . $email . "' ";
		return $sql;
	}

	public static function loginSQL($username, $pwd)
	{
		$password = md5($pwd);
		$sql = "SELECT * FROM users ";
  	$sql .= "WHERE username='" . $username . "' ";
  	$sql .= "AND password='" . $password . "'";
  	return $sql;
	}


}


?>