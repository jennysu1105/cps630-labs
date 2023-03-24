<!DOCTYPE html>
<html>

<head>
    <title>Smart Customer Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="scripts/nav.js"></script>
    <script src="scripts/index.js"></script>
    <script type="text/javascript">
		function drop(ev) {
			var linebreak = document.createElement("br");
			var data = ev.dataTransfer.getData("text");
			var item = document.getElementById("item_" + data);
			var item_price = document.getElementById("price_" + data);
			ev.preventDefault();
            console.log(data, item.innerHTML, item_price.innerHTML);
			ev.target.append(item.innerHTML + " - $" + item_price.innerHTML);
			ev.target.appendChild(linebreak);

			var cart_total = document.getElementById("cart_total");
			var price = Number(item_price.innerHTML);

			try {
				cart_total.innerHTML = Number(cart_total.innerHTML) + price;
			}
			catch {
				cart_total.innerHTML = price;
			}

			
			$.ajax({
				url: 'setCookieFiresale.php',
				type: 'GET',
				data: { name: item.innerHTML },
			});
            
		}
    </script>
</head>

<body style="background-image: linear-gradient(#b85653, #b09858); background-attachment:fixed;">
<nav-bar></nav-bar>
    <div class="container">
        <div class="row mt-4">
            <h3>Fire Sale, Hot Deals</h3>
            <h6>Drag an item to add it to your shopping cart</h6>
        </div>
        <div class="row mt-4 mb-5">
            <div class="col-md-9">
                <div class="row">
					<!-- so that we don't need to manually put stuff. Make sure # of items is divisible by 3 and it will not look weird -->
					<?php
						include_once "database/submitQuery.php";
						$query = "SELECT itemsaletable.sale_price, itemtable.item_name, itemtable.item_price FROM itemsaletable INNER JOIN itemtable ON itemsaletable.item_id = itemtable.item_id;";
						$items = submitSelectQuery($query);

                        for ($i = 0; $i < count($items); $i++){

                            $item = $items[$i];
							$name = $item['item_name'];
							$saleprice = $item['sale_price'];
                            $oldprice = $item['item_price'];
							
							if ($i%3 == 0 and $i <> 0){
								echo '<div class="row mt-4">';
							}
							echo '<div class="col">';
							echo '<div class="card">';
                            echo '<img id="' . $i .'" src="images/1.jpg" draggable="true" ondragstart="drag(event)">';
                            echo '<hr>';
                            echo '<div class="card_container">';
                            echo '<p id="item_' . $i .'" class="shopping_item">'. $name . '</p>';
                            echo '<p id="price_' . $i .'">'.$saleprice.'</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
							if ($i%3 == 2 and $i <> 0){
								echo '</div>';
							}
						}
						
					?>
			</div>
            <div class="col-md-3">
                <div id="shopping_cart" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <h5 style="margin-top: 15px;">Your Shopping Cart</h5>
                    <span>Current subtotal: $</span>
                    <span id="cart_total"></span>
                    <br>
                    <hr>
                    <!-- write existing shopping cart items --> 
                    <?php
						include_once "database/submitQuery.php";
						if(isset($_COOKIE['items'])){
							$items = json_decode($_COOKIE['items'], true);
							$total = 0;
							for($i = 0; $i < count($items); $i++){
								$item = $items[$i];
								$query = "select * from itemsaletable where item_id =".$item;
								$result = submitSelectQuery($query);
								if($result){
									$price = $result[0]['sale_price'];
									$query = "select * from itemtable where item_id =".$item;
									$result = submitSelectQuery($query);
									$name = $result[0]['item_name'];
									$item_tag = $name . " - $ " . $price . "<hr>";
									$total += round($price, 2);
									$rounded = round($total, 2);
									echo $item_tag;
									echo '<script>var cart_total = document.getElementById("cart_total"); cart_total.innerHTML = ' . $rounded .';</script>';
								}else{
									$query = "select * from itemtable where item_id =".$item;
									$result = submitSelectQuery($query);
									$price = $result[0]['item_price'];
									$name = $result[0]['item_name'];
									$item_tag = $name . " - $ " . $price . "<hr>";
									$total += round($price, 2);
									$rounded = round($total, 2);
									echo $item_tag;
									echo '<script>var cart_total = document.getElementById("cart_total"); cart_total.innerHTML = ' . $rounded .';</script>';
								}
							}
						}
						// if(isset($_COOKIE['items'])){
						// 	$items = json_decode($_COOKIE['items'], true);
						// 	$total = 0;
						// 	for ($i = 0; $i < count($items); $i++){
						// 		$item = $items[$i];
						// 		$query = "select * from itemTable where item_id=" . $item;
						// 		$result = submitSelectQuery($query);
						// 		$name = $result[0]['item_name'];
						// 		$price = $result[0]['item_price'];
								
						// 		$item_tag = $name . " - $ " . $price . "<hr>";
						// 		$total += round($price, 2);
						// 		$rounded = round($total, 2);
						// 		echo $item_tag;
								//echo '<script>var cart_total = document.getElementById("cart_total"); cart_total.innerHTML = ' . $rounded .';</script>';
						// 	}
						// }
                    ?>
                </div>
				<a href="map.php" class="col-sm-12 p-3 btn btn-secondary" style="border-radius: 0;">Checkout</a>
            </div>
        </div>
    </div>
</body>

</html>
