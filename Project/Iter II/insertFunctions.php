<?php
    include_once "dbConnection.php";
    function submitInsertQuery($query) {
        global $connect; //from "dbConnection.php"
        try {
            $connect->query($query);
            //echo "New record created successfully";
            return 1;
        }
        catch (Exception $e) {
            //echo "Error creating new record: ".$e->getMessage();
            return 0;
        }
    }

    function insertShopping ($store_code, $total_price) {
        $insertShopping="INSERT INTO shoppingTable (store_code, total_price) VALUES ($store_code, $total_price)";
        return submitInsertQuery($insertShopping);
    }
    
    function insertTruck ($truck_code, $availability_code) {
        $insertTruck="INSERT INTO truckTable (truck_code, availability_code) VALUES ($truck_code, $availability_code)";
        return submitInsertQuery($insertTruck);
    }

    function insertTrip ($source_code, $destination_code, $distance, $truck_id, $price) {
        $insertTrip="INSERT INTO tripTable (source_code, destination_code, distance, truck_id, price) VALUES ('$source_code', '$destination_code', $distance, $truck_id, $price)";
        return submitInsertQuery($insertTrip);
    }

    function insertUser ($full_name, $telephone, $email, $home_address, $city_code, $login_id, $user_password, $balance) {
        $insertUser="INSERT INTO userTable (full_name, telephone, email, home_address, city_code, login_id, user_password, balance) VALUES ('$full_name', '$telephone', '$email', '$home_address', '$city_code', '$login_id', '$user_password', $balance)";
        return submitInsertQuery($insertUser);
    }

    function insertItem ($item_name, $item_price, $made_in, $department_code) {
        $insertItem="INSERT INTO itemTable (item_name, item_price, made_in, department_code) VALUES ('$item_name', $item_price, '$made_in', '$department_code')";
        return submitInsertQuery ($insertItem);
    }

    function insertOrder ($date_issued, $date_received, $total_price, $payment_code, $user_id, $trip_id, $receipt_id) {
        $insertOrder="INSERT INTO orderTable (date_issued, date_received, total_price, payment_code, user_id, trip_id, receipt_id) VALUES ('$date_issued', '$date_received', $total_price, '$payment_code', $user_id, $trip_id, $receipt_id)";
        return submitInsertQuery($insertOrder);

    }
?>