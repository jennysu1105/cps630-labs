<?php
    include_once "dbConnection.php";
    function submitQuery($query) {
        global $connect; //from "dbConnection.php"
        try {
            $connect->query($query);
            return 1;
        }
        catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }
    }
?>