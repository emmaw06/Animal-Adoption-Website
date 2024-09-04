<?PHP 
	//Search for Animals Using User Criteria
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	
	//This script will display the page header (fixed headings + nav bar)
	include "defaultpageformain.php";
	
	//This script will create a connection between the database and this web front-end scripting. 
	include "PHP/adoptConnect.php";
?>
<html>
	<header>
	<style>
		<!--Some small CSS adjustments to help the appearance of the page-->
		#centre{
		display: block;
		float: center;
		align-items: center;
	}
		p{
			padding-top: 0px;
			padding-bottom:0px;
			display: inline;
		}

	</style>
	</header>
	<h2> Search for your perfect Match </h2><br>
	<!--This form allows users to enter search criteria for animals-->
	<!--When submitted the user input will be sent via HTML GET form to searchresult.php to be used in a query-->
	<form method = "get" action="PHP/searchresult.php">
	<class id="centre">
	<label for = "species"> Species: </label>
	<input type = "text" name = "species">
	</class>
	<class id="centre">
	<label for = "centre"> Centre: </label>
	<input type = "text" name = "centre">
	</class>
	<class id="centre">
	<label for = "country"> Country: </label>
	<input type = "text" name = "country"><br>
	</class>
	<class id="centre">
	<label for = "characteristics"> Characteristics: </label>
	<input type = "text" name = "characteristics">
	</class>
	<class id="centre">
	<!--This input creates a drop-down box-->
	<label for = "personality:"> Personality Type: </label>
	<select name = "personality">
		<option value = "A">A</option>
		<option value = "B">B</option>
		<option value = "C">C</option>
		<option value = "D">D</option>
		<option value = 0> I don't mind! </option>
	</select>
	</class>
	<class id="centre">
<?PHP 
	//By checking if the session variable has been assigned the script is checking if the user has logged in
	if (isset($_SESSION["customerID"])){
?>

			<p> You are a 
<?PHP 
	//If the user is logged in the script will display the user's quizResult in a user-friendly way
			$customerID = $_SESSION["customerID"];
			//A query runs to fetch the quiz result
			$findpersonality = "SELECT quizResult FROM Customer WHERE customerID = '$customerID'";
			$result = mysqli_query($conn, $findpersonality);
			//The record fetched (cannot be more than 1 record as we have searched using PK)is assigned to an array $type
			$type = mysqli_fetch_row($result);
			
			//As there is only one record we only need to check the first element of the array
			if ($type[0] == NULL) {
				//If the user has not taken the quiz a relevant message is displayed
				echo "*You have not taken our personality quiz*";
			}else{
				//Otherwise the user's quizResult is displayed
				echo $type[0];
	}
?>
			<p> -type personality </p>
<?php
	}
	//Closing the connection
	mysqli_close($conn);	
?>
	</class><br><br>
	<class id="centre">
	<!--A submit button is displayed and when clicked the user input will be sent to searchresult.php-->
	<input type = "submit" value = "Search!">
	</form>
	</class>
	<!--EMMA WALKER 121092158-->
</html>
