<?php
    include_once 'dbh.inc.php';

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $study_year = $_POST['study_year'];
    $gpa = $_POST['gpa'];

    $sql = "INSERT INTO strec(f_name, l_name, study_year, gpa) VALUES('$f_name', '$l_name', '$study_year', '$gpa');";
    mysqli_query($conn, $sql);
    header("Location: ../index.php?signup=success");
?>