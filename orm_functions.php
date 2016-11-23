<?php
require_once 'connection.php';

function escape_quotes($nonEscapedQuery) {
	global $connect;
	$escaped_string = $connect->real_escape_string($nonEscapedQuery);
	return $escaped_string;
}

function confirm_query($result_set) {
	if (!$result_set) {
		die("Query not valid or no info available");
	}
}

function get_all_info($sql_query) {
	global $connect;
	$result = $connect->query($sql_query);
	confirm_query($result);
	return $result;
}

function insert_or_update_info($sql_query) {
	global $connect;
	$connect->query($sql_query);
}

?>