<?php
    include_once "dbConnection.php";
    function submitDeleteQuery($query) {
        global $connect; //from "dbConnection.php"
        try {
            $connect->query($query);
            echo "Record deleted successfully";
            return 1;
        }
        catch (Exception $e) {
            echo "Error deleting record: ".$e->getMessage();
            return 0;
        }
    }

    function deleteShoppingById($value) {
        $deleteShopping = "DELETE FROM shoppingTable WHERE receipt_id=$value";
        return submitDeleteQuery($deleteShopping);
    }
    function deleteTruckById($value) {
        $deleteTruck = "DELETE FROM truckTable WHERE truck_id=$value";
        return submitDeleteQuery($deleteTruck);
    }
    function deleteTripById($value) {
        $deleteTrip = "DELETE FROM tripTable WHERE trip_id=$value";
        return submitDeleteQuery($deleteTrip);
    }
    function deleteUserById($value) {
        $deleteUser = "DELETE FROM userTable WHERE user_id=$value";
        return submitDeleteQuery($deleteUser);
    }
    function deleteItemById($value) {
        $deleteItem = "DELETE FROM itemTable WHERE item_id=$value";
        return submitDeleteQuery($deleteItem);
    }
    function deleteOrderById($value) {
        $deleteOrder = "DELETE FROM orderTable WHERE order_id=$value";
        return submitDeleteQuery($deleteOrder);
    }

    function deleteAllShopping () {
        $deleteAllShopping="DELETE FROM shoppingTable";
        return submitDeleteQuery($deleteAllShopping);
    }
    function deleteAllTruck () {
        $deleteAllTruck="DELETE FROM truckTable";
        return submitDeleteQuery($deleteAllTruck);
    }
    function deleteAllTrip () {
        $deleteAllTrip="DELETE FROM tripTable";
        return submitDeleteQuery($deleteAllTrip);
    }
    function deleteAllUser () {
        $deleteAllUser="DELETE FROM userTable";
        return submitDeleteQuery($deleteAllUser);
    }
    function deleteAllItem () {
        $deleteAllItem="DELETE FROM itemTable";
        return submitDeleteQuery ($deleteAllItem);
    }
    function deleteAllOrder () {
        $deleteAllOrder="DELETE FROM orderTable";
        return submitDeleteQuery($deleteAllOrder);
    }
?>