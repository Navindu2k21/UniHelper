<?php

include '../../connector.php';

$id = $_GET['id'];

if($id == 'save'){

    $subcode = $_GET['subcode'];
    $metid = $_GET['metid'];
    $metpass = $_GET['metpass'];
    $metlink = $_GET['metlink'];

    $SQL = "INSERT INTO `leclinks` (subcode,id,pass,link) VALUES ('$subcode','$metid','$metpass','$metlink')";
    // echo $SQL;
    $result=mysqli_query($con,$SQL);
    // echo $result;

    if($result){
        echo 1;
    }
}


?>