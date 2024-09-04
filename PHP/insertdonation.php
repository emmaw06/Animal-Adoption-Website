<?php
	//Donate to the Charity
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	
	//This script will create a connection between the database and this web front-end scripting. 
	include "adoptConnect.php";
	
	//This script will display the page header (fixed headings + nav bar)
	include "../defaultpage.php";
?>
<header>
<style>

	<!--Some CSS to solve small formatting issues -->
	#centre{
			display: block;
			justify-content: center;
		}
</style>
</header>
<?PHP
	//The script recieves the form input from donate.php
	$amount = $_POST["amount"];
	$donorName = $_POST["donorname"];
	$note = $_POST["note"];
	
	//Validation checks
	if ($amount == NULL){
		$_SESSION["message"] = "Amount field must be filled in!";
		header("Location:../donate.php");
		//exit() is used to stop script from running further
		exit();
	}
	if ($donorName == NULL){
		$_SESSION["message"] = "Donor Name field must be filled in. Please use alias if you wish to remain anonymous."; 
		header("Location:../donate.php");
		exit();
	}
	if ($note == NULL){
		$note = "";
	}
	if ($amount <= 0){
		$_SESSION["message"] = "Amount must be greater than £0";
		header("Location:../donate.php");
		exit();
	}
	//If the script has reached this point the data meets the validation constraints
	//PHP timestamps are used to assign a value for dateOfDonation (the date at the time the script is ran)
	$date = new DateTime('now');
	$dateToday = $date->format('Y-m-d');
	
	//A query is run using the form data and the timestamp as dateOfDonation
	$insertdonation = "INSERT INTO Donation (donationID, dateOfDonation, amount, donorName, note) VALUES(NULL, '$dateToday', '$amount', '$donorName', '$note')";
	
	if ($conn->query($insertdonation)){?>
		<class id="ls">
		<class id="centre"><?PHP
		//The user is given confirmation of success
		echo "Your donation has been recorded successfully!<br>";
		echo "It will now be included in our grand total on the donations page<br>";
		echo "Thank You Again for your support<br>";
	}else{
		//User friendly error message
		echo "There was a connection error when recording your donation please try again";
	}

mysqli_close($conn);	
?>	
	