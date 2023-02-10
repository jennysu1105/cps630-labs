<?php
    include_once "dbh.inc.php";

    $id = $_POST['id'];
    $gpa = $_POST['gpa'];
    $study_year = $_POST['study_year'];

    $sql = "UPDATE POSTS SET gpa='$gpa',study_year='$study_year' WHERE id='$id'";
    try{
        mysqli_query($conn, $sql);
        header("Location: ../index.php?signup=success");
    }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
        echo '<form method="POST" action="../index.php"><button type="submit"/>Return to index.php</button></form>';
    }
    header("Location: ../index.php?signup=success");
?>