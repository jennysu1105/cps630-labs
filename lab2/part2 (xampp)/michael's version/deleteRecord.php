<!--Jenny Su 500962385
    Tiffany Tran 500886609
    Kevin Tran 500967982
    Michael Widianto 501033366
-->

<?php
include_once "dbConnection.php";
$Value = $_POST['Value'];
$Key = $_POST['deleteKey'];
$sql = "DELETE FROM StRec WHERE $Key=$Value";

try {
    $connect->query($sql);
    echo "Record Deleted successfully";
}
catch (Exception $e) {
    echo "Error deleting record: ".$e->getMessage();
}

print(" <form method='POST' action='index.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
);

$connect->close();
?> 