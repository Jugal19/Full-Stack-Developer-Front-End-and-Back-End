<?php

/*	Name:	Jugal Patel
	Date:	December/1st/2020
	Course Code:	WEBD3201
 */
 	/**
	 * Creating a reset page for the user to reset the password 
	 * using an email sent
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (October/1st/2020)
	 */
 
 $title = "Reset Password"; 

require("./includes/header.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	// The message
	//$message = "Line 1\r\nLine 2\r\nLine 3";
	$message = "This is the reset page here is the link to reset your password: reset.php\n";
	// In case any of our lines are larger than 70 characters, we should use wordwrap()
	$message = wordwrap($message, 100, "\r\n");

	$reset = fopen("reset.txt", "a");
	fwrite($reset, $message);
	fclose($reset);
	// Send
	//mail('$email', 'My Subject', $message);

}


?>
<form class="clients" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" >
<?php
display_form(
	array(
		array(
			"type" => "email",
			"name" => "email",
			"value" => "",
			"label" => "Email"
		)	
	)
);
?>
</form>
<?php require("./includes/footer.php");?>