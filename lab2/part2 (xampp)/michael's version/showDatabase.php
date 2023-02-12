<?php
include_once "dbConnection.php";

$columns = array();
$columnDataTypes = array();

$sql = "SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='strec'";
$result = mysqli_query($connect, $sql);
print("<table>");
if (mysqli_num_rows($result) > 0) {
    print("<tr>");
    while ($row = mysqli_fetch_assoc($result)) {
        $columnName = $row['COLUMN_NAME'];
        $dataType = $row['DATA_TYPE'];
        array_push($columns, $columnName);
        array_push($columnDataTypes, $dataType);

        print("<th>$columnName</th>");
        //Get the column names and its data type
      }
    print("</tr>");
} 
    else {
        echo "No results.";
    }

$sql = "SELECT * FROM StRec";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        print("<tr>");
        for ($i = 0; $i < sizeof($columns); $i++) {
            $data = $row[$columns[$i]];
            print("<th>$data</th>");
        }
        print("</tr>");
    }
} 
    else {
        echo "No results.";
    }

print("</table>");
mysqli_close($connect);
?> 
