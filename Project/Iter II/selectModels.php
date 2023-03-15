<?php
    include_once "../dbConnection.php";
    function submitSelectQuery($query) {
        global $connect; //from "dbConnection.php"
        $records = array();

        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($records, $row);
            }
        }         
        return $records;
    }
    /**
     * Return an associative array of Shopping objects where the key is the receipt_id (PRIMARY KEY) and the value is the Shopping object
     */
    function selectShopping () {
        $selectShopping="SELECT * FROM shoppingTable";
        $records = submitSelectQuery($selectShopping);
        
        $shoppingList = array();
        foreach($records as $row) {
            $shopping = new Shopping($row["receipt_id"], $row["store_code"], $row["total_price"]);
            $shoppingList[$row["receipt_id"]] = $shopping;
        }
        return $shoppingList;
    }
    
    /**
     * Return an associative array of Truck objects where the key is the truck_id (PRIMARY KEY) and the value is the Truck object
     */
    function selectTruck () {
        $selectTruck="SELECT * FROM truckTable";
        $records = submitSelectQuery($selectTruck);

        $truckList = array();
        foreach($records as $row) {
            $truck = new Truck($row["truck_id"], $row["truck_code"], $row["availability_code"]);
            $truckList[$row["truck_id"]] = $truck;
        }
        return $truckList;
    }

    /**
     * Return an associative array of Trip objects where the key is the trip_id (PRIMARY KEY) and the value is the Trip object
     */
    function selectTrip () {
        $selectTrip="SELECT * FROM tripTable";
        $records = submitSelectQuery($selectTrip);

        $tripList = array();
        foreach($records as $row) {
            $trip = new Trip($row["trip_id"], $row["source_code"], $row["destination_code"], $row["distance"], $row["truck_id"], $row["price"]);
            $tripList[$row["trip_id"]] = $trip;
        }
        return $tripList;
    }

    /**
     * Return an associative array of User objects where the key is the user_id (PRIMARY KEY) and the value is the User object
     */
    function selectUser () {
        $selectUser="SELECT * FROM userTable";
        $records = submitSelectQuery($selectUser);

        $userList = array();
        foreach($records as $row) {
            $user = new User($row["user_id"], $row["full_name"], $row["telephone"], $row["email"], $row["home_address"], $row["city_code"], $row["login_id"], $row["user_password"], $row["balance"]);
            $userList[$row["user_id"]] = $user;
        }
        return $userList;
    }

    /**
     * Return an associative array of Item objects where the key is the item_id (PRIMARY KEY) and the value is the Item object
     */
    function selectItem () {
        $selectItem="SELECT * FROM itemTable";
        $records = submitSelectQuery ($selectItem);

        $itemList = array();
        foreach($records as $row) {
            $item = new Item($row["item_id"], $row["item_name"], $row["item_price"], $row["made_in"], $row["department_code"]);
            $itemList[$row["item_id"]] = $item;
        }
        return $itemList;
    }

    /**
     * Return an associative array of Order objects where the key is the order_id (PRIMARY KEY) and the value is the Order object
     */
    function selectOrder () {
        $selectOrder="SELECT * FROM orderTable";
        $records = submitSelectQuery($selectOrder);

        $orderList = array();
        foreach($records as $row) {
            $order = new Order($row["order_id"], $row["date_issued"], $row["date_received"], $row["total_price"], $row["payment_code"], $row["user_id"], $row["trip_id"], $row["receipt_id"]);
            $orderList[$row["order_id"]] = $order;
        }
        return $orderList;
    }
?>