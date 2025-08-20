<?php

$backwardseperator = '../../';
include '../../connector.php';
include '../../includes/header.php';

?>

<head>
    <title>Daily Plan</title>
    <link rel="stylesheet" href="dailyplan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script src="dailyplan.js" type="text/javascript" language="javascript"></script>

</head>

<br><br><br><br><br>

<h1 style="text-align:center;">Daily Plan</h1>
<p style="text-align:center;font-size:20px;">
"On this page, you can add your daily tasks to the system, helping you keep track of your work and monitor your progress over time.<br>
 By recording each task, you can create a clear overview of what you've accomplished and what still needs attention. This feature enables you to stay organized, prioritize effectively, and gain valuable insights into your productivity, allowing you to focus on achieving your goals consistently."
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
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="10%">&nbsp;</td>
                        <td width="20%">Date: </td>
                        <td width="20%" id="date">
                            <input type="date">
                        </td>
                        <td width="5%">&nbsp;</td>
                        <td width="20%">Search: </td>
                        <td width="20%">
                            <button onclick="search();">
                                <i class="fa-brands fa-searchengin"></i>    
                                Search
                            </button>
                        </td>
                        <td width="5%">&nbsp;</td>
                    </tr>
                </table>

                <table width="100%" style="text-align:center;" id="plantbl">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>Subject</td>
                        <td>Type</td>
                    </tr>
                    <?php

                    $time_slots = array(
                        "12&nbsp;AM&nbsp;-&nbsp;&nbsp;1&nbsp;AM",
                        "&nbsp;1&nbsp;AM&nbsp;-&nbsp;&nbsp;2AM", 
                        "&nbsp;2&nbsp;AM&nbsp;-&nbsp;&nbsp;3AM", 
                        "&nbsp;3&nbsp;AM&nbsp;-&nbsp;&nbsp;4AM", 
                        "&nbsp;4&nbsp;AM&nbsp;-&nbsp;&nbsp;5AM", 
                        "&nbsp;5&nbsp;AM&nbsp;-&nbsp;&nbsp;6AM", 
                        "&nbsp;6&nbsp;AM&nbsp;-&nbsp;&nbsp;7AM", 
                        "&nbsp;7&nbsp;AM&nbsp;-&nbsp;&nbsp;8AM", 
                        "&nbsp;8&nbsp;AM&nbsp;-&nbsp;&nbsp;9AM", 
                        "&nbsp;9&nbsp;AM&nbsp;-&nbsp;10AM", 
                        "10&nbsp;AM&nbsp;-&nbsp;11&nbsp;AM", 
                        "11&nbsp;AM&nbsp;-&nbsp;12&nbsp;PM", 
                        "12&nbsp;PM&nbsp;-&nbsp;&nbsp;1&nbsp;PM", 
                        "&nbsp;1&nbsp;PM&nbsp;-&nbsp;&nbsp;2&nbsp;PM", 
                        "&nbsp;2&nbsp;PM&nbsp;-&nbsp;&nbsp;3&nbsp;PM", 
                        "&nbsp;3&nbsp;PM&nbsp;-&nbsp;&nbsp;4&nbsp;PM", 
                        "&nbsp;4&nbsp;PM&nbsp;-&nbsp;&nbsp;5&nbsp;PM", 
                        "&nbsp;5&nbsp;PM&nbsp;-&nbsp;&nbsp;6&nbsp;PM", 
                        "&nbsp;6&nbsp;PM&nbsp;-&nbsp;&nbsp;7&nbsp;PM", 
                        "&nbsp;7&nbsp;PM&nbsp;-&nbsp;&nbsp;8&nbsp;PM",
                        "&nbsp;8&nbsp;PM&nbsp;-&nbsp;&nbsp;9&nbsp;PM", 
                        "&nbsp;9&nbsp;PM&nbsp;-&nbsp;10&nbsp;PM", 
                        "10&nbsp;PM&nbsp;-&nbsp;11&nbsp;PM", 
                        "11&nbsp;PM&nbsp;-&nbsp;12&nbsp;AM"
                    );

                    for($i=0;$i<24;$i++){
                    ?>
                    <tr>
                        <td style="text-align:center;">
                            <?php echo $time_slots[$i]; ?>
                        </td>
                        <td>
                            <select name="subject" id="subject" class="custom-select">
                                <?php
                                    $get_subjects = "SELECT * FROM `addsubjects`";
                                    $result=mysqli_query($con,$get_subjects);
                                    $number = 1;

                                    echo '<option value=0>None</option>';
                                    while($row=mysqli_fetch_assoc($result)){
                                        $sem = $row['sem'];
                                        $subcode = $row['sub_code'];
                                        $subname = $row['sub_name'];
                                        
                                        echo '<option value='.$number.'>'.$subcode.' - '.$subname.'</option>';

                                        $number++;
                                    }

                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="type" id="type">
                                <option value="0">None</option>
                                <option value="1">Lecture</option>
                                <option value="2">Self studying</option>
                                <option value="3">Kuppi</option>
                                <option value="4">Improve Skills</option>
                                <option value="5">Extra Curriculam Activities</option>
                            </select>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                </table>

                <table width="100%">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%">&nbsp;</td>
                        <td width="20%">
                            <center>
                                <button type="button">
                                    <a href="dailyplan.php">
                                        <i class="fa-solid fa-file"></i>    
                                        New
                                    </a>
                                </button>
                            </center>
                        </td>
                        <td width="20%">
                            <center>
                                <button type="button" onclick="save();">
                                    <i class="fas fa-save"></i>    
                                    Save
                                </button>
                            </center>
                        </td>
                        <td width="20%">
                            <center>
                                <button type="button">
                                    <a href="../../index.php">
                                        <i class="fa-solid fa-x"></i>    
                                        Close
                                    </a>
                                </button>
                            </center>
                        </td>
                        <td width="20%">&nbsp;</td>
                    </tr>
                </table>
            </fieldset>
        </td>
        <td width="10%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
    </tr>
    <tr>
        &nbsp;
    </tr>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function removeSpecialCharacters(input) {
        input.value = input.value.replace(/[^a-zA-Z0-9 /.\n\r]/g, '');
    }
</script>

<?php
include '../../includes/footer.php';
?>