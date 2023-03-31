<?php
    include_once "../dbConnection.php";
    include_once "../Models.php";

    $item2 = new Item("Jeans Blue", 25.99, "Vietnam", "FASHION");
    $item3 = new Item("Tshirt Rainbow", 19.99, "Japan", "FASHION");
    $item4 = new Item("Boots", 89.99, "China", "FASHION");

    $item2->insert();$item3->insert();$item4->insert();

    $connect->close();
?>