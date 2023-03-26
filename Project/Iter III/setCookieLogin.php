<?php
    include_once "database/submitQuery.php";
    include_once "database/Models.php";

    // Use setLoginCookie() when a user successfully sign in
    // Use fetchLoginCookie() when to get user info (user_id, etc) accross the page

    /**
     * set a login cookie
     */
    function setLoginCookie($login_id, $password) {
        $sql = "SELECT * FROM userTable WHERE login_id='$login_id' AND user_password='$password'";
        $user = submitSelectQuery($sql)[0];

        if(!empty($user)) {
            if(!isset($_COOKIE["login"])){
                setcookie("login", json_encode($user), time() + (20 * 365 * 24 * 60 * 60),'/');
            }
            else{
                setcookie("login", json_encode($user), time() + (20 * 365 * 24 * 60 * 60),'/');
            }
        }
    }

    /**
     * return a User Object
     */
    function fetchLoginCookie() {
        if(isset($_COOKIE["login"])){
            $userJSON = json_decode($_COOKIE["login"]);
            $user = new User($userJSON->user_id, $userJSON->full_name, $userJSON->telephone, $userJSON->email, $userJSON->home_address, $userJSON->city_code, $userJSON->login_id, $userJSON->user_password, $userJSON->balance);
            return $user;
        }
    }
?>