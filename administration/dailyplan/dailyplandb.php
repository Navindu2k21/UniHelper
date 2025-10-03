<?php

include '../../connector.php';

$id = $_GET['id'];

if ($id == 'save') {
    $date = $_POST['date'];
    $rowNumbers = $_POST['rowno']; // Array of row numbers
    $works = $_POST['work'];       // Array of work values
    $types = $_POST['type'];       // Array of type values

    $success = true;

    // Loop through each entry
    for ($i = 0; $i < count($rowNumbers); $i++) {
        $rowno = $rowNumbers[$i];
        $work = $works[$i];
        $type = $types[$i];

        $SQL = "INSERT INTO `dailyplan` (date, rowno, work, type) VALUES ('$date', '$rowno', '$work', '$type')";
        $result = mysqli_query($con, $SQL);

        // If any query fails, set success flag to false
        if (!$result) {
            $success = false;
            break;
        }
    }

    // Return success status
    if ($success) {
        echo 1;
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else if($id == 'chkDateExist'){
    $date = $_GET['date'];

    $chkDateExistSQL = "SELECT * FROM `dailyplan` WHERE date='$date'";
    // echo $chkDateExistSQL;
    $result = mysqli_query($con, $chkDateExistSQL);
    // echo $result;
    $count =0;
    while($row = mysqli_fetch_assoc($result)){
        $count +=1;
    }

    if($count !=0){
        echo 1;
    }

} else if ($id == 'update') {
    $date = $_POST['date'];
    $rowNumbers = $_POST['rowno']; // Array of row numbers
    $works = $_POST['work'];       // Array of work values
    $types = $_POST['type'];       // Array of type values

    $success = true;

    // Loop through each entry
    for ($i = 0; $i < count($rowNumbers); $i++) {
        $rowno = $rowNumbers[$i];
        $work = $works[$i];
        $type = $types[$i];

        $SQL = "UPDATE `dailyplan` SET work=$work,type=$type WHERE date='$date' AND rowno=$rowno";
        $result = mysqli_query($con, $SQL);

        // If any query fails, set success flag to false
        if (!$result) {
            $success = false;
            break;
        }
    }

    // Return success status
    if ($success) {
        echo 1;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

?>
