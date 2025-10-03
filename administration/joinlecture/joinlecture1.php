<?php

$backwardseperator = '../../';
include '../../connector.php';
include '../../includes/header.php';

?>

<head>
    <title>Join Lecture</title>
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

                        $sem = $_GET['sem'];
                        $sql = "SELECT addsubjects.sub_code,addsubjects.sub_name,leclinks.id,leclinks.pass,leclinks.link FROM addsubjects INNER JOIN leclinks WHERE addsubjects.sub_code = leclinks.subcode AND addsubjects.sem=$sem";
                        $result = mysqli_query($con,$sql);

                        while($row = mysqli_fetch_assoc($result)){
                            $subcode = $row['sub_code'];
                            $subname = $row['sub_name'];
                            $id = $row['id'];
                            $pass = $row['pass'];
                            $link = $row['link'];

                    ?>
                        <tr>
                            <td style="background-color: rgba(0, 0, 0, 0.4);">
                                <div style="font-size:15px;color:white;">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <h1><?php echo $subcode; ?></h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3><?php echo $subname; ?></h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>Meeting ID: <?php echo $id; ?></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>Meeting Password: <?php echo $pass; ?></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <a href="<?php echo $link; ?>" target="_blank">
                                                    <button><i class="fa fa-sign-in-alt"></i> Join</button>
                                                </a>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <br>
                        </td>
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