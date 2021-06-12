<?php

	/**
	 * Creating a calls page for the salespeople to add
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (October/1st/2020)
	 */

	require("./includes/header.php");

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$date = "";
		$client = "";
	}
	else
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$date = trim($_POST["date"]);
			$client = trim($_POST["client"]);	

			// Validation for date
			if($date == !false)
			{
				setMessage("The date you have entered is valid");
			}
			else
			{
				setMessage("The date you have entered is not valid. Should be in this format example: 2020-11-01. Please try this again!");
			}
			
			// Validation for date
			if($client == !false)
			{
				setMessage("The client you have entered is valid");
			}
			else
			{
				setMessage("The client you have entered is not valid");
			}
		}
		
		// connecting users table into salespeople.php
		pg_query(db_connect(), "INSERT INTO Calls (client, dates) VALUES (
		'$client','$date')");
	}
?>
	<h3><?php echo $message; ?></h3>
	<form class="form-salespeople" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" >
	<?php

	display_form(
		array(
			array(
				"type" => "text",
				"name" => "date",
				"value" => "",
				"label" => "Date"
			),
			array(
				"type" => "text",
				"name" => "client",
				"value" => "",
				"label" => "Client"
			)
		)
	);

?>
	</form>

	</div>
<?php

	display_table3(
		array(
			"client" => "Client",
			"date" => "Date"
		),
		calls_select_all()
	);


?>

<?php require("./includes/footer.php");?>