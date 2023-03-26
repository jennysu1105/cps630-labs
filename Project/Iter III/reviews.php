<?php
	include_once "browserDetection.php";
    include_once "database/Models.php";
    include_once "database/selectModels.php";
    include_once "database/submitQuery.php";
    include_once "database/databaseFunctions.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Reviews</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="scripts/nav.js"></script>
</head>

<body style="background-color: #b2edc2;">
    <nav-bar></nav-bar>
    <div>
        <!--To create reviews-->
    </div>
    <div>
        <!--To view reviews-->
        <?php
            $reviews = getReviewsWithUserAndItem();
            foreach($reviews as $itemName => $item) {
                print("<div><h4>$itemName</h4>");
                foreach($item as $review) {
                    $username = $review["login_id"];
                    $rating = $review["RN"];
                    $userReview = $review["review"];
                    print(
                        "<p>Review By: $username</p><br>
                        <p>Rating: $rating</p><br>
                        <p>Review: $userReview</p><br>"
                    );
                }
                print("/<div>");
            }
        ?>
    </div>
        
</body>

</html>