<?php
	include_once "browserDetection.php";
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
		<h3>Checkout</h3>
		<h6>Final steps to complete your order</h6>
    </div>
    <div class="row">
      <hr>
      <div class = "col-md-1">
      </div>
      <div class = "col-md-6">
        <form onsubmit="">
          <p><b>Payment Details</b></p>
          Card Number: <input type="text" id="card_num" style="width:450px"></input>
          <div class="row mt-1" >
            <div class="col-1">
              Name:
            </div>
            <div class="col">
              <input type="text" id="name" style="width:150px"></input>
            </div>
            <div class="col">
              Expiry Date: MM/DD
            </div>
            <div class="col">
              <input type="text" id="name" style="width:100px"></input>
            </div>
            <div class="col">
              CVV: <input type="text" id="cvv" style="width:50px"></input>
            </div>
          </div>
          <input type="checkbox" id="save_card" name="save_card" value="save">
          <label for="save_card">Save this card</label><br>
          <hr>
          <p><b>Shipping Details</b></p>
          Address Line 1: <input type="text" id="address_1" style="width:450px" style></input><br><br>
          Address Line 2: <input type="text" id="address_2" style="width:450px"></input>
          <div class="row mt-1">
            <div class="row">
            </div>
            <div class="col-1">
              City: 
            </div>
            <div class="col">
              <input type="text" id="city" style="width:150px"></input>
            </div>
            <div class="col-2">
              Province:
            </div>
            <div class="col">
              <input type="text" id="province" style="width:150px"></input>
            </div>
          </div><br>
          Postal Code:<input type="text" id="postal_code" style="width:150px"></input>
        </form>
      </div>
    </div>
</body>
</html>