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
    mysqli_query($conn, $sql);
    header("Location: ../index.php?signup=success");
?>