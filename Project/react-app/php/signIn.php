<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
include_once "databaseFunctions.php";

$login_id = $_POST['loginID'];
$password = $_POST['loginPassword'];

checkUserCredentials($login_id, $password);
?>
