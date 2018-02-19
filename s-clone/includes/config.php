<?php 
	ob_start();
	require('db_credentials.php');
	
	function db_connect()
	{
		//echo 'host='.DB_SERVER.' port=5432 dbname='.DB_NAME.' user='.DB_USER.' password='.DB_PASS;
		$connection = pg_connect('host='.DB_SERVER.' port=5432 dbname='.DB_NAME.' user='.DB_USER.' password='.DB_PASS);
		return  $connection;
	} 

	function db_disconnect($connection)
	{
		pg_close($connection);
	}
?>