<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
include_once "submitQuery.php";
$id = $_GET['id'];
$criteria = $_GET['criteria'];

if ($criteria == ""){
    $query = "SELECT order_id, date_received, total_price FROM orderTable WHERE user_id=" . $id;
    $result = submitSelectQuery($query);
}
else {
    $query = "SELECT order_id, date_received, total_price FROM orderTable WHERE user_id=" . $id . "AND order_id=" . $criteria;
    $result = submitSelectQuery($query);
}
echo json_encode($result);
?>