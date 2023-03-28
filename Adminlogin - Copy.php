<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body{
			background-color: beige;            
		}
		hr{
			border: solid;
			color: black;
		}
		h1{
			text-align: center;
			color: red;
			font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 50px;
		}
		h3{
			text-align: left;
			color: black;
			font-size: 25px;
			font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;
		}
		label{
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 20px;
            color: black;
		}
		input.A{
			color:white;
			background-color: red;
			font-size: 20px;
			cursor: pointer;
			font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif ;
		}
		p{
			font-size: 20px;
			color: red;
			font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;
			text-align: left;
		}
		button{
			color:white;
			background-color: red;
			font-size: 20px;
			cursor: pointer;
			font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif ;
		}
	</style>
</head>
<body>
	<h1>Personality Predition using CV</h1>
	<hr>
	<h3>Admin Login</h3>
	<form method="post" action="Adminlogin.php" autocomplete="off">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input class="A" type="submit" name="submit" value="Login">
		<input type="button" value="back" onclick="history.back()">
		
	</form>

	<?php
		// Check if form has been submitted
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Hardcoded username and password
			$admin_username = 'admin' ;
			$admin_password = '1234';

			// Get entered username and password from form
			$username = $_POST['username'];
			$password = $_POST['password'];

			// Check if entered username and password match hardcoded values
			if($username == $admin_username && $password == $admin_password) {
				// Login successful
				echo '<p>Login successful!</p>';
                header('Location: AdminMenu.html');
			} else {
				// Login failed
				echo '<b><p>Invalid username or password.</p></b>';
                // header('Location: Adminlogin.php');
			}
		}
	?>
</body>
</html>
