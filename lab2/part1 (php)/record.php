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
?>

<!DOCTYPE html>

<html>

<head>
    <title>Artwork Record</title>
    <meta charset="utf-8">
</head>

<body>
    <table>
        <tr>
            <th>Genre</th>
            <th>Type</th>
            <th>Specification</th>
            <th>Year</th>
            <th>Museum</th>
        </tr>
    <?php
        for($i=0; $i<sizeof($artwork);++$i) {
            $record = $artwork[$i];
            print("<tr>");
            foreach($record as $key => $value) {
                print("<th>$value</th>");
            }
            print("</tr>");
        }
        print("</table>");
        print(" <form method='POST' action='lab2,3-Part1-Team37.php'>
            <button type='submit'/>Return to main page</button>
        </form>"
        );
    ?>
</body>

</html>
