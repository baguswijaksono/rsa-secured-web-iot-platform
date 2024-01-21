<?php
require 'config.php';
$email = $_SESSION['id'];
$sql = "SELECT token FROM `store_token` WHERE userId = '$email';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $token = $row['token'];
        ?>
        <div class="p-4">
    <div class="alert alert-success" role="alert">
    <?php    echo "Token: " . $token . "<br>"; ?>
      </div>
</div>
        <?php
  
    }
} else {

}
?>
