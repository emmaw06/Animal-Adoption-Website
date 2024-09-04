<?php
	//View Current Adoptions
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	//This script will create a connection between the database and this web front-end scripting. 
	include "PHP/adoptConnect.php";
	//This script will display the page header (fixed headings + nav bar)
	include "defaultpageformain.php";
?>
<header>
	<style>
	<!--Some CSS to solve small formatting issues -->
	#centre{
			display: flex;
			justify-content: center;
			display: block;
		}
	</style>
</header>
<!--Mission statement -->
<h1> We have made it Our Mission for the past 20 years to protect the most vulnerable around the globe. </h1><br>
<h2> With your help we have grown from a small UK Wildlife Centre to a Global Agency </h2><br>
<h2> Thank you for all that you do for us and our four legged friends </h2><br>
<br><br>

<h1> Your Current Adoptions </h1>
<class id = "ls">
<class id = "centre">
<?php
	//First we check if the user has logged in by checking if a session variable has been assigned
	if (isset($_SESSION["customerID"])){
		//If they have logged in the customerID stored as a session variable is assigned to $customerID 
		$customerID = $_SESSION["customerID"];
		//This customerID is then used in a query to find all Adoption records belonging to the customerID
		$findadoptions = "SELECT name, species, photo, dateOfAdoption, nextPayment, paymentSchedule FROM Adoption, Animal WHERE Adoption.animalID = Animal.animalID AND '$customerID' = Adoption.customerID";
		$results = mysqli_query($conn, $findadoptions);
	
	//If the query returns any results they are fetched and displayed in a user friendly format
	if (mysqli_num_rows($results) > 0){
		while ($row = mysqli_fetch_assoc($results)){
			
			echo "You adopted ".$row["name"]." the ".$row["species"]." on ".$row["dateOfAdoption"].". You chose to make a scheduled payment every ".$row["paymentSchedule"].". Your next payment is due on ".$row["nextPayment"]."<br>";
			
			echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).' "/><br><br><br>';
			
	}}
	//If the query returns 0 results this means the customerID has no current adoptions and a relevant message is displayed
	if (mysqli_num_rows($results) == 0){
		echo "When you adopt an animal their details will appear here!";
	}
	}else{
		//If the user is not logged-in they are prompted to do so
		echo "Log-In to view your current adoptions";
	}
//Closing the connection	
mysqli_close($conn);
//EMMA WALKER 121092158
?>