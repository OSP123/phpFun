<?php
if (isset($_POST['delete']) && trim($_POST['delete']) != '') {
	if (isset($_POST['username']) && isset($_POST['password']) 
		&& trim($_POST['username']) != '' && trim($_POST['password']) != '') {

		$username = escape_quotes($_POST['username']);
		$password = escape_quotes(hash("sha512", $_POST['password']));

		$user = get_all_info("SELECT * FROM users WHERE username='$username'");

		// Get the first instance of the user and store it into an array
		$userArray = $user->fetch_assoc();

		if(count($userArray) <= 0) {
			die("<h2>That username doesn't exist! Please type in the correct username. 
				<a href='delete.php'>Back</a></h2>");
		}
		if ($userArray['password'] != $password) {
			die("<h2>Incorrect password! <a href='delete.php'>Back</a></h2>");
		}

		insert_or_update_info("DELETE FROM users WHERE Username='$username'");	

		setcookie("c_user" , '' , time()-50000, '/');

	        $logged = false;

		echo "<h2>User has been deleted. <a href='index.php'>Home</a> </h2><br>";

	    exit;
	}
	else {
		echo "<h2>Please enter a username and password.</h2>";
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
		<h1>Delete User</h1>
		<form id="form_delete" method="post" action="">
			<ul>
				<li>
					<label for="username">Username</label>
					<input id="username" type="text" name="username" value="" />
				</li>
				<li>
					<label for="password">Password</label>
					<input id="password" type="password" name="password" value="" />
				</li>
				<li>
					<input id="submit_delete" type="submit" name="delete" value="Delete">
				</li>
			</ul>
		</form>
			<?php include 'footer.php' ?>
		</div>
	</body>
</html>