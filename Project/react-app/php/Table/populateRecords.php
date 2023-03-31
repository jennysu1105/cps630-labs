<?php
    include_once "../dbConnection.php";
    include_once "../Models.php";
    include_once "../databaseFunctions.php";

    $shopping1 = new Shopping(1, 10);
    $shopping2 = new Shopping(2, 30);

    $truck1 = new Truck(1, 1);
    $truck2 = new Truck(2, 0);

    $trip1 = new Trip("M5B2K3", "L5P1B2", 3.2, 1, 30.42);
    $trip2 = new Trip("L5P1B2", "M5B2K3", 3.2, 2, 60.84);

    $salt1 = generateSalt(); $salt2 = generateSalt(); $salt3 = generateSalt(); $salt4 = generateSalt();
    $admin = new User("Michael Widianto", "4169996666", "michael.r.widianto@torontomu.ca", "10 Yonge St", "416", "mrw19", $salt1, hashPassword("adminuser".$salt1), 0);
    $user2 = new User("John Doe", "4163334444", "johndoe@gmail.com", "10 Adeline St", "416", "jdoe", $salt2, hashPassword("password".$salt2), 500);
    $user3 = new User("Alex Stuart", "7063334444", "astuart@gmail.com", "22 Yonge St", "706", "astuart", $salt3, hashPassword("password123".$salt3), 200);
    $user4 = new User("Bill Clint", "5121112222", "bclint@gmail.com", "45 Temprest St", "512", "blint", $salt4, hashPassword("password456".$salt4), 100);

    $service = new Item("Service", 0, "", "");
    $item2 = new Item("Jeans Green", 40.99, "Vietnam", "FASHION");
    $item3 = new Item("Tshirt Yellow", 12.99, "Japan", "FASHION");
    $item4 = new Item("Sock Orange", 8.99, "China", "FASHION");
    $item5 = new Item("Jeans Blue", 25.99, "Vietnam", "FASHION");
    $item6 = new Item("Tshirt Rainbow", 19.99, "Japan", "FASHION");
    $item7 = new Item("Boots", 89.99, "China", "FASHION");

    $item2->insert();$item3->insert();$item4->insert();

    $review1 = new Review(2, 2, 4, "looks good");
    $review2 = new Review(3, 2, 1, "bad quality");
    $review3 = new Review(4, 3, 3, "meh");

    $payment1 = new Payment(1, "JOHN D", "5555666677778888", "2023-03-01", "222");
    $payment2 = new Payment(2, "ALEX S", "1111222233334444", "2023-03-01", "111");

    //$order1 = new Order("2023-03-14", "2023-03-14", 24.99, 1, 1, 2, 1);
    //$order2 = new Order("2023-03-21", "2023-03-21", 14.99, 2, 2, 3, 2);

    $purchasedService1 = new PurchasedItem(1, 1);
    $purchasedService2 = new PurchasedItem(1, 2);
    $purchasedService3 = new PurchasedItem(1, 3);
    $purchasedService4 = new PurchasedItem(1, 4);
    //Need to add this when user sign up

    $purchasedItem1 = new PurchasedItem(2, 2);
    $purchasedItem2 = new PurchasedItem(3, 2);
    $purchasedItem3 = new PurchasedItem(4, 3);

    $shopping1->insert();$shopping2->insert();
    $truck1->insert();$truck2->insert();
    $trip1->insert();$trip2->insert();
    $admin->insert();$user2->insert();$user3->insert();$user4->insert();
    $service->insert();$item2->insert();$item3->insert();$item4->insert();
    $item2->makeSale(2, 22.99, "2023-05-01"); $item3->makeSale(3, 8.99, "2023-05-01"); $item4->makeSale(4, 5.99, "2023-05-01");
    $item5->insert();$item6->insert();$item7->insert();
    $review1->insert();$review2->insert();$review3->insert();
    $payment1->insert();$payment2->insert();
    //$order1->insert();$order2->insert();
    $purchasedItem1->insert();$purchasedItem2->insert();$purchasedItem3->insert();
    $purchasedService1->insert();$purchasedService2->insert();$purchasedService3->insert();$purchasedService4->insert();

    $connect->close();
?>