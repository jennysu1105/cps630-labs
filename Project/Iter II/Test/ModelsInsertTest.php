<?php
    include_once "../dbConnection.php";
    include_once "../Models.php";
    include_once "../selectModels.php";

    //Insert Record
    $shopping1 = new Shopping(1, 10);
    $shopping2 = new Shopping(2, 30);

    $truck1 = new Truck(1, 1);
    $truck2 = new Truck(2, 0);

    $trip1 = new Trip("M5B2K3", "L5P1B2", 3.2, 1, 30.42);
    $trip2 = new Trip("L5P1B2", "M5B2K3", 3.2, 2, 60.84);

    $user1 = new User("John Doe", "4163334444", "johndoe@gmail.com", "10 Adeline St", "416", "jdoe", "password", 500);
    $user2 = new User("Alex Stuart", "7063334444", "astuart@gmail.com", "22 Yonge St", "706", "astuart", "password123", 200);

    $item1 = new Item("Jeans", 24.99, "Vietnam", "FASHION");
    $item2 = new Item("Tshirt", 14.99, "Japan", "FASHION");

    $order1 = new Order("2023-03-14", "2023-03-14", 24.99, "1", 1, 1, 1);
    $order2 = new Order("2023-03-21", "2023-03-21", 14.99, "2", 2, 2, 2);

    $shopping1->insert();$shopping2->insert();
    $truck1->insert();$truck2->insert();
    $trip1->insert();$trip2->insert();
    $user1->insert();$user2->insert();
    $item1->insert();$item2->insert();
    $order1->insert();$order2->insert();
    
    // Select / Show Database
    echo "<h1>Select Test (run only once, else records will be duplicated)</h1>";
    $shoppingList = selectShopping(); print_r($shoppingList); echo "<br>";
    $truckList = selectTruck(); print_r($truckList); echo "<br>";
    $tripList = selectTrip(); print_r($tripList); echo "<br>";
    $userList = selectUser(); print_r($userList); echo "<br>";
    $itemList = selectItem(); print_r($itemList); echo "<br>";
    $orderList = selectOrder(); print_r($orderList); echo "<br>";

    $connect->close();
?>