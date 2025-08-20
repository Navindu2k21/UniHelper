<?php

$backwardseperator = '../../';
include '../../connector.php';
include '../../includes/header.php';

?>

<head>
    <title>Edit Time Table</title>
    <link rel="stylesheet" href="timetable.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script src="timetable.js" type="text/javascript" language="javascript"></script>

</head>

<br><br><br><br><br>

<h1 style="text-align:center;">Edit Time Table</h1>
<p style="text-align:center;font-size:20px;"></p>

<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td width="10%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="60%">
            <fieldset style="background-color: rgba(0, 0, 0, 0.4);">

                <table width="100%" style="text-align:center;">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td width="16%">Time</td>
                        <td width="12%">Monday</td>
                        <td width="12%">Tuesday</td>
                        <td width="12%">Wednesday</td>
                        <td width="12%">Thursday</td>
                        <td width="12%">Friday</td>
                        <td width="12%">Saturday</td>
                        <td width="12%">Sunday</td>
                    </tr>

                    <?php

                        $time_slots = array( 
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
                            "&nbsp;9&nbsp;PM&nbsp;-&nbsp;10&nbsp;PM"
                        );

                        for($i=0;$i<16;$i++){
                        ?>
                        <tr>
                            <td><?php echo $time_slots[$i]; ?></td>
                            <?php
                            $k = $i+1;
                            for($j=1;$j<=7;$j++){
                                ?>
                                <td style="background-color: rgba(255, 255, 255, 0.4);color:black;">
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
                                        
                                        $sql_chk = "SELECT * FROM `timetable` WHERE rowno=$k AND date=$j";
                                        $result_chk = mysqli_query($con,$sql_chk);
                                        $row_chk = mysqli_fetch_assoc($result_chk);
                                        $subcode_chk = $row_chk['subcode'];

                                        if($subcode==$subcode_chk){
                                            echo '<option value='.$subcode.' selected>'.$subcode.' - '.$subname.'</option>';
                                        }else{
                                            echo '<option value='.$subcode.'>'.$subcode.' - '.$subname.'</option>';
                                        }

                                        $number++;
                                    }

                                ?>
                            </select>
                                </td>
                                <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                        // }
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
                                    <a href="timetable.php">
                                        <i class="fa-solid fa-rotate-left"></i> 
                                        Back
                                    </a>
                                </button>
                            </center>
                        </td>
                        <td width="20%">
                            <center>
                                <button type="button" onclick="updatetimetbl();">
                                    <i class="fas fa-save"></i>    
                                    Update
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
        <td width="10%">&nbsp;</td>
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