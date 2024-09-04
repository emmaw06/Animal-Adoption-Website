<?PHP 
	//HTML Forms and Scipting for the 'Personality Quiz'
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	//This script will display the page header (fixed headings + nav bar)
	include "defaultpageformain.php";
?>
<html>
	<head>
		<style>
		<!--Some CSS to fix small formatting problems -->
		p{
				padding-top: 10px;
				padding-bottom: 10px;
			}
		</style>
	</head>
		
	<h1> Take Our Quiz! </h1>
	<h2>Reload the page to clear the form! </h2>
	<h3> 
<?PHP
	//If any of the answers to the quiz is left NULL this is where the validation messages will be displayed
	//The script checks if the session variables have been assigned to know if the user has logged-in
	//The addition of this validation is discussed in ongoing testing
	if(isset($_SESSION["message"]))
	{
		echo $_SESSION["message"];
		unset($_SESSION["message"]);
	}
	
?>
	</h3>

	</class>
	<!--This form will allow user's to take the personality quiz -->
	<!--When submitted the user input will be sent via HTML GET form to quizresult.php-->
	<!--The quiz options are presented as radio buttons-->
	<form method="get" action="PHP/quizresult.php" >
		<img src="img/tiger.jpeg" alt = "Tiger" width = "400px" height = "400px" style = "float:right; padding-right:100px;"><br>
		<p> 1. What is a word people use to describe you: <br>	
		<input type="radio"  value = "A" name = "1">Fierce <br>
		<input type="radio"  value = "B" name = "1">Silly <br>
		<input type="radio"  value = "C" name = "1">Timid <br>
		<input type="radio"  value = "D" name = "1">Intelligent <br>
		</p>
		

		<p> 2. When do you feel most energetic: <br>	
		<input type="radio"  value = "A" name = "2">In the Morning <br>
		<input type="radio"  value = "B" name = "2">At Night <br>
		<input type="radio"  value = "C" name = "2">In the Afternoon<br>
		<input type="radio"  value = "D" name = "2">Never!<br>
		</p>
		<img src="img/deer.jpeg" alt = "Deer" width = "400px" height = "400px" style = "float:right; padding-right:100px;"><br>
		<p>3. What is your favourite colour: <br>	
		<input type="radio"  value = "A" name = "3">Red <br>
		<input type="radio"  value = "B" name = "3">Blue/Purple <br>
		<input type="radio"  value = "C" name = "3">Pink <br>
		<input type="radio"  value = "D" name = "3">Green/Yellow <br>
		</p>
		
		<p> 4. What is your favourite food: <br>	
		<input type="radio"  value = "A" name = "4">Meat <br>
		<input type="radio"  value = "B" name = "4">Fruit or Veg <br>
		<input type="radio"  value = "C" name = "4">Anything spicy! <br>
		<input type="radio"  value = "D" name = "4">Anything vegetarian! <br>
		</p>
		
		<p>5.  What is your favourite way to spend time: <br>	
		<input type="radio"  value = "A" name = "5">Playing Board Games <br>
		<input type="radio"  value = "B" name = "5">Playing Sport <br>
		<input type="radio"  value = "C" name = "5">Creating Art <br>
		<input type="radio"  value = "D" name = "5">Reading <br>
		</p>
		<img src="img/monkey.jpeg" alt = "Monkey" width = "400px" height = "400px" style = "float:right; padding-right:100px;"><br>
		<p>6.  Which one: <br>	
		<input type="radio"  value = "A" name = "6">Lions <br>
		<input type="radio"  value = "B" name = "6">Tigers <br>
		<input type="radio"  value = "C" name = "6">Bears <br>
		<input type="radio"  value = "D" name = "6">Oh My! <br>
		
		</p>
		<img src="img/hedgehog.jpeg" alt = "Hedgehog" width = "400px" height = "400px" style = "float:right; padding-right:100px;"><br>
		<p>7. What is your favourite TV Show: <br>	
		<input type="radio"  value = "A" name = "7">Friends <br>
		<input type="radio"  value = "B" name = "7">Peaky Blinders <br>
		<input type="radio"  value = "C" name = "7">Still Game <br>
		<input type="radio"  value = "D" name = "7">Good Omens <br>
		</p>

		<p>8.  How will you win: <br>	
		<input type="radio"  value = "A" name = "8">Rock <br>
		<input type="radio"  value = "B" name = "8">Paper <br>
		<input type="radio"  value = "C" name = "8">Scissors <br>
		<input type="radio"  value = "D" name = "8">Flamethrower <br>
		
		</p>
		
		<p>9.  Where would you rather live: <br>	
		<input type="radio"  value = "A" name = "9">In the city <br>
		<input type="radio"  value = "B" name = "9">In the countryside <br>
		<input type="radio"  value = "C" name = "9">By myself <br>
		<input type="radio"  value = "D" name = "9">In the woods<br>
		</p>
		<img src="img/snake.jpeg" alt = "Snake" width = "400px" height = "400px" style = "float:right; padding-right:100px;"><br>
		<p>10.  What quote do you like best: <br>	
		<input type="radio"  value = "A" name = "10">If I am not back in five minutes, just wait longer<br>
		<input type="radio"  value = "B" name = "10">I am not superstitious, but I am a little stitious<br>
		<input type="radio"  value = "C" name = "10">I walk around like everything is fine, but deep down, inside my shoe, my sock is slipping off<br>
		<input type="radio"  value = "D" name = "10">I am not insane my mother had me tested<br>
		
		</p>
		
		<input type = "submit" value="Submit Quiz!">
	</form>
	<!--EMMA WALKER 121092158-->
</html>


