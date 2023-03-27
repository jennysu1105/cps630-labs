<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
include_once "submitQuery.php";
include_once "database/dbConnection.php";
include_once "database/Models.php";

$info = json_decode($_GET['info']);
$card_num = $info['card_num'];
$card_name = $info['card_name'];
$card_expiry = $info['card_expiry'];
$cvv = $info['cvv'];

?>