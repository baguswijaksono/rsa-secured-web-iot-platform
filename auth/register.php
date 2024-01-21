<?php
require '../config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_POST['username'] . $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$password = $_POST['password'];

// Check user count
$sqlCount = "SELECT COUNT(*) as count FROM users";
$result = mysqli_query($conn, $sqlCount);
$row = mysqli_fetch_assoc($result);
$userCount = $row['count'];

if ($userCount > 0) {
    $role = 'client';
} else {
    $role = 'admin';
}

// Hash
$id = md5($id);
$hashedPassword = md5($password);

$sql = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `dob`, `role`) VALUES ('$id', '$firstname', '$lastname', '$username', '$email', '$hashedPassword', '$dob', '$role');";

if (mysqli_query($conn, $sql)) {
    header("Location: ../");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
