<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/deadswitch/css/style.css"/>
		<script src="/deadswitch/js/scripts.js"></script>
		<title>
			Login
		</title>
	</head>

	<body>
		<h1 id="heading-title">SIGN UP</h1>
		<div id="menu">
			Username:<br>
			<input id='signup-username' type='text'></input><br>
			Email:<br>
			<input id='signup-email' onchange='validateUniqueEmail(this.value);' onpaste='this.onchange();' oninput='this.onchange();' type='email'></input>
			<div id='email-invalid' hidden><br>
				This email is unavailable
			</div><br>
			Password:<br>
			<input id='signup-password' onchange='validatePasswordRequirements(this.value);' onpaste='this.onchange();' oninput='this.onchange();' type='password'>
			<div id='password-error' hidden><br>
				Password must contain a number, one of: (!, @, #, $, %, ^, &, *)
			</div><br>
			Confirm Password:<br>
			<input id='signup-password-confirmation' onchange="validatePasswordsMatch(document.getElementById('signup-password').value, this.value);" onpaste='this.onchange();' oninput='this.onchange();' type='password'></input>
			<div id='password-match-error' hidden><br>
				Passwords do not match.
			</div><br>
			<br>
			<form action="..">
				<button onClick='mainMenu()'>Back</button>
			<form>
			<button id="signup-submit" onClick="validateAccount(document.getElementById('signup-username').value, document.getElementById('signup-email').value, document.getElementById('signup-password').value, document.getElementById('signup-password-confirmation').value)">Submit</button>
		</div>
	</body>
</html>
