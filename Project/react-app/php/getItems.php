<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
include_once "submitQuery.php";
$query = "SELECT item_name, item_price FROM itemTable WHERE item_id <> 1";
$items = submitSelectQuery($query);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($items);
?>