<?php

$backwardseperator = '../../';
include '../../connector.php';
include '../../includes/header.php';

?>

<head>
    <title>Time Table</title>
    <link rel="stylesheet" href="timetable.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script src="timetable.js" type="text/javascript" language="javascript"></script>

</head>

<br><br><br><br><br>

<h1 style="text-align:center;">Time Table</h1>
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
                        <td width="12.5%">Time</td>
                        <td width="12.5%">Monday</td>
                        <td width="12.5%">Tuesday</td>
                        <td width="12.5%">Wednesday</td>
                        <td width="12.5%">Thursday</td>
                        <td width="12.5%">Friday</td>
                        <td width="12.5%">Saturday</td>
                        <td width="12.5%">Sunday</td>
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
                                $sql = "SELECT * FROM `timetable` WHERE rowno=$k AND date=$j";
                                // echo $sql;
                                $result=mysqli_query($con,$sql);
                                while($row=mysqli_fetch_assoc($result)){
                                ?>
                                <td style="background-color: rgba(255, 255, 255, 0.4);color:black;">
                                    <?php 
                                    if($row['subcode']=='0'){
                                        echo '';
                                    }else{
                                    echo $row['subcode'];
                                    }
                                    ?>
                                </td>
                                <?php
                                }
                            }
                            ?>
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
                                    <a href="edittimetable.php">
                                    <i class="fa-regular fa-pen-to-square"></i>   
                                        Edit
                                    </a>
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