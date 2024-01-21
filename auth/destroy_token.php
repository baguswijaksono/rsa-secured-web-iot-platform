<?php
require '../config.php';
session_start();
$id = $_SESSION['id'];
$sql2 = "DELETE FROM store_token WHERE `userId` = '$id'";
$result2 = $conn->query($sql2);
header("Location: ../");
?>
