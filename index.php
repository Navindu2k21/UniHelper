<?php
$backwardseperator = '';
include 'includes/header.php';
?>

<head>
    <title>UniHelper</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        .container {
            position: relative;
            text-align: center;
            color: white;
            transition: transform .2s, filter .2s;
        }

        /* Scale and darken the image on hover */
        img:hover {
            /* transform: scale(1.2); */
            filter: brightness(20%);
        }

/* Scale and darken the image on hover */
.container:hover {
            transform: scale(1.2);
        }

        /* Hide the centered text initially */
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            font-weight: bold;
            transition: opacity .2s;
            filter: brightness(1); /* Ensure text is fully bright */
        }

        /* Show centered text on hover */
        .container:hover .centered {
            opacity: 1;
        }
    </style>

</head>




<br><br><br><br><br>

<h1 style="text-align:center;">UniHelper</h1>
<p style="text-align:center;font-size:20px;"><strong>
"Welcome to the UniHelper site! We created this platform to help you effectively manage your university academic life.<br>
 Here, you can organize your courses, track assignments, schedule lectures, and monitor your academic progress—all in one place. UniHelper is designed to simplify your daily tasks, keep you focused on your goals, and make your university experience as smooth as possible."</strong>
</p>

<br><br>

<table width="100%">
    <tr>
        <td widdth="10%">&nbsp;</td>
        <td width="20%">
            <div class="container">
            <img src="images/lecture.jpg" width="300px" height="300px">
            <div class="centered" style="font-size:40px;">Manage<br> your lectures</div></div>
    </div>
        </td>
        <td width="20%">
            <div class="container">
            <img src="images/dailyplan.jpg" width="300px" height="300px">
            <div class="centered" style="font-size:40px;">Manage<br> your daily tasks</div>
    </div>
        </td>
        <td width="20%">
            <div class="container">
            <img src="images/progress.jpg" width="300px" height="300px">
            <div class="centered" style="font-size:40px;">See your monthly progress</div>
    </div>
        </td>
        <td width="20%">
            <div class="container">
            <img src="images/timetable.png" width="300px" height="300px">
            <div class="centered" style="font-size:40px;">Manage<br> your time table</div>
    </div>
        </td>
        <td widdth="10%">&nbsp;</td>
    </tr>
</table>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    function removeSpecialCharacters(input) {
        input.value = input.value.replace(/[^a-zA-Z0-9 /.\n\r :+-=]/g, '');
    }
</script>

<?php
include 'includes/footer.php';
?>