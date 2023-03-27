<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

include_once "Models.php";
include_once "selectModels.php";
include_once "submitQuery.php";
include_once "databaseFunctions.php";

$user_id = json_decode($_GET['user']);
$user = selectUser()[$user_id];
print_r($user);

$reviews = getReviewsWithUserAndItem();
print("<h3 class='mt-4'>Item Reviews</h3>");
foreach ($reviews as $itemName => $item) {
    print("<div class='row'><div class='col-md-6 offset-md-3'>
            <div class='card m-4' style='padding:15px'><h4 class='m-3'>$itemName</h4><hr>");
    foreach ($item as $review) {
        $username = $review["login_id"];
        $rating = $review["RN"];
        $userReview = $review["review"];
        print("<p>Item Rating: $rating</p>
                <p>Reviewer: $username</p>
                <p>Review: $userReview</p><hr>"
        );
    }
    print("</div></div></div></div>");
}
?>
