<?php
	//Adopt an Animal
	//Starting session (so session variables can be accessed on this page) and calling other scripts
	session_start();
	
	//This script will create a connection between the database and this web front-end scripting. 
	include "adoptConnect.php";
	
	//The script recieves the animalID from searchresult.php of the user's chosen animal
	$animalID = $_POST['animalID'];
	
	//This script will display the page header (fixed headings + nav bar)
	include "../defaultpage.php";
?>
	<header>
	<style>
	
	<!-- Some CSS to fix small formatting issues -->
		p{
			color: #339966;
			font-size: 25px;
			text-align: left;
		}
		
		#image{
			width: 300px;
			height: 300px;
			float:right;
		}
		
		#centre{
			text-align: center;
			display:block;
			color: #339966;
			font-size: 25px;
		}
	</style>
	</header>
	<?PHP
	//A query is run to fetch most/all of the data from the Animal and Characteristics tables for the chosen animalID
	$searchselectedanimal = "SELECT name, species, age, photo, centreName, country, favFood, trait, weight_kg, height_feet, personalityType FROM Animal, Centre, Characteristics WHERE Animal.animalID = Characteristics.animalID AND Centre.centreID = Animal.centreID AND Animal.animalID = '$animalID'";
	$selectedanimal = mysqli_query($conn, $searchselectedanimal);
	
	//If the query returns 1 record (it should not be possible to return more than 1)
	//The animal information and photo is displayed in a user-friendly manner
	if (mysqli_num_rows($selectedanimal) ==1){
		$row = mysqli_fetch_assoc($selectedanimal);
		?>
		<h2><?PHP
		echo "Are you ready to adopt ".$row["name"]."!<br><br>";
		?>
		<h2> Animal Profile </h2><p>
		
		<class id="image"><?PHP
			echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).' "/>';
			?>
		</class>
		<?PHP
			echo "Age: ".$row["age"]."<br>";
			echo "Species: ".$row["species"]."<br>";
			echo "Centre: ".$row["centreName"]."<br>";
			echo "Country: ".$row["country"]."<br>";
			echo "Favourite Food: ".$row["favFood"]."<br>";
			echo "They are very: ".$row["trait"]."<br>";
			echo "Weight: ".$row["weight_kg"]." kg<br>";
			echo "Height: ".$row["height_feet"]." feet<br>";
			echo "Personality Type: ".$row["personalityType"]."<br>";
			
		?></p><class id="centre"><?PHP
		
			echo "Adopt ".$row["name"]." today for £5 a month <br>";
			echo "Support animals worldwide and help us protect the most vulnerable<br>";
		?>
			<!--This form allows customers to choose their paymentSchedule-->
			<!--When submitted this form will send the input data to insertadoption.php-->
			<form method="post" action = "insertadoption.php">
			<input type = "hidden" name = "animalID" value = <?PHP echo "$animalID"; ?> >
			<label for = "paymentschedule" > Payment Schedule </label>
			<select name = "paymentschedule">
				<!--Drop-down box with restricted choice options-->
				<option value = "month"> £5 Per Month </option>
				<option value = "year"> £60 Per Year </option>
				
			</select>
			<input type = "submit" value = "ADOPT THIS ANIMAL!"><br>
			
			</form>
		<?PHP
		
			
	}else{
		//An error message is displayed
		echo "An error has occured please reload the page and complete the process again";
		
	}}
//Closing connection			
mysqli_close($conn);
?>
		