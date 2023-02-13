<!--Jenny Su 500962385
    Tiffany Tran 500886609
    Kevin Tran 500967982
    Michael Widianto 501033366
-->

<?php
include_once "dbConnection.php";
$sql = "CREATE TABLE StRec ( 
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($connect->query($sql) === TRUE) {
    echo "Table Student Records created successfully";
} else {
    echo "Error creating table: " . $connect->error;
}

print(" <form method='POST' action='index.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
);

$connect->close();
?> 
