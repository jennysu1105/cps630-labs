<?php
    include_once "dbh.inc.php";

    $sql = "SHOW COLUMNS FROM strec";
    $result = mysqli_query($conn,$sql);
    echo "<table><tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<th>".$row['Field']."</th>";
    }
    echo "</tr>";
    
    $qry = mysqli_query($conn, "SELECT * FROM strec");
    while($result = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
        echo "<tr>";
        foreach($result as $value){
            echo "<td>".$value."</td>";
        }
        echo "</tr>";
    };
    echo "</table>";

    mysqli_close($conn)
?>