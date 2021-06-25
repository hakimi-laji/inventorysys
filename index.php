<!DOCTYPE html>
<html>
	<head>
		<title>INDEX</title>
	</head>
	<body>
		<p>Welcome</p>
		<form action="sessionHandler.php" method="post">
			<p>Log into your account below.</p>
			<input placeholder="Enter the username" type="text" name="username" required>
			<input placeholder="Enter the password" type="password"name="password" required>
			<button type="submit" name="login">Login</button>
		</form>
		
		<p>Don't have an account yet? Register now.</p>
		<form method = "post" action = "register.php">
			<input placeholder="Enter your username" type="text" name="username" required>
			<input placeholder="Enter station name" type="text" name="station" required>
			<input placeholder="Enter new password" type="password" name="password" required>
			<input placeholder="Confirm new password" type="password" name="cpassword" required>
			<button type="submit" name="register">Register</button>
		</form>
	</body>
</html>
