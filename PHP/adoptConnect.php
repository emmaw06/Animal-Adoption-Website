<?PHP
//Set up connection between the database and web front-end with PHP scripting
//Establishing variables which will be hard coded into the script
	$host = "localHost";
	$username = "root";
	$password = "password";
	$database = "AdoptionCharity";
	
	//Establishing connection using these variables 
	$conn = mysqli_connect($host, $username, $password, $database);
	
	//Checking connection is working, if it is not then an user-friendly output is displayed 
	if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
