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