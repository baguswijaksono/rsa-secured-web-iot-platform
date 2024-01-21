
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RSA-Secured-IoT-Monitoring</title>
  <link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>
<?php

session_start();
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'home';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if (isset($_SESSION['id'])) {
    if ($_SESSION['id'] == '') {
        ?>
        <div class="d-flex align-items-center justify-content-center" style="min-height: 85vh;">
        <div class="container-sm" style="max-width:650px">
        <?php
        include './layouts/loginform.html';
    } else {
        if (isset($_SESSION['expiration_timestamp']) && $_SESSION['expiration_timestamp'] < time()) {
            unset($_SESSION['key']);
            unset ($_SESSION['expiration_timestamp']);
        }
        if($tab=='home'){
            include './layouts/navbar.php';
            if(isset($_SESSION['key'])){
                include './layouts/successkey.html';
            }
            include './layouts/viewtoken.php';
        }
        elseif($tab=='temptable'){
            include './layouts/navbar.php';
            include './layouts/temptable.php';
            //include './layouts/pagination.php';
        }
        elseif($tab=='tempgraphic'){
            include './layouts/navbar.php';
            include './layouts/tempchart.php';
            //include './layouts/pagination.php';
        }

        elseif($tab=='humidtable'){
            include './layouts/navbar.php';
            include './layouts/humidtable.php';
            //include './layouts/pagination.php';
        }
        elseif($tab=='humidgraphic'){
            include './layouts/navbar.php';
            include './layouts/humidchart.php';
            //include './layouts/pagination.php';
        }
        elseif($tab=='mixedtable'){
            include './layouts/navbar.php';
            include './layouts/mixedtable.php';
            //include './layouts/pagination.php';
        }
        elseif($tab=='mixedgraphic'){
            include './layouts/navbar.php';
            include './layouts/mixedchart.php';
            //include './layouts/pagination.php';
        }
        elseif($tab=='admin'){
            include './layouts/navbar.php';
            include './layouts/admin.php';
        }
        elseif($tab=='setkey'){
            include './layouts/navbar.php';
            ?>
            <div class="d-flex align-items-center justify-content-center" style="min-height: 85vh;">
            <div class="container-sm" style="max-width:650px">
            <?php
            include './layouts/setkey.html';
        }
        elseif($tab=='genreratetoken'){
            include './layouts/navbar.php';
        }
        else{

        }
?>
<?php
}
}
else{
    ?>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 85vh;">
    <div class="container-sm" style="max-width:650px">
    <?php
    include './layouts/loginform.html';
}

?>
</div>
</div>
<script src="./bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
