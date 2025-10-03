<?php

include '../../connector.php';

// Safely get id from GET
$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id == 'save'){

    $subcode = isset($_GET['subcode']) ? $_GET['subcode'] : '';
    $subname = isset($_GET['subname']) ? $_GET['subname'] : '';
    $sem = isset($_GET['sem']) ? $_GET['sem'] : '';

    $SQLSave = "INSERT INTO `addsubjects` (sub_code,sub_name,sem) VALUES ('$subcode','$subname',$sem)";
    // echo $SQL;
    $result=mysqli_query($con,$SQLSave);
    // echo $result;

    if($result){
        echo 1;
    }
} 
else if($id == 'update'){

    $subcode = isset($_GET['subcode']) ? $_GET['subcode'] : '';
    $oldsubcode = isset($_GET['oldsubcode']) ? $_GET['oldsubcode'] : '';
    $subname = isset($_GET['subname']) ? $_GET['subname'] : '';
    $sem = isset($_GET['sem']) ? $_GET['sem'] : '';

    $SQLUpdate = "UPDATE `addsubjects` SET sem=$sem,sub_code='$subcode',sub_name='$subname' WHERE sub_code='$oldsubcode'";
    // echo $SQLUpdate;
    $result=mysqli_query($con,$SQLUpdate);
    // echo $result;

    if($result){
        echo 1;
    }
} 


?>