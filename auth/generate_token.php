<?php
require '../config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
$id =  $_SESSION['id'];
$current_time = date("H:i:s"); // Retrieves the current time in 24-hour format
$token = $id.$current_time;
$token = md5($token);

$sqlCount = "SELECT * FROM users where id = '$id';";
$result2 = mysqli_query($conn, $sqlCount);

if ($result2) {
    $row = mysqli_fetch_assoc($result2);
    $status = $row['role'];

    if ($status == 'admin' || $status == 'authorized') {
        $status = 1;
    } else {
        $status = 0;
    }
} else {
    // Handle the case when the query fails
}

$sql = "INSERT INTO `store_token` (`id`, `token`, `userId`,`status`) VALUES (null, '$token', '$id','$status');";
$result = $conn->query($sql);
header("Location: ../");
?>
