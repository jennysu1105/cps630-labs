<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="jquery-3.6.1.min.js"></script>
    <script type="text/Javascript">
    </script>
</head>
<form action="createTableStRec.php">
    <button type="submit">Create Table</button>
</form>
<form action="dropTableStRec.php">
    <button type="submit">Drop Table</button>
</form>

<?php include_once("showDatabase.php"); 
?>
<?php
function typeIdentifier($type)
{
    if ($type == 'varchar' || $type == 'timestamp' || $type == 'double') {
        return "text";
    }
    // ($type == 'int')
    return "number";
}
?>
<br>
<form action="alterField.php" method="POST" id="alterField">
    <input type="text" placeholder="Field" name="Field">
    <select name="dataType" form="alterField">
        <option selected hidden>Data Type</option>
        <option value="VARCHAR(30)">VARCHAR(30)</option>
        <option value="VARCHAR(50)">VARCHAR(50)</option>
        <option value="INTEGER">INTEGER</option>
        <option value="DOUBLE">DOUBLE</option>
    </select>
    <select name="action" form="alterField">
        <option selected hidden>Action</option>
        <option value="0">Add</option>
        <option value="1">Remove</option>
        <!--Is it better to use numeric value or string value?-->
    </select>
    <button type="submit">Submit Request</button>
</form>
<br>
<form action="insertRecord.php" method="POST">
    <?php
    array_shift($columnDataTypes);
    $noIdColumn = $columns;
    array_shift($noIdColumn);
    //print_r($columnDataTypes);
    //print_r($noIdColumn);
    for ($i = 0; $i < sizeof($noIdColumn); $i++) {
        $placeholder = $noIdColumn[$i];
        $type = typeIdentifier($columnDataTypes[$i]);
        print("<input type=$type placeholder=$placeholder name=$placeholder>");
    }
    $columnNames = json_encode($noIdColumn);
    $dataTypes = json_encode($columnDataTypes);
    print("<input type=hidden name='columnNames' value=$columnNames>");
    print("<input type=hidden name='dataTypes' value=$dataTypes>");
    ?>
    <button type="submit">Insert Record</button>
</form>
<br>
<form action="updateRecord.php" method="POST" id="updateRecord">
    <label for="updateKey">Update by:</label>
    <select name="updateKey" form="updateRecord" id='updateKey'>
        <option selected hidden>Select Key/Column</option>
        <?php
        for ($i = 0; $i < sizeof($columns); $i++) {
            $key = $columns[$i];
            print("<option value=$key>$key</option>");
        }
        ?>
    </select>
    <input type="text" placeholder="Value" name="Value">
    <br>
    <?php
    for ($i = 0; $i < sizeof($noIdColumn); $i++) {
        $placeholder = $noIdColumn[$i];
        $type = typeIdentifier($columnDataTypes[$i]);
        print("<input type=$type placeholder=$placeholder name=$placeholder>");
    }
    print("<input type=hidden name='columnNames' value=$columnNames>");
    print("<input type=hidden name='dataTypes' value=$dataTypes>");
    ?>
    <button type="submit">Update Record</button>
</form>
<br>
<form action="deleteRecord.php" method="POST" id="deleteRecord">
    <input type="text" placeholder="Value" name="Value">
    <select name="deleteKey" form="deleteRecord">
        <option selected hidden>Select Key/Column</option>
        <?php
        for ($i = 0; $i < sizeof($columns); $i++) {
            $key = $columns[$i];
            print("<option value=$key>$key</option>");
        }
        ?>
    </select>
    <button type="submit">Delete Record</button>
</form>
<br>
<form action="showSelectedField.php" method="POST">
    <?php
        $columnsEncode = json_encode($columns);
        for ($i = 0; $i < sizeof($columns); $i++) {
            $field = $columns[$i];
            print("
                <input type='checkbox' id=$field name=$field value=$field>
                <label for=$field>$field</label><br>
            ");
        }
        print("<input type=hidden name='columnsEncode' value=$columnsEncode>");
    ?>
    <button type="submit">Show Selected Field</button>
</form>
</html>