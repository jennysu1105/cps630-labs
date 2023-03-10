<!--Jenny Su 500962385
    Tiffany Tran 500886609
    Kevin Tran 500967982
    Michael Widianto 501033366
-->

<?php
include_once "dbConnection.php";
$shoppingTable = "CREATE TABLE shoppingTable ( 
    receipt_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    store_code INT NOT NULL,
    total_price DECIMAL(4,2) NOT NULL
    /* DECIMAL(4,2) -> 0000.00 */
)";

if ($connect->query($shoppingTable) === TRUE) {
    echo "Shopping Table created successfully";
} else {
    echo "Error creating Shopping Table: " . $connect->error;
}

$truckTable = "CREATE TABLE truckTable ( 
    truck_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    truck_code INT NOT NULL,
    availability_code BOOLEAN NOT NULL
    /* 0 = false, 1 = true */
)";

if ($connect->query($truckTable) === TRUE) {
    echo "Truck Table created successfully";
} else {
    echo "Error creating Truck Table: " . $connect->error;
}

$tripTable = "CREATE TABLE tripTable ( 
    trip_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    source_code VARCHAR(6) NOT NULL,
    destination_code VARCHAR(6) NOT NULL,
    distance DECIMAL(3, 2) NOT NULL,
    truck_id INT(6) UNSIGNED,
    price DECIMAL(4, 2) NOT NULL,
    FOREIGN KEY (truck_id) REFERENCES truckTable(truck_id)
    /* For source_code and destination_code, im assuming its like postal code, so i set the char to 6 */
)";

if ($connect->query($tripTable) === TRUE) {
    echo "Trip Table created successfully";
} else {
    echo "Error creating Trip Table: " . $connect->error;
}

$userTable = "CREATE TABLE userTable(
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    telephone VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    home_address VARCHAR(50) NOT NULL,
    city_code VARCHAR(3) NOT NULL,
    login_id VARCHAR(50) NOT NULL,
    user_password VARCHAR(5) NOT NULL,
    balance DECIMAL(9, 2) NOT NULL
    /* For city_code, im assuming its area code like 416 647 437*/
)";

if ($connect->query($userTable) === TRUE) {
    echo "User Table created successfully";
} else {
    echo "Error creating User Table: " . $connect->error;
}

$itemTable = "CREATE TABLE itemTable ( 
    item_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(30) NOT NULL,
    item_price DECIMAL(4, 2) NOT NULL,
    made_in VARCHAR(30) NOT NULL,
    department_code VARCHAR(10)
)";

if ($connect->query($itemTable) === TRUE) {
    echo "Item Table created successfully";
} else {
    echo "Error creating Item Table: " . $connect->error;
}

$orderTable = "CREATE TABLE orderTable ( 
    order_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date_issued DATE NOT NULL,
    date_received DATE NOT NULL,
    total_price DECIMAL(4, 2) NOT NULL,
    payment_code VARCHAR(10) NOT NULL,
    user_id INT(6) UNSIGNED,
    trip_id INT(6) UNSIGNED,
    receipt_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES userTable(user_id),
    FOREIGN KEY (trip_id) REFERENCES tripTable(trip_id),
    FOREIGN KEY (receipt_id) REFERENCES shoppingTable(receipt_id)
    /* Date format: YYYY-MM-DD */
)";

if ($connect->query($orderTable) === TRUE) {
    echo "Order Table created successfully";
} else {
    echo "Error creating Order Table: " . $connect->error;
}

$connect->close();
?> 

