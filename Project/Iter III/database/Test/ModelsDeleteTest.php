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
    $reviewList = selectReview(); print_r($reviewList); echo "<br>";
    $paymentList = selectPayment(); print_r($paymentList); echo "<br>";
    $orderList = selectOrder(); print_r($orderList); echo "<br>";
    
    //Must delete in this order, if not constraint / foreign key issue will occur
    $orderList[1]->delete();
    $paymentList[1]->delete();
    $reviewList[3]->delete();
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
    $newReviewList = selectReview(); 
    $newPaymentList = selectPayment(); 
    $newOrderList = selectOrder(); 
    
    echo "<h1>After Delete Test</h1>";
    print_r($newShoppingList); echo "<br>";
    print_r($newTruckList); echo "<br>";
    print_r($newTripList); echo "<br>";
    print_r($newUserList); echo "<br>";
    print_r($newItemList); echo "<br>";
    print_r($newReviewList); echo "<br>"; 
    print_r($newPaymentList); echo "<br>";
    print_r($newOrderList); echo "<br>";
    
    $connect->close();
?>