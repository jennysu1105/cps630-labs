<?php
    include_once "dbh.inc.php";
    $field = $_POST['field'];
    $sql = "ALTER TABLE strec DROP COLUMN $field";
    try{
        mysqli_query($conn, $sql);
        header("Location: ../index.php?signup=success");
    }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
        echo '<form method="POST" action="../index.php"><button type="submit"/>Return to index.php</button></form>';
    }
    header("Location: ../index.php?signup=success");
?>