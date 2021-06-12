<?php
	/*	Name:	Jugal Patel
		Date:	December/9th/2020
		Course Code:	WEBD3201
	*/
	
	/**
	 * Creating a change-password page so that the user admin
	 * or a salespeople can change their password.
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (December/9th/2020)
	 */
	$title = "Policy Page";
 
	include "./includes/header.php";
 
?>
<div>
<h1> Policy </h1>
<hr/>
<br/>
<h4>What does the website collect?</h4>
<p> The website collects your email address, phone number, your extension number, first name, and your last name </p>
<br/>

<h4> How does the website use the data internally?</h4>
<p>The website uses the data internally by storing the database which is used to identify a user.</p>
<br/>

<h4> Does the website share the user data? </h4>
<p> For the safety of our user and the website we do not share any user data to any parties.</p>


</div>


<?php require("./includes/footer.php");?>