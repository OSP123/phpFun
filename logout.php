<?php
if (isset($_POST['logout']) && trim($_POST['logout']) != '') {
    setcookie("c_user" , '' , time()-50000, '/');
    $logged = false;
    header("Location: index.php");
    exit;
}
?>