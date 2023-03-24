<?php 
include_once "database/submitQuery.php";
$name = $_GET['name'];
$query = "SELECT item_id FROM itemTable WHERE item_name ='".$name."'";
$result = submitSelectQuery($query);
$itemid = $result[0]['item_id'];

if(!isset($_COOKIE['items'])){
	$items = array();
}
else{
	$items = json_decode($_COOKIE['items'], true);
}
array_push($items, $itemid);
setcookie("items", json_encode($items), time() + (20 * 365 * 24 * 60 * 60),'/');
echo $_COOKIE['items'];
?>
