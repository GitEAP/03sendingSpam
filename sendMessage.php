<?php
require_once('connectvars.php');
//declare variables
$subject = $_POST[subject];
$message = $_POST[emailMessage];
$from = "NBA_EAP@hotmail.com";

//Build database connection with host, user, pass, database
$dbconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('connection failed');

//Build query
$query = "SELECT * FROM newsletter";

//talk to database
$result = mysqli_query($dbconnection, $query) or die('Query failed');

?>

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
<meta http-equiv="refresh" content="10; URL=makeMessage.php">
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

<main class="default">
<h1>Your message was sent to your interested people</h1>
	
<?php
//get info and send email
while($row = mysqli_fetch_array($result)) {
	$first_name = $row['first'];
	$last_name = $row['last'];
	$to = $row['email'];
	//make email message to send
	$text = "Dear $first_name $last_name, \n $message";
	//sending message
	mail($to, $subject, $text, 'From: ' . $from);

	echo "Message sent to: " . $to . "<br>";
};

//end connection
mysqli_close($dbconnection);
?>
	
</main>


<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
