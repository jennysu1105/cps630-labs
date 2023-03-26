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
        echo '<script type="text/javascript">
                window.location = "http://localhost:3000"
            </script>';
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

function getItemWithReviews() {
    //$sql = "SELECT itemTable.item_name, reviewTable.RN, reviewTable.review FROM reviewTable INNER JOIN itemTable ON reviewTable.item_id=itemTable.item_id ORDER";
    $itemsWithReviewSQL = "SELECT itemTable.item_name FROM reviewTable INNER JOIN itemTable ON reviewTable.item_id=itemTable.item_id GROUP BY itemTable.item_name";
    $itemsWithReview = array();
    $record = submitSelectQuery($itemsWithReviewSQL);
    foreach ($record as $row) {
        array_push($itemsWithReview, $row["item_name"]);
    }
    return $itemsWithReview;
}
?>