<?php
include_once "dbConnection.php";
$Value = $_POST['Value'];
$Key = $_POST['deleteKey'];
$sql = "DELETE FROM StRec WHERE $Key=$Value";

if ($connect->query($sql) === TRUE) {
    echo "Record Deleted successfully";
} else {
    echo "Error deleting record: " . $connect->error;
}

print(" <form method='POST' action='index.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
);

$connect->close();
?> 