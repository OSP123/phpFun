<?php 

require 'connection.php';
require 'orm_functions.php';

$sql = "SELECT * FROM `members`";

$result = get_all_info($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}

$connect->close();

?>