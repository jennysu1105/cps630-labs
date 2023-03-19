<?php

include_once "../Models.php";

if(isset($_POST["identifier"])) {
    $identifier = $_POST["identifier"];

    if($identifier == "shopping") {
        $shopping = new Shopping($_POST["store_code"], $_POST["total_price"]);
        $shopping->insert();
    }
    else if($identifier == "truck") {
        $truck = new Truck($_POST["truck_code"], $_POST["availability_code"]);
        $truck->insert();
    } 
    else if($identifier == "trip") {
        $trip = new Trip($_POST["source_code"], $_POST["destination_code"], $_POST["distance"], $_POST["truck_id"], $_POST["price"]);
        $trip->insert();
    } 
    else if($identifier == "user") {
        $user = new User($_POST["full_name"], $_POST["telephone"], $_POST["email"], $_POST["home_address"], $_POST["city_code"], $_POST["login_id"], $_POST["user_password"], $_POST["balance"]);
        $user->insert();
    } 
    else if($identifier == "item") {
        $item = new Item($_POST["item_name"], $_POST["item_price"], $_POST["made_in"], $_POST["department_code"]);
        $item->insert();
    } 
    else if($identifier == "order") {
        $order = new Order($_POST["date_issued"], $_POST["date_received"], $_POST["total_price"], $_POST["payment_code"], $_POST["user_id"], $_POST["trip_id"], $_POST["receipt_id"]);
        $order->insert();
    } 
}

print(" <form method='POST' action='insertPage.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
);


?>