<?php
include_once "../dbConnection.php";
include_once "../Models.php";
include_once "../selectModels.php";
$item1 = new Item("Jeans Green", 40.99, "Vietnam", "FASHION");
$item2 = new Item("Tshirt Yellow", 12.99, "Japan", "FASHION");
$item3 = new Item("Sock Orange", 8.99, "China", "FASHION");

$item1->insert();$item2->insert();$item3->insert();

$item1->makeSale(4, 22.99, "2023-05-01");
$item2->makeSale(5, 8.99, "2023-05-01");
$item3->makeSale(6, 5.99, "2023-05-01");


$connect->close();
?>
