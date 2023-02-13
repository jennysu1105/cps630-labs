<!--Jenny Su 500962385
    Tiffany Tran 500886609
    Kevin Tran 500967982
    Michael Widianto 501033366
-->

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
