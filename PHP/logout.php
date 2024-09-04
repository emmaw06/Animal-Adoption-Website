<?php
	//Tieing up the Loose Ends of the Code - Log-out of an account
	//Starting session (so session variables can be accessed on this page)
	session_start();
	//Destroying session (all session variables will be unset meaning the user loses access to certain pages)
	session_destroy();
	//The user is re-directed back to the home page
	header("Location:../adopthome.php");
?>