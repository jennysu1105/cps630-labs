<!DOCTYPE html>

<html>

<head>
    <title>Artwork Record</title>
    <meta charset="utf-8">
</head>

<?php
$artwork;
$record = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $record = array(
        "genre" => $_POST['genre'],
        "type" => ($_POST['type']),
        "specification" => ($_POST['specification']),
        "year" => ($_POST['year']),
        "museum" => ($_POST['museum'])
    );
}

if (empty($record) != 1) {
    if (isset($_COOKIE['database'])) {
        $cookieData = json_decode($_COOKIE['database']);
        array_push($cookieData, $record);
        $artwork = $cookieData;
        setcookie('database', json_encode($cookieData));
    } else {
        $cookieData = array($record);
        $artwork = $cookieData;
        setcookie('database', json_encode($cookieData));
    }
}

print_r($artwork);

?>
<!--
print("
    <label for='index'>Index: </label>
    <select name='index' id='index'>
    <option value='' selected hidden></option>
");
for ($i = 0; $i < count($artwork); $i++) {
    print("<option value=$i>$i</option>");
}
?>

<body>
    <div>HELLO</div>
</body>

</html>
-->