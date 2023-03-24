<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

include_once "dbConnection.php";
include_once "DBMaintainFunctions.php";

print("<div class='mainContainer'>");
createSelectHTMLTable("shopping");
createSelectHTMLTable("truck");
createSelectHTMLTable("trip");
createSelectHTMLTable("user");
createSelectHTMLTable("item");
createSelectHTMLTable("review");
createSelectHTMLTable("payment");
createSelectHTMLTable("order");
print("</div>");
?>