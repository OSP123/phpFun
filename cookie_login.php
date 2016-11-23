<?php
require_once 'orm_functions.php';

$logged = false;

if (isset($_COOKIE['c_user']) && trim($_COOKIE['c_user']) != '' 
    && isset($_COOKIE['c_salt']) && trim($_COOKIE['c_salt']) != '') { 

    $cuser = escape_quotes($_COOKIE['c_user']);
    $csalt = escape_quotes($_COOKIE['c_salt']);

    $user = get_all_info("SELECT * FROM users WHERE salt='$csalt'");

    // Get the first instance of the user and store it into an array
    $userArray = $user->fetch_assoc();

    if (count($userArray) > 0) {
        if (hash("sha512", $userArray['username']) == $cuser) {
            $logged = true;
        }
    }
 }

?>