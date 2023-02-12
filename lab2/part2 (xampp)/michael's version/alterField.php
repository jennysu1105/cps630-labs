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

if ($connect->query($sql) === TRUE) {
    echo "Table Student Records altered successfully";
} else {
    echo "Error altering table: " . $connect->error;
}


print(" <form method='POST' action='index.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
);

$connect->close();
?> 