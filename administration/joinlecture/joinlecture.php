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
    <title>Select Semester</title>
    <link rel="stylesheet" href="joinlecture.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script src="joinlecture.js" type="text/javascript" language="javascript"></script>

</head>

<br><br><br><br><br>

<h1 style="text-align:center;">Join Lecture</h1>
<p style="text-align:center;font-size:20px;"></p>

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
                    <?php
                        for($i=1;$i<=8;$i++){
                    ?>
                    <tr>
                        <td style="background-color: rgba(0, 0, 0, 0.4);">
                            <a href="joinlecture1.php?sem=<?php echo $i ?>">
                                <div style="font-size:30px;color:white;">
                                    Semester <?php echo $i; ?>
                                </div>
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                        }
                    ?>
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