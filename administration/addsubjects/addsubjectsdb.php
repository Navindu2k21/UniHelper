<?php

include '../../connector.php';

$id = $_GET['id'];

if($id == 'save'){

    $subcode = $_GET['subcode'];
    $subname = $_GET['subname'];
    $sem = $_GET['sem'];

    $SQLSave = "INSERT INTO `addsubjects` (sub_code,sub_name,sem) VALUES ('$subcode','$subname',$sem)";
    // echo $SQL;
    $result=mysqli_query($con,$SQLSave);
    // echo $result;

    if($result){
        echo 1;
    }
} 
else if($id == 'update'){

    $subcode = $_GET['subcode'];
    $oldsubcode = $_GET['oldsubcode'];
    $subname = $_GET['subname'];
    $sem = $_GET['sem'];

    $SQLUpdate = "UPDATE `addsubjects` SET sem=$sem,sub_code='$subcode',sub_name='$subname' WHERE sub_code='$oldsubcode'";
    // echo $SQLUpdate;
    $result=mysqli_query($con,$SQLUpdate);
    // echo $result;

    if($result){
        echo 1;
    }
} 


?>