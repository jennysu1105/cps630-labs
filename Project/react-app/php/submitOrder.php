<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
include_once "submitQuery.php";
include_once "dbConnection.php";
include_once "Models.php";

$payment = $_GET['payment'];
$total = $_GET['total'];
$user_id = $_GET['user'];
$date = date('Y-m-d');

$order = new Order($date, $date, $total, $payment, $user_id, 1, 1);
$order->insert();
$query = "SELECT MAX(order_id) FROM orderTable";
$result = submitSelectQuery($query);
echo $result[0]["MAX(order_id)"];
?>