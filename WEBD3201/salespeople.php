	<?php
		/**
		 * Creating page for Salespeople 
		 * enabling and disabling for admin
		 *
		 *
		 * PHP version 7.1
		 *
		 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
		 * @version    1.0  (October/1st/2020)
		 */

		 $title = "salespeople";
		 
		include "./includes/header.php";

		if (isset($_SESSION["signedin"]))
		{
		  $email_address = $_SESSION["email"];
		}

		// user_authenticate for the admin
		if ($_SESSION["user"]["type"]!= ADMIN)
		{
			setMessage("Hello Please sign in as an admin");
			redirect("./sign-in.php");
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "GET")
		{
			$firstName = "";
			$lastName = "";
			$email_address = "";
			$password = "";
		}
		
		else if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$firstName = "";
			$lastName = "";
			$email_address = "";
			$password = "";
			if(isset($_POST["submit"]))
			{
					
				$firstName = trim($_POST["first_name"]);
				$lastName = trim($_POST["last_name"]);
				$email_address = trim($_POST["email"]);
				$password = trim($_POST["password"]);	
			
				// Validation for First Name
				if($firstName == !false)
				{
					$message .=(" The first name you have entered is valid");
				}
				else
				{
					$message .=(" The first name you have entered is no valid. Please Try again!");
				}
			
				// Validation for Last Name
				if($lastName == !false)
				{
					$message .=(" The last name that you have entered is valid and you may proceed");
				}
				else
				{
				$message .=(" The last name you have entered is not valid. Please Try again!");
				}
			
				// Validation for Email
				if($email_address == !false)
				{
					$message .=(" The email address that you have entered is valid.");
				}
				else
				{
					$message .=(" The email that you have entered is valid and you may proceed");
				}
				
				// Validation for password
				if($password)
				{
					$message .=(" The password that you have is valid!");
				}
				
				// Making the data for Registration 
					else
					{
						making_users($firstName, $lastName, $email_address, $password);
						setMessage("Hello User you have successfully registered to our database.");
						redirect("./salespeople.php");
					}
			
				// connecting users table into salespeople.php
				pg_query(db_connect(), "INSERT INTO Users (email_address, password, first_name, last_name, last_access , enrol_date, enabled, Type) VALUES (
				'$email_address', crypt('$password', gen_salt('bf')),
				'$firstName', '$lastName', '2020-06-22 19:10:25', '2020-08-22 11:11:11', true, 'a')"); 
			}
			
				/* Worked on this on December 4th/2020 - December 11th/2020*/
			if (isset($_POST["update"]))
			{
				$active = $_POST["active"];
				$email = $_SESSION["email"];
				if ($active == "true")
				{
					$sql1 = "UPDATE users
							SET enabled = true
							WHERE email_address = '$email'";
					
					pg_query(db_connect(), $sql1); 
				}
				elseif($active == "false")
				{
					$sql2 = "UPDATE users
							SET enabled = false
							WHERE email_address = '$email'";
					
					pg_query(db_connect(), $sql2); 
				}
			}
		}
		?>

<h3><?php echo $message; ?></h3>
<form class="form-salespeople" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" >
<?php
display_form(
	array(
		array(
			"type" => "text",
			"name" => "first_name",
			"value" => $firstName,
			"label" => "First Name"
		),
		array(
			"type" => "text",
			"name" => "last_name",
			"value" => $lastName,
			"label" => "Last Name"
		),
		array(
			"type" => "email",
			"name" => "email",
			"value" => "",
			"label" => "Email"
		),
		array(
			"type" => "password",
			"name" => "password",
			"value" => "",
			"label" => "Password"
		),
		array(
			"type" => "number",
			"name" => "phone_number",
			"value" => "",
			"label" => "Phone Number"
		),
		array(
			"type" => "number",
			"name" => "extension",
			"value" => "",
			"label" => "Extension"
		)
	)
);


//display_form($_SERVER['PHP_SELF']);
?>
</form>
</br>

</div>
<?php

display_table(
	array(
		"email" => "Email",
		"first_name" => "First Name",
		"last_name" => "Last Name",
		"is_active" => "Is Active"
	),
	salespeople_select_all()
	//salespeople_count(),
	//$page
);

?>

<?php
include "./includes/footer.php";
?>