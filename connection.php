<?php 

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$serverName = $dbparts['host'];
$userName = $dbparts['user'];
$password = $dbparts['pass'];
$dbName = ltrim($dbparts['path'],'/');

// $serverName = "localhost";
// $userName = "root";
// $password = "root";
// $dbName = "monster";

$connect = new mysqli($serverName, $userName, $password, $dbName);

if ($connect -> connect_error) {
	die("Connection failed: " . $connect -> connect_error);
}

?>