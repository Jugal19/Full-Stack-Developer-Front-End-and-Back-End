<?php
  
  	/**
	 * Creating a change-password page so that the user admin
	 * or a salespeople can change their password.
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (October/1st/2020)
	 */
$title = "WEBD3201 Change Password Page"; 
include "./includes/header.php";

if (!isset ($_SESSION["user"]))
	{
		setMessage("Hello Please sign in to change your password");
		redirect("./sign-in.php");
	}
//Validations
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	
	$password = trim($_POST["password"]);
	$confirm_password = trim($_POST["confirm_password"]);
	
	if(strlen($password) < 3 || strlen($confirm_password) < 3 )
	{
		setMessage("The password you entered is not 3 characters long!");
	}
	else if ($password !== $confirm_password)
	{
		setMessage("The password you have entered does not match. Please Try Again!");
	}
	else
	{
		setMessage("You have successfully changed the password!");
		$email_address = $_SESSION["email"];
		/*pg_query(db_connect(), "UPDATE Users SET password = crypt('$confirm_password', gen_salt('bf')) 
		WHERE email_address = '$email_address'");*/
		
		pg_prepare(db_connect(), "user_update_password","UPDATE Users SET password = crypt('$confirm_password', gen_salt('bf')) 
		WHERE email_address = '$email_address'");
		
		pg_execute(db_connect(), "user_update_password", array());
	}
	
	$message = flashMessage();

}

?>
<h3><?php echo $message; ?></h3>

<form class="form-salespeople" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" >
<?php

display_form(
	array(
		array(
			"type" => "password",
			"name" => "password",
			"value" => "",
			"label" => "Password"
		),
		array(
			"type" => "password",
			"name" => "confirm_password",
			"value" => "",
			"label" => "Confirm Password"
		)
	)
);
?>
</form>

<?php
include "./includes/footer.php";
?> 