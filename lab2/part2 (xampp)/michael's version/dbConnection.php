<!--Jenny Su 500962385
    Tiffany Tran 500886609
    Kevin Tran 500967982
    Michael Widianto 501033366
-->

<?php

$hostname = "localhost:3307";
$username = "root";
$password = "cps630Lab2,3";
$database = "testnew";

// Create connection using PDO
/*
try {
    $connString = "mysql:host=$hostname;dbname=$database";
    $pdo = new PDO($connString, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die($e->getMessage());
}
*/
// Create connection using mysqli
$connect = new mysqli(
  $hostname,
  $username,
  $password,
  $database
);
if(mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

?>