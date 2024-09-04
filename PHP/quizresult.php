<?php
	//HTML Forms and Scipting for the 'Personality Quiz'
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	
	//This script will create a connection between the database and this web front-end scripting. 
	include "adoptConnect.php";
	?>
	<head>
	<style>
		<!--Some CSS to allow different colour text for each result-->
		h3{
					font:impact;
					color:#e65c00;
					text-align:center;
					display:block;
					font-size:25px;
				}
				h4{
					font:impact;
					color:#730099;
					text-align:center;
					display:block; 
					font-size:25px;
				}
				h5{
					font:impact;
					color:#ff99cc;
					text-align:center;
					display:block; 
					font-size:25px;
				}
				h6{
					font:impact;
					color:#006bb3;
					text-align:center;
					display:block; 
					font-size:25px;
				}
	</style>
	</head>
	
	<?PHP
	//This script will display the page header (fixed headings + nav bar)
	include "../defaultpage.php";
	
	//Each of the question answers (A, B, C, D) are set in an array
	$useranswers = array($_GET["1"], $_GET["2"], $_GET["3"], $_GET["4"], $_GET["5"], $_GET["6"], $_GET["7"], $_GET["8"], $_GET["9"], $_GET["10"]);
	
	//The counts and final result variable are initialized
	$result = NULL;
	
	$A = 0;
	$B = 0;
	$C = 0;
	$D = 0;
	
	//The script uses a loop to check for NULL values and to create a running total for the counts
	foreach ($useranswers as $x){
		if ($x == NULL){
			//If any of the answers are found to be NULL the user will be re-directed back to quiz.php
			//On quiz.php a user-friendly error message will be displayed
			
			$_SESSION["message"] = "*Please fill in all of the questions*";
			header("Location:../quiz.php");
			exit();
			
		}
		if ($x == "A"){
			($A = $A + 1);
		}
		if ($x == "B"){
			($B = $B + 1);
		}
		if ($x == "C"){
			($C = $C + 1);
		}
		if ($x == "D"){
			($D = $D + 1);
	}}

//Finding the maximum result
//Using >= to default the result if the counts are equal
//Answer will default to A if there is a draw between A and B, C or D
//Result will default to B if there is a draw between B and C or D
//Result will default to C if there is a draw between C and D
//Result will never default to D

if ($A >= $B and $A >= $C and $A >= $D){
	($result = "A");}

if ($B > $A and $B >= $C and $B >= $D){
	($result = "B");}
if ($C > $A and $C > $B and $C >= $D){
	($result = "C");}
if ($D > $A and $D > $B and $D > $C){
	($result = "D");}

#If there is a draw, the program will assign result in alphabetical order

#The result will then be formatted and displayed

?>
<html>

<!--Displaying the result and relevant images in a user-friendly way -->
		<h1> Your Result </h1>
		<h2> You are a: <h2>
	</class>
		<h2>
		<?PHP 
		echo $result;
		?>
		</h2>
		<h2> type personality! </h2>
		
		<?php
			if ($result == "A"){
				?>
				<h3> This means you are a fierce explorer. You love to be in the company of
				others and consider yourself the leader of the pack </h3>
				
				<h3> We have matched you with your fellow fiesty companions </h3>
				<class id="top">
				<img src = "../img/snake.jpeg" alt = "Snake" width = "300px" height = "300px">
				<img src = "../img/tiger.jpeg" alt = "Tiger" width = "300px" height = "300px">
				<img src = "../img/rescue.jpeg" alt = "Leopard being rescued" width = "300px" height = "300px">
				</class>
				<h2> Adopt an animal similar to yourself! or even take our quiz again! </h2>
		<?php
			}
		?>
		<?php
			if ($result == "B"){
				?>
				<h4> This means you are a unique individual who goes by the beat of their own drum.
				You love nature and everything it has to offer</h4>
				
				<h4> We have matched you with your fellow interesting companions</h4>
				<class id="top">
				<img src = "../img/donkey.jpeg" alt = "Donkey" width = "300px" height = "300px">
				<img src = "../img/deer.jpeg" alt = "Deer" width = "300px" height = "300px">
				<img src = "../img/monkey.jpeg" alt = "Monkey" width = "300px" height = "300px">
				</class>
				<h2> Adopt an animal similar to yourself! or even take our quiz again! </h2>
		<?php
			}
		?>
		<?php
			if ($result == "C"){
				?>
				<h5> This means you are an artsy individual who has very particular tastes and strong opinions.
				You know what you like and tend to stick to that-even if it is a little strange</h5>
				
				<h5> We have matched you with your fellow  companions</h5>
				<class id="top">
				<img src = "../img/gorrilla.jpeg" alt = "Gorrilla" width = "300px" height = "300px">
				<img src = "../img/panda.jpeg" alt = "Panda" width = "300px" height = "300px">
				<img src = "../img/rhino.jpeg" alt = "Rhino" width = "300px" height = "300px">
				</class>
				<h2> Adopt an animal similar to yourself! or even take our quiz again! </h2>
		<?php
			}
		?>
		<?php
			if ($result == "D"){
				?>
				<h6> This means you are an intelligent individual who uses creative ideas to get you out
				of sticky situations. You tend to prefer your own company but always appreciate the prescence of close family and friends</h6>
				
				<h6> We have matched you with your fellow calm and collected companions</h6>
				<class id="top">
				<img src = "../img/tortoise.jpeg" alt = "Tortoise" width = "300px" height = "300px">
				<img src = "../img/hedgehog.jpeg" alt = "Hedgehog" width = "300px" height = "300px">
				<img src = "../img/redpanda.jpeg" alt = "Red Panda" width = "300px" height = "300px">
				</class>
				<h2> Adopt an animal similar to yourself! or even take our quiz again! </h2>
		<?php
			}
		//We can check if session variables are assigned to know if the customer is logged-in
		if (isset($_SESSION["loggedin"])){
			if ($_SESSION["loggedin"] == TRUE){
			?>

		<?php
		
		$customerID = strval($_SESSION['customerID']);
		//If the user is logged in an UPDATE query will run
		//This query will update the quizResult for a record with the matching customerID as our session variable
			$updatepersonality = "UPDATE customer SET quizResult = '$result' WHERE customerID = '$customerID'";
			if ($conn->query($updatepersonality)){
		?>
				<h2> Your personality type has been saved alongside your details </h2>

		<?php
		}}}else{
			//If the user is not logged-in they are prompted to do so if they wish to save their result next time!
			?>
			<h2> Log-In or Sign-Up to save this result next time! <h2>
		<?PHP 
		}
		//Closing the connection
		mysqli_close($conn);	
		?>