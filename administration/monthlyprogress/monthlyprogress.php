<?php
$backwardseperator = '../../';
include '../../connector.php';
include '../../includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly Progress</title>
    <link rel="stylesheet" href="monthlyprogress.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="monthlyprogress.js" type="text/javascript" language="javascript"></script>
</head>
<body>

<br><br><br><br><br>

<h1 style="text-align:center;">Monthly Progress</h1>
<p style="text-align:center;font-size:20px;">
"This page displays your monthly work progress, visualized through a graph that plots dates against the hours worked.<br>
 This graph helps you easily monitor your productivity over the month, showing when you were most active and highlighting patterns in your work habits. By reviewing this data, you can gain insights into your efficiency, manage your time more effectively, and make adjustments to reach your goals consistently."
</p>

<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td width="20%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="40%">
            <fieldset style="background-color: rgba(0, 0, 0, 0.4);">
                <table width="100%">
                    <tr>
                        <td width="10%">Year: </td>
                        <td width="10%">
                            <select name="year" id="year">
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                            </select>
                        </td>
                        <td width="10%">Month: </td>
                        <td width="10%">
                            <select name="month" id="month">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </td>
                        <td width="10%">Search: </td>
                        <td width="20%">
                            <button onclick="search();">
                                <i class="fa-brands fa-searchengin"></i> Search
                            </button>
                        </td>
                    </tr>
                </table>

                <table width="100%">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        </td>
                    </tr>
                </table>
                
                <table width="100%">
                    <tr>
                        <td width="30%">&nbsp;</td>
                        <td width="20%">
                            <center>
                                <button type="button">
                                    <a href="monthlyprogress.php">
                                        <i class="fa-solid fa-file"></i> New
                                    </a>
                                </button>
                            </center>
                        </td>
                        <td width="20%">
                            <center>
                                <button type="button">
                                    <a href="../../index.php">
                                        <i class="fa-solid fa-x"></i> Close
                                    </a>
                                </button>
                            </center>
                        </td>
                        <td width="30%">&nbsp;</td>
                    </tr>
                </table>
            </fieldset>
        </td>
        <td width="10%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
    </tr>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="monthlyprogress.js"></script>

<?php
include '../../includes/footer.php';
?>
</body>
</html>
