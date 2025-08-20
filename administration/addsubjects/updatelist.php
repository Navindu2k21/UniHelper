<?php

$backwardseperator = '../../';
include '../../connector.php';
include '../../includes/header.php';

?>

<head>
    <title>Update Subject</title>
    <link rel="stylesheet" href="addsubjects.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script src="addsubjects.js" type="text/javascript" language="javascript"></script>

</head>

<br><br><br><br><br>

<h1 style="text-align:center;">Add Subjects</h1>
<p style="text-align:center;font-size:20px;">
"This page allows you to add and manage subjects within the system, providing a streamlined way to organize and plan your future work.<br>
 By adding subjects, you can set up a structured approach to track progress, set priorities, and ensure you meet your goals effectively. Each subject entry supports better oversight and can help you stay organized and focused on your ongoing and upcoming tasks."
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
                <br>
                <h1 style="text-align:left;">Update Subject</h1>
                <table width="100%" style="text-align:center;">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>Subject Code</td>
                        <td>Subject Name</td>
                        <td>Update</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" style="text-align:center;" name="sem" id="sem" value="<?php echo $_GET['sem']; ?>"  oninput='removeSpecialCharacters(this)'>
                        </td>
                        <td>
                            <input type="text" style="text-align:center;" name="subcode" id="subcode" value="<?php echo $_GET['subcode']; ?>"  oninput='removeSpecialCharacters(this)'>
                        </td>
                        <td>
                            <input type="text" style="text-align:center;" name="subname" id="subname" value="<?php echo $_GET['subname']; ?>"  oninput='removeSpecialCharacters(this)'>
                        </td>
                        <td>
                            <button type="button" onclick="update('<?php echo $_GET['subcode']; ?>');">
                                <i class="fas fa-save"></i>    
                                Update
                            </button>
                        </td>
                    </tr>

                </table>
                <table width="100%">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="10%">&nbsp;</td>
                        <td width="20%">
                            <center>
                                <button type="button">
                                    <a href="popuplist.php">
                                        <i class="fa-solid fa-rotate-left"></i> 
                                        Back
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
                        <td width="10%">&nbsp;</td>
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