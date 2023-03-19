<?php
include_once "../dbConnection.php";
include_once "../Models.php";
include_once "../selectModels.php";
$item1 = new Item("Jeans", 24.99, "Vietnam", "FASHION");
$item2 = new Item("Tshirt", 14.99, "Japan", "FASHION");

$item1->insert();$item2->insert();

$connect->close();
?>
