<?php
require 'config.php';
$tempdata = $_GET['temp'];
$humidata = $_GET['humid'];
$pubKey = $_GET['pubKey'];
$token = $_GET['token'];
// Set the timezone to Jakarta
$timezone = new DateTimeZone('Asia/Jakarta');

// Create a DateTime object with the current date and time in the default timezone
$dateTime = new DateTime();
$dateTime->setTimezone($timezone);

// Format the date and time in the desired format
$formattedDateTime = $dateTime->format('Y-m-d H:i');

$check_sql = "SELECT * FROM `store_token` WHERE token = '$token'";
$check_result = $conn->query($check_sql);

if ($check_result && $check_result->num_rows > 0) {
    $row = $check_result->fetch_assoc();
    $status = $row['status'];
    $user = $row['userId'];

    if ($status == 1) {
        //temp
        $encryptedtempData = '';
        openssl_public_encrypt($tempdata, $encryptedtempData, $pubKey);
        $encryptedtempData=base64_encode($encryptedtempData);
        
        //Humidity
        $encryptedhumidData = '';
        openssl_public_encrypt($humidata, $encryptedhumidData, $pubKey);
        $encryptedhumidData=base64_encode($encryptedhumidData);
        
        //Time
        $encryptedtimeData = '';
        openssl_public_encrypt($formattedDateTime, $encryptedtimeData, $pubKey);
        $encryptedtimeData=base64_encode($encryptedtimeData);
        
        $sql = "INSERT INTO `data` (`id`,`sender`,`time`, `humidity`, `temperature`) VALUES 
        (null,'$user','$encryptedtimeData', '$encryptedhumidData', '$encryptedtempData');";
        $result = $conn->query($sql);
    } else {
        // The status is not authorized (value = 0)
    }

} else {
    // Code to be executed if the token is not found in the database
}

?>
