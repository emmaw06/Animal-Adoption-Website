<?php
	//Log-In to An Account
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	
	//This script will create a connection between the database and this web front-end scripting. 
	include "adoptConnect.php";
	
	//The script recieves the form input from login.php
	$checkemail = $_POST["email"];
	$checkpassword = $_POST["pass_word"];
	
	//A query is run to check if there is a record in the customer table with a matching email AND password 
	$query = "SELECT * FROM Customer WHERE email='$checkemail' AND pass_word='$checkpassword'";
	
	$result = mysqli_query($conn, $query);
	
	//If the query returns ONE record (it shouldn't be possible to return two):
	if (mysqli_num_rows($result) == 1){
		//The loggedin session variable is assigned
		//This is used in certain scripts to check if user has "permissions" to perform certain actions
		$_SESSION["loggedin"] = TRUE;
		
		//This script will display the page header (fixed headings + nav bar)
		include "../defaultpage.php";
		?>
		<h1> You have successfully logged in! </h1>
		<class id="ls">
		<p> Let's start saving animals today! </p>
		</class>
		<?PHP
		//A query is run to find the customerID for the entered email
		//This is why email must also be unique
		$findid = "SELECT customerID FROM customer WHERE email = '$checkemail'";
		$result = mysqli_query($conn, $findid);
		$id = mysqli_fetch_row($result);
		
		//The customerID is then assigned as a session variable so it can be accessed in all scripts
		$_SESSION['customerID'] = $id[0];
        
		
		
	}else{
		//If the query does NOT find a matching email AND password
		
		//This script will display the page header (fixed headings + nav bar)
		include "../defaultpage.php";
		?>
		<h1> Log-In Unsuccessful </h2>
		<h3> Your details were not found </h3>
		<class id="ls">
		<!-- The user is given a clear prompt -->
		<p> Check your email and password are correct or sign-up to create an account </p>
		</class>
		<?PHP
	}
//Closing Connection
mysqli_close($conn);
?>