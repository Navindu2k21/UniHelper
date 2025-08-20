<?php
include '../../connector.php';

header("Content-Type: text/xml");

if (!$con) {
    echo "<response><error>Database connection failed: " . mysqli_connect_error() . "</error></response>";
    exit();
}

$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');

$SQL = "SELECT type FROM `dailyplan` WHERE YEAR(date) = '$year' AND MONTH(date) = '$month'";
$result = mysqli_query($con, $SQL);

if (!$result) {
    echo "<response><error>Query failed: " . mysqli_error($con) . "</error></response>";
    exit();
}

$academic = 0;
$skillimprove = 0;
$extraact = 0;

while ($row = mysqli_fetch_array($result)) {
    if ($row['type'] == 1 || $row['type'] == 2 || $row['type'] == 3) {
        $academic += 1;
    } elseif ($row['type'] == 4) {
        $skillimprove += 1;
    } elseif ($row['type'] == 5) {
        $extraact += 1;
    }
}

// Generate XML output
echo "<response>";
echo "<data label='Academic' value='$academic' />";
echo "<data label='Skill Improvement' value='$skillimprove' />";
echo "<data label='Extra Activity' value='$extraact' />";
echo "</response>";
?>
