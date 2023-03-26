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
        <form method="post" action="reviewOrder.php">
          <p><b>Payment Details</b></p>
          <?php
          include_once "database/submitQuery.php";
            # This will be user based when users are implemented
            $query = "SELECT * FROM paymentTable";
            $result = submitSelectQuery($query);
            for ($i = 0; $i < count($result) ; $i++){
              $id = $result[$i]['payment_id'];
              $num = substr($result[$i]['card_number'], 12);
              $name = $result[$i]['cardholder_name'];
              $expire = $result[$i]['expiration_date'];

              echo '<input type="radio" id = "' . $id . '" name="payment" value="'. $id . '">';
              echo '<label for="' . $id . '"><div class="card" style="padding:10px"> ************'. $num . '<br>' . $name . ' | ' . $expire . '</div></label><br>';
            }
          ?>
          <input type="radio" id="new" name = "payment" value = "new">
          <label for="new">
            <div class="card" style="padding:10px">
              Card Number: <input type="text" name="card_num" style="width:450px"></input>
              Name: <input type="text" name="card_name" style="width:150px"></input>
              Expiry Date: MM/YY <input type="text" name="card_expiry" style="width:100px"></input>
              CVV: <input type="text" name="cvv" style="width:50px"></input>
            </div>
          </label>
          <br><input type="checkbox" name="save_card" value="save"><label for="save_card">Save this card</label><br>
          <hr>
          <p><b>Shipping Details</b></p>
          <div class="card" style="padding:10px">
            Address Line 1: <input type="text" name="address_1" ></input>
            Address Line 2: <input type="text" name="address_2" ></input>
            City: <input type="text" name="city" style="width:150px"></input>
            Province: <input type="text" name="province" style="width:150px"></input>
            Postal Code: <input type="text" name="postal_code" style="width:150px"></input>
          </div>
          <hr><button type="submit" class="bg-light text-dark">Place Order</button><hr>
          <br>
        </form>
      </div>
      <div class = "col-md-1">
      </div>
      <div class = "col">
        <div class="row">
          <div id="total" class="col-sm-9 p-3 mb-2 mr-2 bg-dark text-light"><span id="items">0</span> Items <hr> Total: $<span id="price">0</span> <hr>
            <div id="cart"> 
            <!-- cookie is stored in $_COOKIE['items'] and contains a list of encoded item_ids-->
            <?php
              include_once "database/submitQuery.php";
              if(isset($_COOKIE['items'])){
                $items = json_decode($_COOKIE['items'], true);
                $total = 0;
                for ($i = 0; $i <= count($items); $i++){
                  $item = $items[$i];
                  $query = "select * from itemTable where item_id=" . $item;
                  $result = submitSelectQuery($query);
                  $name = $result[0]['item_name'];
                  $price = $result[0]['item_price'];
                  
                  $item_tag = $name . " - $ " . $price;
                  $item_img = "images/" . 1 . ".jpg";
                  $img_tag = "<img src=\"" . $item_img . "\" height=\"50px\" style=\"margin-right:10px\">";
                  
                  $total += $price;
                  
                  echo "<div class=\"col p-3 mb-2 mr-2 bg-light text-dark\">" . $img_tag . $item_tag . "</div>";
                  echo '<script>var cart_total = document.getElementById("items"); cart_total.innerHTML = ' . count($items) .';</script>';
                  echo '<script>var cart_total = document.getElementById("price"); cart_total.innerHTML = ' . $total .';</script>';
                }
              }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>