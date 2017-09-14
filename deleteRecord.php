<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<!-- TELLS PHONES NOT TO LIE ABOUT THEIR WIDTH & stops the font from enlarging whena phone is turned sideways-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Ruby Bird - Music Store</title>
<link href="styles/main.css" type="text/css" rel="stylesheet">
<!--Google Fonts-->
<link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:300,700" rel="stylesheet"> 
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body>

<div class="headerWrapper clearfix">
	<h1>Ruby Bird</h1>
	<h2>Music Store</h2>
	
	<div class="nav clearfix">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Music</a></li>
			<li><a href="#">Movies</a></li>
			<li><a href="#">Location</a></li>
			<li><a href="index.html">Newsletter</a></li>
			<li><a href="#">Blog</a></li>
		</ul>
	</div>
</div>

<main class="ContentContact">
	<h1>Delete Records</h1>
	
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="contactForm">
	
		<fieldset>
			<legend>Subscribers:</legend>
<!-- connect to the database, check if checkboxs have been selected, else get table data, and display the data as a checkbox. -->
			<?php 
			require_once('connectvars.php');

				//Build database connection with host, user, pass, database
				$dbconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('connection failed');

				//-------------------------Delete the Records--------------------------			
				if (isset($_POST['submitbutton'])) {
					foreach($_POST['emailIdArray'] as $emailSubscriberId) {
						//delete the checked people.
						$query = "DELETE FROM newsletter WHERE id = '$emailSubscriberId'";
						$result = mysqli_query($dbconnection, $query) or die('Query failed');

					};
				};//end of if
			
				//-------------------Display the data from the table------------------
				//Build query. Selects all columns from the newsletter table.
				$query = "SELECT * FROM newsletter";

				//talk to database
				$result = mysqli_query($dbconnection, $query) or die('Query failed');

				while($row = mysqli_fetch_array($result)) {
					echo '<label>';
					echo '<input type="checkbox" value="' . $row['id'] . '" name="emailIdArray[]">';//value goes inside of emailIdArray[]; 
					echo $row['first'] . ' ' . $row['last'] . ' - ' . $row['email'];
					echo '</label>';
				};//end of while loop
				
			
				mysqli_close($dbconnection);
			?>
		</fieldset>
	
	
	
	<input class="submitbutton" name="submitbutton" value="Delete Subscribers" type="submit">
	</form>
	
	<hr>
	
	<a href="index.html" class="linkButton">Add Subscribers</a>
</main>

<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
