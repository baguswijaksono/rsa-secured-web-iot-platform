<?php
require '../config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function escape($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

$email = escape($_POST['email']);
$password = escape($_POST['password']);

$password = md5($password);

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['id'] = $row['id'];
    header("Location: ../");
} else {
    echo "Invalid email or password.";
}
?>
