<?php
    include_once "../dbConnection.php";
    include_once "../Models.php";
    include_once "../selectModels.php";

    // Select / Show Database
    echo "<h1>Select Test</h1>";
    $shoppingList = selectShopping(); print_r($shoppingList); echo "<br>";
    $truckList = selectTruck(); print_r($truckList); echo "<br>";
    $tripList = selectTrip(); print_r($tripList); echo "<br>";
    $userList = selectUser(); print_r($userList); echo "<br>";
    $itemList = selectItem(); print_r($itemList); echo "<br>";
    $orderList = selectOrder(); print_r($orderList); echo "<br>";

    //Update Database
    echo "<br> <h1>Before Update Test</h1>";
    print_r($shoppingList[1]); echo "<br>";
    print_r($truckList[1]); echo "<br>";
    print_r($tripList[1]); echo "<br>";
    print_r($userList[1]); echo "<br>";
    print_r($itemList[1]); echo "<br>";
    print_r($orderList[1]); echo "<br>";

    $shoppingList[1]->setTotal_price(20); $shoppingList[1]->update();
    $truckList[1]->setAvailability_code(0); $truckList[1]->update();
    $tripList[1]->setPrice(42.55); $tripList[1]->update();
    $userList[1]->setUser_password("imamazing"); $userList[1]->update();
    $itemList[1]->setMade_in("Japan"); $itemList[1]->update();
    $orderList[1]->setDate_received("2023-03-21"); $orderList[1]->update();

    //Get Updated Database
    $newShoppingList = selectShopping();
    $newTruckList = selectTruck();
    $newTripList = selectTrip(); 
    $newUserList = selectUser();
    $newItemList = selectItem(); 
    $newOrderList = selectOrder(); 

    echo "<br> <h1>After Update Test</h1>";
    print_r($newShoppingList[1]); echo "<br>";
    print_r($newTruckList[1]); echo "<br>";
    print_r($newTripList[1]); echo "<br>";
    print_r($newUserList[1]); echo "<br>";
    print_r($newItemList[1]); echo "<br>";
    print_r($newOrderList[1]); echo "<br>";
?>