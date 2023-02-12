<?php
include_once "dbConnection.php";

$columnNames = json_decode($_POST['columnsEncode']);
$selectedField = array();
for ($i = 0; $i < sizeof($columnNames); $i++) {
    //Some of the checkboxes will not be checked, so use isset
    if (isset($_POST[$columnNames[$i]])) {
        array_push($selectedField, $_POST[$columnNames[$i]]);
    }
}

if (sizeof($selectedField) == sizeof($columnNames)) {
    include_once("showDatabase.php");
} else {
    print("<table>");
    print("<tr>");
    $sql = "SELECT ";
    for ($i = 0; $i < sizeof($selectedField); $i++) {
        if($i == sizeof($selectedField)-1) {
            $sql .= $selectedField[$i] . " FROM StRec";
        }
        else {
            $sql .= $selectedField[$i] . ", ";
        }
        print("<th>$selectedField[$i]</th>");
    }
    print("</tr>");

    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            print("<tr>");
            for ($i = 0; $i < sizeof($selectedField); $i++) {
                $data = $row[$selectedField[$i]];
                print("<th>$data</th>");
            }
            print("</tr>");
        }
    } else {
        echo "No results.";
    }
    print("</table>");
    mysqli_close($connect);
}
?>