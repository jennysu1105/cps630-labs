<?php
	include_once "browserDetection.php";
    include_once "database/submitQuery.php";

    $card_num = $_POST['card_num'];
    $card_name = $_POST['card_name'];
    $card_expiry = $_POST['card_expiry'];
    $card_cvv = $_POST['cvv'];

    
?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
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
    <div class="row mt-4">
		<h3>You have placed your order</h3>
		<h6>Review your order here:</h6>
    </div>

</body>