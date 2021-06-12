<?php
	/**
	 * Shared functions for the site (excluding database)
	 *
	 * PHP version 7.1
	 *
	 * @author     Jugal Patel <jugal.patel1@dcmail.ca>
	 * @version    1.0  (September/9th/2020)
	 */

	/**
	 * Function to redirect to another URL
	 *
	 * @param $url  location to redirect the user to
	 */

	function redirect($url)
	{
		header("Location:".$url);
		ob_flush();
	}

   function dump($arg)
    {
	  echo print "<pre>";
	  print_r($arg);
	  echo "</pre>";
    }

	/**
	 * Placing a message on to the session
	 *
	 * @param $message  is the information / message to be placed on a session
	 */
	function setMessage($message)
	{
		$_SESSION['message'] = $message;
	}

	/**
	 * Retrieves a message from a session
	 *
	 * @return message that was on a seesion
	 */
	function getMessage()
	{
		return $_SESSION['message'];
	}

	/**
	 * Function to set the message to true or
	 * false
	 *
	 * @return true or false 
	 */
	function isMessage()
	{
		return isset($_SESSION['message'])?true:false; // conditional operator
	}
	
	/**
	 * Function removes the message from the session
	 *
	 * @param $_SESSION['message']
	 */
	function removeMessage()
	{
		unset($_SESSION['message']);
	}
	
	/**
	 * Function to get the message which equals to
	 * removeMessage function and returns the $message
	 *
	 * @return $message
	 * 
	 */
	function flashMessage()
	{
		$message = "";
		if (isMessage())
		{
			$message = getMessage();
			removeMessage();
		} 
		return $message;
	}
	
	/**
	 * Function to get the user 
	 *
	 * @return nothing if seession returns 
	 * the user and if not it would return nothing.
	 */
	function getUser()
	{
		if(isset($_SESSION['user']))
		{
			return $_SESSION['user'];
		}
		else
		{
			return "";
		}
	}
	
	 /**
	 * Function to return the user
	 *
	 * @return the session if the user = 0
	 */
	function removeUser()
	{
		return $_SESSION['user']=0;
	}
	
	/**
	 * Function to create the form 
	 *
	 * @param $field creates the form  for
	 * $type, $name, $value and $label by echoing
	 * the form and the button for lab 2
	 */
	function display_form($field)
	{
		for($j =0; $j< count($field); $j++)
		{
			$type = $field[$j]['type'];
			$name = $field[$j]['name'];
			$value = $field[$j]['value'];
			$label = $field[$j]['label'];
			
			echo '
					<div class=form-group text-left">
					<label> '.$label.' </label>
					<input type="'.$type.'" class="form-control" name="'.$name.'" value="'.$value.'" />
					</div>
				 ';			 
		}
		echo '<br/> <button class="btn btn -lg btn-primary btn-block" type="submit" name="submit"> Register </button>';
	}

	/**
	 * Function to create the table for lab 3
	 * and to create the radio buttons, and Update
	 * button for lab 4
	 *
	 * @param $cell
	 * @param $records creates the table for
	 * lab 2
	 *
	 */
	function display_table($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		
		// made a form for the radio buttons and the Update button for lab 3.
		{
			echo '<tr>';  
			echo '<td>'.$data["email_address"].'</td>';
			$_SESSION["email"] = $data["email_address"];
			echo '<td>'.$data["first_name"].'</td>';
			echo '<td>'.$data["last_name"].'</td>';
			echo '<td>
					<form class="form-update" method="post">
						<div>
							<input type="radio" id="isactive1" name="active" value="true" checked>
							<label for="isactive1">Active</label>
							<br/>
							<input type="radio" id="isactive2" name="active" value="false">
							<label for="isactive1">Inactive</label>
						</div>
						<div>
							<button type="submit" name="update">Update</button>
						</div>
					</form>
				  </td>';
				
			echo '</tr>';
		}
		echo '</table>';
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
	}

	/**
	 * Function to create the table for lab 2
	 *
	 * @param $cell
	 * @param $records creates the table for
	 * lab 2
	 */
	function display_table2($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
			echo '<td>'.$data["email_address"].'</td>';
			echo '<td>'.$data["first_name"].'</td>';
			echo '<td>'.$data["last_name"].'</td>';		
			echo '<td>'.$data["phone_num"].'</td>';	
			echo "<td><img style=\"width:40px;height:40px;\" src=\"./images/users.png\"/></td>";
			echo '</tr>';			 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
	}

	 /**
	 * Function to create the table for lab 2
	 *
	 * @param $cell
	 * @param $records creates the table for
	 * lab 3
	 */
	function display_table3($cell , $records)
	{
		//echoing the table
		echo'
				<div class="table-responsive">
				<table id="table" class="table table-striped table-sm">
				<thead>;
				<tr>;
			';
		
		//The foreach is used to iterate the header for the <th></th> tag.
		
		foreach($cell as $cell => $head)
		{
			echo '<th>'.$head.'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($records as $records => $data)
		{
			echo '<tr>';  
			echo '<td>'.$data["client"].'</td>';
			echo '<td>'.$data["dates"].'</td>';

			echo '</tr>';			 		
		}
		
		echo '</table>';
		
		echo "<script>";
		echo "$(document).ready(function(){ $('#table').dataTable(); });";
		echo "</script>";
	}
?>