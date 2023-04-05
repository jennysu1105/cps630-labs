<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
include_once "submitQuery.php";
$order_id = $_GET['order_id'];

$query = "SELECT COUNT(purchasedItemTable.purchased_item_id) AS num, itemTable.item_name as item_name FROM itemTable, purchasedItemTable WHERE itemTable.item_id = purchasedItemTable.item_id AND purchasedItemTable.order_id = " . $order_id . " GROUP BY item_name";
$result = submitSelectQuery($query);

echo json_encode($result);