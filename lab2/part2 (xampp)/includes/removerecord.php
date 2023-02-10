<?php
    include_once 'dbh.inc.php';

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $id = $_POST['id'];

    if(empty($id)){
        $sql = "DELETE FROM strec WHERE strec.f_name = '$f_name' AND strec.l_name = '$l_name'";
    }else{
        $sql = "DELETE FROM strec WHERE strec.id = '$id'";
    }
    try{
        mysqli_query($conn, $sql);
        header("Location: ../index.php?signup=success");
    }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
        echo '<form method="POST" action="../index.php"><button type="submit"/>Return to index.php</button></form>';
    }
    header("Location: ../index.php?signup=success");
?>