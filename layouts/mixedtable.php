<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Time Stamp</th>
      <th scope="col">Temperature</th>
      <th scope="col">Humidity</th>
    </tr>
  </thead>
  <tbody>


<?php
require 'config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM data WHERE sender = '" . $_SESSION['id'] . "';";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
foreach ($result as $value) {
  echo "<tr>";
  echo "<th scope='row'>1</th>";
    
    $encryptedData = $value['temperature'];
    $encryptedData2 = $value['humidity'];
    $encryptedData3 = $value['time'];
    if (isset($_SESSION['key'])) {
      $privKey = $_SESSION['key'];
    } elseif(isset($_POST['key'])) {
      $privKey = $_POST['key'];
    }else{
      $privKey="";
    }  
    $decryptedData = '';
    $result = @openssl_private_decrypt(base64_decode($encryptedData), $decryptedData, $privKey);
    $result2 = @openssl_private_decrypt(base64_decode($encryptedData2), $decryptedData2, $privKey);
    $result3 = @openssl_private_decrypt(base64_decode($encryptedData3), $decryptedData3, $privKey);

    echo "<td>";
    echo  $decryptedData3;
    echo "</td>";

    echo "<td>";
    echo  $decryptedData;
    echo "</td>";

    echo "<td>";
    echo  $decryptedData2;
    echo "</td>";

    echo "</tr>";
}

mysqli_close($conn);
?>


  </tbody>
</table>