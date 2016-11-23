<?php 

require 'orm_functions.php';
require 'error_reporting.php';


if ($_POST) {

	$newItemName = $_POST['newItemName'];
	$newItemCost = $_POST['newItemCost'];
	$newItemDesc = $_POST['newItemDesc'];
	$itemName = $_POST['itemName'];

	if ($itemName == '') {
		$meow = 'Fill out all the fields';
	} else {
		insert_or_update_info("UPDATE items SET itemName = '$newItemName', itemCost = '$newItemCost', itemDesc = '$newItemDesc' WHERE itemName = '$itemName'");
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
			<div id="main" class="cf">
				<div>
					<?php

							$sql = "SELECT * FROM `items`";
							$result = get_all_info($sql);
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							        echo "<p>id: " . $row["id"]. " - Name: " . $row["itemName"]. " " . $row["itemCost"]. " " . $row["itemDesc"]. "</p>";
							    }
							} else {
							    echo "0 results";
							}
							$connect->close();

					 ?>
				</div>
				<aside>
					<h1>Add some Items!</h1>
					<form method="post" action="?">
						<ul>
							<li>
								<label for="itemName">Item Name</label>
								<input type="text" name="itemName" id="itemName" placeholder="Item Name..." />
							</li>
							<li>
								<label for="newItemName">New Item Name</label>
								<input type="text" name="newItemName" id="newItemName" placeholder="New Item Name..." />
							</li>
							<li>
								<label for="newItemCost">New Item Cost</label>
								<input type="text" name="newItemCost" id="newItemCost" placeholder="New Item Name" />
							</li>
							<li>
								<label for="newItemDesc">New Item Description</label>
								<textarea type="textarea" id="newItemDesc" name="newItemDesc" placeholder="New Item Description"></textarea>
							</li>
							<li>
								<input type="submit" value="submit">
							</li>
						</ul>
					</form>
				</aside>
			</div>
			<?php include 'footer.php' ?>
		</div>
	</body>
</html>