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
	<h1>Spam a Message</h1>
	
	<form action="sendMessage.php" method="POST" enctype="multipart/form-data" class="contactForm">
	
		<fieldset>
			<legend>Make a Message</legend>
			<label><span>Subject:</span><input name="subject" type="text" placeholder="email subject" pattern="[a-zA-Z -.,/0-9]{1,999}"  class="userInput" required></label>
			
			<label class="messageLabel"><span>Message:</span>
			<textarea class="message" name="emailMessage" placeholder="Enter message..."></textarea></label>
		</fieldset>
	
	<input class="submitbutton" name="submitbutton" value="Send Emails" type="submit">
	<input type="hidden" value="sendMessage.php" name="redirect">
	</form>
</main>


<footer>
	<p>&copy; 2017 &bull; Erick Perez &bull; Built for DGM 3760 Web Languages 2</p>
</footer>

</body>
</html>
