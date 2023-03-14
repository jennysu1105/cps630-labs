<?php
    include_once "dbConnection.php";
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

    function selectShopping () {
        $selectShopping="SELECT * FROM shoppingTable";
        return submitSelectQuery($selectShopping);
    }
    
    function selectTruck () {
        $selectTruck="SELECT * FROM truckTable";
        return submitSelectQuery($selectTruck);
    }

    function selectTrip () {
        $selectTrip="SELECT * FROM tripTable";
        return submitSelectQuery($selectTrip);
    }

    function selectUser () {
        $selectUser="SELECT * FROM userTable";
        return submitSelectQuery($selectUser);
    }

    function selectItem () {
        $selectItem="SELECT * FROM itemTable";
        return submitSelectQuery ($selectItem);
    }

    function selectOrder () {
        $selectOrder="SELECT * FROM orderTable";
        return submitSelectQuery($selectOrder);
    }
?>