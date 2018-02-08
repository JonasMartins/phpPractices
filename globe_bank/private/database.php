<?php 

	require_once('db_credentials.php');
	
	function db_connect()
	{
		$connection = pg_connect("DB_SERVER","DB_USER","DB_PASS","DB_NAME");
		return  $connection;
	}

	function db_disconnect($connection)
	{
		pg_close($connection);
	}

?>