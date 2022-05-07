<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include $path.'/deadswitch/php/session_scripts/loggedin.php';
?>

<html>
    <head>
	<link rel="stylesheet" type="text/css" href="/deadswitch/css/style.css"/>
	<script src="/deadswitch/js/scripts.js"></script>
        <title>DeadSwitch</title>
    </head>
    <body>
        <h1 id="heading-title">DEADSWITCH</h1>
    <div id="menu">
	
	<h4>Today's Messages Going Out In...</h4>
	<div id="count-down-timer"></div><br>
		<script> setInterval(getTime,1000); </script>
	<form action="createmessage">
		<input type="submit" value="Create Message" />
	</form>
	<form action="viewmessages">
		<input type="submit" value="View Messages"/>
	</form>
        <br><br>
        <button onclick="logout();" value="Log out">Log Out</button>
    </div>
    </body>
</html>
