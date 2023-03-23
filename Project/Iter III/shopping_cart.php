<?php
	include_once "browserDetection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
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
		<h3>Shopping Cart</h3>
		<h6>View your current shopping cart:</h6>
    </div>
    <div class="container">
		<div class="row">
			<div id="total" class="col-sm-9 p-3 mb-2 mr-2 bg-dark text-light"><span id="items">0</span> Items | Total: $<span id="price">0</span></div>
			<div type="button" class="col-sm-3 p-3 mb-2 btn btn-secondary" style="border-radius: 0;" >Checkout</div>
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
</body>

</html>
