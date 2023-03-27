<?php
    include_once "browserDetection.php";
    include_once "database/Models.php";
    include_once "database/databaseFunctions.php";
    include_once "setCookieLogin.php";

    $user = fetchLoginCookie();

    $item_id = $_POST["RN"];
    $user_id = $user->getUser_id();
    $RN = $_POST["RN"];
    $review = $_POST["review"];

    $reviewObj = new Review($item_id, $user_id, $RN, $review);
    $reviewObj->insert();

    print("
        <h4>Thank you for reviewing our product. Your feedback matters to improve our services and products</h4>
        
        <form method='POST' action='reviews.php'>
            <button type='submit'/>Return to review page</button>
        </form>"
);
?>