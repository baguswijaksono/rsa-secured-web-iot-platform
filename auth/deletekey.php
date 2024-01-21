<?php
session_start();
unset($_SESSION['key']);
unset ($_SESSION['expiration_timestamp']);
header("Location: ../");
exit();
?>