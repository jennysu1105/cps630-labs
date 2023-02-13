<!--Jenny Su 500962385
    Tiffany Tran 500886609
    Kevin Tran 500967982
    Michael Widianto 501033366
-->

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
$setString = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 0; $i < sizeof($columnNames)-1; $i++) {
        $columnName = $columnNames[$i];
        $newValue = $_POST[$columnName];
        $newValue = typeIdentifier($dataTypes[$i], $newValue, 0);
        $setString .= $columnName." = ".$newValue;
    }
    $newValue = $_POST[end($columnNames)];
    $newValue = typeIdentifier(end($dataTypes), $newValue, 1);
    $setString .= end($columnNames)." = ".$newValue;
}
$sqlString = "UPDATE strec SET ".$setString." WHERE ".$_POST['updateKey']." = ".$_POST['Value'];
$sql = $sqlString;

try {
    $connect->query($sql);
    echo "Record updated created successfully";
}
catch (Exception $e) {
    echo "Error updating record: ".$e->getMessage();
}
$connect->close();

print(" <form method='POST' action='index.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
);
?> 