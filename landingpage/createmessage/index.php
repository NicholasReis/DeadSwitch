<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include $path.'/deadswitch/php/session_scripts/loggedin.php';
?>
<html>
	<head>
		<!-- StyleSheet -->
		<link rel="stylesheet" type="text/css" href="/deadswitch/css/style.css"/>
		<script src="/deadswitch/js/scripts.js"></script>
		<title>Create Message</title>
	</head>
	<h1 id="heading-title">CREATE MESSAGE</h1>
	<body>
		<div id="menu">
			<h3>Recipient Email<h3>
			<input id="email" type="email"></input><br>
			<br>	
			<h3>Subject</h3>
			<input id="subject" type="text"></input><br>
			<br>
			<h3>Message</h3>
			<textArea id="message" rows="15" cols="50"></textArea><br>
			<h5>Your account name will be included for authentication, if it won't be recognized by the recipient consider including an identifier to let them know it's you.</h5><br>
			<br>Send Date<br>
			<input id="sendDate" type="date" id="datemin" name="datemin" min="2000-01-02"><br>
			<form action="..">
				<br><input type="submit" value ="Back"/> &nbsp
			</form>
			<button onClick="saveMessage(email.value, subject.value,  message.value, sendDate.value)">Save</button>
		</div>
	</body>
</html>
