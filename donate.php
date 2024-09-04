<?PHP 
	//Donate to the Charity
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	//This script will establish a connection between the database and this web front-end
	include "PHP/adoptConnect.php";
	//This script will display the page header (fixed headings + nav bar)
	include "defaultpageformain.php";
	
	//The script uses session variables to check if the user is logged in
	//If the variable is assigned then the script continues:
	if (isset($_SESSION["loggedin"])){
?>
<html>
	<header>
	<style>
	<!--Small adjustments for the formatting of this page-->
	#centre{
		display: block;
		float: center;
	}
	</style>
	</header>
	<!--Welcome headings/text -->
	<h1> Donate to Our Cause </h1>
	<h2> Thanks to your donations we are able to save more animals everyday </h2>
	
	<h3> Any amount big or small makes a difference to animals everywhere </h3>
	<h3>
<?php
	//A query is run using the SUM() aggregate function to calculate the total donations raised (all-time)
	$totalalltimequery = "SELECT SUM(amount) AS Total FROM Donation";
	$totalalltime = mysqli_query($conn, $totalalltimequery);
	//The query should only return one row-so this row is fetched and assigned to variable $row before being displayed
	$row = mysqli_fetch_assoc($totalalltime);
	echo "Our Grand Total of Donations £". $row["Total"]."<br>";
	
	//This section of the code uses the manipulation of PHP timestamps to find a the date exactly one month before, at the time the script is ran
	$date = new DateTime('now');
	$dateToday = $date->format('Y-m-d');
	$onemonthago = date('Y-m-d', strtotime("-1 month"));
	//This date is used as a parameter in the BETWEEN operator (AH), to find the total donations raised within the month.
	//This query is run and assigned and displayed in the same manner as the first. 
	$totalthismonthquery = "SELECT SUM(amount) AS Total FROM Donation WHERE dateOfDonation BETWEEN '$onemonthago' AND '$dateToday'";
	$totalthismonth = mysqli_query($conn, $totalthismonthquery);
	
	$row = mysqli_fetch_assoc($totalthismonth);
	echo "Our Total Donations recieved this month £".$row["Total"]."<br>";
	
?>
	</h3><h2>
<?php
	//This is where error messages due to validation constraints are displayed
	//If the session variable is assigned this means the user has been re-directed, so the message is displayed
	if (isset($_SESSION["message"])){
		echo $_SESSION["message"];
		unset($_SESSION["message"]);
	}
?>
	</h2>
	<class id = "ls">
	<class id = "centre">
	<!-- This form allows users to enter a donation into the database -->
	<!-- When submitted the user input will be sent via HTML POST form to insertdonation.php to be validated -->
	<form method = "post" action = "PHP/insertdonation.php">
	
	<label for = "amount"> Amount: £ </label>
	<input type="number" name = "amount"><br>
	
	<label for = "donorname"> Donor Name: </label>
	<input type = "text" name = "donorname"><br><br><br>
	
	<label for = "note"> Would you like to add a note: </label><br>
	<textarea rows = "4" cols = "50" name = "note">
	</textarea><br>
	
	<input type = "submit" value = "Make Donation">
	</form><br><br>
	<h2> Thank you </h2>
</html>
<?PHP 
	}else{
?>
		<h2>
<?PHP
		//If the user is not logged in then they are displayed a message telling them they must log-in to donate
		echo "We Thank you for your support but you cannot make a donation until you have logged-in";
	}
	mysqli_close($conn);
	//EMMA WALKER 121092158
?>