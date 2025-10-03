<?php
$con = mysqli_connect('localhost', 'root', '', 'unihelper');
if (!$con) {
    die(mysqli_error($con));
}