<?PHP
	//Create an Account
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	
	//This script will create a connection between the database and this web front-end scripting. 
	include ("adoptConnect.php");
	
	//The form input data is recieved from signup.php
	$forename = $_POST["forename"];
	$surname = $_POST["surname"];
	$email = $_POST["email"];
	$pass_word = $_POST["pass_word"];
	$reenter = $_POST["reenter"];
	$age = $_POST["age"];
	$phoneNo = $_POST["phoneNo"];
	$cardType = $_POST["cardType"];
	$cardNo = $_POST["cardNo"];
	$expiryDate = $_POST["expiryDate"];
	$cvvNo = $_POST["cvvNo"];
	
	//Assigning all variables to an array and checking for NULLs
	$variables = array($forename, $surname, $email, $pass_word, $reenter, $age, $phoneNo, $cardType, $cardNo, $expiryDate, $cvvNo);
	foreach ($variables as $x){
		if ($x == NULL){
			$_SESSION["message"] = "*All fields must be filled in!*";
			header("Location:../signup.php");
			exit();
			
		}
	}
	//A query is run to check the email does not already exist within the database 
	$emailquery = ("SELECT email FROM Customer WHERE email = '$email'");
	$emailresult = mysqli_query($conn, $emailquery);

	//Validation checks
	if (mysqli_num_rows($emailresult) >0){
		$_SESSION["message"] = "*This email already exists within the database. Attempt to log-in or use a different email*";
		header("Location:../signup.php");
		exit();
	}
	
	if ($pass_word != $reenter){
		$_SESSION["message"] = "*The passwords must match*";
		header("Location:../signup.php");
		exit();
	}
	if (strlen($pass_word) < 8){
		$_SESSION["message"] = "*The password must be at least 8 characters long*";
		header("Location:../signup.php");
		exit();
	}
	if ($age < 16){
		$_SESSION["message"] = "*Only users above the age of 16 can create an account*";
		header("Location:../signup.php");
		exit();
	}
	if (strlen($phoneNo) != 11){
		$_SESSION["message"] = "*Phone Number must be 11 characters long*";
		header("Location:../signup.php");
		exit();
	}
	
	if (strlen($cardNo) != 19){
		$_SESSION["message"] = "*Card number must be in the format '0000 0000 0000 0000'*";
		header("Location:../signup.php");
		exit();
	}
	
	if (strlen($cvvNo) != 4 and strlen($cvvNo) !=3){
		$_SESSION["message"] = "*Your CVV Number must be 3 or 4 digits long";
		header("Location:../signup.php");
		exit();
	}
	
	//If the script reaches this point all data entered by the user meets the validation constraints
	//An insert query is run, this inserts all the users data into the Customer table and assigns a unique customerID 
	$insert = "INSERT INTO customer(customerID, forename, surname, email, pass_word, age, phoneNo, cardType, cardNo, expiryDate, cvvNo, quizResult) VALUES (NULL, '$forename', '$surname', '$email', '$pass_word', $age, '$phoneNo', '$cardType', '$cardNo', '$expiryDate', '$cvvNo', NULL)";
	if ($conn->query($insert)){
			
			//This script will display the page header (fixed headings + nav bar)
			include "../defaultpage.php";
			?>			
						<!--The user will recieve a successful confirmation-->
						<h1>Account created successfully</h1>
						<h1><a style = "color:red;" href="log-in.php"> Log-In Using These Details to Access your account </a></h1>
<?PHP
	}else{
		//If the insert is not successful an error message is displayed-this should not be due to inaccurate data
	 die($conn->error);																														
	}
	//Closing Connection
	mysqli_close($conn);
?>