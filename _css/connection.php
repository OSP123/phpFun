<?php 

$serverName = "localhost";
$userName = "root";
$password = "root";
$dbName = "monster";

$connect = new mysqli($serverName, $userName, $password, $dbName);

if ($connect -> connect_error) {
	die("Connection failed: " . $connect -> connect_error);
}

?>