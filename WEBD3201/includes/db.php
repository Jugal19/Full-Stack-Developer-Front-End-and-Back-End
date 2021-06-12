<?php

  	/**
	 * This is the connection for all the databases
	 * for lab 1,2,2 which is users, salespeople,
	 * clients, and calls.
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (September/9th/2020)
     */

	// Connection to the the database
	function db_connect()
	{
		return pg_connect("host=".DB_HOST." port=".DB_PORT." dbname=".DATABASE." user=".DB_ADMIN." password=".DB_PASSWORD);
	}
	$conn = db_connect();
	//connection for the users for lab 1
	$user_select = pg_prepare($conn, "user_select", "SELECT * FROM users WHERE email_address = $1");
	
	//connection for users for lab 1
	$user_select_all_stmt = pg_prepare($conn, "user_select_all", "SELECT * FROM users");
	
	//connection for clients for lab 2
	$client_select_all_stmt = pg_prepare($conn, "client_select_all", "SELECT * FROM clients");
	
	//connection for users for salespeople for the purpose of lab 2
	$salespeople_select_all_stmt = pg_prepare($conn, "salespeople_select_all", "SELECT * FROM users WHERE type = 'a'");
	$calls_select_all_stmt = pg_prepare($conn, "calls_select_all", "SELECT * FROM calls");
	
	/*
	//$user_update_login_time
	$result = pg_execute($conn, "user_select", array("jdoe@dcmail.ca"));
	//$result = pg_execute($conn, "user_select_all", array());
	
	if(pg_num_rows($result) == 1)
	{
		$user = pg_fetch_assoc($result, 0);
		//dump($user);
	
		//authenticate a user
		$is_user = password_verify('123lkj', $user["password"]);
	
		echo "Is user authenticated: " . $is_user . "<br/>";
	}*/
	
	 /**
	 * Function to select the user to access
	 * the sign-in page
	 *
	 * @param $email_address is used for 
	 */
	function user_select($email_address){
		
		// pg_execute is used to execute a previously-prepared statement 
		$result = pg_execute(db_connect(), "user_select", array ($email_address));
				
		if(pg_num_rows($result) > 0)
		{
			// declaring client use to access the sign-in page
			$client =  pg_fetch_assoc($result); // pg_fetch_assoc is used to return the associate array which corresponds to the fetched row of records.
			
			return $client;
		}
		else 
		{
			return false;
		}
	}
	
	 /**
	 * Function to redirect to another URL
	 *
	 * @param $email_address
	 * @param $password
	 * 
	 */
	function user_authenticate($email_address, $password){
		//$result = pg_execute(db_connect(), "user_authenticate", array ($email_address, $password));
		$user = user_select($email_address);
		if($user !== false)
		{
			if(password_verify($password, $user["password"])){
				return $user;
				exit;
			}
		}
		return false;		
	}
	
	// Started this on November/18th/2020 at 9:19 pm
	function client_select_all()
	{
		// Selecting the table from the clients database
		$client = pg_execute(db_connect(),"client_select_all",array());
		
		// pg_num_rows was used to return the number of rows from the pgadmin
		$row = pg_num_rows($client);
		
		$records = pg_fetch_all($client);
		
		return $records;
	}
	
	function calls_select_all()
	{
		//Selecting the table from the calls database
		$calls = pg_execute(db_connect(),"calls_select_all",array());
		
		// pg_num_rows was used to return the number of rows from the pgadmin
		$row = pg_num_rows($calls);
		
		$records = pg_fetch_all($calls);
		
		return $records;
		
	}
	
	function salespeople_select_all()
	{
		//Selecting the table from the users database
		$salespeople = pg_execute(db_connect(),"salespeople_select_all",array());
		
		// pg_num_rows was used to return the number of rows from the pgadmin
		$row = pg_num_rows($salespeople);
		
		$records = pg_fetch_all($salespeople);
		
		return $records;
	}
?>
	