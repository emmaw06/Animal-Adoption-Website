<?PHP 
	//Search for Animals Using User Criteria
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	
	//This script will create a connection between the database and this web front-end scripting. 
	include "adoptConnect.php";
	
?>
<header>
<style>
	<!--Some CSS to fix small formatting issues -->
	#centre{
		display: flex;
		justify-content: center;
	}
</style>
</header>
<class id = "centre">

<?PHP
	//The form input data is recieved from adopt.php
	$species = $_GET["species"];
	$centre = $_GET["centre"];
	$country = $_GET["country"];
	$trait = $_GET["characteristics"];
	$personality = $_GET["personality"];
	
	//If any of the variables have been left NULL by the user they are assigned as % (wildcard)
	if ($species == NULL){
		$species = "%";
	}else{
		$species = "%".$species."%";
	}
	if ($centre == NULL){
		$centre = "%";
	}else{
		$centre = "%".$centre."%";
	}
	if ($country == NULL){
		$country = "%";
	}else{
		$country = "%".$country."%";
	}
	if ($trait == NULL){
		$trait = "%";
	}else{
		$trait = "%".$trait."%";
	}
	
	//personality = 0 means a user selected "I don't mind!"
	if ($personality == 0){
		$personality = "%";
	}else{
		$personality = "%".$personality."%";
	}
	
	//This script will display the page header (fixed headings + nav bar)
	include "../defaultpage.php";
	
	//A query is run using wildcards and the user defined criteria
	//This query can run across a maximum of three tables
	//This query will perform two checks to ensure the animal is not adopted-one which uses the EXISTS() operator and a small sub-query (AH)
	$search = "SELECT Animal.animalID, name, species, age, photo, centreName, country, favFood, trait, personalityType FROM Animal, Characteristics, Centre WHERE Characteristics.animalID = Animal.animalID AND Centre.centreID = Animal.centreID AND species LIKE '$species' AND centreName LIKE '$centre' AND country LIKE '$country' AND trait LIKE '$trait' AND personalityType LIKE '$personality' AND adopted = 0 AND NOT EXISTS(SELECT Adoption.animalID FROM Adoption WHERE Animal.animalID = Adoption.animalID)";
	
	$searchresult = mysqli_query($conn, $search);
	
	//If the query returns 1 or more records they are displayed in a user-friendly manner
	
	if (mysqli_num_rows($searchresult) > 0) {
 ?>
 <class id = "ls">
 <?PHP
  while($row = mysqli_fetch_assoc($searchresult)) {
    echo "Name: " . $row["name"]. "    Species: " . $row["species"]. "    Age: " . $row["age"]. "<br>" . '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"/>'. " <br>They live at: " . $row["centreName"]. " In " . $row["country"]. "<br> Their favourite food is: " . $row["favFood"]. "<br> They are very: " . $row["trait"]. ". They are a " . $row["personalityType"]. "-Type Personality <br>";
	
	//If user is logged in (check this using assignment of session variables) they are given a submit button for each animal record displayed
	if (isset($_SESSION["loggedin"])){
		$animalID = $row["animalID"]
	?>
	<!-- This form will sent the relevant animalID to adoptanimal.php via HTML POST form when submitted-->
	<form method = "post" action = "adoptanimal.php">
	<input type = "hidden" name = "animalID" value = <?PHP echo "$animalID"; ?> >
	<input type = "submit" value = "Adopt This Animal!">
	</form>
	<br>
	<br>
	
	
	<?PHP
	}}
} else {
	//If no matching records are found the user is notified
	?><class id="ls"><?PHP
  echo "0 results";
}
//Closing connection
mysqli_close($conn);
?>
</class>
</class>
</class>
</html>