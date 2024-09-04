<?PHP 
	//Create an account
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	//This script will display the page header (fixed headings + nav bar)
	include "defaultpageformain.php";
?>
<html>
	<header>
		<style>
		<!--Some CSS to fix small formatting errors-->
				p{
					padding-top: 10px;
					padding-bottom: 10px;
				}
				
			#right{
				float: right;
				padding-right:250px;
				
				}
				
			#left{
				padding-left:250px;
				}
		</style>
	</header>

	<h1> Welcome! Let's Sign-Up! </h1>
	<h2> Create an account and start saving animals today! </h2>
	<h3>
	<?PHP 
	//If the user's input breaks the validation constraints this is where the error messages will be displayed
	//If the session variables are assigned this means the user has been re-directed back and the message will be displayed
	if (isset($_SESSION["message"])){
		echo $_SESSION["message"];
		unset ($_SESSION["message"]);
	}
	?>
	
	</h3><br>
	<!--This form will allow customers to input their details for a new account -->
	<!--When submitted the user input will be sent via POST HTML form to signupcheck.php to be validated-->
	<form method = "post" action = "PHP/signupcheck.php">
		<class id="left">
		<label for="forename">First name: </label>
		<input type = "text" name = "forename"><br><br>
		
		<class id="right">
		<!--Drop down box for cardType-->
		<label for="cardType">Select Card Type: </label>
		<select name = "cardType">
			<option value = "Mastercard">Mastercard</option>
			<option value = "Visa">Visa</option>
			<option value = "American Express">American Express</option>
			<option value = "Paypal">Paypal</option>
		</select>
		</class>
		
		<class id="left">
		<label for="surname">Last name: </label>
		<input type = "text" name = "surname"><br><br>
		</class>
		<class id="right">
		<label for="cardNo">Card Number: </label>
		<input type = "text" name = "cardNo"><br><br>
		</class>
		<class id="left">
		<label for="email">Email Address: </label>
		<input type = "text" name = "email"><br><br>
		</class>
		<class id="right">
		<!--Date selector for expiryDate-->
		<label for="expiryDate"> Expiry-Date: </label>
		<input type = "date" name = "expiryDate"><br><br>
		</class>
		<class id="left">
		<label for="pass_word">Password: </label>
		<input type = "password" name = "pass_word"><br><br><br>
		</class>
		<class id="right">
		<label for = "cvvNo"> CVV Number: </label>
		<input type="text" name = "cvvNo"><br><br>
		</class>
		<class id="left">
		<label for="reenter">Re-Enter Password: </label>
		<input type = "password" name = "reenter"><br><br>
		</class>
		<class id="left">
		<!--Number dial for age-->
		<label for="age">Age: </label>
		<input type = "number" name = "age"><br><br>
		</class>
		<class id="left">
		<label for="phoneNo">Phone Number: </label>
		<input type = "text" name = "phoneNo"><br><br>
		</class>
		<class id="right">
		<input type = "submit" value = "Sign-Up!">
		</class>
	</form>
	<!--EMMA WALKER 121092158-->
</html>
	
	
	