<?php
    include_once "dbh.inc.php";
    $field = $_POST['field'];
    $type = $_POST['type'];
    $sql = "ALTER TABLE strec ADD $field $type";
    mysqli_query($conn, $sql);
    header("Location: ../index.php?signup=success");
?>