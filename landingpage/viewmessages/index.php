<?php
	$path = $_SERVER['DOCUMENT_ROOT'];
	include $path.'/deadswitch/php/session_scripts/loggedin.php';
?>
<html>
	<head>
		<!-- StyleSheet -->
		<link rel="stylesheet" type="text/css" href="/deadswitch/css/style.css"/>
		
		<script type="text/javascript" src="/deadswitch/js/scripts.js"></script>
		<title>Messages</title>
	</head>
	<h1 id="heading-title">YOUR MESSAGES</h1>
	<body>
		<div id="menu">
			<div id='message-table'>
			</div>
			<script> constructMessageView(); </script>
	
			<form action="..">
				<input type="submit" value="Back" />
			</form>
		</div>
	</body>
</html>
		<script>
			//setInterval(getCountDown,1000);
			//getTime();
		 </script>
