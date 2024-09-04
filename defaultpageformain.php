<!DOCTYPE html>
<html>
<!--Default pages-->
<!--This page is called by all "front-end" scripts outwith the PHP file-->
<head>
<!--This line links this page (and all scripts where this page is called) to our external CSS sheet-->
<link rel="stylesheet" type="text/css" href="CSS/adoptstyle.css"/>



</head>
<body>
<!--This page makes use of external CSS classes to fix the position of the page header (headings, logo and nav-bar)-->
<class id="fixed">

<class id = "logo">
<!--The logo is displayed-->
<img src="img/logo.jpeg" alt = "logo: koala" width = "75px" height = "100px">
</class>
<!--The headings for the page are displayed-->
<h1> Paw Protection Program </h1>

<h2> Providing shelter and medical treatment for animals across the globe </h2>

<!--The navigation bar is displayed and all relevant links are functional-->
<!--The link addresses are where defaultpageformain.php and defaultpage.php differ-->
<div class="topnav">
	
		<li><a class="active" href="adopthome.php">Home</a></li>
		<li><a href="quiz.php">   Take Our Quiz!   </a></li>
		<li><a href="adopt.php">   Our Animals   </a></li>
		<li><a href="donate.php">   Donate   </a></li>
		<li><a href="ourmission.php">   Our Mission   </a></li>
		<?PHP
		//The script checks if the user is logged in by use of a session variable (which is assigned as TRUE when a user succesfully logs in)
		if (isset($_SESSION["loggedin"])){
			if ($_SESSION["loggedin"] == TRUE){
				//If the variable is assigned then instead of having the options to Log-in/Sign-Up the user can Log-Out
				?>
				<li><a href="PHP/logout.php"> Log-Out </a></li><?php
		
		}}else{
				?>
				<!--If the variable is not assigned then the user can only Log-In/Sign-Up-->
				<li><a href="login.php">   Log-In   </a></li>
				<li><a href="signup.php">   Sign-Up   </a></li><?PHP
		}
			?>
			
</div>
</class>
<!--This class is included so that any content on other pages will not be covered by the fixed page header-->
<class id="movedown">
<!--EMMA WALKER 121092158-->
</html>

