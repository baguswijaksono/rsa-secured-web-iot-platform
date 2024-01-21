<?php
require '../config.php';
if (isset($_SESSION['id'])) {
  if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];
    // Prepare the SQL statement using a prepared statement
    $sql = "UPDATE `store_token` SET `status` = '0' WHERE `store_token`.`userId` = ?;";
    $stmt = $conn->prepare($sql);
    // Bind the parameter
    $stmt->bind_param("i", $userId);
    // Execute the statement
    $stmt->execute(); 
    // Close the statement
    $stmt->close();
  }

}


header("Location: ../?tab=admin");
exit();
?>
