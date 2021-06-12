<?php
 
 	/**
	 * Creating a clients page for the salespeople to add the 
	 * clients into the form.
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (October/1st/2020)
	 */
	
	// requiring a header page
	require("./includes/header.php");
	
	// Declaring the variables in a get request mode
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$first_name = "";
		$last_name = "";
		$email_address = "";
		$ext_num = "";
		$phone_num = "";
		$representatives = "";
	}
	else
	{
		//using the trim functions in the post mode
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$first_name = trim($_POST["first_name"]);
			$last_name = trim($_POST["last_name"]);	
			$email_address = trim($_POST["email"]);
			$ext_num = trim($_POST["ext_num"]);
			$phoneNum = trim($_POST["phone_num"]);
			
			// Validation for First Name
			if($first_name == !false)
			{
				setMessage("The first name you have entered is valid");
			}
			else
			{
				setMessage("The first name you have entered is not valid. Please Try Again!");
			}
			
			// Validation for last name
			if($last_name == !false)
			{
				setMessage("The last name you have entered is valid");
			}
			else{
				setMessage("The last name you have entered is not valid");
			}
			
			// Validation for Email Address
			if($email_address == !false)
			{
				setMessage("The email address you have entered is valid");
			}
			else
			{
				setMessage("The email address you have entered is not valid");
			}
			
			//Validation for Extension Number
			if($ext_num == !false)
			{
				setMessage(" The extension number that you have entered is valid");
			}
			else
			{
				setMessage(" The extension number that you have entered is not valid. Please Try Again Later!");
			}
			// Validation for Phone Number
			if($phoneNum == !false)
			{
				setMessage("The phone number that you have entered is valid");
			}
			else
			{
				setMessage("The phone number that you have entered is not valid");
			}
		}
		// connecting users table into salespeople.php
		pg_query(db_connect(), "INSERT INTO Clients (email_address, first_name, last_name, phone_num , ext_num) VALUES (
		'$email_address',
		'$first_name', '$last_name', '$phoneNum', '$ext_num')");
	}
?>
<h3><?php echo $message; ?></h3>

	<!--made the form for clients.php-->
	<form class="clients" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" >
<?php

	display_form(
		array(
			array(
				"type" => "text",
				"name" => "first_name",
				"value" => $first_name,
				"label" => "First Name"
			),
			array(
				"type" => "text",
				"name" => "last_name",
				"value" => $last_name,
				"label" => "Last Name"
			),
			array(
				"type" => "email",
				"name" => "email",
				"value" => "",
				"label" => "Email"
			),
			array(
				"type" => "number",
				"name" => "ext_num",
				"value" => "",
				"label" => "Extension Number"
			),
			
			array(
				"type" => "number",
				"name" => "phone_num",
				"value" => "",
				"label" => "Phone Number"
			)
		)
	);
?>
		</form>
	</div>
<?php

display_table2(
	array(
		"email_address" => "Email",
		"first_name" => "First Name",
		"last_name" => "Last Name",
		"phone_num" => "Phone Number",
		"logo_path" => "Logo"
	),
	client_select_all()
);
?>

<?php 
include "./includes/footer.php";
?>
