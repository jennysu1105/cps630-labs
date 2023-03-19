<?php
    include_once "../dbConnection.php";
    include_once "../Models.php";
    include_once "../selectModels.php";
    
    //Delete Test
    echo "<h1>Before Delete Test</h1>";
    $shoppingList = selectShopping(); print_r($shoppingList); echo "<br>";
    $truckList = selectTruck(); print_r($truckList); echo "<br>";
    $tripList = selectTrip(); print_r($tripList); echo "<br>";
    $userList = selectUser(); print_r($userList); echo "<br>";
    $itemList = selectItem(); print_r($itemList); echo "<br>";
    $orderList = selectOrder(); print_r($orderList); echo "<br>";
    
    //Must delete in this order, if not constraint / foreign key issue will occur
    $orderList[1]->delete();
    $itemList[1]->delete();
    $userList[1]->delete();
    $tripList[1]->delete();
    $truckList[1]->delete();
    $shoppingList[1]->delete();

    //Get Updated Database
    $newShoppingList = selectShopping();
    $newTruckList = selectTruck();
    $newTripList = selectTrip(); 
    $newUserList = selectUser();
    $newItemList = selectItem(); 
    $newOrderList = selectOrder();
    
    echo "<h1>After Delete Test</h1>";
    $shoppingList = selectShopping(); print_r($shoppingList); echo "<br>";
    $truckList = selectTruck(); print_r($truckList); echo "<br>";
    $tripList = selectTrip(); print_r($tripList); echo "<br>";
    $userList = selectUser(); print_r($userList); echo "<br>";
    $itemList = selectItem(); print_r($itemList); echo "<br>";
    $orderList = selectOrder(); print_r($orderList); echo "<br>";
    
    $connect->close();
?>