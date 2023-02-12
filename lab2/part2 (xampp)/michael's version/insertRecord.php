<?php
include_once "dbConnection.php";
function typeIdentifier($type, $value, $last) {
    if ($value == null) {
        if($last == 0) {
            return "NULL, ";
        }
        return "NULL";
    }
    if ($type == 'varchar' || $type == 'timestamp') {
        if($last == 0) {
            return "'".$value."', ";
        }
        else {
            return "'".$value."'";
        }
    }
    // ($type == 'int')
    if($last == 0) {
        return $value.", ";
    }
    return $value;
}
$columnNames;
$dataTypes;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $columnNames = json_decode($_POST['columnNames']);
    $dataTypes = json_decode($_POST['dataTypes']);
}
$columnString = "(".implode(", ", $columnNames).")";
$valuesString = "(";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 0; $i < sizeof($columnNames)-1; $i++) {
        $value = $columnNames[$i];
        $valuesString .= typeIdentifier($dataTypes[$i], $_POST[$value], 0);
    }
    $valuesString .= typeIdentifier(end($dataTypes), $_POST[end($columnNames)], 1).")";
}
$sqlString = "INSERT INTO strec ".$columnString." VALUES ".$valuesString;
$sql = $sqlString;
echo $sql;

if ($connect->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
$connect->close();

print(" <form method='POST' action='index.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
);

/* PDO Method
$valuesString = "(";
for ($i = 0; $i < sizeof($columnNames)-1; $i++) {
    $valuesString.="?, ";
}
$valuesString.="?)";

$statement = $pdo->prepare($sql);
for ($i = 0; $i < sizeof($columnNames); $i++) {
    $value = $columnNames[$i];
    $statement->bindValue($i+1, $_POST[$value]);
}
$statement->executed();
*/
?> 