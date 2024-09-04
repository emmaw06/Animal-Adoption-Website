<!DOCTYPE html>
<?PHP 
	// Log-In to an Account
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	//This script will display the page header (fixed headings + nav bar)
	include "defaultpageformain.php";
?>
<html>
	<header>
		<style>
			<!--Some CSS to solve small formatting errors -->
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

	<h2> Log-In to your account </h2>

	<h3> If you do not have an existing account <a style = "color:#e65c00;" href="signup.php">Sign-Up Today</a></h3>
	<br><br><br>
	<!--This form will allow users to enter their email and password to attempt to log-in-->
	<!--When submitted the user input will be sent via HTML POST form to loginhandler.php to be checked -->
	<form method="post" action = "PHP/loginhandler.php">
		<class id="left">
		<label for="email"> Enter email: </label>
		<input type="text" name = "email">
		</class>
		<class id="right">
		<label for="pass_word"> Enter password: </label>
		<input type="password" name = "pass_word">
		</class>
		<br><br>
		<class id="left">
		<input type="submit" value = "Log-In!">
		</class>
	</form>
	<!--EMMA WALKER 121092158-->
</html>