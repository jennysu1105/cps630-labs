<!--Jenny Su 500962385
    Tiffany Tran 500886609
    Kevin Tran 500967982
    Michael Widianto 501033366
-->

<?php
include_once "dbConnection.php";

$field = $_POST['Field'];
$type = $_POST['dataType'];
$action = $_POST['action'];

$sql = "";
if($action == 0) /*action = add*/ {
    $sql = "ALTER TABLE StRec ADD $field $type";
}
//action = delete
else {
    $sql = "ALTER TABLE StRec DROP COLUMN $field";
}

try {
    $connect->query($sql);
    echo "Table Student Records altered successfully";
}
catch (Exception $e) {
    echo "Error altering table: ".$e->getMessage();
}

print(" <form method='POST' action='index.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
);

$connect->close();
?> 