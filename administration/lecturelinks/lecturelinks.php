<?php

$backwardseperator = '../../';
include '../../connector.php';
include '../../includes/header.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}
?>

<head>
    <title>Add Lecture Links</title>
    <link rel="stylesheet" href="lecturelinks.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script src="lecturelinks.js" type="text/javascript" language="javascript"></script>

</head>

<br><br><br><br><br>

<h1 style="text-align:center;">Add Lecture Links</h1>
<p style="text-align:center;font-size:20px;">
"On this page, you can add lecture links to the system, making it easier to find and join your lectures quickly and efficiently.<br>
 By organizing your lecture links in one place, you can avoid the hassle of searching through emails or notes every time a class starts. This setup saves you time, keeps you organized, and ensures that you're always prepared to join your lectures on schedule."
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
                        <td width="25%">&nbsp;</td>
                        <td style="text-align:left;" width="20%">Subject: </td>
                        <td width="10%">&nbsp;</td>
                        <td width="20%">
                            <select name="subject" id="subject" class="custom-select">
                                <?php
                                    $get_subjects = "SELECT * FROM `addsubjects`";
                                    $result=mysqli_query($con,$get_subjects);
                                    $number = 1;

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
                        <td width="25%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="30%">&nbsp;</td>
                        <td style="text-align:left;" width="20%">Meeting ID: </td>
                        <td width="10%">&nbsp;</td>
                        <td width="20%">
                            <input type="text" style="width: 200px;" name="metid" id="metid"  oninput='removeSpecialCharacters(this)'>
                        </td>
                        <td width="20%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="30%">&nbsp;</td>
                        <td style="text-align:left;" width="20%">Meeting Password: </td>
                        <td width="10%">&nbsp;</td>
                        <td width="20%">
                            <input type="text" style="width: 200px;" name="metpass" id="metpass"  oninput='removeSpecialCharacters(this)'>
                        </td>
                        <td width="20%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="30%">&nbsp;</td>
                        <td style="text-align:left;" width="20%">Meeting Link: </td>
                        <td width="10%">&nbsp;</td>
                        <td width="20%">
                            <input type="url" style="width: 200px;" name="metlink" id="metlink"  oninput='removeSpecialCharacters(this)'>
                        </td>
                        <td width="20%">&nbsp;</td>
                    </tr>
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
                                    <a href="lecturelinks.php">
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
        input.value = input.value.replace(/[^a-zA-Z0-9 /.\n\r :+-=]/g, '');
    }
</script>

<?php
include '../../includes/footer.php';
?>