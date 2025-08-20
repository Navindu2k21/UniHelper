<?php
include '../../connector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $timetableData = $_POST['timetable'];

    foreach ($timetableData as $entry) {
        $day = intval($entry['day']);
        $time = intval($entry['time'])-1;
        $subjectCode = $entry['subjectCode'];

        $updateQuery = "UPDATE `timetable` 
                        SET subcode = '$subjectCode' 
                        WHERE date = $day AND rowno = $time";
        mysqli_query($con, $updateQuery);
    }

    echo "Timetable updated successfully!";
} else {
    echo "Invalid request.";
}
?>
