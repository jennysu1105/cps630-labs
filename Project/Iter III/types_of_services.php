<?php
include_once "browserDetection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Types of Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="scripts/nav.js"></script>
</head>

<body style="background-color: #b2edc2;">
    <nav-bar></nav-bar>
    <div class="container">
        <div class="row mt-4">
            <h5>The Smart Customer Services (SCS) offers the following services</h5>
        </div>
        <div class="row mt-5 mb-5" style="text-align:center;">
            <div class="col-md-4">
                <img src="images/shopping_icon.png" alt="shopping_icon" style="width:50%; mix-blend-mode:multiply;">
                <div>
                    <h5 class="mt-5">Online shopping</h5>
                    <a href="index.php" class="btn btn-success" role="button">To shopping</a>
                </div>
            </div>
            <div class="col-md-4">
                <img src="images/delivery_icon.png" alt="delivery_icon" style="width:60%; margin: 10px 0 5px 0;">
                <div>
                    <h5 class="mt-5">Delivery</h5>
                    <a href="map.php" class="btn btn-success" role="button">To delivery</a>
                </div>
            </div>
            <div class="col-md-4">
                <img src="images/firesale.png" alt="delivery_icon" style="width:45%; margin: 10px 0 5px 0;">
                <div>
                    <h5 class="mt-5">Fire sale shopping</h5>
                    <a href="fire_sale.php" class="btn btn-success" role="button">To Fire sale</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>