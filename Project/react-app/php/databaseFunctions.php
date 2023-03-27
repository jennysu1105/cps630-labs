<?php
include_once "submitQuery.php";
include_once "Models.php";

/**
 * returns true (1) if user does not exists in database
 * returns false ("") if user exists in database
 * 
 * Use this when user sign_in
 */
function checkUserCredentials($login_id, $password)
{
    $sql = "SELECT * FROM userTable WHERE login_id='$login_id' AND user_password='$password'";
    $array = submitSelectQuery($sql);
    if (empty($array) == "") {
        echo '<script type="text/javascript">window.location = "http://localhost:3000/loggedIn?user_id='. $array[0]['user_id']. '&login_id=' . $login_id . '"</script>';
    } else {
        print(" <div>
                    Login failed - incorrect username or password. 
                <div>
                <form method='' action='http://localhost:3000/sign_in'>
                    <button type='submit'/>Try again</button>
                </form>"
        );
    }
}

/**
 * Check if a user exists in database by checking login_id, $home_ad
 * 
 * returns true (1) if user does not exists in database
 * returns false ("") if user exists in database
 * 
 * Use this during user sign_up
 */
function checkExistingEmail($email)
{
    $sql = "SELECT * FROM userTable WHERE email='$email'";
    $array = submitSelectQuery($sql);
    return empty($array);
}
/**
 * returns true (1) if user does not exists in database
 * returns false ("") if user exists in database
 * 
 * Use this during user sign_up
 */
function checkExistingLoginId($login_id)
{
    $sql = "SELECT * FROM userTable WHERE login_id='$login_id'";
    $array = submitSelectQuery($sql);
    return empty($array);
}

/**
 * return an error string message if a email or login_id is used
 * else a new user record is inserted to the database
 * 
 * Use this during user sign_up
 */
function createNewUser($full_name, $telephone, $email, $home_address, $login_id, $user_password)
{
    if (checkExistingEmail($email) && checkExistingLoginId($login_id)) {
        $user = new User($full_name, $telephone, $email, $home_address, "", $login_id, $user_password, 0);
        $user->insert();
        print(" <div>
                    Successfully registered. 
                <div>
                <form method='' action='http://localhost:3000'>
                    <button type='submit'/>Return to home page</button>
                </form>"
        );
    } else {
        print(" <div>
                    Registration failed - username or email already in use. 
                <div>
                <form method='' action='http://localhost:3000/sign_up'>
                    <button type='submit'/>Try again</button>
                </form>"
        );
    }
}

function getItemWithReviews()
{
    //$sql = "SELECT itemTable.item_name, reviewTable.RN, reviewTable.review FROM reviewTable INNER JOIN itemTable ON reviewTable.item_id=itemTable.item_id ORDER";
    $itemsWithReviewSQL = "SELECT itemTable.item_name FROM reviewTable INNER JOIN itemTable ON reviewTable.item_id=itemTable.item_id GROUP BY itemTable.item_name";
    $itemsWithReview = array();
    $record = submitSelectQuery($itemsWithReviewSQL);
    foreach ($record as $row) {
        array_push($itemsWithReview, $row["item_name"]);
    }
    return $itemsWithReview;
}

/**
 * Return an array of item_name of items with reviews
 */
function getReviewedItemNames()
{
    $sql = "SELECT itemTable.item_name FROM reviewTable INNER JOIN itemTable ON reviewTable.item_id=itemTable.item_id GROUP BY itemTable.item_name";
    $items = array();
    $record = submitSelectQuery($sql);
    foreach ($record as $row) {
        array_push($items, $row["item_name"]);
    }
    return $items;
}

/**
 * Return an associative array where:
 *    (1) key is item_name
 *    (2) value: array containing reviews of item_name. Each review is an associative array where the keys are login_id, RN, review. 
 */
function getReviewsWithUserAndItem()
{
    $sql = "SELECT itemTable.item_name, userTable.login_id, reviewTable.RN, reviewTable.review FROM itemTable INNER JOIN reviewTable ON itemTable.item_id=reviewTable.item_id INNER JOIN userTable ON reviewTable.user_id=userTable.user_id ORDER BY itemTable.item_name";
    $reviews = array();
    $items = getReviewedItemNames();
    $record = submitSelectQuery($sql);
    foreach ($items as $item) {
        $itemReview = array();
        foreach ($record as $review) {
            if ($review["item_name"] == $item) {
                array_push($itemReview, array_slice($review, 1));
                //Add everything other than item_name column into itemReview

                $record = array_slice($record, 1);
                //Delete to skip iteration in the next item
            }
        }
        $reviews[$item] = $itemReview;
    }
    return $reviews;
}
?>
