<?php
include_once "dbConnection.php";
$sql = "DROP TABLE StRec";

if ($connect->query($sql) === TRUE) {
    echo "Table Dropped successfully";
} else {
    echo "Error dropping table: " . $connect->error;
}
$connect->close();

print(" <form method='POST' action='index.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
);
?> 
