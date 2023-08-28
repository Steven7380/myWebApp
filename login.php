<!DOCTYPE html>
<html>
	<head>
		<title>myWebApp</title>
	</head>
	<body>
		<h2>Login Page</h2>
		<form action="checklogin.php" method="post" autocomplete="off">
		  Username: <input type="text" name="username" required="required"/> <br/>
		  Password: <input type="password" name="password" required="required" /> <br/><br/>
			<label for="hash">Use hashed password?</label>
			<input type="radio" id="hash_yes" name="hash" value="yes" checked>
			<label for="hash_yes">Yes</label>
			<input type="radio" id="hash_no" name="hash" value="no">
			<label for="hash_no">No</label><br> <br/>
			<input type="submit" value="Login"/>
			<br/><br/>
			<a href="register.php">Click here to register</a>
		</form>
	</body>
</html>
