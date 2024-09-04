<?PHP 
	//Adopt an Animal
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	
	//This script will create a connection between the database and this web front-end scripting. 
	include "adoptConnect.php";
?>
<header>
<style>
	<!--Some CSS to fix small issues-->
	#centre{
		display: flex;
		justify-content: center;
	}
</style>
</header>
<?PHP
	//The script recieves the form data from adoptanimal.php
	$animalID = $_POST["animalID"];
	$paymentSchedule = $_POST["paymentschedule"];
	
	//$customerID is assigned by using the customerID stored in the session
	$customerID = $_SESSION["customerID"];
	
	//A PHP timestamp is used to find dateOfAdoption and the date for nextPayment
	$date = new DateTime('now');
	$dateOfAdoption = $date->format('Y-m-d');
	if ($paymentSchedule == "month"){
		$nextPayment = date('Y-m-d', strtotime("+1 month"));
	}if ($paymentSchedule == "year"){
		$nextPayment = date('Y-m-d', strtotime("+1 year"));
	}
	
	//Last check to ensure animal has not been adopted in the time taken to complete this process
	$validation = "SELECT animalID FROM Adoption WHERE animalID = '$animalID'";
	$result = mysqli_query($conn, $validation);
	if (mysqli_num_rows($result) >0){
		
		//This script will display the page header (fixed headings + nav bar)
		include "../defaultpage.php";
		
		?><class id = "ls">
		<class id = "centre">
		<?PHP
		
		//User friendly error message is displayed (see ongoing testing for context of second statement
		echo "We apologise for the inconvenience but this animal has already been adopted<br>";
		echo "If you have reloaded this page after adopting an animal please ignore this message.";
	}else{
	//If the animal is still not adopted the insert query can run using the user chosen paymentSchedule, the passed animalID, the session customerID and PHP timestamps for the relevant dates
	$insertadoption = "INSERT INTO Adoption (animalID, customerID, dateOfAdoption, paymentSchedule, nextPayment) VALUES('$animalID', '$customerID', '$dateOfAdoption', '$paymentSchedule', '$nextPayment')";
	
	//If the insert runs succesfully the adopted field is updated to 1 (representing TRUE)
	if ($conn->query($insertadoption)){
		$updatestatus = "UPDATE Animal SET adopted = 1 WHERE animalID = '$animalID'";
		if ($conn->query($updatestatus)){
			
			//This script will display the page header (fixed headings + nav bar)
			include "../defaultpage.php";
			?>
			<class id = "ls">
			<class id = "centre">
			<?PHP
			//Successful confirmation of adoption!
			echo "Thank you for supporting our charity! Your adoption was successful<br>";
			echo "If you would like to support us further visit our Donations page or adopt another animal<br>";
			echo "You can view all of your current adoptions on the Our Mission page.<br>";
			echo "Enjoy your day!";
		}
	}
	}
//Closing connection
mysqli_close($conn);	
?>
</class>
</class>
</class>
</class>
</html>