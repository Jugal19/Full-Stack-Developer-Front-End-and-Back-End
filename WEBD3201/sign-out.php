<?php
	
	/**
	 * Creating a sign-out page so that the user admin
	 * can sign-out from the page
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (September/9th/2020)
	 */
	 
	$title = "WEBD3201 Sign-out Page"; 
	include "./includes/header.php";

	//redirect("./sign-in.php");
	session_unset();
	session_destroy();
	session_start();

	setMessage("You have successfully signed out!");

	redirect("./index.php");

?>