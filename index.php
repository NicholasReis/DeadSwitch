<?php
	session_start();
	if($_SESSION['loggedin'] == true){
		header("Location: landingpage");
	}
?>

<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script src="/deadswitch/js/scripts.js"></script>
        <title>
            DeadSwitch
        </title>
    </head>
    
        <h1 id='heading-title'>DEADSWITCH</h1>
    <body>
	<div id='start-message'>This website is designed to send messages in case you are restricted from accessing a computer or during an time period you feel you are at risk <b>NOT</b> to encourage suicide or dangerous practices that put the user at harm. If you are having suicidal thoughts, hopelessness, helplessness, or that numbness that pushes you towards destructive behaviours to feel something, please call one of the following numbers:<br>
		<br><b>Canada:</b><br>
		-Phone: 1.833.456.4566<br>
		-For residents of <b>Quebec</b> Phone: 1.866.277.3553<br>
		-Text: <b>HOME</b> to 686868<br>
		<br>
		<b>USA:</b><br>
		-Phone: 1.800.273.8255<br>
		-Text: <b>HOME</b> to 741741<br>
		<br>
		<b>In either country the Trans Lifeline number is: 877.565.8860</b><br>
		<br>
		All this information has been gathered from <a href='https://en.wikipedia.org/wiki/List_of_suicide_crisis_lines'>this list here</a> I just wanted a few readily available.<br>
		<br>
		<h3><b>Your life has value and the world would be a worse place without you in it.</b></h3><br>
		<button style='float:right;' onClick='closeStartMessage()'>Ok</button><br>
	</div>
        <div id="menu" hidden>
		<form action="signup">
			<input type="submit" value="Sign Up"></input>
		</form>
		<form action="login">
			<input type="submit" value="Login"></input>
		</form>
        </div>
    </body>
</html>
