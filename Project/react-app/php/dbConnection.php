<?php

/* Dont forget to change these stuff */
$hostname = "localhost:3306";
$username = "root";
$password = "";
$database = "project";

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
