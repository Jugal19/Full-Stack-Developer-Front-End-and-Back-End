<?php

	/**
	 * Creating a constants page for connecting the 
	 * database to the pg_admin and the php page.
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (September/9th/2020)
	 */
	
	/****** COOKIES ******/
	define("COOKIE_LIFESPAN", "2592000");

	/****** USER TYPES ******/
	define("ADMIN", 's');
	define("AGENT", 'a');
	define("CLIENT", 'c');
	define("PENDING", 'p');
	define("DISABLED" , 'd');

	/****** DATABASE CONSTANTS ******/
	define("DB_HOST", "localhost");
	define("DATABASE", "patelj2_db");
	define("DB_ADMIN", "patelj2");
	define("DB_PORT", "5432");
	define("DB_PASSWORD", "123lkj");

?>