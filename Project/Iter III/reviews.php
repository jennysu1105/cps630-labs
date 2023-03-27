<?php
	include_once "browserDetection.php";
    include_once "database/Models.php";
    include_once "database/selectModels.php";
    include_once "database/submitQuery.php";
    include_once "database/databaseFunctions.php";
    include_once "setCookieLogin.php";
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
        <?php //Only show this part if a user sign
            //setLoginCookie("astuart", "password123");
            $user = fetchLoginCookie();
            if(!empty($user)) {
                $reviewableItem = getRevewableItemByUser($user->getUser_id());
                print(
                    "<form action='reviewPageHandler.php' method='POST'>
                        <label for='item_id'>Product: </label>
                        <select name='item_id' required>"
                );
                foreach($reviewableItem as $item_id=>$item_name) {
                    print("<option value='$item_id'>$item_name</option>");
                }
                print("
                        </select>
                        <label for='RN'>Rating: </label>
                        <input type='number' name='RN' min='1' max='5' required>
                        <label for='review'>Review: </label>
                        <input type='text' name='review' minlength='0' maxlength='250' style='height: 50px; width: 300px;' required>
                        <input type='submit'>
                    </form>
                ");
            }
        ?>
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