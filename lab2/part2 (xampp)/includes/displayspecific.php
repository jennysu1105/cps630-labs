<?php
    include_once "dbh.inc.php";
    $fields = explode(" ", $_POST['field']);
    $counter = 0;
    $field_name = array();
    $sql = "SELECT ";

    foreach($fields as $value){
        if($counter == (count($fields)-1)){
            $sql .= $value." FROM strec;";
            array_push($field_name, $value);
        }else{
            $counter++;
            $sql .= $value.", ";
            array_push($field_name, $value);
        }
    }

    echo "<table><tr>";
    foreach($field_name as $fieldvalue){
        echo "<th>".$fieldvalue."</th>";
    }
    echo "</tr>";
    
    $qry = mysqli_query($conn, $sql);
    while($result = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
        echo "<tr>";
        foreach($result as $value){
            echo "<td>".$value."</td>";
        }
        echo "</tr>";
    };
    echo "</table>";
    echo '<form method="POST" action="../index.php"><button type="submit"/>Return to index.php</button></form>';
    mysqli_close($conn)
?>