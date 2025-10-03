<?php
$backwardseperator = '../../';
include '../../includes/header.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}

?>

<head>
    <title>Add Subjects</title>
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
                <table width="100%">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="25%">&nbsp;</td>
                        <td style="text-align:left;" width="20%">Semester: </td>
                        <td width="10%">&nbsp;</td>
                        <td width="20%">
                            <select name="sem" id="sem" class="custom-select">
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                            </select>
                        </td>
                        <td width="25%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="30%">&nbsp;</td>
                        <td style="text-align:left;" width="20%">Subject Code: </td>
                        <td width="10%">&nbsp;</td>
                        <td width="20%">
                            <input type="text" style="width: 200px;" name="subcode" id="subcode"  oninput='removeSpecialCharacters(this)'>
                        </td>
                        <td width="20%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="30%">&nbsp;</td>
                        <td style="text-align:left;" width="20%">Subject Name: </td>
                        <td width="10%">&nbsp;</td>
                        <td width="20%">
                            <input type="text" style="width: 200px;" name="subname" id="subname"  oninput='removeSpecialCharacters(this)'>
                        </td>
                        <td width="20%">&nbsp;</td>
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
                                    <a href="addsubjects.php">
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
                                        <a href="popuplist.php">
                                    <i class="fa-regular fa-file"></i> 
                                    List
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
        input.value = input.value.replace(/[^a-zA-Z0-9 /.\n\r :+-=]/g, '');
    }
</script>

<?php
include '../../includes/footer.php';
?>