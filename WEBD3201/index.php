<?php

	/**
	 * Creating a index page for the user admin who have
	 * logged on to the website
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (September/9th/2020)
	 */
	 
	$title = "WEBD3201 Home Page"; 
	include "./includes/header.php";

	// determine that someone is not logged 
	/*header("Location:./sign-in.php");
	ob_flush*/

	/* Added the redirect page on September/14th/2020 */
	//redirect("dashboard.php");
?>

	<h1 class="cover-heading">Cover your page.</h1>
	<h2><?php echo $message; ?></h2>

	<p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
	<p class="lead">
		<a href="#" class="btn btn-lg btn-secondary">Learn more</a>
	</p>

<?php
include "./includes/footer.php";
?>    