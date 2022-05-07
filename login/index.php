<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/deadswitch/css/style.css"/>
		<script src="/deadswitch/js/scripts.js"></script>
		<title>
			Login
		</title>
	</head>
	<body>
		<h1 id="heading-title">LOGIN</h1>
		<div id="menu">
			Email: <input id='login-email' type='text'></input><br>
			<br>
			Password: <input id='login-password' type='password'></input><br>
			<br>
			<form action="..">
				<input type="submit" value="Back"></input>
			</form>

			<button id='login-submit' onclick="checkCredentials(document.getElementById('login-email').value, document.getElementById('login-password').value)">Submit</button>
		</div>
	</body>
</html>
