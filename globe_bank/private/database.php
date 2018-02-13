<?php 

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

	// function confirm_db_connect() 
	// {
 //    if(pg_last_error()) {
 //      $msg = "Database connection failed: ";
 //      $msg .= mysqli_connect_error();
 //      $msg .= " (" . mysqli_connect_errno() . ")";
 //      exit($msg);
 //    }
 //  }

  function confirm_result_set($result_set) 
  {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }



?>