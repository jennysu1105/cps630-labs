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
		<h3>Your order has been sent!</h3>
		<h6>Your order number is #00000001</h6>
    </div>
    <div class="row mt-4">
        <div class="col-1">
        </div>
        <div class="col-9">
        <b>Order Details:</b>
        <hr>
        <div class="row p-3 mb-2 mr-2 bg-dark text-light">
            Payment Method:
            <?php
            include_once "database/submitQuery.php";
            include_once "database/dbConnection.php";
            include_once "database/Models.php";

            $card_num = $_POST['card_num'];
            $card_name = $_POST['card_name'];
            $card_expiry = $_POST['card_expiry'];
            $card_cvv = $_POST['cvv'];
            $save = $_POST['save_card'];
            $payment = $_POST['payment'];

            $date = "20" . $card_expiry[3] . $card_expiry[4] . "-" . $card_expiry[0] . $card_expiry[1] . "-01";
            if($payment == "new"){
                if ($save == 'save') {
                    $query = "SELECT * from paymentTable where card_number = '" . $card_num . "'";
                    $result = submitSelectQuery($query);
                    if (count($result) == 0){
                        $payment = new Payment($card_name, $card_num, $date, $card_cvv);
                        $payment->insert();
                    }
                    echo '************'. substr($card_num, 12);
                }
            }
            else {
                $query = "SELECT * FROM paymentTable WHERE payment_id='" . $payment . "'";
                $card = submitSelectQuery($query)[0];
                echo '************'. substr($card['card_number'], 12);
            }
            # also place order here, but I have no user information
            ?>
            <hr>Shipping to:
            <?php
            $address_1 = $_POST['address_1'];
            $address_2 = $_POST['address_2'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $postal = $_POST['postal_code'];

            echo '<br>' . $address_2 . ' - ' . $address_1 . "<br>" . $city . "<br>" . $province . "<br>" . $postal;
            ?>
        </div>
        <div class="container">
            <div class="row">
                <div id="total" class="col p-3 mb-2 mr-2 bg-dark text-light"><span id="items">0</span> Items | Total: $<span id="price">0</span></div>
            </div>
        </div>
            <div id="cart" class="container"> 
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
                            
                            echo "<div class=\"col-sm-12 p-3 mb-2 bg-light text-dark\">" . $img_tag . $item_tag . "</div>";
                            echo '<script>var cart_total = document.getElementById("items"); cart_total.innerHTML = ' . count($items) .';</script>';
                            echo '<script>var cart_total = document.getElementById("price"); cart_total.innerHTML = ' . $total .';</script>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>