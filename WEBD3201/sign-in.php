<?php

	/**
	 * Creating a sign-in page so that the user admin
	 * can sign-in. 
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (September/9th/2020)
	 */
	 
	$title = "WEBD3201 Login Page"; 
	include "./includes/header.php";

	// somwhere you make the decision the user needs to be redirected 
	/*header("Location:./dashboard.php");
	ob_flush();*/

	/* Putted the redirect on September/14th/2020*/
	//redirect("dashboard.php");

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		// Variable Declarations:
		$email_address = "";
		$password = "";	
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$email_address = trim($_POST["email"]);
		$password = trim($_POST["password"]);
		
		$user = user_authenticate($email_address, $password);
		//$user=user_select($email_address);
			dump ($user);
		// Validation error for the sign-in form
		if( $user !== false)
		{
			/* watched the demo video and still need to finish the video and 
				then follow the document and change it here. Started this part
				on September/15th/2020 */
		
			// someone who successfully logs in 
			setMessage("You have successfully logged in");
			$_SESSION["user"] = $user;
			$_SESSION["email"] = $email_address;
			/* Putted the redirect on September/14th/2020*/
			redirect("dashboard.php");
		}
		else
		{
			// someone who fails to log in:
			$message="The email and password you have entered is not in our database!. Please Try again!";
		}
	}


	?> 
	<h2><?php echo $message; ?></h2>
	<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" >
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" name="email" id="inputEmail" value="<?php echo $email_address; ?>" class="form-control" placeholder="Email address" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>

	<?php
	include "./includes/footer.php";
	?>    