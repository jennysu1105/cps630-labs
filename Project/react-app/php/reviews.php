<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

include_once "Models.php";
include_once "selectModels.php";
include_once "submitQuery.php";
include_once "databaseFunctions.php";

$reviews = getReviewsWithUserAndItem();
foreach ($reviews as $itemName => $item) {
    print("<div><h4>$itemName</h4>");
    foreach ($item as $review) {
        $username = $review["login_id"];
        $rating = $review["RN"];
        $userReview = $review["review"];
        print("<p>Review By: $username</p><br>
                        <p>Rating: $rating</p><br>
                        <p>Review: $userReview</p><br>"
        );
    }
    print("/<div>");
}
?>
