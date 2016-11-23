<?php

require 'orm_functions.php';
require 'error_reporting.php';

if (isset($_POST['register']) && trim($_POST['register']) != '') {
	if (isset($_POST['username']) && isset($_POST['password']) && 
            trim($_POST['username']) != '' && trim($_POST['password']) != '') {

		$username = escape_quotes($_POST['username']);
		$password = escape_quotes(hash("sha512", $_POST['password']));

		// In case user doesn't enter a name
    $name = '';
		if ($_POST['name']) {
			$name = escape_quotes(strip_tags($_POST['name']));
		}

		$check = get_all_info("SELECT * FROM users WHERE username='$username'");

		// Get the first instance of the user and store it into an array
		$userArray = $check->fetch_assoc();

		if (count($userArray) > 0) {
		   die("That username already exists! Try creating another username. 
                        <a href='register.php'>Back</a>");
		}
		if (!ctype_alnum($username)) {
	     die("Username contains special characters! Only numbers and 
                        letters are permitted. <a href='register.php'>Back</a>" );
		}
		if (strlen($username) > 20) {
       die("Username must contain less than 20 characters. 
                        <a href='register.php'>Back</a>" );
		}

		if (strlen($username) < 5) {
			die("Username must contain at least 6 characters. 
                        <a href='register.php'>Back</a>" );
		}

		$salt = hash("sha512", rand() . rand() . rand());

		insert_or_update_info("INSERT INTO users (username, password, name, salt) 
			VALUES ('$username', '$password', '$name', '$salt')");

		setcookie("c_user", hash("sha512", $username), time() + 24 * 60 * 60, "/");
		setcookie("c_salt", $salt, time() + 24 * 60 * 60, "/");

		die("Your account has been created and you are now logged in.");

	} else {
		echo "Please enter a username and password.";
	}
}
?>

<!doctype html>
<html>
	<head>
		<title>
			Auctions
			:: Los Angeles Modern Auctions (LAMA)
			:: The premier auction house on the West Coast to buy and sell Modern Art &amp; Design
		</title>
		<link rel="stylesheet" href="_css/styles.css">
	</head>
	<body>
		<div id="container">
			<?php include "header.php" ?>
			<h1>Register</h1>
			<form method="post" action="">
				<ul>
					<li>
						<label for="username">Username</label>
						<input id="username" type="text" name="username" value="" />
					</li>
					<li>
						<label for="password">Password</label>
						<input id="password" type="password" name="password" value=""/>
					<li>
					<li>
						<label for="name">Name</label>
						<input id="name" type="text" name="name" value=""/>
					<li>
						<input type="submit" name="register" value="register">
					</li>
				</ul>
			</form>
			<?php include 'includes/footer.php' ?>
		</div>
	</body>
</html>