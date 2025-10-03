<?php
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
include "../../connector.php";

$RequestType = $_GET["request"];

if ($RequestType === "search") {
    $date = $_GET['date'];
    $ResponseXML = "<XMLsearch>";

    $SQL = "SELECT * FROM `dailyplan` WHERE date = '$date'";
    $result = mysqli_query($con, $SQL);

    // If there are no results, populate with default values
    if (mysqli_num_rows($result) == 0) {
        for ($i = 1; $i <= 24; $i++) {
            $ResponseXML .= "<entry>\n";
            $ResponseXML .= "<rowno><![CDATA[" . $i . "]]></rowno>\n";
            $ResponseXML .= "<work><![CDATA[0]]></work>\n";
            $ResponseXML .= "<type><![CDATA[0]]></type>\n";
            $ResponseXML .= "</entry>\n";
        }
    } else {
        // Populate with actual data from the database
        while ($row = mysqli_fetch_array($result)) {
            $ResponseXML .= "<entry>\n";
            $ResponseXML .= "<rowno><![CDATA[" . $row['rowno'] . "]]></rowno>\n";
            $ResponseXML .= "<work><![CDATA[" . $row['work'] . "]]></work>\n";
            $ResponseXML .= "<type><![CDATA[" . $row['type'] . "]]></type>\n";
            $ResponseXML .= "</entry>\n";
        }
    }
    
    $ResponseXML .= "</XMLsearch>";
    echo $ResponseXML;
}
?>
