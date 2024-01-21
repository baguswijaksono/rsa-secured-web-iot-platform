
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="mixedChart" style="max-height:100vh"></canvas>
    <script>
        const ctx = document.getElementById('mixedChart').getContext('2d');
        const options = {
            responsive: true, // Make the chart responsive
            scales: {
                y: {
                    beginAtZero: true, // Start the y-axis from zero
                }
            }
        };
        const mixedChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [
                    {
                        type: 'bar',
                        label: 'Humidity',
                        data: [
                            <?php $sql = "SELECT * FROM data;";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
foreach ($result as $value) {
    $encryptedData2 = $value['humidity'];
    if (isset($_SESSION['key'])) {
      $privKey = $_SESSION['key'];
    } elseif(isset($_POST['key'])) {
      $privKey = $_POST['key'];
    }else{
      $privKey="";
    }  
    $decryptedData2 = '';
    $result2 = @openssl_private_decrypt(base64_decode($encryptedData2), $decryptedData2, $privKey);
    $firstTwoCharacters = substr($decryptedData2, 0, 2);
    echo $firstTwoCharacters;
    echo ',';
}
                    ?>
                        ],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Set the bar color
                        borderColor: 'rgba(75, 192, 192, 1)', // Set the border color
                        borderWidth: 1, // Set the border width
                    },
                    {
                        type: 'bar',
                        label: 'Temperature',
                        data: [                    <?php
$sql = "SELECT * FROM data;";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
foreach ($result as $value) {
    $encryptedData = $value['temperature'];
    if (isset($_SESSION['key'])) {
      $privKey = $_SESSION['key'];
    } elseif(isset($_POST['key'])) {
      $privKey = $_POST['key'];
    }else{
      $privKey="";
    }  
    $decryptedData = '';
    $result = @openssl_private_decrypt(base64_decode($encryptedData), $decryptedData, $privKey);

    $firstTwoCharacters2 = substr($decryptedData, 0, 2);
    echo $firstTwoCharacters2;
    echo ',';
}
                    ?>],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Set the bar color
                        borderColor: 'rgba(255, 99, 132, 1)', // Set the border color
                        borderWidth: 1, // Set the border width
                    }
                ],
                labels: [
                    <?php
$sql = "SELECT * FROM data;";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
foreach ($result as $value) {
    $encryptedData3 = $value['time'];
    if (isset($_SESSION['key'])) {
      $privKey = $_SESSION['key'];
    } elseif(isset($_POST['key'])) {
      $privKey = $_POST['key'];
    }else{
      $privKey="";
    }  
    $decryptedData3 = '';
    $result3 = @openssl_private_decrypt(base64_decode($encryptedData3), $decryptedData3, $privKey);

    $firstTwoCharacters3 = substr($decryptedData3, 0, 2);
    echo $firstTwoCharacters3;
    echo ',';
}
                    ?>
                ]
            },
            options: options
        });
    </script>