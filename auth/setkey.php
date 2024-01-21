<?php
$key = $_POST['key'];
$min = $_POST['minutes'];
session_start();
$expiration_time = $min;
$expiration_timestamp = time() + ($expiration_time * 60);
session_set_cookie_params($expiration_time * 60);
$_SESSION['expiration_timestamp'] = $expiration_timestamp;
$_SESSION['key'] = $key;
header("Location: ../");
exit; 
?>
